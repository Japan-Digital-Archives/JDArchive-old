<?

/**
 * Internationalization class (i18n). Takes care of loading i18n.ini, containing all the translations.
 * 
 * @author arne
 */
class Jedarchive_I18n extends Jedarchive_Base
{
    protected $_translations = null;
    protected $_section = null;
    protected $_language = null;
    protected $_languages = array();

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
        return $this->config()->language->toArray();
    }
    
    public function getDefault()
    {
        return reset(array_keys($this->getLanguages()));
    }
    
    public function getCurrent()
    {
        if ($this->_language) {
            return $this->_language;
        }
        if (isset($_GET['la']) && in_array($_GET['la'], array_keys($this->getLanguages()))) {
            return $_GET['la'];
        } else {
            return $this->getDefault();
        }
    }

    public function setCurrent($lang)
    {
        $this->_language = $lang;
    }

    public function getLanguageBar()
    {
        $current = $this->getCurrent();

        $bar = array();
        foreach ($this->getLanguages() as $lang => $text) {
            if ($lang == $current) {
                continue;
            }
            $bar[] = "<a href='?la=$lang'>$text</a>";
        }
        return '<div class="languagebar" style="float:right;">' . implode('|', $bar) . '</div>';
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
        if ($this->config()->log_missing_tags) {
            if (!isset($this->_missingTagsLog)) {
                $this->_missingTagsLog = fopen($this->config()->log_missing_tags, 'a');
            }
            fwrite($this->_missingTagsLog, "{$section}__{$key}\n");
            fflush($this->_missingTagsLog);
        }
        return "{$section}__{$key}";
    }

    public function getSectionLang($section, $lang = null)
    {
        if ($lang === null) {
            $lang = $this->getCurrent();
        }
        $result = array();
        foreach($this->_translations[$section] as $key => $trans) {
            if (isset($trans[$lang])) {
                $result[$key] = $trans[$lang];
            } elseif (isset($trans[$this->getDefault()])) {
                $result[$key] = $trans[$this->getDefault()];
            }
        }
        return $result;
    }
}