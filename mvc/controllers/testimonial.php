<?

class TestimonialController extends BaseController
{
    public function indexAction()
    {
        $this->initForm();

        if ($this->handleSubmit()) {
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
        $tblLocation = new Jedarchive_Table('testimonial_location');

        $testimonial = $tblTestimonial->fetch('*', array('id' => $id));
        $testimonial = $testimonial[0];
        $locations = $tblLocation->fetch('*', array('testimonial_id' => $id));

        $testimonial['tell_us_your_story'] = $testimonial['story'];
        $testimonial['name_public'] = $testimonial['name_public'] ? 'show' : 'hide';
        foreach (array('from','to') as $field) {
            foreach (array('year', 'month','day','hour') as $subfield) {
                $testimonial[$field][$subfield] = $testimonial[$field . '_' . $subfield];
            }
        }

        $lats = array();
        $lngs = array();
        foreach($locations as $idx => $loc) {
            $lats[$idx] = $loc['lat'];
            $lngs[$idx] = $loc['lng'];
        }

        $this->jsVar('lat', $lats);
        $this->jsVar('lng', $lngs);

        //echo '<pre>';print_r($testimonial);die();

        $this->view->form->setPrefill($testimonial);
        $this->view->deleteLink = '/testimonial/delete/' . $id . '/' . $crc;

        if ($this->handleSubmit()) {
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

    protected function handleSubmit()
    {
        if ($this->isPost()) {
            $params = $this->getPostParams();
            $this->view->form->setPrefill($params);

            $this->jsVar('lat', $this->getParam('lat'));
            $this->jsVar('lng', $this->getParam('lng'));

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
                        $locations[] = array('lat' => $lat, 'lng' => $params['lng'][$idx]);
                    }
                }

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
    
    protected function initForm()
    {
        $form = new Jedarchive_Formbuilder();
        $form->setI18n($this->view->getI18n());
        $form->setRequired(
            array(
                'tell_us_your_story' => true,
                'terms' => true,
            )
        );

        $form->setValidations(array('email' => 'email'));
        $this->view->form = $form;
    }
    
    protected function id2hash($id)
    {
        return substr(md5("klfnwe0-23{$id}wfme"), 0, 8);
    }
}