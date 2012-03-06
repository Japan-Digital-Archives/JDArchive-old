<?php
  header("Cache-Control: must-revalidate, max-age=600");
  header("Vary: Accept-Encoding");
  require_once(dirname(__FILE__). '/inc/common.php');
  
  $language = language();
  
  start();
  
  ?>



<div>
<?php language_bar($language, array('en', 'ja')); ?>
<div><h2 data-jp="これからのアーカイブ">The Archive We are Building</h2></div>
</div>

<?php if ($language == 'ja'): ?>
<p>2011年東日本大震災デジタルアーカイブは現在、ユーザにご利用頂くための画期的なインターフェースを構築中です。このインターフェースは、日本や世界で進められているアーカイブプロジェクトがそれぞれ完結した独自の体系を持つことを尊重しながらも、それらをひとつに結びつけることで、単なる個と個の総和を超えた複合体を創ることを目指しています。これにより、多くのプラットフォームに渡って存在するアーカイブ資料を、多様な方法により検索し、クロス・レファレンスすることが可能となります。</p>
<p>私たちはこのデジタルアーカイブを活発な公共空間として構想しています。コンテンツは絶え間なく拡大し続け、アーカイブを作ることと利用することはもはや区別しがたいものとなるでしょう。というのも、アーカイブ資料にアクセスする際、ユーザはキーワードや説明などの新しい情報を加えることで、その資料の意味をさらに奥行きのあるものにすることができるのです。この新しい情報であるメタ・データもアーカイブの一部となり、その後に利用するユーザが当該資料をより容易に検索し、より深く理解する助けとなります</p>
<p>ユーザは、ブログ、震災にまつわる物語や分析から、写真、音声、そして動画にまで　及ぶ資料を、時間、場所、トピックにより分類することができます。さらにユーザは、各自の興味・関心に基づいた資料を集めた「パーソナル・コレクション」を作った上で、さらにそれを公開することもできるのです。</p>
<p>以下の動画はこの新しいインターフェースにより可能となることの一部をご紹介しています。</p>
<div id = "vimeo">
<p><iframe src="http://player.vimeo.com/video/30186707?byline=0&amp;portrait=0" width="620" height="419" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe></p>

<p><iframe src="http://player.vimeo.com/video/30186749?byline=0&amp;portrait=0" width="620" height="457" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe></p>
</div>
<?php else: ?>
<p>The Digital Archive of Japan's 2011 Disasters is currently building an innovative user interface that will knit together separate digital archives into a whole that will be greater than the sum of the parts, while respecting the independent integrity of each archiving project.  This will enable multiple ways to access and cross-reference archived materials across many platforms.</p> 

<p>We envision this archive as an active public space.  Its content will be consistently expanding, and there is no firm boundary between the process of building and using the archive.  As users access the archived materials, they will have the opportunity to give these materials greater meaning by adding new information such as keywords or explanations.  This new information (metadata) will become part of the archive and help future users gain better access and understanding of the materials.</p>

<p>Users will be able to sort materials ranging from blogs or other text narratives or analyses, to photographs, sound recordings and moving pictures by date and time, and place, as well as topic.  And each user will be able to create personal “collections” of materials around the theme of his or her interest and leave a record of that collection for others to share or to view (if the user chooses to do so).</p>

<p>The following videos demonstrate some of the capabilities of new interface:</p>

<div id = "vimeo">
<p><iframe src="http://player.vimeo.com/video/30199351?byline=0&amp;portrait=0" width="620" height="442" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe></p>
<br />
<p><iframe src="http://player.vimeo.com/video/30930513?byline=0&amp;portrait=0" width="620" height="457" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe></p>
</div>
<?php endif ?>
<?php if ($language == 'ja'): ?>
<p>「2011年東日本大震災デジタルアーカイブ」は、ハーバード大学エドウィン・O・ライシャワー日本研究所が中心となり、パートナーたちとの連携のもと進められているプロジェクトです。私たちが目指すのは、震災に関するデジタル情報を可能な限り多く収集・保存し、皆様にご利用頂ける形にすることで、この一連の出来事やその影響を学問的に研究・分析できる場を整えることにあります。保存された記録が震災についての直接的な資料として短期的にお役に立つだけでなく、2011年3月11日に起きたこと、そしてそれが日本と世界にもたらしたものを、研究者が将来理解できるため長期的に意味あるものにできますよう願っています。</p>

