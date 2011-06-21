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

        if ($this->isPost()) {
            $form->setPrefill($this->getParams());
            $jsParams = array('lat' => $this->getParam('lat'), 'lng' => $this->getParam('lng'));
            $this->layout->javascriptVariables = $jsParams;
            /*echo '<pre>';
            print_r($this->getParams());
            die();*/
       }

        $this->view->form = $form;
    }
}