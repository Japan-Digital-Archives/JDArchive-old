<?php

$arr = array();
exec('/usr/home/jedarchi/bin/freqScript.sh 2>&1', $arr);

foreach($arr as &$val) {
    print html_entity_decode(utf8_decode($val), ENT_NOQUOTES, 'UTF-8');
}
?>
