<?

class TestimonialController extends BaseController
{
    public function indexAction()
    {
        $this->initForm();

        if ($this->handleSubmit()) {
            $this->handleEmail();
            $this->redirect('/testimonial/confirmation/' . $this->_testimonialId . '/' . $this->id2hash($this->_testimonialId));
        }
    }

    public function editAction()
    {
        $this->initForm();

        $id = $this->getNextUriParam();
        $crc = $this->getNextUriParam();

        if ($crc != $this->id2hash($id)) {
            $this->redirect('/testimonial');
        }

        $tblTestimonial = new Jedarchive_Table('testimonial');

        $testimonial = $tblTestimonial->fetch('*', array('id' => $id));
        if (count($testimonial) == 0) {
            $this->redirect('/testimonial');
        }
        $testimonial = $testimonial[0];

        $testimonial['tell_us_your_story'] = $testimonial['story'];
        $testimonial['name_public'] = $testimonial['name_public'] ? 'show' : 'hide';
        foreach (array('from','to') as $field) {
            foreach (array('year', 'month','day','hour') as $subfield) {
                $testimonial[$field][$subfield] = $testimonial[$field . '_' . $subfield];
            }
        }

        //echo '<pre>';print_r($testimonial);die();

        $this->prefillLocationsFor($id);
        $this->view->form->setPrefill($testimonial);
        $this->view->deleteLink = '/testimonial/delete/' . $id . '/' . $crc;

        if ($this->handleSubmit()) {
            $this->handleEmail();
            $this->redirect('/testimonial/confirmation/' . $id . '/' . $crc);
        }
    }

    public function confirmationAction()
    {
        $id = $this->getNextUriParam();
        $crc = $this->getNextUriParam();

        if ($crc != $this->id2hash($id)) {
            $this->redirect('/');
        }

        $this->view->editLink = '/testimonial/edit/' . $id . '/' . $crc;
    }

    public function deleteAction()
    {
        $id = $this->getNextUriParam();
        $crc = $this->getNextUriParam();

        if ($crc != $this->id2hash($id)) {
            $this->redirect('/');
        }
        $tblTestimonial = new Jedarchive_Table('testimonial');
        $tblLocation = new Jedarchive_Table('testimonial_location');

        $testimonial = $tblTestimonial->delete(array('id' => $id));
        $locations = $tblLocation->delete(array('testimonial_id' => $id));
    }

    public function browseAction()
    {
        $this->authenticate();

        $id = $this->getNextUriParam();
        $loader = new Jedarchive_Testimonial_Loader();
        
        if ($id) {
            $this->view->testimonial = $loader->load($id);
            if ($prev = $loader->findPreviousId($id)) {
                $this->view->previousLink = '/testimonial/browse/'.$prev;
            }
            if ($next = $loader->findNextId($id)) {
                $this->view->nextLink = '/testimonial/browse/'.$next;
            }
            $this->view->editLink = '/testimonial/edit/'.$id.'/'.$this->id2hash($id);
            $this->view->publicLink = '/testimonial/public/'.$id.'/'.$this->id2hash($id, 'public');
            $this->prefillLocationsFor($id);
            $this->jsVar('readonly', true);
            if (is_null($this->view->testimonial)) {
                $this->redirect('/testimonial/browse');
            }
        } else {
            /*$this->view->setViewFile('testimonial/browse-overview.php');
             $this->view->testimonials = $loader->loadAll();*/
            $this->redirect('/testimonial/browse/' . $loader->findLastId());
        }
    }

    public function publicAction()
    {
        $id = $this->getNextUriParam();
        $loader = new Jedarchive_Testimonial_Loader();
        
        if ($id) {
            $hash = $this->getNextUriParam();
            if ($hash != $this->id2hash($id, 'public')) {
                $this->redirect('/testimonial');
            }
            $this->view->testimonial = $loader->load($id);
            $this->prefillLocationsFor($id);
            $this->jsVar('readonly', true);
            if (is_null($this->view->testimonial)) {
                $this->redirect('/testimonial');
            }
        } else {
            $this->redirect('/testimonial');
        }
    }

