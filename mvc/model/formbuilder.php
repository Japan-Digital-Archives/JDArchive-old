<?

class Jedarchive_Formbuilder extends Jedarchive_Base
{
    protected $_prefill = array();
    protected $_required = array();
    protected $_i18n = null;


   

    public function getPrefill()
    {
        return $this->_prefill;
    }

    public function setPrefill($prefill)
    {
        $this->_prefill = $prefill;
        return $this;
    }

    public function getRequired()
    {
        return $this->_required;
    }

    public function setRequired($required)
    {
        $this->_required = $required;
        return $this;
    }

    public function getI18n()
    {
        return $this->_i18n;
    }
    

    public function setI18n($i18n)
    {
        $this->_i18n = $i18n;
        return $this;
    }

    public function t($key)
    {
        return $this->_i18n->getTranslation($key);
    }

    /**
     * Generate a form element, embedded in a table row so we can easily create
     * a clean two column form layout.
     *
     */
    public function field($name, $opts)
    {
        $value = isset($this->_prefill[$name]) ? $this->_prefill[$name] : '';
        
        $opts['type'] = isset($opts['type']) ? $opts['type'] : 'text';

        $parts[] = '<tr><th><label for="' . $name . '">';
        $parts[] = $this->t($name);
        if ($opts['required'] || (isset($this->_required[$name]) && $this->_required[$name])) {
            $parts[]='<span class="required">*</span>';
        }
        $parts[] = '</label></th>';
        $parts[] = '<td>';

        switch($opts['type']) {
        case 'text':
            $size = isset($opts['size']) ? $opts['size'] : 60;            
            $parts[] = '<input type="text" name="' . $name . '" size="' . $size . '" value="'. $value .'" />';
            break;
 
        case 'select':
            $parts[] = $this->selectField($name, $opts, $value);
            break;

        case 'textarea':
            $parts[] = '<textarea name="' . $name . '" cols="60" rows="8">' . $value . '</textarea>';
            break;

        case 'time':            
            $parts[] = $this->selectField(
                $name . '[year]', 
                array(
                    'start' => '2011', 
                    'end' => '2015', 
                    'empty' => true
                ),
                isset($value['year']) ? $value['year'] : '');
            $parts[] = $this->selectField(
                $name . '[month]', 
                array(
                    'start' => '1', 
                    'end' => '12', 
                    'empty' => true
                ),
                isset($value['month']) ? $value['month'] : '');
            $parts[] = $this->selectField(
                $name . '[day]', 
                array(
                    'start' => '1', 
                    'end' => '31', 
                    'empty' => true
                ),
                isset($value['day']) ? $value['day'] : '');
            $parts[] = $this->t('hour');
            $parts[] = '&nbsp;:&nbsp;';
            $parts[] = $this->selectField(
                $name . '[hour]', 
                array(
                    'start' => '0', 
                    'end' => '24', 
                    'empty' => true
                ),
                isset($value['day']) ? $value['day'] : '');                
            break;
            
        case 'string':
            $parts[] = $opts['string'];
            break;
        }
            
        if (isset($opts['hint'])) {
            $parts[] = '<br />';
            $parts[] = '<span class="hint">' . $this->t($opts['hint']) . '</span>';
        }
        $parts[] = '</td></tr>';
        return implode("\n\t", $parts);
    }

    /**
     * Creates a <select> form element. Either pass in a key 'values' (associative array) or a
     * 'start' and 'end' to create a numeric range.
     *
     * @param $name name of the form element
     * @param $opts options, accepted keys are 'values', 'start', 'end'
     * @param $value prefill value
     *
     * @return string
     */
    public function selectField($name, $opts, $value = '')
    {
        if (isset($opts['values'])) {
            $values = $opts['values'];
        } elseif (isset($opts['start']) && isset($opts['end'])) {
            $values = array();
            if (isset($opts['empty']) && $opts['empty']) {
                $values['']='';
            }
            for ($i = $opts['start'] ; $i <= $opts['end']; $i++) {
                $values[$i] = $i;
            }
        }
        $parts[] = '<select name="' . $name .'">';            
        foreach ($values as $k => $v) {
            $xtra = ($value === $k) ? ' selected="selected"' : '';
            $parts[] = '<option value="'.$k.'"' .$xtra. '>'.$v.'</option>';
        }
        $parts[] = '</select>';
        return implode("\n", $parts);
    }

    // convenience functions
    public function text($name, $opts = array()) 
    {
        $opts['type'] = 'text';
        return $this->field($name, $opts = array());
    }

    public function select($name, $opts = array()) 
    {
        $opts['type'] = 'select';
        return $this->field($name, $opts);
    }

    public function textarea($name, $opts = array()) 
    {
        $opts['type'] = 'textarea';
        return $this->field($name, $opts);
    }

    public function time($name, $opts = array()) 
    {
        $opts['type'] = 'time';
        return $this->field($name, $opts);
    }

}