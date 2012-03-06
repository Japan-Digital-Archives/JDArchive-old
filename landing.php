<?php

require_once(dirname(__FILE__). '/inc/common.php');

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Digital Archive of Japan's 2011 Disasters</title>
<meta name="keywords" content="digital archive japan 2011 earthquake tsunami aftermath reischauer institute harvard" />
<meta name="description" content="Digital Archive of the Japan 2011 Earthquake and Aftermath" />
<link href="/lib/landing.css" rel="stylesheet" type="text/css" media="screen" />
<script src="http://code.jquery.com/jquery-latest.js"></script>
</head>

<body>
<div id="header-bar">
	<header>
		<div id="title">
			<img src="/lib/images/header-jp.png">
		</div>
		<div id="language">
			<a id="lang">English</a>
		</div>
		
	</header>
</div>


<div id="content">

<div id="middle">
	<div id="register-header">試作モデル αlfa（要登録）</div>
	
	<div id="prototype">
		<img class="prototype-ss" src="lib/images/prototype_ss.png">
	</div>

	<div id="archi-links">
	<ul>
		<li id="l1"><a href="../explore/?la=ja">
			<button class="btn shadow archi">このアーカイブについて</button>
		</a></li>
		<li id="l2"><a href="../search/?la=ja">
			<button class="btn shadow archi">ウェブ・アーカイブ検索</button>
		</a></li>
		<li id="l3"><a href="http://worldmap.harvard.edu/japanmap/">
			<button class="btn shadow archi">震災情報レイヤー地図</button>
		</a></li>
		<li id="l4"><a href="../featured/?la=ja">
			<button class="btn shadow archi">わたしの「東日本大震災」</button>
		</a></li>
	</ul>
	</div>
</div>

<div id="bottom-bar">
<div id="register">
	<div id="register-form">
		<div>
		<div id="name" class="label">お名前</div>
		<input type="text" placeholder="name" name="name" id="home-name-text-field" class="large" size="30" value="">
		</div>
		<div style="padding-top:15px;">
		<div id="email" class="label">Eメール</div>
		<input type="text" placeholder="email address" name="email" id="home-email-text-field" class="large" size="30" value="">
		</div>
	</div>
	<button id="register-button" class="btn rounded bluegrad">新規登録</button>
</div>

<div id="logo">
	<img class="japaneselogo" src="lib/images/logo_large_ja.png">
</div>
</div>

</div>

<script charset="utf-8" src="/lib/landing.js" type="text/javascript"></script>

</body>
