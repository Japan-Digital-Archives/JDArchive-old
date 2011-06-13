<?php

require_once(dirname(__FILE__). '/inc/common.php');

$language = language();

start();
?>

<div>
<?php language_bar($language, array('en', 'ja', 'zh', 'ko')); ?>
<div><h2 data-jp="当企画について" data-ko="프로젝트 소개">About Us</h2></div>
</div>

<?php if ($language == 'ja'): ?>
<p>
「2011年東日本大震災デジタルアーカイブ」は、震災後に、または震災に反応する形で交わされたオンライン情報を記録・保管する試みの一環として企画されました。もしこのアーカイブへの収録を推薦される資料をご存知でしてたら、是非ご連絡下さい。
</p><p>
日本語の資料をはじめ、英語、中国語、韓国語の資料も受け入れています。特定の地域だけでなく、世界で起こった反応、また在住・留学中の在日外国人の情報も含めて資料を収集したいと望んでおります。
</p><p>
私達は、他の部署と協力しながら有効なソーシャルメディアを構築しようとしていますが、同時に、誰もがアーカイブへの資料収録を推薦できるよう、2つの方法を立ち上げました：
</p><p>
<ul>
<li>
<strong><a href="/contribute/?la=ja">ウェブ上での提供</a> － </strong>デジタルアーカイブへの収録を推薦されるオンライン資料がございましたら、そのリンクをウェブ上で直接送信することができます。簡単かつ迅速にリンクを提供していただくため、ブックマーク機能を利用することもできます。
</li><li>
<strong><?php echo mailto('submit@jdarchive.org'); ?> － </strong>ウェブ資料へのリンク、または震災に関連する電子メールでの連絡（例えば、日本の被災地にいる人々が交換していた情報などを直接電子メールで提供して頂くこともできます。その場合、文脈がわかるような情報（例えば、誰がいつどこでその記録を作ったか、など）を出来るだけ多く含めて頂けると幸いです。また、大量の情報提供が見込まれるため、皆さまへ逐一ご返事できないこともある点を、あらかじめご了承下さい。</li></ul>
</p><p>
私達は、この情報をできるだけ広く公開し、震災とその後の経過を長期にわたって分析できるよう関与していきたいと思います。
</p><p>
なお、当デジタルアーカイブは、ハーバード大学<a href="http://www.fas.harvard.edu/~rijs/">エドウィン・O・ライシャワー日本研究所</a>が中心となって設立し、テオドル・C・ベスター、アンドルー・ゴードン（所長）、ヘレン・ハーデカー、スーザン・J・ファーの各教授が監修しています。
</p><p>
また、ハーバード大学内外の他の部署とも連携して当アーカイブは設立されました。その中には、メタ・ラボラトリー (<a href="http://metalab.harvard.edu/">metaLAB</a>)、<a href="http://lib.harvard.edu/">ハーバード大学図書館</a>、
バークマン・センター (<a href="http://cyber.law.harvard.edu/">Berkman Center for Internet & Society</a>)、地理学分析センター (<a href="http://gis.harvard.edu/icb/icb.do">Center for Geographic Analysis</a>)、 数量的社会科学研究所 (<a href="http://www.iq.harvard.edu/">Institute for Quantitative Social Science</a>) など学内の関連部署、さらに学外ではインターネット・アーカイブ（<a href="http://www.archive.org/">Internet Archive</a>）、国立国会図書館（<a href="http://www.ndl.go.jp/en/index.html">National Diet Library</a>）、北米日本研究資料調整協議会 (<a href="http://www.nccjapan.org/">North American Coordinating Council on Japanese Library Resources</a>) や東アジア文化人類学メーリングリスト(EASIANTH) やH-JAPANメーリングリスト(H-Japan) 、 またやその関連サイトなどと連携を図っています。
</p><p>
当企画への皆さまのご支援・ご協力に、あらかじめ感謝の意を表したいと存じます。
</p>

