<div id="content">
    <?= $this->getI18n()->getLanguageBar() ?>

    <h2>
    <?= $this->t('public_title') ?>
        #
        <?= $this->testimonial->getId() ?>
    </h2>
    <table class="seedform">
    <?
    $fields = array(
        'submitted' => $this->testimonial->getCreated(),
        'name' => ($this->testimonial->getNamePublic() ? $this->testimonial->getName() : $this->t('anonymous')),
        //'email' => $this->testimonial->getEmail(),
        'city' => $this->testimonial->getCity(),
        'occupation' => $this->testimonial->getOccupation(),
        'year_of_birth' => $this->testimonial->getYearOfBirth(),
        'tell_us_your_story' => nl2br($this->testimonial->getStory()),
        'from' => sprintf('%s-%s-%s ' . $this->t('hour') . ': %s', 
        $this->testimonial->getFromYear()  ? $this->testimonial->getFromYear()  : '&nbsp;',
        $this->testimonial->getFromMonth() ? $this->testimonial->getFromMonth() : '&nbsp;',
        $this->testimonial->getFromDay()   ? $this->testimonial->getFromDay()   : '&nbsp;',
        $this->testimonial->getFromHour()  ? $this->testimonial->getFromHour()  : '&nbsp;'),
        'to' => sprintf('%s-%s-%s ' . $this->t('hour') . ': %s', 
        $this->testimonial->getToYear()  ? $this->testimonial->getToYear()  : '&nbsp;',
        $this->testimonial->getToMonth() ? $this->testimonial->getToMonth() : '&nbsp;',
        $this->testimonial->getToDay()   ? $this->testimonial->getToDay()   : '&nbsp;',
        $this->testimonial->getToHour()  ? $this->testimonial->getToHour()  : '&nbsp;'),
    );
    foreach ($fields as $key => $content) { ?>
        <tr>
            <th><?= $this->t($key) ?>
            </th>
            <td><?= $this->cleanHtml($content) ?>
            </td>
        </tr>
    <? } ?>
    <?= $this->partial('partial/multilocation.php', array('readonly' => true)) ?>
    <?= $this->partial('partial/images.php', array('images' => $this->images)) ?>
    </table>
</div>
<div id="sidebar"></div>
<div style="clear: both;">&nbsp;</div>
