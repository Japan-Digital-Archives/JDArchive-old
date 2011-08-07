<?

/**
 * Testimonial data class
 * 
 * @author abrasseu
 */
class Jedarchive_Testimonial extends Jedarchive_Base
{
    protected $_id;
    protected $_name;
    protected $_namePublic;
    protected $_email;
    protected $_city;
    protected $_occupation;
    protected $_yearOfBirth;
    protected $_story;
    protected $_fromYear;
    protected $_fromMonth;
    protected $_fromDay;
    protected $_fromHour;
    protected $_toYear;
    protected $_toMonth;
    protected $_toDay;
    protected $_toHour;
    protected $_created;
    protected $_spamkarma;
    protected $_clientIp;
    protected $_flags;
    protected $_locations;

    public function getId() {return $this->_id;}
    public function getName() {return $this->_name;}
    public function getNamePublic() {return $this->_namePublic;}
    public function getEmail() {return $this->_email;}
    public function getCity() {return $this->_city;}
    public function getOccupation() {return $this->_occupation;}
    public function getYearOfBirth() {return $this->_yearOfBirth;}
    public function getStory() {return $this->_story;}
    public function getFromYear() {return $this->_fromYear;}
    public function getFromMonth() {return $this->_fromMonth;}
    public function getFromDay() {return $this->_fromDay;}
    public function getFromHour() {return $this->_fromHour;}
    public function getToYear() {return $this->_toYear;}
    public function getToMonth() {return $this->_toMonth;}
    public function getToDay() {return $this->_toDay;}
    public function getToHour() {return $this->_toHour;}
    public function getCreated() {return $this->_created;}
    public function getSpamkarma() {return $this->_spamkarma;}
    public function getClientIp() {return $this->_clientIp;}
    public function getFlags() {return $this->_flags;}
    public function getLocations() {return $this->_locations;}

    public function setId($id) {$this->_id = $id; return $this;}
    public function setName($name) {$this->_name = $name; return $this;}
    public function setNamePublic($namePublic) {$this->_namePublic = $namePublic; return $this;}
    public function setEmail($email) {$this->_email = $email; return $this;}
    public function setCity($city) {$this->_city = $city; return $this;}
    public function setOccupation($occupation) {$this->_occupation = $occupation; return $this;}
    public function setYearOfBirth($yearOfBirth) {$this->_yearOfBirth = $yearOfBirth; return $this;}
    public function setStory($story) {$this->_story = $story; return $this;}
    public function setFromYear($fromYear) {$this->_fromYear = $fromYear; return $this;}
    public function setFromMonth($fromMonth) {$this->_fromMonth = $fromMonth; return $this;}
    public function setFromDay($fromDay) {$this->_fromDay = $fromDay; return $this;}
    public function setFromHour($fromHour) {$this->_fromHour = $fromHour; return $this;}
    public function setToYear($toYear) {$this->_toYear = $toYear; return $this;}
    public function setToMonth($toMonth) {$this->_toMonth = $toMonth; return $this;}
    public function setToDay($toDay) {$this->_toDay = $toDay; return $this;}
    public function setToHour($toHour) {$this->_toHour = $toHour; return $this;}
    public function setCreated($created) {$this->_created = $created; return $this;}
    public function setSpamkarma($spamkarma) {$this->_spamkarma = $spamkarma; return $this;}
    public function setClientIp($clientIp) {$this->_clientIp = $clientIp; return $this;}
    public function setFlags($flags) {$this->_flags = $flags; return $this;}    
    public function setLocations($locations) {$this->_locations = $locations; return $this;}

    public function toArray()
    {
        return array(
                     'id' => $this->_id, 
                     'name' => $this->_name, 
                     'namePublic' => $this->_namePublic, 
                     'email' => $this->_email, 
                     'city' => $this->_city, 
                     'occupation' => $this->_occupation, 
                     'yearOfBirth' => $this->_yearOfBirth, 
                     'story' => $this->_story, 
                     'fromYear' => $this->_fromYear, 
                     'fromMonth' => $this->_fromMonth, 
                     'fromDay' => $this->_fromDay, 
                     'fromHour' => $this->_fromHour, 
                     'toYear' => $this->_toYear, 
                     'toMonth' => $this->_toMonth, 
                     'toDay' => $this->_toDay, 
                     'toHour' => $this->_toHour, 
                     'created' => $this->_created, 
                     'spamkarma' => $this->_spamkarma, 
                     'clientIp' => $this->_clientIp, 
                     'flags' => $this->_flags, 
        );
    }
}