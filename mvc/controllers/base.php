<?

class BaseController 
{
    protected $_name = null;
    protected $_params = null;
    protected $_language = null;
    protected $_prefill = array();
    protected $_required = array();

    public function __construct($name)
    {
        $this->_name = $name;
        $this->_i18n = new Jedarchive_I18n();
        $this->_i18n->setSection($name);
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
        $this->renderedView = ob_get_contents();
        ob_end_clean();

        ob_start();
        include(APPLICATION_PATH . '/views/layout.php');
        $renderedLayout = ob_get_contents();
        ob_end_clean();

        return $renderedLayout;
    }

    // view helpers

    public function t($key)
    {
        return $this->_i18n->getTranslation($key);
    }

    public function field($opts)
    {
        $builder = new Jedarchive_Formbuilder();
        $builder->setI18n($this->_i18n);
        return $builder->field($opts, $this->_prefill, $this->_required);
    }

}