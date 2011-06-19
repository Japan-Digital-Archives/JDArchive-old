<?

/**
 * Class that loads/manages configuration
 */
class Jedarchive_Config
{
    private static $_instance = null;
    private $_config = null;

    /**
     * Load the configuration for a specific application environment
     */
    private function __construct($env)
    {
        $config = parse_ini_file(APPLICATION_PATH . '/config.ini', true);
        $this->_config = $config['base'];

        foreach ($config[$env] as $k => $v) {
            $this->_config[$k] = $v;
        }
    }

    /**
     * Implementation of Singleton (GoF)
     *
     * @return Jedarchive_Config
     */
    public static function instance()
    {
        if (self::$_instance == null) {
            self::$_instance = new Jedarchive_Config(APPLICATION_ENV);
        }
        return self::$_instance;
    }

    /**
     * Get the config as found in the ini file
     *
     * @return array
     */
    public function getRaw()
    {
        return $this->_config;
    }

    /**
     * Get the database settings
     *
     * @return array with keys host, user, password, name
     */
    public function getDatabaseSettings()
    {
        return $this->_config['database'];
    }

    /**
     * Get the languages used for i18n.
     *
     * @return array language code => language name
     */
    public function getLanguages()
    {
        return $this->_config['language'];
    }

}