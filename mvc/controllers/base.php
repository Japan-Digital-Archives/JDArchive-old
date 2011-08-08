<?

/**
 * All controllers inherit from the base controller.
 * 
 * It does initialization of the layout and the view object, and
 * contains various helpers that are useful in either the controllers
 * or the views.
 */
class BaseController 
{
    protected $view = null;
    protected $layout = null;
    
    protected $_name = null;
    protected $_action = null;
    protected $_params = null;
    protected $_uriParams = null;
    protected $_postParams = null;
    protected $_language = null;
    protected $_jsVars = array();
    protected $_config = null;

    /**
     *
     */
    public function __construct($name)
    {
        $this->_name = $name;
    }

    /**
     * Controller initialization, this is called before every action
     */
    public function init()
    {
        // Give it a translation object
        $i18n = new Jedarchive_I18n();
        $i18n->setSection($this->_name);
        $this->view = new Jedarchive_View($this->_name.'/'.$this->_action.'.php');
        $this->layout = new Jedarchive_View('layout.php');
        $this->view->setI18n($i18n);
        $this->layout->setI18n($i18n);
        if ($this->getParam('u') == '1') {
            $this->layout->unbranded = true;
            $this->view->unbranded = true;
        }
        $this->jsVar('language', $i18n->getCurrent());
        $this->jsVar('i18n', $i18n->getSectionLang('javascript'));
        $this->_config = Jedarchive_Config::instance();
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

    /**
     * Use this to 'pop off' the next part of the URI
     */
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

    /**
     * Pass a variable on to javascript, it will be inserted in the page as JSON, accessible
     * through a JS global object (JA).
     * 
     * @param string $name
     * @param mixed $value
     */
    protected function jsVar($name, $value)
    {
        $this->_jsVars[$name] = $value;
    }

    /**
     * Is this a post request, i.e. a form submission
     */
    protected function isPost()
    {
        return strtoupper($_SERVER['REQUEST_METHOD']) == 'POST';
    }

    /**
     * Render a specific action. This delegates actual rendering to the view object.
     */
    public function renderAction($action) 
    {
        $this->_action = $action;
        $this->init();

        // Call the controller action, this populates the view and processes user input
        $actionMethod = $action . 'Action';
        $this->{$actionMethod}();

        // Now render the view
        if ($this->view) {
            $renderedAction = $this->view->render();

            // Now render the layout
            $this->layout->getI18n()->setSection('layout');
            $this->layout->bodyId = $this->_name . '_' . $action;
            $this->layout->bodyClass = $this->_name . ' ' .  $action;
            $this->layout->contents = $renderedAction;
            
            $this->layout->javascriptVariables = $this->_jsVars;
            //echo(json_encode($this->layout->javascriptVariables));die();
            
            return $this->layout->render();
        }
        return '';
    }

    
    /**
     * Use this on controller actions that are private, that need user
     * authentication. 
     */
    protected function authenticate()
    {
        $auth = new Jedarchive_Auth();
        $auth->authenticate();
    }

    /**
     * Redirect to a certain path. Combine with {@see url()} to get the magical
     * language and unbranded parameters
     */
    public function redirect($location)
    {
        header('Location: ' . $location);
        exit();
    }
    
    /**
     * convenience method for making URL objects
     */
    public function url($controller = null, $action = null, $uriParams = array(), $getParams = array())
    {
        return new Jedarchive_Url($controller, $action, $uriParams, $getParams);
    }
}