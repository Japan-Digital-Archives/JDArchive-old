<?php
    require_once(dirname(__FILE__). '/common.php');
    $yoursite = "jdarchive.org"; //Your site url without http://
    $yoursite2 = "www.jdarchive.org"; //Type your domain with www. this time

    $referer = $_SERVER['HTTP_REFERER'];

    //Check if browser sends referrer url or not
    if ($referer == "") //If not, set referrer as your domain
        $domain = $yoursite;
    else
        $domain = parse_url($referer); //If yes, parse referrer

    if($domain['host'] == $yoursite || $domain['host'] == $yoursite2) {
        $idStr = $_GET['ids'];

        $ids = explode("|", $idStr);

        $sql = "UPDATE seeds SET verified=2 WHERE ";

        foreach($ids as &$id) {
            if($id != "") {
                $sql = $sql . "sid='" . mysql_real_escape_string($id) . "' OR ";
            }
        }

        $sql = substr($sql, 0, -3);

        mysql_query($sql);
    } else {
        //The referrer is not your site, we redirect to your home page
        header("Location: http://jdarchive.org");
        exit(); //Stop running the script
    } 
?>
