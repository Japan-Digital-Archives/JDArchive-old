<?

/**
 * Base model with some convenience methods
 */
class Jedarchive_Base
{
    protected  $_i18n = null;

    protected function config()
    {
        return Jedarchive_Config::instance();
    }

    protected function db()
    {
        return Jedarchive_Db::instance();
    }

    public function getI18n()
    {
        return $this->_i18n;
    }

    public function setI18n($i18n)
    {
        $this->_i18n = $i18n;
    }
    
}