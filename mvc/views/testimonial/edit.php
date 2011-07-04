<h2><?= $this->t('edit_title') ?></h2>
<? if (isset($this->deleteLink)) {
       echo "<span class='delete_link'><img src='/mvc/img/delete-icon.png'><a href='{$this->deleteLink}'>".$this->t('delete_submission')."</a></span>";
       ?>
       <div style="display: hidden;" id="delete_dialog" title="<?= $this->t('confirm_delete_title') ?>"><?= $this->t('confirm_delete_text') ?></div>
       <?
} ?>
<? include 'views/testimonial/form.php' ?>