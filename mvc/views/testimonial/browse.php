<table>
<?
$fields = array(
    'submitted' => $this->testimonial->getCreated().' ('.$this->testimonial->getClientIp().')',
    'name' => $this->testimonial->getName(),
    'name_public' => ($this->testimonial->getNamePublic() ? $this->t('show_name_yes') : $this->t('show_name_no')),
    'email' => $this->testimonial->getEmail(),
    'city' => $this->testimonial->getCity(),
    'occupation' => $this->testimonial->getOccupation(),
    'year_of_birth' => $this->testimonial->getYearOfBirth(),
    'tell_us_your_story' => $this->testimonial->getStory(),
    'from' => sprintf('%d-%d-%d %d', 
                      $this->testimonial->getFromYear(),
                      $this->testimonial->getFromMonth(),
                      $this->testimonial->getFromDay(), 
                      $this->testimonial->getFromHour()),
    'to' => sprintf('%d-%d-%d %d', 
                      $this->testimonial->getToYear(),
                      $this->testimonial->getToMonth(),
                      $this->testimonial->getToDay(), 
                      $this->testimonial->getToHour()),
    /*    '' => $this->testimonial->get(),
     '' => $this->testimonial->get(),*/

);
/*
    public function getCreated() {return $this->_created;}
    public function getSpamkarma() {return $this->_spamkarma;}
    public function getClientIp() {return $this->_clientIp;}
    public function getFlags() {return $this->_flags;}
    public function getLocations() {return $this->_locations;}
*/
foreach ($fields as $key => $content) { ?>
    <tr>
        <th><?= $this->t($key) ?></th>
        <td><?= $content ?></td>
    </tr>   
<? } ?>
<?= $this->partial('partial/multilocation.php', array('readonly' => true)) ?>

</table>