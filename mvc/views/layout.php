<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Digital Archive of Japan‘s 2011 Disasters</title>
    <meta name="keywords" content="digital archive japan 2011 earthquake tsunami aftermath reischauer institute harvard" />
    <meta name="description" content="Digital Archive of the Japan 2011 Earthquake and Aftermath" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

    <link href="/mvc/css/main.css" rel="stylesheet" type="text/css" media="screen" />    
    <script src="/mvc/js/main.js"  type="text/javascript"></script>
    <? if (isset($this->javascriptVariables)) { ?>
        <script type="text/javascript">var JA = <?= json_encode($this->javascriptVariables) ?>;</script>
    <? } ?>
  </head>
  <body>
    <div id="wrapper">
      <div id="wrapper-bgtop">
        <div id="header">
          <div id="logo">
            <a id="jdarchive_logo" href="<?= $this->url('/') ?>"><h1><span style="display:none;">Digital Archive</span></h1></a>
          </div>
          <!-- end #logo -->
          <div id="menu">
            <ul>
              <li><a href="<?= $this->url('/') ?>" class="first"><?= $this->t('about') ?></a></li>
              <li class="current_page_item"><a href="<?= $this->url('/contribute/') ?>"><?= $this->t('contribute') ?></a></li>
              <li class="last"><a href="<?= $this->url('/contact/') ?>"><?= $this->t('contact') ?></a></li>
            </ul>
          </div>
        </div>
        <!-- end #header -->
        <!-- end #header-wrapper -->
        <div id="page">
          <div id="content">
            <?= $this->languageBar ?>
            <?= $this->contents ?>
          </div>
          <div style="clear: both;">&nbsp;</div>
        </div>
        <!-- end #page -->
      </div>
    </div>
    <div id="footer-bgcontent">
      <div id="footer">
        <p><a href="http://www.fas.harvard.edu/~rijs/"><img src="/lib/images/reisch_logo.png" style="margin-top:2px;" /></a></p>
      </div>
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
