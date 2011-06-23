<h2><?= $this->t('edit_title') ?></h2>
<? if (isset($this->deleteLink)) {
       echo "<a href='{$this->deleteLink}' class='delete_link'>".$this->t('delete_submission')."</a>";
       ?>
       <div style="display: hidden;" id="delete_dialog" title="<?= $this->t('confirm_delete_title') ?>"><?= $this->t('confirm_delete_text') ?></div>
       <?
} ?>
<? include 'views/testimonial/form.php' ?>