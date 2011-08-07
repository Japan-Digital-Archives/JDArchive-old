<?


/**
 * Class that eases generating url's. It is tied to the way
 * controllers/actions and parameters are handled in our controllers.
 * 
 * One of the benefits of using this class is to create links is that
 * the language is always maintained.
 * 
 * @author arne
 */
class Jedarchive_Url extends Jedarchive_Base
{
    /**
     * Parameters that are always passed on
     * @var array
     */
    private $_magicParams = array(
        'u'   //unbranded
    );
    
    private $_controller;
    private $_action;
    private $_uriParams;
    private $_getParams;
    
    /**
     * Initialize a URL object
     * 
     * @param string $controller The controller
     * @param string $action The controller's action
     * @param array $uriParams List of extra parts
     * @param array $getParams Key value pairs added as get parameters
     */
    public function __construct($controller = null, $action = null, $uriParams = array(), $getParams = array())
    {
        $this->_controller = $controller;
        $this->_action = $action;
        $this->_uriParams = $uriParams;
        foreach ($this->_magicParams as $key) {
            if (isset($_REQUEST[$key])) {
                $this->_getParams[$key] = $_REQUEST[$key];
            } 
        }
        
        foreach ($getParams as $k => $v) {
            $this->_getParams[$k] = $v;
        }
        
        if (!isset($this->_getParams['la']) && $this->getI18n()->getCurrent() != $this->getI18n()->getDefault()) {
           $this->_getParams['la'] = $this->getI18n()->getCurrent();
        }
    }
    
    /**
     * PHP magic method : convert URL object to string
     */
    public function __toString()
    {
        $parts = array($this->_controller, $this->_action);
        foreach ($this->_uriParams as $p) {            
            $parts[] = $p;
        }
        foreach(array_reverse(array_keys($parts)) as $idx) {
            if ($parts[$idx])
                break;
            unset($parts[$idx]);
        }
        $url = '/' . implode('/', $parts);
        if ($this->_getParams) {
            $get = array();
            foreach ($this->_getParams as $k => $v) {
                $k = urlencode($k);
                $v = urlencode($v);
                $get[] = "{$k}={$v}";
                
            }
            $url .= '?' . implode('&', $get);
        }
        return $url;
    }
}