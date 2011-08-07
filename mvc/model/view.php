<?

require APPLICATION_PATH . '/model/url.php'; 

/**
 * 
 * 
 *
 * @author arne
 */
class Jedarchive_View extends Jedarchive_Base
{
    protected $_file = null;
    protected $_data = array();

    /**
     *
     */
    public function __construct($file = null)
    {
        $this->_file = $file;
    }

    /**
     *
     */
    public function setVariables($arr)
    {
        $this->_data = $arr;
    }

    /**
     *
     */
    public function __get($var)
    {
        if (isset($this->_data[$var])) {
            return $this->_data[$var];
        } else {
            return null;
        }
    }

    /**
     * @param string $param Variable name to check
     * 
     * @return boolean
     */
    public function __isset($param) {
        return isset($this->_data[$param]);
    }
    
    /**
     * @param string $param variable name to set
     * @param mixed  $value Value to set
     * 
     * @return null
     */
    public function __set($param, $value) {
        $this->_data[$param] = $value;
    }

    public function render()
    {
        if (file_exists($this->_file)) {
            
        } elseif (file_exists(APPLICATION_PATH . '/views/' . $this->_file)) {
            $this->_file = APPLICATION_PATH . '/views/' . $this->_file;
        } else {
            throw new Exception("View not found " . $this->_file);
        }
        ob_start();
        include $this->_file;
        $renderedView = ob_get_contents();
        ob_end_clean();

        return $renderedView;
    }

    public function setI18nSection($section)
    {
        $this->getI18n()->setSection($section);
    }

    public function setViewFile($file)
    {
        $this->_file = $file;
    }

    ////////////////////////////////////////////////
    // View helpers

    /**
     *
     */
    public function t($key)
    {
        return $this->getI18n()->getTranslation($key);
    }

    /**
     * Render a view in its own namespace
     */
    public function partial($file, $params = array()) 
    {
        $partial = new Jedarchive_View($file);
        $partial->setVariables($params);
        $partial->setI18n($this->getI18n());
        return $partial->render();
    }

    /**
     * Do some url processing, in particular adding the language parameter
     */
    /*public function url($url)
    {
        if ($this->getI18n()->getCurrent() != $this->getI18n()->getDefault()) {
            $url .= '?la=' . $this->getI18n()->getCurrent();
        }
        return $url;
    }*/
    
        /**
     * Create a URL
     * 
     * @param string $controller
     * @param string $action
     * @param array $uriParams
     * @param array $getParams
     */
    public function url($controller = null, $action = null, $uriParams = array(), $getParams = array()) 
    {
        return new Jedarchive_Url($controller, $action, $uriParams, $getParams);
    }
    
    /**
     * Escape HTML
     * 
     * @param string $str
     */
    public function h($str)
    {
        return htmlspecialchars($str);
    }
    
    /**
     * Clean up HTML, stripping all attributes and only allowing certain tags
     * @param string $str
     */
    public function cleanHtml($str, $allow = '<p><i><b><em><strong><h1><h2><h3><h4><h5><h6><ul><li><br><hr>')
    {
        $stripAttr = new Jedarchive_Stripattributes();
        return strip_tags($stripAttr->strip(strip_tags($str, $allow)));
    }
}