<p>このアーカイブが積極的に探しているのは、日本語・英語・中国語・韓国語で書かれた3月11日の震災に関するありとあらゆる資料であり、その中には震災後の復興についての解説や記録も含まれます。地域の、日本の、そして世界の人々が何を感じ、どう振る舞ったのかが記されている資料もその対象となります。</p>
<p>インターフェースが完成した暁には下記のような情報の検索が可能となります：</p>
<ul class="inlist"><li><a href="content/?la=ja#websites">ウェブサイト</a> - 複数の言語で書かれた、団体や個人の膨大な量のアーカイブ。次のものはその一例です。<ul>
<li>NGO、企業、業界団体、学校、政府機関</li>
<li>被災者、救援活動に携わる方、科学者、医療関係者、議員</li>
</ul></li>
<li><a href="content/?la=ja#testimonials">個人的な体験　</a> 震災やその後に関するもの</li>
<li><a href="content/?la=ja#photos">写真や動画　</a> - 写真を保存している私たちのパートナーにより集められた写真や動画、あるいはFlickr、Picasa、YouTubeなど一般に公開されているデータベースから得られるもの</li>
<li><a href="content/?la=ja#audio">音声</a> - ラジオ放送などを録音したもの</li>
<li><a href="content/?la=ja#maps">地図や地理情報　</a> - 地理学分析センター(Center for Geographic Analysis)や他のパートナーにより作成された地理情報レイヤーなど</li>
<li><a href="content/?la=ja#social">ソーシャルメディア</a> - ツイッター、公開されているフェイスブックやその他のソーシャルメディア上で交わされた情報 </li>
<li><a href="content/?la=ja#text">その他のテクスト資料　</a> - Eメールやメーリングリスト上でのやりとり、レポートや書類のPDFファイル</li>
<li><a href="content/?la=ja#articles">記事データベース</a> - 私たちのパートナーが所有するメディア・書類データベースへのアクセス</li>
</ul>

<p>ウェブサイトや個々人の体験など、これらのうちのいくつかは私たちによって直接収集されています。しかし大部分はパートナーの協力を得て保存され、閲覧が可能となっています。アーカイブについてのより詳しいメタ情報はこちらにございます。<a href="content/?la=ja">コンテンツと所蔵情報</a></p>

<p>完成した際には、私たちが独自に収集した資料だけでなく、パートナーである諸団体が所有している豊富なアーカイブも、まるで流れるように検索して頂くことがこの企画の目的です。主なパートナーに関する詳細はこちらをお読み下さい。<a href="../partners/?la=ja">パートナーについて</a></p>


<?php elseif ($language == 'zh'): ?>
<p>日本2011灾难数码档案是哈佛大学埃德温·赖肖尔日本研究所与其他合作机构的一项倡议。我们的目标是收集与保存由此灾难产生的数码信息，并使这些信息易于利用。在短期内，我们希望这些记录能作为理解灾难的直接文献；在长期内，我们期待各界的学者们能利用本项目所收集的信息来分析2011年3月11日对日本以及全世界广义的影响与重要性。</p>

