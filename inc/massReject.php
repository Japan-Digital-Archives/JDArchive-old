<?php
    require_once(dirname(__FILE__). '/common.php');

    $idStr = $_GET['ids'];

    $ids = explode("|", $idStr);

    $sql = "UPDATE seeds SET verified=2 WHERE ";

    foreach($ids as &$id) {
        if($id != "") {
            $sql = $sql . "sid='" . $id . "' OR ";
        }
    }

    $sql = substr($sql, 0, -3);

    mysql_query($sql);
?>
