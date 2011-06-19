<?

/**
 * Initialize database connection from configuration settings, and
 * provide basic abstraction.
 */
class Jedarchive_Db
{
    private static $_instance = null;
    private $_connection = null;

    /**
     * Initialize the database connection
     */
    private function __construct($env)
    {
        $config = Jedarchive_Config::instance()->getDatabaseSettings();
        $this->_connection = mysql_connect($config['host'], $config['user'], $config['password']);
        mysql_select_db($config['name'], $this->_connection);
    }

    /**
     * Implementation of Singleton (GoF)
     */
    public static function instance()
    {
        if (self::$_instance == null) {
            self::$_instance = new Jedarchive_Db(APPLICATION_ENV);
        }
        return self::$_instance;
    }
}
