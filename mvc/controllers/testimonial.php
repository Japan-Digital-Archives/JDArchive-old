<?

/**
 * The testimonial controller handles all paths under http://jdarchive.org/testimonial
 *
 */
class TestimonialController extends BaseController
{
    /**
     * Initialize the controller
     * 
     * @see BaseController::init()
     */
    public function init()
    {
        parent::init();

        $this->jsVar('imageUpload', $this->_getImageSettings());
    }

    /**
     * Show the testimonial form.
     */
    public function indexAction()
    {
        $this->initForm();

        if ($this->handleSubmit()) {
            $this->handleEmail();
            $this->redirect('/testimonial/confirmation/' . $this->_testimonialId . '/' . $this->id2hash($this->_testimonialId));
        }
    }

    /**
     * Edit a testimonial entry. This assumes the path testimonial/edit/<id>/<hash>, with <id> referring
     * to a specific testimonial, and the hash serving as a security mechanism so the URL can
     * not be forged.
     */
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

        $this->prefillLocationsFor($id);
        $this->view->form->setPrefill($testimonial);
        $this->view->deleteLink = '/testimonial/delete/' . $id . '/' . $crc;

        // If the form was succesfully saved, then redirect to the confirmation page
        if ($this->handleSubmit()) {
            $this->handleEmail();
            $this->redirect('/testimonial/confirmation/' . $id . '/' . $crc);
        }
    }

    /**
     * Show the confirmation page
     */
    public function confirmationAction()
    {
        $id = $this->getNextUriParam();
        $crc = $this->getNextUriParam();

        if ($crc != $this->id2hash($id)) {
            $this->redirect('/');
        }

        $this->view->editLink = '/testimonial/edit/' . $id . '/' . $crc . '?la=' . $this->getParam('la');
    }

    /**
     * Delete a testimonial
     */
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

    /**
     * Browse the testimonials
     */
    public function browseAction()
    {
        // make sure a valid user is logged in
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

    /**
     * Display the testimonial data. These links can not be forged, only by publishing
     * them the data becomes public.
     */
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

    /**
     * Helper function : handle submitting the testimonial form, either to make a new
     * testimonial or to edit an existing one.
     * 
     * @return true if the testimonial was succesfully saved, false otherwise
     */
    protected function handleSubmit()
    {
        // If this is not a post request we don't do anything
        if ($this->isPost()) {
            $params = $this->getParams();
            $this->view->form->setPrefill($params);

            $this->jsVar('lat', $this->getParam('lat'));
            $this->jsVar('lng', $this->getParam('lng'));
            $this->jsVar('location_name', $this->getParam('location_name'));

            if (isset($params['passthru']) && $params['passthru']) {
                return false;
            }

            // The form object {@see initForm()} checks for mandatory fields
            // and well formed email addresses.
            // 
            // This way the form object can also show validation errors when rendering the form
            // again.
            if ($this->view->form->validate($params)) {
                // populate a data array, to insert into the database
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
                
                // Time to save to the DB, initialize table objects
                $tblTestimonial = new Jedarchive_Table('testimonial');
                $tblLocation = new Jedarchive_Table('testimonial_location');
                $tblImage = new Jedarchive_Table('testimonial_image');

                // save/update the testimonial
                if (isset($data['id'])) {
                    $id = $data['id'];
                    $tblTestimonial->replace($data);
                    // if this an update, throw away existing locations first
                    $tblLocation->delete(array('testimonial_id' => $id));
                    $tblImage->delete(array('testimonial_id' => $id));
                } else {
                    $id = $tblTestimonial->insert($data);
                }

                foreach ($locations as $location) {
                    $location['testimonial_id'] = $id;
                    $tblLocation->insert($location);
                }
                
                foreach ($params[image_upload] as $img) {
                    $imgData = array(
                        'testimonial_id' => $id,
                        'filename' => $img['name'],
                    	'extension' => $img['ext'],
                        'description' => $img['description'],
                        //lat , lng
                    );
                    $tblImage->insert($imgData);
                }
                
                $this->_testimonialId = $id;
                return true;
            }
            return false;
        }
    }

    /**
     * Send out emails when the form is succesfully submitted.
     */
    protected function handleEmail()
    {
        $email1 = $this->getParam('name') . '<' . $this->getParam('email') .'>';
        $email2 = $this->_config->email;
        $mail = new Jedarchive_Mail('testimonial');

        $id = $this->_testimonialId;
        $editUrl = $this->_config->base_url.'/testimonial/edit/'.$id.'/'.$this->id2hash($id).'?la='.$this->view->getI18n()->getCurrent();

        $mail
            ->setTo($email1)
            ->setFrom($email2)
            ->setSubject('testimonial_subject')
            ->setViewParams(array('link' => $editUrl))
            ->send();
        
        $mail
            ->setTo($email2)
            ->setFrom($email1)
            ->setSubject('testimonial_subject_internal')
            ->send();
    }
    
    /**
     * Create the form builder. An object that will be available in the view to render the form.
     * It also takes care of prefilling existing values, and of validating submissions.
     */
    protected function initForm()
    {
        $form = new Jedarchive_Formbuilder();
        $form->setI18n($this->view->getI18n());
        $form->setRequired( // these fields are mandatory, they will get a red asterisk and will have to be filled in
            array(
                'tell_us_your_story' => true,
                'terms' => true,
                'email' => true,
            )
        );

        // in case there are errors and we have to show the form again, we want everything to
        // be filled in as before
        $form->setPrefill($this->getParams());

        // validate the email field to be a valid email address
        $form->setValidations(array('email' => 'email'));
        
        // assign the form to the view, so we can use it there
        $this->view->form = $form;
    }
    
    /**
     * Create a salted hash to be used in url's.
     * 
     * @param int|string $id The field to hash 
     * @param string $purpose The category of the url, in case we need multiple 
     *                           types of hashes (in our case public/private)
     */
    protected function id2hash($id, $purpose = '')
    {
        return substr(md5("klfnwe0-23{$id}wfme".$purpose), 0, 12);
    }

    /**
     * Load the locations that are marked on the map, and pass them on to javascript
     * to be rendered.
     * 
     * @param int $id Testimonial id
     */
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

    /**
     * Ajax call to upload an image
     */
    public function uploadImageAction()
    {
        // don't render a view
        $this->view = null;
        $uploadDir = $this->_config->images->upload_dir;
        
        if (!(strpos($uploadDir, '/') === 0)) {
            $uploadDir = APPLICATION_PATH . '/' . $uploadDir;
        }
        
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir);
        }
        
        $sizes = array();
        foreach($this->_config->image_sizes as $name => $size) {
            $dir = $uploadDir . '/' . $name; 
            if (!is_dir($dir)) {
                mkdir($dir);
            }
            $sizes[$name] = explode('x', $size);
        }

        $settings = $this->_getImageSettings();
        $uploader = new Jedarchive_FileUploader($settings['allowedExtensions'], $settings['sizeLimit']);
        $result = $uploader->handleUpload($uploadDir);

        if (isset($result['name']) && isset($result['ext'])) {
            foreach ($sizes as $name => $size) {
                $src = $uploadDir . '/' . $result['name'] . '.' . $result['ext'];
                $dst = $uploadDir . '/' . $name . '/' . $result['name'] . '.' . $result['ext'];

                $result[$name] = $this->_config->images->upload_path . '/' . $name . '/' . $result['name'] . '.' . $result['ext'];

                $imgResizer = new Jedarchive_Image();
                $imgResizer->resize($size[0], $size[1], $src, $dst);
            }
        }

        // to pass data through iframe you will need to encode all html tags
        echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
    }

    /**
     * Return configuration settings regarding image uploads : the allowed extensions (jpg,png,...)
     * and the maximum upload size in MB.
     */
    protected function _getImageSettings()
    {
        $allowedExtensions = explode(',', $this->_config->images->upload_extensions);
        $sizeLimit = $this->_config->images->upload_size_limit_mb * 1024 * 1024;

        return array(
            'allowedExtensions' => $allowedExtensions,
            'sizeLimit' => $sizeLimit
        );
    }
}