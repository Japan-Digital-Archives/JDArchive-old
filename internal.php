<?php

require_once(dirname(__FILE__). '/inc/common.php');

$internal = true;

require(dirname(__FILE__) . '/inc/templates/form_process.php');

start();

?>

<h2>Contribute (Internal Use Only!)</h2>

<?php

require(dirname(__FILE__) . '/inc/templates/form.php');

stop('3');
