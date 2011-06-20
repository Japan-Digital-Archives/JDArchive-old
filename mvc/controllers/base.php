<?

class BaseController 
{
    protected $_name = null;
    protected $_params = null;
    protected $_language = null;

    /**
     *
     */
    public function __construct($name)
    {
        $this->_name = $name;
    }

    /**
     *
     */
    public function setParams($params)
    {
        $this->_params = $params;
    }

    /**
     *
     */
    protected function getParams()
    {
        return $this->_params;
    }

    /**
     *
     */
    protected function getParam($name) 
    {
        if (isset($this->_params[$name])) {
            return $this->_params[$name];
        }
        return null;
    }

    protected function isPost()
    {
        return strtoupper($_SERVER['REQUEST_METHOD']) == 'POST';
    }

    /**
     *
     */
    public function renderAction($action) 
    {
        // Create View object
        $viewFile = APPLICATION_PATH . '/views/'.$this->_name.'/'.$action.'.php';
        $layoutFile = APPLICATION_PATH . '/views/layout.php';

        $this->view = new Jedarchive_View($viewFile);
        $this->layout = new Jedarchive_View($layoutFile);

        // Give it a translation object
        $i18n = new Jedarchive_I18n();
        $i18n->setSection($this->_name);
        $this->view->setI18n($i18n);
        $this->layout->setI18n($i18n);

        // Call the controller action, this populates the view and processes user input
        $actionMethod = $action . 'Action';
        $this->{$actionMethod}();

        // Now render the view
        $renderedAction = $this->view->render();

        // Now render the layout
        $i18n->setSection('layout');
        $this->layout->languageBar = $i18n->getLanguageBar();
        $this->layout->contents = $renderedAction;

        return $this->layout->render();
        


        /*
        */
        //return $renderedLayout;
    }

    // view helpers


}