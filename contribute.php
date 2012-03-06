<?php
header("Cache-Control: must-revalidate, max-age=600");
header("Vary: Accept-Encoding");
require_once(dirname(__FILE__). '/inc/common.php');

$internal = false;
$language = language();


require(dirname(__FILE__) . '/inc/templates/form_process.php');

start();

?>

<div>
<?php language_bar(language(), array('en', 'ja', 'zh','ko')); ?>
<div><h2 data-zh="投稿方法" data-jp="投稿方法" data-ko="제출">Contribute</h2></div>
</div>



<?php

require(dirname(__FILE__) . '/inc/templates/form.php');


stop();
