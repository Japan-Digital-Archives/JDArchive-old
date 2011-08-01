<?

class BaseController 
{
    protected $_name = null;
    protected $_action = null;
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
        $this->view = new Jedarchive_View($this->_name.'/'.$this->_action.'.php');
        $this->layout = new Jedarchive_View('layout.php');
        $this->view->setI18n($i18n);
        $this->layout->setI18n($i18n);
        if ($this->getParam('u') == '1') {
            $this->layout->unbranded = true;
            $this->view->unbranded = true;
        }
        $this->jsVar('i18n', $i18n->getSectionLang('javascript'));
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
        $this->_action = $action;
        $this->init();

        // Call the controller action, this populates the view and processes user input
        $actionMethod = $action . 'Action';
        $this->{$actionMethod}();

        // Now render the view
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

    // view helpers

    /**
     * Redirect to a certain path. This will preserve get parameters, and if necessary
     * add extra get parameters for language and 'unbranded'.
     */
    public function redirect($path)
    {
        $parts = explode('?', $path);
        $url = reset($parts);
        $get = array();
        if (isset($parts[1])) {
            foreach (explode('&', $parts[1]) as $req) {
                list($k, $v) = explode('=', $req);
                $get[$k] = $v;
            }
        }

        if ($this->view->getI18n()->getCurrent() != $this->view->getI18n()->getDefault()) {
            $get['la'] = $this->view->getI18n()->getCurrent();
        }

        if ($this->getParam('u')) {
            $get['u'] = 1;
        }

        if ($get) {
            $url .= '?';
            $p = array();
            foreach ($get as $k => $v) {
                $p[] = $k . '=' . $v;
            }
            $url .= implode('&', $p);
        }

        header('Location: ' . $url);
        exit();
    }

    protected function authenticate()
    {
        $auth = new Jedarchive_Auth();
        $auth->authenticate();
    }
}