<?php elseif ($language == 'zh'): ?>
<p>
日本2011灾难数码档案是正在进行记录和保存此次灾难中所产生的信息以及反应的计划的一部分。欢迎您推荐能收录于此档案的资料。
</p><p>
包括日文资料，本所欢迎此类的英文、中文、日文或韩文的信息。我们对东亚地区与国际社会对此次灾难的反应甚感兴趣、因此也希望收录在日本生活、读书的外国人民提供的信息。
</p><p>
本所正在积极地与我们的合作机构开发收集有关的社会媒体的方法；然而，我们亦设立了以下的两个方式，让任何人能够提名此档案应该收录的信息：
</p>
<ul><li>
<strong><a href="/contribute/?la=zh">网络提交</a> - </strong>您可以直接用网上表格来提交您希望提名收录于本所之档案的网上信息。我们也提供一个数码书签， 以方便您能迅速、简易地提交网上链。
</li><li>
<strong><?php echo mailto('submit@jdarchive.org'); ?> - </strong>您也能通过电子邮件提交电子信息，包括相关的邮件通信（例如，通报于灾难区的报告等）。在您的邮件，也请不要忘记写下材料的相关背景信息（例如、是谁记录的、在何时何地等。）由于电子邮件的大量提交，我们无法一一回应、敬请原谅。
</li></ul>
<p>
我们会尽快地将这些宝贵信息与资料向学术界开放、以促进学者现在或者将来对灾难与它所带来的余波做长期的研究。
</p><p>
这个项目是由哈佛大学的赖肖尔日本研究所（<a href="http://www.fas.harvard.edu/~rijs/">Edwin O. Reischauer Institute of Japanese Studies at Harvard University</a>）创办，而是被Theodore C. Bestor, Andrew Gordon, Helen Hardacre与Susan J. Pharr教授所指导的。
</p><p>
本所也正在与哈佛大学的诸机构合作。其中包括：<a href="http://metalab.harvard.edu/">metaLAB</a>, <a href="http://lib.harvard.edu/">哈佛大学图书馆</a>, Berkman 网络与社会中心 (<a href="http://cyber.law.harvard.edu/">Berkman Center for Internet & Society</a>), 地理研究中心 (<a href="http://gis.harvard.edu/icb/icb.do">Center for Geographic Analysis</a>; CGA)、和计量社会科学研究中心 (<a href="http://www.iq.harvard.edu/">Institute for Quantitative Social Science</a>; IQSS)。除了以上的哈佛机构以外，本所也在于网络档案 (<a href="http://www.archive.org/">Internet Archive</a>), 日本国会图书馆 (<a href="http://www.ndl.go.jp/en/index.html">National Diet Library</a>), 北美日本图书馆资料协调委员会 (<a href="http://www.nccjapan.org/">North American Coordinating Council on Japanese Library Resources</a>; NCC)、EASIANTH, H-Japan列表服务器、以及其他的网络机构合作。
</p><p>
本所提前向您致谢，以感激您对此项目的支持。
</p>

