<p id="directions"><?= $this->t('directions') ?></p>
<p id="required"><span class="red">*</span><span><?= $this->t('required_field') ?></span></p>

<form id="testimonial-form" method="POST">
  <table class="seedform">
    <?= $this->form->hidden('id') ?>
    <?= $this->form->text('name') ?>
    <?= $this->form->field(
          'name_public',
          array(
            'hint' => 'name_public_hint', 
            'type' => 'select', 
            'values' => array(
              'show' => $this->t('show_name_yes'), 
              'hide' => $this->t('show_name_no')
            )
          )
        ); ?>
    <?= $this->form->text('email', array('hint' => 'email_hint')) ?>
    <?= $this->form->text('city', array('hint' => 'city_hint')) ?>
    <?= $this->form->text('occupation') ?>
    <?= $this->form->select('year_of_birth', array('start' => 1900, 'end' => 2010, 'empty' => true)) ?>
    <?= $this->form->textarea('tell_us_your_story', array('rows' => 11)) ?>
    <?= $this->form->time('from') ?>
    <?= $this->form->time('to', array('hint' => 'period_hint')) ?>
    <?= $this->partial('partial/multilocation.php') ?>
    <?= $this->partial('partial/image-upload.php') ?>
    <?= $this->form->checkbox('terms', array('note' => 'accept_terms', 'label' => 'i_accept')) ?>

    <?= $this->form->submit() ?>
    <? if ($this->unbranded) echo $this->form->hidden('u'); ?>
    <input type="hidden" name="la" value="<?= $this->getI18n()->getCurrent() ?>" />
  </table>
</form>
