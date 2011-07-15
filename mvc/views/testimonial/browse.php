<div id="content">
     <?= $this->getI18n()->getLanguageBar() ?>
<h2><?= $this->t('browse_title') ?> #<?= $this->testimonial->getId() ?></h2>
<table class="seedform">
    <tr class='prev_next'>
        <th></th>
        <td>
            <? 
            if (isset($this->previousLink)) { ?>
                <a href="<?= $this->previousLink ?>"><?= $this->t('previous') ?></a>
            <? 
            } 

            if (isset($this->nextLink) && isset($this->previousLink)) {echo "&nbsp;|&nbsp;";}

            if (isset($this->nextLink)) { ?>
                <a href="<?= $this->nextLink ?>"><?= $this->t('next') ?></a>
            <? } ?>
        </td>
    </tr>

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

    <tr class='prev_next'>
        <th></th>
        <td>
            <? if (isset($this->previousLink)) { ?>
                <a href="<?= $this->previousLink ?>"><?= $this->t('previous') ?></a>
            <? } 
            if (isset($this->nextLink) && isset($this->previousLink)) {echo "&nbsp;|&nbsp;";}
            if (isset($this->nextLink)) { ?>
                <a href="<?= $this->nextLink ?>"><?= $this->t('next') ?></a>
            <? } ?>
        </td>
    </tr>

</table>
</div>
<div id="sidebar">
                <ul class='action_links'>
                <li><a href='<?= $this->editLink ?>'><?= $this->t('edit_delete_link') ?></a></li>
                <li><a href='<?= $this->publicLink ?>'><?= $this->t('public_link') ?></a></li>
                </ul>
</div>
<div style="clear: both;">&nbsp;</div>
