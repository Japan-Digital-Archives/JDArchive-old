<?

class Jedarchive_I18n extends Jedarchive_Base
{
    public function getLanguages()
    {
        return $this->config()->getLanguages();
    }
    
    public function getDefault()
    {
        return reset(array_keys($this->getLanguages()));
    }
    
    public function currentLanguage()
    {
        if (isset($_GET['la']) && in_array($_GET['la'], array_keys($this->getLanguages()))) {
            return $_GET['la'];
        } else {
            return $this->getDefault();
        }
    }

    public function getLanguageBar()
    {
        $defaultLang = $this->getDefault();

        $bar = array();
        foreach ($this->getLanguages() as $lang => $text) {
            if ($lang == $defaultLang) {
                continue;
            }
            $count++;
            $bar[] = "<a href='?la=$lang'>$text</a>";
        }
        return '<div style="float:right;">' . implode('|', $bar) . '</div>';
    }

}