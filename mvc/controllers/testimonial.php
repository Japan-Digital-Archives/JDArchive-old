<?

class TestimonialController extends BaseController
{
    public function indexAction()
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

        if ($this->isPost()) {
            $params = $this->getPostParams();
            $form->setPrefill($params);
            $jsParams = array('lat' => $this->getParam('lat'), 'lng' => $this->getParam('lng'));
            $this->layout->javascriptVariables = $jsParams;

            if ($form->validate($params)) {
                $data = array();
                $locations = array();

                foreach (array('name', 'email', 'city', 'occupation', 'year_of_birth') as $field) {
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
                
                foreach ($params['lat'] as $idx => $lat) {
                    $locations[] = array('lat' => $lat, 'lng' => $params['lng'][$idx]);
                }
                echo '<pre>';
                print_r($data);
                print_r($locations);
                die();
            } 

       }

        $this->view->form = $form;
    }
}