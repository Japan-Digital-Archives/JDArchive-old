<?

class baseController 
{
    protected $_params = null;
    protected $_language = null;

    public function __construct()
    {
        $this->_i18n = new Jedarchive_I18n();
        $this->languageBar = $this->_i18n->getLanguageBar();
    }

    public function setParams($params)
    {
        $this->_params = $params;
    }

    protected function _getParam($name) 
    {
        if (isset($this->_params[$name])) {
            return $this->_params[$name];
        }
        return null;
    }

    public function renderView($name) 
    {
        ob_start();
        include $name;
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }

}