<?php

// Zend library include path
set_include_path(get_include_path() . PATH_SEPARATOR . "/lib/ZendFramework-1.11.11-minimal/library"); 
include_once('lib/Google_Spreadsheet/Google_Spreadsheet.php');
require_once 'Zend/Mail/Transport/Smtp.php';
require_once 'Zend/Mail.php';


// Confirmation mail function
function send_mail($language, $n, $e) {
  	// configure Zend mail
	$smtpServer = 'smtp.gmail.com';
	$username = 'admin@jdarchive.org';
	$password = 'edwin2011';
	
	$config = array('ssl' => 'tls',
                'auth' => 'login',
                'username' => $username,
                'password' => $password);

	$transport = new Zend_Mail_Transport_Smtp($smtpServer, $config);
	
	$mail = new Zend_Mail('UTF-8');

	$mail->setFrom('admin@jdarchive.org', 'Jdarchive.org Staff');
	$mail->addTo($e, $n);
	$subject;
	$message;

	if ($language == 'en') {
		$subject = 'Jdarchive Alpha registration confirmation';
		$message = 
"Thank you for your interest in the Alpha prototype of our Digital Archive of Japan's 2011 Disasters.   We will gradually roll out access to the interface in the coming days and weeks to allow interested visitors to provide feedback as we improve the archive.

When we are able to provide you with access, you will receive a separate email with login information and more details about the current features of the archive interface, as well as its limitations and upcoming additions.

Sincerely,

The Jdarchive.org Staff
http://jdarchive.org/";
	}
	else {
		$subject = 'ご登録ありがとうございます';
		$message = 
'2011年東日本大震災デジタルアーカイブ・試作モデルalfaにご関心をお持ち下さりありがとうございます。このインターフェースへアクセスして頂ける人数は数日間から数週間をかけて段階的に拡大され、アーカイブが改良される過程において皆様からご意見・ご要望を頂けるようになります。

アクセスの準備が整いましたら、このメールとは別にメッセージが届き、ログイン方法や、現在のアーカイブ・インターフェースが可能にすることに関するより詳しい情報をご覧になることができます。同時に、制約及び追加される予定の機能についての説明もございます。

皆様のご参加に深く感謝申し上げます。

2011年東日本大震災デジタルアーカイブ・スタッフ一同
http://jdarchive.org/';		
	}
	
	$mail->setSubject($subject);
	$mail->setBodyText($message);
	
	// send
	$mail->send($transport);

}


 
$u = "admin@jdarchive.org";
$p = "edwin2011";
 
$ss = new Google_Spreadsheet($u,$p);
$ss->useSpreadsheet("prototype applicants");


$name = $_POST["name"];
$email = $_POST["email"];
$lang = $_POST["language"];

  
$row = array
(
    "name" => $name
    , "email" => $email
);

// successful add to spreadsheet
if ($ss->addRow($row)) {
	if ($lang === 'English') {
          send_mail('en', $name, $email);
		echo "Thank you for registering";
	}
	else {
		send_mail('jp', $name, $email);
		echo "ご登録ありがとうございます";
	}
}
// unsuccessful
else {
	if ($lang == 'English')
		echo "Error: Unable to Submit";
	else
		echo "サーバーエラーがあります";
} 
?>
