<?php

  $langs = array('en' => 'English', 'ja' => '日本語', 'ko' => '한국어', 'zh' => '中文');

  function referred() {
    $referred = isset($_GET["referred"]) ? $_GET["referred"] : '';
    return $reffered;
  }

  function language() {
    global $langs;
    $language = isset($_GET["la"]) ? $_GET["la"] : '';
    if (!array_key_exists($language, $langs)) {
      $language = 'ja';
    }
    
    return $language;
  }
  
  function language_bar($language, $includes = array('en', 'ja', 'zh', 'ko')) {
    global $langs;
    echo '<div style="float:right;">';
    $count = 0;
    foreach ($langs as $lang => $text) {
      if ($language == $lang) continue;
      if (!in_array($lang, $includes)) continue;
      $count++;
      echo "<a href='?la=$lang'>$text</a>";
      if ($count < count($includes) - 1) {
        echo " | ";
      }
    }
    echo '</div>';
  }
  

  // http://bakery.cakephp.org/articles/view/easy-email-address-encoder
  function mailto($href, $a = null)
  {
    $entities = "";
    for ($i = 0, $n = strlen($href); $i < $n; $i++) {
      switch (rand(0, 2))
      {
        case 0:
          $entities .= substr($href, $i, 1);
          break;
        case 1:
          $entities .= "&#" . ord(substr($href, $i, 1)) . ";";
          break;
        
        case 2:
          $entities .= "&#x" . dechex(ord(substr($href, $i, 1))) . ";";
          break;
      }
    }
    
    return "<a href='mailto:{$entities}'>" . (($a) ? $a : $entities) . "</a>";
  }

  
  function sidebar($ver = '') {
    $location = '/templates/side' . $ver . '.php';
    require(dirname(__FILE__) . $location);
  }
  
  function start($ver = '') {
    $location = '/templates/start' . $ver . '.php';
    require(dirname(__FILE__) . $location);
  }
  
  function stop($ver = '') {
    $location = '/templates/stop' . $ver . '.php';
    require(dirname(__FILE__) . $location);
  }


?>
