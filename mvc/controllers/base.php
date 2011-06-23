<?

class BaseController 
{
    protected $_name = null;
    protected $_params = null;
    protected $_uriParams = null;
    protected $_postParams = null;
    protected $_language = null;
    protected $_jsVars = array();
    /**
     *
     */
    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function init()
    {
        // Give it a translation object
        $i18n = new Jedarchive_I18n();
        $i18n->setSection($this->_name);
        $this->view->setI18n($i18n);
        $this->layout->setI18n($i18n);
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
    public function setUriParams($params)
    {
        $this->_uriParams = $params;
    }

    public function getNextUriParam()
    {
        return array_shift($this->_uriParams);
    }

    /**
     *
     */
    public function setPostParams($params)
    {
        $this->_postParams = $params;
    }

    /**
     *
     */
    protected function getPostParams()
    {
        return $this->_postParams;
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

    protected function jsVar($name, $value)
    {
        $this->_jsVars[$name] = $value;
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

        $this->init();

        // Call the controller action, this populates the view and processes user input
        $actionMethod = $action . 'Action';
        $this->{$actionMethod}();

        // Now render the view
        $renderedAction = $this->view->render();

        // Now render the layout
        $this->layout->getI18n()->setSection('layout');
        $this->layout->contents = $renderedAction;

        $this->layout->javascriptVariables = $this->_jsVars;
        //echo(json_encode($this->layout->javascriptVariables));die();

        return $this->layout->render();
    }

    // view helpers

    public function redirect($path)
    {
        header('Location: ' . $path);
        exit();
    }
}