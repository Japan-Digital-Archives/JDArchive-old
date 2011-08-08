<?

class Jedarchive_Table extends Jedarchive_Base
{
    protected $_name = null;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function insert($data, $verb = 'INSERT')
    {
        $fields = array();
        $values = array();

        foreach ($data as $field => $value) {
            $fields[] = "`{$field}`";
            $values[] = $this->escapeValue($value);
        }

        $qry[] = $verb . ' INTO `' . $this->_name . '` (';
        $qry[] = implode(',', $fields);
        $qry[] = ') VALUES (';
        $qry[] = implode(',', $values);
        $qry[] = ');';
        $this->db()->query(implode('', $qry));
        return $this->db()->lastInsertId();
    }

    public function replace($data) 
    {
        return $this->insert($data, 'REPLACE');
    }

    protected function escapeValue($value) 
    {
        if (is_string($value)) {
            return "'" . $this->db()->escapeString($value) . "'";
        } elseif (is_bool($value)) {
            return $value ? '1' : '0';
        } elseif (is_null($value)) {
            return 'NULL';
        } else {
            return "{$value}";
        }
    }

    public function fetch($fields = '*', $where = null, $orderby = null)
    {
        $qry[] = "SELECT";
        if (is_array($fields)) {
            $qry[] = implode(',', $fields);
        } else {
            $qry[] = $fields;
        }
        $qry[] = "FROM `" . $this->_name . "`";
        $qry[] = $this->where($where);
        if ($orderby) {
            $qry[] = "ORDER BY";
            $qry[] = $orderby;
        }
        $qry[] = ';';
        return $this->db()->fetchRows(implode(' ', $qry));
    }

    public function delete($where)
    {
        $qry = "DELETE FROM `" . $this->_name . "` ". $this->where($where) . ';';
        return $this->db()->query($qry);
    }

    protected function where($where)
    {
        if ($where) {
            $qry[] = "WHERE";
            foreach ($where as $field => $value) {
                $and[] = $field . "=" . $this->escapeValue($value);
                $qry[] = implode(' AND ', $and);
            }
            return implode(' ', $qry);
        }
    }

}