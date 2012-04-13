<?php
    require_once('inc/common.php');

    function sortLen($a,$b){
        return  strlen($a) - strlen($b);
    }
    $yoursite = "localhost"; //Your site url without http://
    $yoursite2 = "www.jdarchive.org"; //Type your domain with www. this time

    $referer = $_SERVER['HTTP_REFERER'];

    //Check if browser sends referrer url or not
    if ($referer == "") //If not, set referrer as your domain
        $domain = $yoursite;
    else
        $domain = parse_url($referer); //If yes, parse referrer

    if($domain['host'] == $yoursite || $domain['host'] == $yoursite2) {
        if(isset ($_GET['url'])){
            $url = $_GET['url'];
            if($url != "") {
                $sQuery = "SELECT url FROM seeds WHERE url LIKE '%" . mysql_real_escape_string($url) . "%'";

                $result = mysql_query($sQuery);
                $rArr = array();

                while ($row = mysql_fetch_array($result,MYSQLI_ASSOC)){
                    $rArr[] = $row['url'];
                }
                usort($rArr, 'sortLen');
                echo json_encode($rArr);
            }
        }
    } else {
        //The referrer is not your site, we redirect to your home page
        header("Location: http://jdarchive.org");
        exit(); //Stop running the script
    }
?>
