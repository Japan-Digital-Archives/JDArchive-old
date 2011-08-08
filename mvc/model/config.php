<?

/**
 * Class that loads/manages configuration
 * 
 * Mostly to be used as nested objects, e.g.
 * 
 * $config->image_sizes->thumb
 * 
 * In use, once initialized, it's plug-and-play compatible with Zend_Config.
 * 
 * @author arne
 */
class Jedarchive_Config implements Iterator, Countable
{
    private static $_instance = null;
    private $_data = null;
    private $_count = 0;
    
    /**
     * Implementation of Singleton (GoF)
     *
     * @return Jedarchive_Config
     */
    public static function instance()
    {
        if (self::$_instance == null) {
            self::$_instance = new Jedarchive_Config();
            self::$_instance->load(APPLICATION_ENV);
        }
        return self::$_instance;
    }
    
    /**
     * Load the configuration for a specific application environment
     */
    private function __construct($data = array())
    {
        $this->setData($data);
    }
    
    /**
     * Load the config file for a specific environment, taking the base values
     * and adding the environment specific settings and overrides
     * 
     * @param string $env E.g. production, testing, development
     */
    private function load($env)
    {
        $config = parse_ini_file(APPLICATION_PATH . '/config/config.ini', true);
        $this->setData($this->mergeData($config['base'],$config[$env]));
    }
    
    /**
     * Convert nested arrays to nested config objects
     * 
     * @param array $data
     */
    private function setData($data)
    {
        $this->_data = array();
        foreach($data as $k => $v) {
            if (is_array($v)) {
                $this->_data[$k] = new self($v);
            } else {
                $this->_data[$k] = $v;
            }
        }
        $this->_count = count($this->_data);
    }
    
    /**
     * Merge two arrays recursively, almost but not quite like array_merge
     * 
     * @param array $data1
     * @param array $data2
     */
    private function mergeData($data1, $data2)
    {
        foreach ($data2 as $key => $value) {
            if (isset($data1[$key]) && is_array($data1[$key]) && is_array($data2[$key])) {
                $data1[$key] = $this->mergeData($data1[$key], $data2[$key]);
            } else {
                $data1[$key] = $value;
            }
        }
        return $data1;
    }

    /**
     * Get a specific key
     * 
     * @param string $key
     */
    public function get($key)
    {
        return $this->_data[$key];
    }
    
    /**
     * Magic function so that $obj->value will work.
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->get($name);
    }
    
    /**
     * Support isset() overloading on PHP 5.1
     *
     * @param string $name
     * @return boolean
     */
    public function __isset($name)
    {
        return isset($this->_data[$name]);
    }
    
    
    /**
     * Defined by Iterator interface
     *
     * @return mixed
     */
    public function current()
    {
        return current($this->_data);
    }

    /**
     * Defined by Iterator interface
     *
     * @return mixed
     */
    public function key()
    {
        return key($this->_data);
    }

    /**
     * Defined by Iterator interface
     *
     */
    public function next()
    {
        next($this->_data);
        $this->_index++;
    }

    /**
     * Defined by Iterator interface
     *
     */
    public function rewind()
    {
        reset($this->_data);
        $this->_index = 0;
    }

    /**
     * Defined by Iterator interface
     *
     * @return boolean
     */
    public function valid()
    {
        return $this->_index < $this->_count;
    }
    
    public function count()
    {
        return $this->_count;
    }
    
    
    public function toArray()
    {
        return $this->_data;
    }
}