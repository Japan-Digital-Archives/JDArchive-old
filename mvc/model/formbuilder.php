<?

/**
 * Represents a form, has a number of functions to generate form elements,
 * and can do basic validation.
 */
class Jedarchive_Formbuilder extends Jedarchive_Base
{
    protected $_prefill = array();
    protected $_required = array();
    protected $_i18n = null;
    protected $_errorFields = array();
    protected $_validations = array();

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

    public function setValidations($validations)
    {
        $this->_validations = $validations;
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
        $value = isset($this->_prefill[$name]) ? $this->_prefill[$name] : null;
        
        $opts['type'] = isset($opts['type']) ? $opts['type'] : 'text';

        $parts[] = '<tr' . (in_array($name, $this->_errorFields) ? ' class="error"' : '') . '><th><label for="' . $name . '">';
        $parts[] = $this->t($name);
        if ($opts['required'] || (isset($this->_required[$name]) && $this->_required[$name])) {
            $parts[]='<span class="required">*</span>';
        }
        $parts[] = '</label></th>';
        $parts[] = '<td>';

        if (isset($opts['note'])) {
            $parts[] = '<div class="note">';
            $parts[] = $this->t($opts['note']);
            $parts[] = '</div>';
        }

        switch($opts['type']) {
        case 'text':
            $size = isset($opts['size']) ? $opts['size'] : 60;            
            $parts[] = '<input type="text" name="' . $name . '" size="' . $size . '" value="'. $value .'" />';
            break;
 
        case 'select':
            $parts[] = $this->selectField($name, $opts, $value);
            break;

        case 'textarea':
            $rows = isset($opts['rows']) ? $opts['rows'] : 8;
            $cols = isset($opts['cols']) ? $opts['cols'] : 60;
            $parts[] = '<textarea name="' . $name . '" cols="'.$cols.'" rows="'.$rows.'">' . $value . '</textarea>';
            break;

        case 'time':            
            $parts[] = $this->selectField(
                $name . '[year]', 
                array(
                    'start' => '2011', 
                    'end' => '2015', 
                    'empty' => true
                ),
                (isset($value['year']) && !($value['year'] === '')) ? $value['year'] : null);
            $parts[] = $this->selectField(
                $name . '[month]', 
                array(
                    'start' => '1', 
                    'end' => '12', 
                    'empty' => true
                ),
                (isset($value['month']) && !($value['month'] === '')) ? $value['month'] : null);
            $parts[] = $this->selectField(
                $name . '[day]', 
                array(
                    'start' => '1', 
                    'end' => '31', 
                    'empty' => true
                ),
                (isset($value['day']) && !($value['day'] === '')) ? $value['day'] : null);
            $parts[] = $this->t('hour');
            $parts[] = '&nbsp;:&nbsp;';
            $parts[] = $this->selectField(
                $name . '[hour]', 
                array(
                    'start' => '0', 
                    'end' => '24', 
                    'empty' => true
                ),
                (isset($value['hour']) && !($value['hour'] === '')) ? $value['hour'] : null);
            break;

        case 'checkbox':
            if (isset($opts['label'])) {
                $parts[] = $this->t($opts['label']);
            }
            $parts[] = '<input type="checkbox" name="' . $name . '"' . ($value ? ' checked="checked"' : '') . '/>';
            break;

        case 'string':
            $parts[] = $opts['string'];
            break;
        }
            
        if (isset($opts['hint'])) {
            $parts[] = '<br />';
            $parts[] = '<span class="hint">' . $this->t($opts['hint']) . '</span>';
        }

        if (in_array($name, $this->_errorFields)) {
            $parts[] = '<br />';
            $parts[] = '<span class="errormsg">';
            $parts[] = $this->t('error_' . $name);
            $parts[] = '</span>';
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
            $xtra = ($value == $k && !($value === null)) ? ' selected="selected"' : '';
            $parts[] = '<option value="'.$k.'"' .$xtra. '>'.$v.'</option>';
        }
        $parts[] = '</select>';
        return implode("\n", $parts);
    }


    public function validate($params)
    {
        $this->_errorFields = array();
        foreach ($this->_required as $field => $req) {
            if ($req && (!isset($params[$field]) || !$params[$field])) {
                $this->_errorFields[] = $field;
            }
        }

        foreach ($this->_validations as $field => $validate) {
            $validator = "validate" . ucfirst($validate);
            if (isset($params[$field]) && $params[$field]) {
                if ($this->{$validator}($params[$field]) === false) {
                    $this->_errorFields[] = $field;
                }                
            }
        }

        return empty($this->_errorFields);
    }

    public function validateEmail($email)
    {
        return Jedarchive_Email::isValid(trim($email));
    }

    public function getErrorFields()
    {
        return $this->_errorFields;
    }

    // convenience functions
    public function text($name, $opts = array()) 
    {
        $opts['type'] = 'text';
        return $this->field($name, $opts);
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

    public function checkbox($name, $opts = array()) 
    {
        $opts['type'] = 'checkbox';
        return $this->field($name, $opts);
    }

    public function submit($name = 'submit')
    {
        $submit = '<input type="submit" name="' . $name . '" value="' . $this->t($name) . '" />';
        return '<tr><th></th><td>' . $submit . '</td></tr>';
    }

    public function hidden($name)
    {
        if (isset($this->_prefill[$name])) {
            return '<input type="hidden" name="'.$name.'" value="'.$this->_prefill[$name].'" />';
        }
    }
}