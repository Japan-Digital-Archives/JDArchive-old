<?php
  
  require_once(dirname(__FILE__). '/inc/common.php');
  
  $language = language();
  
  start();
  
  ?>



<div>
<?php language_bar($language, array('en', 'ja', 'ko')); ?>
<div><h2 data-jp="" data-ko="">Other Projects</h2></div>
</div>

<?php
stop();
?>