<p>本档案在积极地寻找2011年3月11日全面的英文、中文、日文与韩文的资料。我们所收集的资料包括本地性，地域性，国家性与全国性的信息。</p>
<p>本档案的网站界面完成之后，来客们可以自由搜索：</p>
<ul class="inlist"><li><a href="content/?la=zh#websites">网站</a> - 在各种语言收录的企业与个人的网站，包括：<ul>
<li>非政府组织、商业、贸易组织、学校以及政府组织</li>
<li>受害者、救济人员、科学家、医疗职员与政策家</li></ul></li>
<li><a href="content/?la=zh#testimonials">个人证言</a>关于灾难与其善后处理</li>
<li><a href="content/?la=zh#photos">照片与录影</a> - 收藏于本所的合作者或在公共收据库（例如：Flickr、Picasa、YouTube）</li>
<li><a href="content/?la=zh#audio">音响</a> - 音响录音，包括广播录影</li>
<li><a href="content/?la=zh#maps">地图与地理数据</a> - 地理研究中心（CGA）与其它合作机构所整理的地理数据</li>
<li><a href="content/?la=zh#social">社会媒体</a> - Twitter、公开的脸谱网网页与其它社交媒体的传信</li>
<li><a href="content/?la=zh#text">其他文体资料</a> - 电子邮件、列表服务器传信、报告与文件的PDF等</li>
<li><a href="content/?la=zh#articles">文件数据库</a> - 搜索本所合作者的媒体、文件数据库的使用权</li>
</ul>

<p>其中的信息（包括网页与个人证言）是直接由本所收集的。然而，大部分的信息是透过我们的合作机构保存、公开的。您能在以下的链接多了解本档案的综合性的做法：<a href="content/?la=zh">内容与收藏资料</a></p>

<p>完成之后，此界面能让本档案的利用者无缝地搜索我们所预备的信息，以及各个合作机构所收藏的巨大的数据库。您能在以下的链接多认识本所的合作者：<a href="partners/?la=zh">合作机构网页</a></p>


<?php elseif ($language == 'ko'): ?>
<p>2011년 일본 대재해 디지털 아카이브 프로젝트는 하버드 대학의 에드윈 O. 라이샤워 일본학 연구소(Edwin O. Reischauer Institute of Japanese Studies)와 여러 관련 기관과의 공동 연구로 기획되었습니다. 재해와 관련된 디지털 기록을 최대한 수집 및 저장하여, 이용 가능한 형태로 만듦으로써, 재해와 그 영향에 관한 학술적 연구와 분석을 가능하도록 하는데에 목표를 두고 있습니다.  저장된 기록들은 미시적으로는 이 재해에 대한 직접적 정보 공급처의 역할을 할 뿐만 아니라, 거시적으로는 학자들이3.11 일본 대재해를 이해하고, 일본과 전세계에 미친 영향에 대해 연구하는데 활용되기를 희망하고 있습니다. </p>

<p>본 아카이브는 3.11 일본 재해에 관련된 모든 정보 가운데, 일본어, 영어, 중국어, 한국어를 기반으로 하는 자료들을 적극적으로 구하고 있으며, 재난 이후의 복구 활동에 관한 논평이나 기사도 찾고 있습니다. 이에는 국지적, 지역적, 국가적, 그리고 나아가 전세계적 반응에 관한 자료가 포함됩니다. </p>
<p>완성된 인터페이스의 접근 및 검색 권한이 주어질 자료는 다음과 같습니다. </p>
<ul class="inlist"><li><a href="content/?la=ko#websites">웹사이트</a> - 다국적 언어의 기관 및 개인 웹사이트의 대규모 저장 모음<ul>
<li>NGO, 사업체, 무역 단체, 학교, 정부기관 외</li>
<li>희생자, 구호 작업자, 과학자, 의료팀, 정책 입안자 외</li></ul></li>
<li><a href="content/?la=ko#testimonials">개인체험수기</a> 재해와 이후 시기 여파 관련</li>
<li><a href="content/?la=ko#photos">사진 및 영상 자료 </a> - 사진 아카이브 제휴기관이나 Flickr, Picasa, Youtube와 같은 공개 데이터베이스에 의해서 수집된 사진과 영상</li>
<li><a href="content/?la=ko#audio">음향자료 </a> - 라디오 방송을 포함한 녹음된 음향 자료</li>
<li><a href="content/?la=ko#maps">지도와 지리적 데이터 </a> - 하버드 지리분석센터(Center for Geographic Analysis)와 기타 제휴기관이  제공한 지리적 데이터 계층 </li>
<li><a href="content/?la=ko#social">소셜 미디어 </a> - 트위터, 공개된 페이스북 페이지, 기타 소셜 미디어 통신 매체</li>
<li><a href="content/?la=ko#text">기타 원본 자료 </a> - 이메일, 우편목록 통신(listserv), 기사나 문서의PDF 파일</li>
<li><a href="content/?la=ko#articles">기사 데이터베이스 </a> - 미디어와 문서 데이터베이스 협력체의 자료 열람 권한</li>
</ul>

