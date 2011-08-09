<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Digital Archive of Japan‘s 2011 Disasters</title>
    <meta name="keywords" content="digital archive japan 2011 earthquake tsunami aftermath reischauer institute harvard" />
    <meta name="description" content="Digital Archive of the Japan 2011 Earthquake and Aftermath" />

    <? if (isset($this->javascriptVariables)) { ?>
        <script type="text/javascript">var JA = <?= json_encode($this->javascriptVariables) ?>;</script>
    <? } ?>

    <!-- JS -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

    <script src="/lib/TextboxList/GrowingInput.js" type="text/javascript" charset="utf-8"></script> 
    <script src="/lib/TextboxList/TextboxList.js" type="text/javascript" charset="utf-8"></script>

    <script src="/mvc/js/maps.js?v=3" type="text/javascript"></script>
    <script src="/mvc/js/fileuploader.js?v=3" type="text/javascript"></script>
    <script src="/mvc/js/ja-fileuploader.js?v=3" type="text/javascript"></script>
    <script src="/mvc/js/main.js?v=3" type="text/javascript"></script>    
    <!--  <script type="text/javascript" src="https://getfirebug.com/firebug-lite.js"></script> -->
        
    <!-- CSS -->
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" media="screen" />    
    
    <link href="/mvc/css/main.css?v=3" rel="stylesheet" type="text/css" media="screen" />    
    <link href="/mvc/css/fileuploader.css?v=3" rel="stylesheet" type="text/css" media="screen" />
    
    <link href="/lib/TextboxList/TextboxList.css" rel="stylesheet" type="text/css" media="screen" charset="utf-8" /> 
    <link href="/lib/TextboxList/TextboxList.Autocomplete.css" rel="stylesheet" type="text/css" media="screen" charset="utf-8" /> 
  </head>
  <body id="<?= $this->bodyId ?>" class="<?= $this->bodyClass ?>">
    <div id="wrapper">
      <div id="wrapper-bgtop">
        <? if (!isset($this->unbranded)) : ?>
          <div id="header">
            <div id="logo">
              <a id="jdarchive_logo" href="<?= $this->url() ?>"><h1><span style="display:none;">Digital Archive</span></h1></a>
            </div>
            <!-- end #logo -->
            <div id="menu">
              <ul>
                <li><a href="<?= $this->url() ?>" class="first"><?= $this->t('about') ?></a></li>
                <li class="current_page_item"><a href="<?= $this->url('contribute') ?>"><?= $this->t('contribute') ?></a></li>
                <li class="current_page_item"><a href="<?= $this->url('news') ?>"><?= $this->t('news') ?></a></li>
                <li class="last"><a href="<?= $this->url('contact') ?>"><?= $this->t('contact') ?></a></li>
              </ul>
            </div>
          </div>
          <!-- end #header -->
        <? endif; ?>
        <div id="page">

            <?= $this->contents ?>

        </div>
        <!-- end #page -->
      </div>
    </div>
    <div id="footer-bgcontent">
      <? if (!isset($this->unbranded)) : ?>
        <div id="footer">
          <p><a href="http://www.fas.harvard.edu/~rijs/"><img src="/lib/images/reisch_logo.png" style="margin-top:2px;" /></a></p>
        </div>
      <? endif; ?>
    </div>
    <!-- end #footer -->
    <? if (APPLICATION_ENV == 'production') { ?>
      <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-22729281-1']);
        _gaq.push(['_trackPageview']);
  
        (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
      </script>
    <? } ?>
  </body>
</html>
