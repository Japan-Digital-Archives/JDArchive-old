<?php

require_once(dirname(__FILE__). '/inc/common.php');

$language = language();

start();

?>



<div>
<?php language_bar($language, array('en', 'ja', 'ko')); ?>
<div><h2 data-jp="お問い合わせ" data-ko="운영자에게">Contact Us</h2></div>
</div>

<?php if ($language == 'ja'): ?>

<p>もし何か質問・提案がございましたら、<?php echo mailto('info@jdarchive.org'); ?> までEメールを送って下さい。</p>

<?php elseif ($language == 'ko'): ?>

<p>만약 질문이나 건의가 있으실 경우, <?php echo mailto('info@jdarchive.org'); ?> 로 이메일을 보내 주십시요.</p>

<?php else: ?>

<p>If you have any questions or suggestions, please email us at <?php echo mailto('info@jdarchive.org'); ?>.</p>

<?php endif ?>

<?php

stop();
