<?php
header("Cache-Control: must-revalidate, max-age=600");
header("Vary: Accept-Encoding");
require_once(dirname(__FILE__). '/inc/common.php');

$curate = false;



require_once(dirname(__FILE__). '/inc/templates/curate_template.php');


stop('_tags');
