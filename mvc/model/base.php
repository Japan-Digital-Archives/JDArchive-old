<?

/**
 * Base model with some convenience methods
 */
class Jedarchive_Base
{
    protected function config()
    {
        return Jedarchive_Config::instance();
    }

    protected function db()
    {
        return Jedarchive_Db::instance();
    }
}