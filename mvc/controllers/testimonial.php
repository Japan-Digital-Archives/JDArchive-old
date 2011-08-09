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

    ////////////////////////////////////////////////////////////////////////////////
    // Actions
    
    /**
     * Show the testimonial form.
     */
    public function indexAction()
    {
        $this->initForm();

        if ($this->handleSubmit()) {
            $this->handleEmail();
            $this->redirect($this->url('testimonial', 'confirmation', array($this->_testimonialId, $this->id2hash($this->_testimonialId))));
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
            $this->redirect($this->url('testimonial'));
        }

        $tblTestimonial = new Jedarchive_Table('testimonial');

        $testimonial = $tblTestimonial->fetch('*', array('id' => $id));
        if (count($testimonial) == 0) {
            $this->redirect($this->url('testimonial'));
        }
        $testimonial = $testimonial[0];

        $testimonial['tell_us_your_story'] = $testimonial['story'];
        $testimonial['name_public'] = $testimonial['name_public'] ? 'show' : 'hide';
        foreach (array('from','to') as $field) {
            foreach (array('year', 'month','day','hour') as $subfield) {
                $testimonial[$field][$subfield] = $testimonial[$field . '_' . $subfield];
            }
        }

        $this->_prefillLocations($id);
        $this->_prefillImages($id);
        $this->view->form->setPrefill($testimonial);
        $this->view->deleteLink = $this->url('testimonial', 'delete', array($id, $crc));

        // If the form was succesfully saved, then redirect to the confirmation page
        if ($this->handleSubmit()) {
            $this->handleEmail();
            $this->redirect($this->url('testimonial', 'confirmation', array($id, $crc)));
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
            $this->redirect($this->url('testimonial'));
        }

        $this->view->editLink = $this->url('testimonial', 'edit', array($id, $crc));
    }

    /**
     * Delete a testimonial
     */
    public function deleteAction()
    {
        $id = $this->getNextUriParam();
        $crc = $this->getNextUriParam();

        if ($crc != $this->id2hash($id)) {
            $this->redirect($this->url('testimonial'));
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
                $this->view->previousLink = $this->url('testimonial', 'browse', array($prev));
            }
            if ($next = $loader->findNextId($id)) {
                $this->view->nextLink = $this->url('testimonial', 'browse', array($next));
            }
            $this->view->editLink = $this->url('testimonial', 'edit', array($id, $this->id2hash($id)));
            $this->view->publicLink = $this->url('testimonial', 'public', array($id, $this->id2hash($id, 'public')));
            
            $this->_prefillLocations($id);
            $this->_prefillImages($id);
            $this->jsVar('readonly', true);
            if (is_null($this->view->testimonial)) {
                $this->redirect($this->url('testimonial', 'browse'));
            }
        } else {
            /*$this->view->setViewFile('testimonial/browse-overview.php');
             $this->view->testimonials = $loader->loadAll();*/
            $this->redirect($this->url('testimonial', 'browse', array($loader->findLastId())));
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
                $this->redirect($this->url('testimonial'));
            }
            $this->view->testimonial = $loader->load($id);
            $this->_prefillLocations($id);
            $this->_prefillImages($id);
            $this->jsVar('readonly', true);
            if (is_null($this->view->testimonial)) {
                $this->redirect($this->url('testimonial'));
            }
        } else {
            $this->redirect($this->url('testimonial'));
        }
    }

    
    /**
     * Ajax call to upload an image
     */
    public function uploadImageAction()
    {
        $settings = $this->_getImageSettings();
        
        $uploadDir = Jedarchive_Image::getUploadDir();
        
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

        $uploader = new Jedarchive_FileUploader($settings['allowedExtensions'], $settings['sizeLimit']);
        $result = $uploader->handleUpload($uploadDir);

        if (isset($result['name']) && isset($result['ext'])) {
            foreach ($sizes as $name => $size) {
                $src = $uploadDir . '/' . $result['name'] . '.' . $result['ext'];
                $dst = $uploadDir . '/' . $name . '/' . $result['name'] . '.' . $result['ext'];

                $result[$name] = $this->_config->images->upload_path . '/' . $name . '/' . $result['name'] . '.' . $result['ext'];

                $imgResizer = new Jedarchive_Image_Resizer();
                $imgResizer->resize($size[0], $size[1], $src, $dst);
            }
            $result['list-item'] = $this->view->partial(
            	'/partial/image-list-item.php', 
                array(
                	'id' => $result['name'],
                    'name' => $result['filename'],
                    'ext' => $result['ext']
                )
            );

        }

        
        // don't render a view
        $this->view = null;
        
        // to pass data through iframe we need to encode all html tags
        echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
        //echo json_encode($result);
    }
    
    public function imageprefillAction()
    {
        if ($filename = $this->getParam('filename')) {            
            print $this->view->partial(
                	'/partial/image-list-item.php', 
                    array(
                        'id' => $filename,
        				'name' => $this->getParam('description'), //$img->getDescription(),
                        'ext' => $this->getParam('ext'), //$img->getExtension(),
                        'address' => $this->getParam('address') //$img->getAddress()
                    )
             );

        }
        exit;
    }
    
    ////////////////////////////////////////////////////////////////////////////////
    // Helpers
    
    /**
     * Helper function : handle submitting the testimonial form, either to make a new
     * testimonial or to edit an existing one.
     * 
     * @return true if the testimonial was succesfully saved, false otherwise
     */
    private function handleSubmit()
    {
        
        // If this is not a post request we don't do anything
        if ($this->isPost()) {
            //echo '<pre>';print_r($this->getParams());die();
            $params = $this->getParams();
            
            // Set all the prefill stuff first, in case we need to render the form again
            $this->view->form->setPrefill($params);

            // locations are prefilled through JS
            $this->jsVar('lat', $this->getParam('lat'));
            $this->jsVar('lng', $this->getParam('lng'));
            $this->jsVar('location_name', $this->getParam('location_name'));

            // images are prefilled through JS
            $this->_prefillImages();
            
            // If the user switches language we simply show the form again
            // including what was already filled in. that's what this is for.
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
                
                $imgSettings = $this->_getImageSettings();
                $imgMapper = new Jedarchive_Image_Mapper();
                foreach ($params['image_upload'] as $imgData) {
                    $img = $imgMapper->fromFormData($imgData);
                    
                    if ($img->fileExists()) {
                        $img->setTestimonialId($id);
                        $imgMapper->save($img);
                    } else {
                        if (APPLICATION_ENV == 'development')
                            die($fullPath);
                    }
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
    private function handleEmail()
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
    private function initForm()
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
    private function id2hash($id, $purpose = '')
    {
        return substr(md5("klfnwe0-23{$id}wfme".$purpose), 0, 12);
    }

    ////////////////////////////////////////////////////////////////////////////////
    // Helpers for locations
    
    /**
     * Load the locations that are marked on the map, and pass them on to javascript
     * to be rendered.
     * 
     * @param int $id Testimonial id
     */
    private function _prefillLocations($id)
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

    ////////////////////////////////////////////////////////////////////////////////
    // Helpers for image upload
    
    /**
     * Load the images that are linked to a testimonial, and pass them on to javascript
     * to be rendered.
     * 
     * @param int $id Testimonial id
     */
    private function _prefillImages($id = null)
    {
        $mapper = new Jedarchive_Image_Mapper();
        $imgs = array();
        if ($id) {
            $imgs = $mapper->loadByTestimonial($id);
        } else {
            if ($this->getParam('image_upload')) {
                foreach ($this->getParam('image_upload') as $imgData) {
                    $img = $mapper->fromFormData($imgData);
                    $imgs[] = $img;
                }
            }
        }
            
        $data = array();
        foreach($imgs as $img) {
            $imgData = $img->toArray('js-prefill');
            $data[] = $imgData;
        }
        
        $this->view->images = $imgs;
        $this->jsVar('images', $data);
    }

    /**
     * Return configuration settings regarding image uploads : the allowed extensions (jpg,png,...)
     * and the maximum upload size in MB.
     */
    private function _getImageSettings()
    {
        $allowedExtensions = explode(',', $this->_config->images->upload_extensions);
        $sizeLimit = $this->_config->images->upload_size_limit_mb * 1024 * 1024;
        
        return array(
            'allowedExtensions' => $allowedExtensions,
            'sizeLimit' => $sizeLimit,
        );
    }
}