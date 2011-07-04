<h2><?= $this->t('public_title') ?> #<?= $this->testimonial->getId() ?></h2>
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
    'from' => sprintf('%d-%d-%d ' . $this->t('hour') . ': %d', 
                      $this->testimonial->getFromYear(),
                      $this->testimonial->getFromMonth(),
                      $this->testimonial->getFromDay(), 
                      $this->testimonial->getFromHour()),
    'to' => sprintf('%d-%d-%d ' . $this->t('hour') . ': %d', 
                      $this->testimonial->getToYear(),
                      $this->testimonial->getToMonth(),
                      $this->testimonial->getToDay(), 
                      $this->testimonial->getToHour()),

);
foreach ($fields as $key => $content) { ?>
    <tr>
        <th><?= $this->t($key) ?></th>
        <td><?= $content ?></td>
    </tr>   
<? } ?>
<?= $this->partial('partial/multilocation.php', array('readonly' => true)) ?>

</table>

