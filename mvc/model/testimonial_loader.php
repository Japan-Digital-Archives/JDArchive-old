<?

class Jedarchive_Testimonial_Loader extends Jedarchive_Base
{
    protected $_table = null;
    protected $_locTable = null;

    public function load($id)
    {
        $rows = $this->getTable()->fetch('*', array('id' => $id));
        if (isset($rows) and count($rows) > 0) {
            return $this->createFromRow($rows[0]);
        }
    }

    public function loadAll()
    {
        $all = array();
        foreach($this->getTable()->fetch() as $row) {
            $all[] = $this->createFromRow($row);
        }
        return $all;
    }

    public function findPreviousId($id)
    {
        $result = $this->db()->fetchOne("SELECT id FROM testimonial WHERE id < {$id} ORDER BY id DESC LIMIT 1;");
        if ($result && isset($result['id'])) {
            return $result['id'];
        }
        return null;
    }

    public function findNextId($id)
    {
        $result = $this->db()->fetchOne("SELECT id FROM testimonial WHERE id > {$id} ORDER BY id ASC LIMIT 1;");
        if ($result && isset($result['id'])) {
            return $result['id'];
        }
        return null;
    }

    public function findLastId()
    {
        $result = $this->db()->fetchOne("SELECT id FROM testimonial ORDER BY id DESC LIMIT 1;");
        if ($result && isset($result['id'])) {
            return $result['id'];
        }
        return null;
    }

    protected function createFromRow($data) {
        $testi = new Jedarchive_Testimonial();
        foreach ($data as $k => $v) {
            $setter = 'set' . camelize($k);
            $testi->{$setter}($v);
        }
        $testi->setLocations($this->loadLocations($testi->getId()));
        return $testi;
    }

    protected function loadLocations($testid) 
    {
        return $this->getLocTable()->fetch('*', array('testimonial_id' => $testid));
    }
    
    protected function getTable() 
    {
        if ($this->_table === null) {
            $this->_table = new Jedarchive_Table('testimonial');
        }
        return $this->_table;
    }

    protected function getLocTable() 
    {
        if ($this->_locTable === null) {
            $this->_locTable = new Jedarchive_Table('testimonial_location');
        }
        return $this->_locTable;
    }

    
}