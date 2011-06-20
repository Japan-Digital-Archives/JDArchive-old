<?

class TestimonialController extends BaseController
{
    public function indexAction()
    {
        $this->view->form = new Jedarchive_Formbuilder();
        $this->view->form->setI18n($this->view->getI18n());
    }
}