<p>상기 목록 중 웹사이트와 체험수기를 포함한 일부는 프로젝트가 직접 수집합니다. 그러나 대부분은 협력체의의 협조아래 접근 가능한 형태로 저장됙게 됩니다. 저희의 공동 아카이브에 관한 추가적인 정보는 아래의 링크에서 확인하실 수 있습니다.</p>

<p><strong><a href="content/?la=en">내용과 수집 자료들</a></strong></p>

<p>현재 저희 프로젝트는 방문자가 이러한 자료들을 열람, 검색, 공유할 수 있도록 하는 통합 인터페이스를 개발 중에 있습니다. 예를 들어, 지도에서 해당된 지역에 관련된 개인들의 수기를 함께 볼 수 있도록 함과 동시에 해당 위치나 근접 시기의 사진과 녹음된 기사를 용이하게 찾아 볼 수 있도록 할 것입니다.  이러한 기능을 제공하는 본 아카이브 개발에 일정시간이 소요됨을 양해구합니다. 아카이브 구축이 완료되면, 사용자들은  저희가 직접 취합한 자료들과  더불어 협력 기관에 의해 저장된 방대한 양의 자료들을 모두 검색 가능하게 됩니다. 저희의 주요 협력 기관들은 아래에서 살펴 볼 수 있습니다.</p>

<p><strong><a href="partners/?la=en">협력기관 소개</a></strong></p>

<?php else: ?>
<h2>Content Types</h2>
<p>The completed interface will provide searchable access to:</p>
<ul class="inlist"><li><a href="../content/?la=en#websites">Websites</a> - a large archived collection of institutional and individual websites in multiple languages, including but not limited to:<ul>
<li>NGOs, businesses, trade groups, schools, and government agencies
<li>victims, relief workers, scientists, medical personnel, and policy makers</ul></li>
<li><a href="../content/?la=en#testimonials">Personal Testimonies</a> concerning the disasters and aftermath</li>
<li><a href="../content/?la=en#photos">Photographs and Videos</a> - Photos and videos collected by photo archive partners or in publicly accessible databases such as Flickr, Picasa, Youtube</li>
<li><a href="../content/?la=en#audio">Audio</a> - Recordings of audio, including radio broadcasts</li>
<li><a href="../content/?la=en#maps">Maps and Geographic Data</a> - selected geographic data layers prepared by the Center for Geographic Analysis and other partners</li>
<li><a href="../content/?la=en#social">Social Media</a> - Twitter, public Facebook pages, and other social media communications </li>
<li><a href="../content/?la=en#text">Other Textual Sources</a> - email and listserv communications, PDFs of reports and documents</li>
<li><a href="../content/?la=en#articles">Article Databases</a> - access to search the databases of our media and document database partners</li>
</ul>

<p>Some of these, including websites and testimonials, are directly collected by us. Most of them, however, are made accessible and preserved in cooperation with our content partners. Learn more about our meta-archival approach here: <a href="content/?la=en">Content and Collection</a>.</p>

<p>Read more about our key partners here: <a href="../partners/?la=en">Partner Page</a>.</p>

<?php endif ?>

<?php
  
stop('_explore');
?>
