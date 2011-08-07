<? if (!isset($this->unbranded)) : ?>
<div id="content" class="testimonial-form">
<? else: ?>
<div id="content-wide" class="testimonial-form">
<? endif; ?>
     <?= $this->getI18n()->getLanguageBar() ?>
     <h2><?= $this->t('title') ?></h2>
     <? include 'views/testimonial/form.php' ?>
</div>
<? if (!isset($this->unbranded)) : ?>
<div id="sidebar">
     <h2><?= $this->t('sidebar_title') ?></h2>
     <p><?= $this->t('sidebar_directions') ?></p><br><br>
     <h2><?= $this->t('sidebar_title_2') ?></h2>
     <p><?= $this->t('sidebar_info') ?></p><br><br>
     <h2><?= $this->t('sidebar_title_3') ?></h2>
     <p><?= $this->t('sidebar_info_2') ?></p>
</div>
<? endif; ?>
<div style="clear: both;">&nbsp;</div>
