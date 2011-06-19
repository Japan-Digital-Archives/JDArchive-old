<?

class Jedarchive_I18n extends Jedarchive_Base
{
    protected $_translations = null;
    protected $_section = null;

    public function __construct()
    {
        $this->_translations = parse_ini_file(APPLICATION_PATH . '/config/i18n.ini', true);
        $this->_section = reset(array_keys($this->_translations));
    }

    public function setSection($section)
    {
        $this->_section = $section;
    }

    public function getLanguages()
    {
        return $this->config()->getLanguages();
    }
    
    public function getDefault()
    {
        return reset(array_keys($this->getLanguages()));
    }
    
    public function getCurrent()
    {
        if (isset($_GET['la']) && in_array($_GET['la'], array_keys($this->getLanguages()))) {
            return $_GET['la'];
        } else {
            return $this->getDefault();
        }
    }

    public function getLanguageBar()
    {
        $current = $this->getCurrent();

        $bar = array();
        foreach ($this->getLanguages() as $lang => $text) {
            if ($lang == $current) {
                continue;
            }
            $count++;
            $bar[] = "<a href='?la=$lang'>$text</a>";
        }
        return '<div style="float:right;">' . implode('|', $bar) . '</div>';
    }

    public function getTranslation($key)
    {
        $section = $this->_section;
        if (isset($this->_translations[$section][$key])) {
            if (isset($this->_translations[$section][$key][$this->getCurrent()])) {
                return $this->_translations[$section][$key][$this->getCurrent()];
            }
            if (isset($this->_translations[$section][$key][$this->getDefault()])) {
                return $this->_translations[$section][$key][$this->getDefault()];
            }
        }
        return "{$section}_{$key}";
    }
}