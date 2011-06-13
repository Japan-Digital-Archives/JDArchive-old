<?php

require_once(dirname(__FILE__). '/inc/common.php');

$bk_title = isset($_GET['title']) ? $_GET['title'] : '';
$bk_description = isset($_GET['description']) ? $_GET['description'] : '';
$bk_url = isset($_GET['url']) ? $_GET['url'] : '';
$internal = isset($_GET['internal']);


require(dirname(__FILE__) . '/inc/templates/form_process.php');

start('_lite');

?>

<div class="simple">

<h2 data-jp="投稿" data-ko="제출">Contribute</h2>

<?php

require(dirname(__FILE__) . '/inc/templates/form.php');

?>

</div>

</body>
</html>