<?php elseif ($language == 'ko'): ?>
<p>
2011년 일본 대재해 디지털 아카이브 프로젝트는 이번 재해에 관한 각종 정보와 자료들을 기록하여 남기기 위하여 기획 되었습니다. 저희 아카이브는 관련 자료들을 계속하여 구하고 있습니다.
</p><p>
저희는 일본을 넘어 지역과 세계의 반응도 기록하여 남기고자 하기에 일본어 이외에 영어, 중국어, 그리고 한국어로 되어있는 콘텐츠도 환영합니다. 그리고 일본에서 공부하거나  일하고 있는 외국인들의 기록도 환영합니다.
</p><p>
저희는 협동관계에 있는 여러 프로그램들과의 협력을 통하여 이번 재해에 관련된 자료들을 모아가고 있습니다. 하지만 저희는 다음의 두가지 방법을 통하여 누구라도 이번 재해에 관련된 자료를 아카이브에 제출 할 수 있도록 하고 있습니다.
</p>
<ul><li>
<strong><a href="/contribute/?la=ko">인터넷 제출</a></strong> – 이번 재해에 관련된 웹페이지 형식의 자료는 저희에게 직접 웹 주소를 제출 하실 수 있습니다. 저희는 제출과정의 간소화를 위하여 북마클렛 서비스도 제공하고 있습니다.  
</li><li>
<strong><?php echo mailto('submit@jdarchive.org'); ?></strong> – 당 이메일 주소를 이용하여 저희에게 관련자료의 웹주소나 관련된 이메일 자료들을 (예를 들어 재해를 당한 지역민들이 작성한 이메일) 저희에게 직접 보내실 수 있습니다. 이메일을 보내실시 자료에 관련된 최대한 많은 전후 사정의 맥락을 설명해 주시길 바랍니다 (육하원칙에 의거하여). 제출되는 이메일들의 양 때문에 제출되는 모든 이메일에 답장을 해 드리지 못하고 있는 것을 양해해 주시길 바랍니다.
</li></ul>
<p>
저희는 이번 재해와 그 파장의 장기적인 분석을 위해 아카이브의 자료를 곧 많은 분들의 열람이 가능한 방식으로 공개할 것입니다.
</p><p>
디지털 아카이브는 하버드 대학교의 에드윈 O. 라이샤워 일본학 연구소 (Edwin O. Reischauer Institute of Japanese Studies) 가 추진중이며, 앤드류 고든 (Andrew Gordon) 교수의 감독아래  티오도어 C. 베스터 (Theodore C. Bestor) 교수, 헬렌 하다크레 (Helen Hardacre) 교수, 그리고 수잔 J. 파르 (Susan J. Pharr) 교수의 감수 하에 진행 중입니다. 
</p><p>
저희 프로젝트는 <a href="http://metalab.harvard.edu/">metaLAB</a>, 하버드대학교 도서관 (<a href="http://lib.harvard.edu/">Harvard University Library</a>), 버크맨 인터넷과 사회 센터 (<a href="http://cyber.law.harvard.edu/">Berkman Center for Internet & Society</a>), 지리분석 센터 (<a href="http://gis.harvard.edu/icb/icb.do">Center for Geographic Analysis (CGA)</a>), 그리고 양적 사회과학 연구소 (<a href="http://www.iq.harvard.edu/">Institute for Quantitative Social Science (IQSS)</a>) 등의 하버드내 프로그램들과의 협력관계이 있습니다. 협력관계에 있는 하버드 외의 프로그램들은 인터넷 기록저장소 (<a href="http://www.archive.org/">Internet Archive</a>), 일본 국립국회도서관 (<a href="http://www.ndl.go.jp/en/index.html">National Diet Library</a>), 북미 일본 연구 자료 조정 협의회 (<a href="http://www.nccjapan.org/">NCC (North American Coordinating Council on Japanese Library Resources)</a>), EASIANTH 와 H-Japan 리스트서브 등이 있습니다.
</p>
<p>
저희 프로젝트를 향한 성원에 감사드립니다.
</p>
<?php else: ?>
<p>
The Digital Archive of Japan's 2011 Disasters project is part of a growing effort to record and archive the communications after, and responses to, the disaster.  We welcome recommendations of materials for inclusion in the archive. 
</p><p>
In addition to Japanese materials, we welcome content in English, Chinese, and Korean. We hope to include material on the regional and global reaction, as well as information about foreign nationals living/studying in Japan.
</p><p>
We are actively developing the means to harvest relevant social media in cooperation with our partners but have also established two methods that allow anyone to nominate materials for inclusion in the archive:
</p>
<ul>
<li>
<strong><a href="/contribute/?">Web Submission</a></strong> - You may directly submit links to online material you wish to nominate for inclusion in the digital archive through an online web form. We also offer a bookmarklet for fast and simple submission of links for consideration.
</li><li>
<strong><?php echo mailto('submit@jdarchive.org'); ?></strong> - You may also submit links to online materials, as well as relevant email correspondence (such as reports circulated by people in affected areas of Japan) directly by email. In the email, please include as much contextual information as possible (e.g., who created the record, when, where, and so forth). Due to the high volume of submissions, we cannot respond to these contributions individually.
</li>
</ul>
<p>
We will be working to make this information widely available for long-term analysis of the disasters and their aftermaths.
</p><p>
The digital archive is an initiative of the <a href="http://www.fas.harvard.edu/~rijs/">Edwin O. Reischauer Institute of Japanese Studies at Harvard University</a> and is supervised by Professors Theodore C. Bestor, Andrew Gordon (Director), Helen Hardacre, and Susan J. Pharr.
</p><p>
It is being created in collaboration with various programs at Harvard, including <a href="http://metalab.harvard.edu/">metaLAB</a>, the <a href="http://lib.harvard.edu/">Harvard University Library</a>, the <a href="http://cyber.law.harvard.edu/">Berkman Center for Internet & Society</a>, the <a href="http://gis.harvard.edu/icb/icb.do">Center for Geographic Analysis (CGA)</a>, <a href="http://www.iq.harvard.edu/">Institute for Quantitative Social Science (IQSS)</a>, and beyond Harvard with the <a href="http://www.archive.org/">Internet Archive</a>, <a href="http://www.ndl.go.jp/en/index.html">National Diet Library</a>, the <a href="http://www.nccjapan.org/">NCC (North American Coordinating Council on Japanese Library Resources)</a>, the EASIANTH and H-Japan listservs, and other networks.
</p><p>
Please accept our gratitude in advance for your support of this project.
</p>

<? endif ?>


<?php

stop('2');