    protected function handleSubmit()
    {
        if ($this->isPost()) {
            $params = $this->getPostParams();
            $this->view->form->setPrefill($params);

            $this->jsVar('lat', $this->getParam('lat'));
            $this->jsVar('lng', $this->getParam('lng'));
            $this->jsVar('location_name', $this->getParam('location_name'));

            if (isset($params['passthru']) && $params['passthru']) {
                return false;
            }

            if ($this->view->form->validate($params)) {
                $data = array();
                $locations = array();

                foreach (array('id', 'name', 'email', 'city', 'occupation', 'year_of_birth') as $field) {
                    if (isset($params[$field]) && $params[$field]) { 
                        $data[$field] = $params[$field];
                    }
                }

                $data['story'] = $params['tell_us_your_story'];
                foreach (array('from','to') as $field) {
                    foreach (array('year', 'month','day','hour') as $subfield) {
                        if (isset($params[$field][$subfield]) && $params[$field][$subfield]) {
                            $data[$field . '_' . $subfield] = $params[$field][$subfield];
                        }
                    }
                }
                
                $data['name_public'] = (isset($params['name_public']) && $params['name_public'] == 'show') ? true : false;
                
                if (isset($params['lat'])) {
                    foreach ($params['lat'] as $idx => $lat) {
                        $locations[] = array(
                            'lat' => $lat,
                            'lng' => $params['lng'][$idx],
                            'name' => $params['location_name'][$idx]
                        );
                    }
                }

                $data['client_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
                
                $tblTestimonial = new Jedarchive_Table('testimonial');
                $tblLocation = new Jedarchive_Table('testimonial_location');

                if (isset($data['id'])) {
                    $id = $data['id'];
                    $tblTestimonial->replace($data);
                    $tblLocation->delete(array('testimonial_id' => $id));
                } else {
                    $id = $tblTestimonial->insert($data);
                }

                foreach ($locations as $location) {
                    $location['testimonial_id'] = $id;
                    $tblLocation->insert($location);
                }
                $this->_testimonialId = $id;
                return true;
            } 
        }
    }

    protected function handleEmail()
    {
        $email1 = $this->getParam('name') . '<' . $this->getParam('email') .'>';
        $email2 = Jedarchive_Config::instance()->getSetting('email');
        $mail = new Jedarchive_Mail('testimonial');

        $id = $this->getParam('id');
        $editUrl = Jedarchive_Config::instance()->getSetting('base_url').'/testimonial/edit/'.$id.'/'.$this->id2hash($id);

        $mail
            ->setTo($email1)
            ->setFrom($email2)
            ->setSubject('testimonial_subject')
            ->setViewParams(array('link' => $editUrl))
            ->send();
        
        $mail
            ->setTo($email2)
            ->setFrom($email1)
            ->send();
    }
    
    protected function initForm()
    {
        $form = new Jedarchive_Formbuilder();
        $form->setI18n($this->view->getI18n());
        $form->setRequired(
            array(
                'tell_us_your_story' => true,
                'terms' => true,
                'email' => true,
            )
        );

        $form->setValidations(array('email' => 'email'));
        $this->view->form = $form;
    }
    
    protected function id2hash($id, $purpose = '')
    {
        return substr(md5("klfnwe0-23{$id}wfme".$purpose), 0, 12);
    }

    protected function prefillLocationsFor($id)
    {
        $tblLocation = new Jedarchive_Table('testimonial_location');
        $locations = $tblLocation->fetch('*', array('testimonial_id' => $id));

        $lats = array();
        $lngs = array();
        $names = array();
        foreach($locations as $idx => $loc) {
            $lats[$idx] = $loc['lat'];
            $lngs[$idx] = $loc['lng'];
            $names[$idx] = $loc['name'];
        }

        $this->jsVar('lat', $lats);
        $this->jsVar('lng', $lngs);
        $this->jsVar('location_name', $names);
    }
}