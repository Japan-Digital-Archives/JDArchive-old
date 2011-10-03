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
        $config = Jedarchive_Config::instance()->database;
        $this->_connection = mysql_connect($config->host, $config->user, $config->password);
        if ($this->_connection) {
            mysql_select_db($config->name, $this->_connection);
        } else {
            throw new Exception('Connection to DB failed.');
        }
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

    public function query($sql)
    {
        return mysql_query($sql);
    }

    public function fetchRows($sql)
    {
        $result = $this->query($sql);
        
        $rows = array();
        if($result){
	while ($rowc = mysql_fetch_object($result)) {
            $rowa = array();
            foreach ($rowc as $field => $value) {
                $rowa[$field] = $value;
            }
            $rows[] = $rowa;           
        }
	}

        return $rows;
    }

    public function fetchOne($sql) {
        return reset($this->fetchRows($sql));
    }

    public function lastInsertId()
    {
        return mysql_insert_id();
    }

    public function escapeString($str)
    {
        return mysql_real_escape_string($str);
    }
}
