<?php

require_once(dirname(__FILE__). '/inc/common.php');

$language = language();

$referred = referred();

start('_landing');

?>

<div id="header-bar">
	<header>
		<div id="title">
			<img src="lib/images/header-jp.png">
		</div>
		<div id="language">	
			<?php language_bar($language, array('en', 'ja')); ?>
		</div>
	</header>
</div>

<div id="middle">
	<div id="register-header" data-jp="" data-en="">試作モデル αlpha（要登録）:</div>
	
	<div id="prototype">
		<img class="prototype-ss" src="lib/images/prototype_ss3.png">
	</div>

	<div id="archi-links">
	<ul>
		<li id="l1"><a href="../explore/?la=ja">
			<div class="btn shadow archi">このアーカイブについて</div>
		</a></li>
		<li id="l2"><a href="../seeds/?la=ja">
			<div class="btn shadow archi">ウェブ・アーカイブ検索</div>
		</a></li>
		<li id="l3"><a href="http://worldmap.harvard.edu/japanmap/">
			<div class="btn shadow archi">震災情報レイヤー地図</div>
		</a></li>
		<li id="l4"><a href="../featured/?la=ja">
			<div class="btn shadow archi">わたしの「東日本大震災」</div>
		</a></li>
	</ul>
	</div>
</div>

<div id="bottom-bar">
<div id="register">
	<form name="register-form" id="register-form" action="" method="POST">  
		<div class="fields">
			<div class="fieldcontainer">
				<div class="label">
			    	<label for="name" id="name" >お名前</label> 
				</div> 
				<input type="text" name="name" id="home-name-text-field" class="large" size="30" value="">
			</div>
			<div class="fieldcontainer" style="padding-top:15px;">
				<div class="label">
					<label for="email" id="email">Eメール</label>  
				</div>
				<input type="text" name="email" id="home-email-text-field" class="large" size="30" value="">
				<input type="hidden" name="language" id="l" value="日本語">
			</div>
			<div id="results" class="fieldcontainer" style="padding-top:15px;"></div>
		</div>
		<input type="submit" name="register" id="register-button" class="btn rounded bluegrad" value="新規登録"> 
	</form>
</div>

<div id="logo">
	<img class="japaneselogo" src="lib/images/logo_large_ja.png">
</div>


</div>

</div>

</body>
</html>
