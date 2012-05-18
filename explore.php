<?php
  header("Cache-Control: must-revalidate, max-age=600");
  header("Vary: Accept-Encoding");
  require_once(dirname(__FILE__). '/inc/common.php');
  
  $language = language();
  
  start('_newabout');
  
  ?>


<div>
<?php language_bar($language, array('en', 'ja')); ?>
<div><h2 data-jp="現在のアーカイブ">Explore the Archive Now</h2></div>
</div>

<?php if ($language == 'ja'): ?>
<p>「2011年東日本大震災デジタルアーカイブ」は、ハーバード大学エドウィン・O・ライシャワー日本研究所が中心となり、パートナーたちとの連携のもと進められているプロジェクトです。私たちが目指すのは、震災に関するデジタル情報を可能な限り多く収集・保存し、皆様にご利用頂ける形にすることで、この一連の出来事やその影響を学問的に研究・分析できる場を整えることにあります。保存された記録が震災についての直接的な資料として短期的にお役に立つだけでなく、2011年3月11日に起きたこと、そしてそれが日本と世界にもたらしたものを、研究者が将来理解できるため長期的に意味あるものにできますよう願っています。</p>

<h5><a href="../seeds/">ウェブ・アーカイブを検索する</a></h5>

<p>暫定的にご用意した検索エンジンをご利用になることで、当アーアイブに収蔵されたウェブサイトやそれらについての情報、例えばページのタイトルや説明、関連するタグなどを検索することができます。検索結果を通じて、オンライン上に存在するウェブサイトそのものへと移動するか、またはインターネット・アーカイブに保存されたコピーをご覧頂くこともできます。</p>

<p class ="learn"><strong><a href="../contribute/">皆様からのご協力</a></strong>&nbsp;- アーカイブに適うと皆様が考える震災関連のウェブサイトは収蔵されていましたか？もしそうでなければ、投稿用のページかまたはJDArchiveのブックマークをお使いになり投稿にご協力下さい。</p>

<h5><a href="../featured/">特選　わたしの「東日本大震災」を読む</a></h5>

<p>これまでに皆様から寄せられた「わたしの『東日本大震災』」から、いつくかの投稿をご紹介しております。近い将来にはすべての投稿をご覧頂けるようになり、新しいインターフェースにも完全に統合されることになります。</p>

<p class ="learn"><strong><a href="../testimonial/">皆様からのご協力</a></strong> - 震災に関するあなたの物語をみんなで共有しませんか。あの3月11日の、そしてその後の、震災にまつわる個人的な体験をできる限り多く集めたいと望んでおります。</p>

<h5><a href="http://worldmap.harvard.edu/japanmap/">地理空間情報レイヤーを閲覧する</a></h5>

<p>地理学分析センターと恊働することで、私たちがご提供する地理空間情報レイヤーは深化し続けています。このレイヤー情報により、同センターが制作したJapan Sendai Earthquake Data Portalと共有している豊富なデータをどなたでもご覧頂くことができます。これは、ボランティア機関による多大なご努力や震災後に寛大にもその情報を提供して下さっている機関なくしてはなし得ないでしょう。</p>

<p class= "learn"><strong><a href="../maps/?la=ja">さらに詳しい情報を見る</a></strong>－ レイヤーやその元となった資料の詳細、またデータをダウンロードするためのリンクはこちらをご覧下さい。</p>
<hr />
<br />
<p>震災関連アーカイブへの取り組みにおいて主導的役割を果たしているプロジェクトをいくつかご紹介致します。これらの多くのプロジェクトとは豊富な密接なパートナー関係にあり、豊富な情報量を持つアーカイブ・プラットフォームの構築に向けて連携しております。</p>
<br />
<div id = "projects">
<h3><a href="http://www.archive-it.org/public/collection.html?id=2438">Japan Earthquake Internet Archive</a></h3>
  <p>Virginia Tech: Crisis, Tragedy, and Recovery Network</p>
  <br />

<h3><a href="http://archive-it.org/collections/2954">東日本大震災による福島第一原発事故後の日本の社会運動</a></h3>
  <p>オーストラリア国立図書館</p>
  <p>オーストラリア国立図書館がインターネットアーカイブと協働で構築するこのアーカイブは、東日本大震災によって複合災害を引き起こした福島第一原発事故に関する地域や市民団体の活動を記録するものです。被爆や放射能汚染の現状及び対応、原発について考える様々な市民グループや個人の活動に焦点を当てています。</p>
  <br />
  
<h3><a href="http://warp.ndl.go.jp/WARP_disaster.html">政府官公庁および被災地域の自治体を中心とするウェブサイトの保存</a></h3>
  <p>国立国会図書館</p>
  <p>国立国会図書館は日本における唯一の国立図書館として、今回の震災の体験を記録そして文化遺産として保存し、将来世代へと引き継ぐことを目的に、幅広くデジタル資料を収集・アーカイブしています。その中には、国立国会図書館法により使用許可取得が不要と定められた、政府官公庁や被災した地方自治体のウェブサイトなどが含まれます。国立国会図書館はインターネット・アーカイブや他のデジタルアーカイブに関わる非営利団体、そしてハーバード大学のエドウィン・O・ライシャワー日本研究所と協力関係にあります。</p>
  <br />

<h3><a href="http://www9.nhk.or.jp/311shogen/">NHK 東日本大震災アーカイブスe</a></h3>
<h3><a href="http://www.nhk.or.jp/voice311/">NHK 東日本大震災音声アーカイブス</a></h3>
  <p>日本放送協会</p>
  <p>東日本大震災発生直後より放映された、ニュース及び復興のプロセス、被災者の証言、検証・分析などのドキュメンタリー映像を、グーグル地図情報と一緒に提供しています。日付、映像タイプ別、職業別証言などで効率よく検索できるのが特徴です。 <a href="http://www.nhk.or.jp/voice311/">音声アーカイブス</a>ではＮＨＫラジオセンターで放送された被災者の証言及びインタビュー番組を収録しています。</p>
  <br />

<h3><a href="http://www.irides.tohoku.ac.jp/archive/shinrokuden.html">みちのく震録伝</a></h3>
  <p>東北大学 災害科学国際研究所 (以前は<a href="http://www.dcrc.tohoku.ac.jp/archive/index.html">東北大学 防災科学研究拠点 東北大学大学院工学研究科附属災害制御研究センター</a>)</p>
  <p>国立大学として地域のリーダー的役割を担ってきた東北大学は、新たに東日本大震災のデジタルアーカイブプロジェクトを始動させました。今回の震災に関して「みちのく震録伝」は産官学の諸機関と連携しつつ、被災地を中心としたあらゆる記憶、記録、事例を集めた総合的なアーカイブの構築を目指しており、復旧や復興の過程も記録し、ほぼリアルタイムで公開することを目指しています。プロジェクトが動き始めて間もないため、詳細については今後明らかになるようです。</p>
  <br />

<h3><a href="http://www.smt.city.sendai.jp/en/">3がつ11にちをわすれないために</a></h3>
  <p>せんだいメディアテーク</p>
  <p>「情報発信は支援活動を応援し、記録は未来への財産となるように」との理念のもと、日本における最先端の情報センターの一つであるせんだいメディアテークは、型にはまらないアーカイブプロジェクトを牽引してきました。市民、専門家、スタッフが恊働しながら復旧・復興プロセスを記録することに注力する一方、映像、写真、音声、テキストなどの多様なメディアを通じて発信し続けています。</p>
  <br />

<h3><a href="http://311archives.jp/">東日本大震災・災害復興まるごとデジタルアーカイブス</a></h3>
  <p>独立行政法人 防災科学技術研究所</p>
  <p>３１１まるごとアーカイブスは、市民や被災自治体、国の研究機関、大学、NPO、ボランティア、民間企業などと官民恊働で取り組む東日本大震災支援のe-コミュニティ・プラットフォームです。
被災地の失われた「過去」の記憶をデジタルで再生し、被災した「現在」と復興に向けた「未来」の映像や資料をデジタルで記録、そして被災地の復興状況や将来の防災学習・防災研究等の貴重な資料をまるごとアーカイブすることを目的としています。</p>
  <br />
  
<h3><a href="http://savemlak.jp/wiki/saveMLAK">save MLAK</a></h3>
  <p><a href="https://twitter.com/saveMLAK">save MLAKのツイッター</a></p>
  <p>博物館・美術館（Museum）、図書館（Library）、文書館（Archives）、公民館（Kominkan） の関係者及び支援者によるサポートネットワークであるsaveMLAKは、東日本大震災によって被災した施設や人々が、 どのような被害を受けているのかという被災情報、どのような支援を必要としているのかという救援情報を共有し、施設の復旧や展示物の修復に向けて協力できる専門の知識や技能を持ったボランティアの派遣など、必要と思われることを提供しています。2011年東日本大震災デジタルアーカイブの収集・保存活動に対しても、被災した諸機関のウェブサイトについての情報を多数提供して下さっています。</p>
  <br />

<h3><a href="http://archive.shinsai.yahoo.co.jp/">Yahoo 写真保存プロジェクト</a></h3>
  <p>Yahoo! JAPAN</p>
  <p>このウェブサイトはYahoo! JAPANによるもので、東日本大震災の被災地の姿や思い出の品物の写真などを保存していくプロジェクトです。様々な方法での検索が簡単に行え、キーワード、位置情報（経度・緯度など）、撮影時期（震災前、震災後）、種類、都道府県、そして市町村などの条件により写真を探すことができます。APIプラットフォームへの公開アクセスが先頃発表され、社会に開かれたオープン・アクセスに向けたより幅広い協力を得ながらの写真アーカイブへとつながることでしょう。</p>
  <br />
  
<h3><a href="http://www.miraikioku.com/">Google 写真保存プロジェクト：未来へのキオク</a></h3>
  <p>Google Japan</p>
  <p>Google による「未来へのキオク」は、写真・動画共有サービスPicasaやYouTubeを用い、震災で失われた美しい風景や、懐かしい景色、また、写真・動画などの思い出を、個人の思いや願いが込められた募集テーマごとに投稿者からアップロードして頂き、それらを表示・公開するプロジェクトです。被災前の町の風景や震災後の被災地の現在の様子を比較できるのが特徴です。</p>
  <br />

<h3><a href="http://shinsai.mapping.jp/">東日本大震災アーカイブ</a></h3>
  <p>首都大学東京 渡邉英徳研究室y</p>
  <p>首都大学東京の 渡邉英徳研究室および同大学東京大学院インダストリアルアート学域学生有志による「東日本大震災アーカイブ」は、震災の被害状況を可視化し、災害の実相を世界につたえる多元的デジタルアーカイブズです。　被災地の写真と360度パノラマ画像、そして朝日新聞社提供による「いま伝えたい千人の声」から抜粋された被災者の証言を、デジタル地球儀「グーグルアース」の三次元地形に重ねて一元化しており、俯瞰的に閲覧することができます。　タイムスライダー機能をにより、震災発生後の時間経過に沿って、資料を閲覧することも可能です。</p>
  <br />

<h3><a href="http://jyoho.kahoku.co.jp/imagedb/cgi-bin/user_shinsai_search.cgi">3.11 大震災　将来への記憶</a></h3>
  <p>河北新報</p>
  <p>東北全域をカバーする河北新報社が実験的に取り組んでいる<a href="http://flat.kahoku.co.jp/sub/volunteer/index.htm">ブログサイト</a>「ふらっと」は、市民参加型の地域ソーシャル・ネットワーキング・サービスとして3月11日以前から既に開設されていました。震災後は、多様なボランティア支援団体がこのブログを強力に後押しし、震災関連情報に特化した「絆」と呼ばれる<a href="http://flat.kahoku.co.jp/index/">サブカテゴリー</a>を生み出しました。その一方で同社の<a href="http://jyoho.kahoku.co.jp/imagedb/cgi-bin/user_shinsai_search.cgi">「3.11大震災 将来への記憶」</a>は、同じように一般の方からの投稿を中心として、写真やビデオ・動画の保存を進めています。<a href="http://video.kahoku.co.jp/">「動画の辻」</a>は過去に投稿された動画の検索機能と、ハイビジョン対応の動画をよりきれいに表示できる機能を追加して見やすくしたものです。</p>
  <br />
  
<h3><a href="http://globalvoicesonline.org/specialcoverage/japan-earthquake-tsunami-2011/">東日本大震災（2011/03）</a></h3>
  <p>グローバル・ボイス</p>     
  <p>グローバル・ボイスは国際的なボランティア・ネットワークとして、2011年東日本大震災に関する世界中の市民の声をオンライン上で取り上げています。それらの声は、ブログ、ポッドキャスト、写真共有サイト、そしてビデオブログなどの多様なメディアを通じて、草の根の視点から集められています。</p>
  <br />       

<h3><a href="http://sendai.hypercities.com/">HyperCities Sendai (Voices from Sendai through Social Media) HyperCities</a></h3>
  <p>Google MapsとGoogle EarthのAPIを利用して作られた同ウェブサイトは、地図情報プラットフォーム上にツイッターの呟きを重ねる双方向のハイパーメディア環境を特徴とするデジタル情報システムで、大震災直後からテキストメッセージを地図情報と共に随時発信しています。</p>
  <br />

<h3><a href="http://www.japanfocus.org/japans-3.11-earthquake-tsunami-atomic-meltdown">アジア太平洋ジャーナル：ジャパン・フォーカス</a></h3>
  <p>アジア太平洋ジャーナルは、日本や太平洋地域に影響を与える諸問題についての掘り下げた論文を幅広く提供する雑誌です。震災後は特に地震、津波、とりわけ福島の原発事故に関わる英語で書かれた論文を精力的に掲載しています。</p>
  <br/>

<h3><a href="http://ajw.asahi.com/category/0311disaster/">3/11 Disaster in Japan - Asahi Shimbun, Asia & Japan Watch (朝日新聞　デジタル英語版)</a></h3>
  <p>朝日新聞</p>
  <p>朝日新聞のデジタル英語版Asahi Japan Watch は、東日本大震災に関するインターネット情報を総合的に公開しています。特に今なお収束していない第一福島原子力発電所に関する調査報道や読み応えのある記事は、地図情報、画像、図表などを交えながら背後で一体何が起きているのかに迫っています。</p>
  <br />

<h3><a href="http://twtr.jp/earthquake">ツイッターをアーカイブすること</a></h3>
  <p>米国議会図書館とツイッター</p>
  <p>2010年の4月に米国議会図書館とツイッターの間で取り交わされた協定によって、東日本大震災に関するツイッターの呟き情報もすべてアーカイブするされることになっていますが、現在構築中というだけで詳細については今のところ不明です。</p>
  <br />

</div>


<?php //elseif ($language == 'ko'): ?>


<?php //elseif ($language == 'zh'): ?>

<?php else: ?>

<p>The Digital Archive of Japan's 2011 Disasters project is an initiative of the Edwin O. Reischauer Institute of Japanese Studies at Harvard University in collaboration with several partners. We aim to collect, preserve, and make accessible as much of the digital record of the disasters as possible, to enable scholarly research and analysis of the events and their effect.</p>

<h5><a href="../seeds/?la=en">Search the Web Archive</a></h5>

<p>With this preliminary tool, you can <a href="../seeds/?la=en">search</a> the collection of harvested websites and the information about each site we have collected, including the page title, description, and associated keyword tags. From there you can go to the live version of that website online or the archived copies at the Internet Archive.</p>

<p class ="learn"><strong><a href="../contribute/?la=en">Contribute</a></strong> - Have you found websites related to the disasters that you think should be archived? Consider submitting them through our <a href="../contribute/?la=en">form</a>.</p>

<h5><a href="../featured/?la=en">Read our Featured Testimonials</a></h5>

<p>Visit our featured testimonial page to read some of the contributions to the testimonial collection so far. We will be adding the ability to search all testimonials soon and they will also be fully integrated in the final interface.</p>

<p class ="learn"><strong><a href="../testimonial/?la=en">Contribute</a></strong> - Would you like to share your story of the earthquake and tsunami? We hope to collect as many personal stories of the events on and after March 11, 2011 in Japan as possible.</p>

<h5><a href="http://worldmap.harvard.edu/japanmap/">Browse our Map Layers</a></h5>

<p>Together with the Center for Geographic Analysis we are preparing a growing number of rich map layers that can allow anyone to browse some of the many rich data sets that have been shared with the Japan Sendai Earthquake Data Portal, often available only thanks to the hard work of volunteer organizations, or by institutions who graciously shared their data in the aftermath of the disaster.</p>

<p class="learn"><strong><a href="../maps/?la=en">Learn More</a></strong> － Read more about the layers, their sources, and find links to download the data.</p>
<hr />
<br />
<p>Below is a list of some of the other leading projects engaged in archiving of the disasters, many of whom are close partners working with us in building a content rich archival platform.</p>
<br />
<div id = "projects">
        <h3><a href="http://www.archive-it.org/public/collection.html?id=2438">Japan Earthquake Internet Archive</a></h3>
  <p>Virginia Tech: Crisis, Tragedy, and Recovery Network</p>
  <p>Digital media archive collected by the Virginia Tech: Crisis, Tragedy, and Recovery Network. The collection is hosted on “Archive-It”, a subscription service developed by the Internet Archive.</p>
  <br />

<h3><a href="http://archive-it.org/collections/2954">Japan, Social Movements after the Fukushima Nuclear Power Plants Crisis, March 11, 2011</a></h3>
  <p>National Library of Australia</p>
  <p>A collaboration of the National Library of Australia and Internet Archive, this project is to archive community responses to the Fukushima Nuclear Power Plants crisis and its aftermath with particular emphasis on social movements of various citizens groups and individuals toward nuclear radiation and contamination.</p>
  <br />
  
<h3><a href="http://warp.ndl.go.jp/WARP_disaster.html">Web Archiving of Local Governments’ Websites in Disaster Areas (part of WARP [Web Archiving Project]</a></h3>
  <p>The National Diet Library, JAPAN</p>
  <p>As the only national library in Japan, the National Diet Library (NDL) can harvest and archive a wide array of government websites, including the websites of local governments affected by the disasters in Eastern Japan, and other digital materials without permission under current NDL Law. Records and personal experience of those who lived through the massive Eastern Japan Great Earthquake Disaster are to be preserved as cultural heritage to pass on to the future generations. The NDL is also collaborates with Internet Archive, a non-profit organization on digital library, and Edwin O. Reischauer Institute at Harvard University.</p>
  <br />
  
<h3><a href="http://www9.nhk.or.jp/311shogen/">NHK Archives on the Great East Japan Earthquake</a></h3>
<h3><a href="http://www.nhk.or.jp/voice311/">NHK Voice Archives on the Great East Japan Earthquake</a></h3>
  <p>NHK (Nippon Hoso Kyokai, Japan Broadcasting Corporation)</p>
  <p>NHK Archives on the Great East Japan Earthquake offers various images of this tragic event and the ongoing recovery processes that have been broadcasted on NHK since March 11th, including live coverage, news, testimonials, and analytical documentary films, along with pinpoint geographical information on the Google Maps. One can select and search by date, category of disasters and damage (e.g., tsunami, fire, nuclear power plant, building damage), and testimonials by occupation. In addition, <a href="http://www.nhk.or.jp/voice311/">NHK Voice Archives</a> contain interviews and testimonials aired on the NHK Radio Center.</p>
  <br />

<h3><a href="http://www.irides.tohoku.ac.jp/archive/shinrokuden.html">Digital Archive on Earthquakes in Tohoku</a></h3>
  <p>International Research Institute of Disaster Science (IRIDeS) (Formerly the <a href="http://www.dcrc.tohoku.ac.jp/archive/index.html">Tohoku University Disaster Control Research Center</a>)</p>
  <p>As a leading national university in the region, Tohoku University recently launched a digital archiving project on the Eastern Japan Great Earthquake Disaster. Collaborating with the government, industry, and academe, the project aims to build a comprehensive archive on disasters in the region, with a broad spectrum of memory, records, case studies. It aims to record the recovery and rebuilding process of the disaster and to disseminate information on a near real-time basis. As of this writing, details of the project are unknown since this archiving project has been released only recently.</p>
  <br />

<h3><a href="http://recorder311.smt.jp/">To Not Forget March 11th</a></h3>
  <p>Sendai Mediatheque</p>
  <p>In view of the belief that the disaster relief effort can be supported by information dissemination and that records of the disaster can be priceless assets for the future, Sendai Mediatheque (SMT), one of the cutting-edge information centers in Japan, is leading a unique disaster recovery archiving project. In collaboration with citizens, experts, and SMT staff, this archive project focuses on recording the recovery and rebuilding process from the disaster while disseminating thoughts and information through various media, such as images, photos, sounds, and text.</p>
  <br />
  
<h3><a href="http://311archives.jp/">All 311 Comprehensive Archiving Project</a></h3>
  <p>National Research Institute for Earth Science and Disaster Prevention [NIED]</p>
  <p>Collaborating with citizens and local governments affected by the disaster as well as research institutions, universities, NPOs, volunteers, and commercial companies, 311 Marugoto Archive offers an e-community platform to support disaster recovery and rebuilding efforts. The project aims to restore and regenerate a memory of the lost past by offering digitization of memory while recording the recovery process and valuable information resources produced in the process for future disaster education, disaster prevention and research as a whole.</p>
  <br />

<h3><a href="http://savemlak.jp/wiki/saveMLAK">save MLAK (Save Museum, Library, Archives, and Kominkan)</a></h3>
  <p><a href="https://twitter.com/saveMLAK">saveMLAK on Twitter</a></p>
  <p>The saveMLAK is a project led by the staff and supporters of museums, libraries, archives, and community centers (kōminkan) in Japan. The project is collecting information on the harm to people and damage to facilities caused by the Eastern Japan Great Earthquake Disaster as well as identifying their needs in the relief effort. The saveMLAK project works to provide the people and institutions affected by the disaster with whatever assistance that project members in the museum, library, archive, and the kōminkan community can provide. The project is contributing information about the many websites of affected institutions to the Digital Archive of Japan's 2011 Disasters for our web archiving efforts.</p>
  <br />

<h3><a href="http://archive.shinsai.yahoo.co.jp/">Yahoo Photo Archiving Project on the Japanese Earthquake and Tsunami March 11th 2011</a></h3>
  <p>Yahoo! JAPAN</p>
  <p>This site is a damaged photo recovery project by Yahoo! JAPAN. Easy to use various ways of search, one can search by keywords, geographical points (e.g., latitude, longitude), time period (pre-disaster, post-disaster), type, prefecture, and community. Yahoo’s recent release on their free-of-charge API platform to access <a href="http://archive.shinsai.yahoo.co.jp/">Yahoo Photo Archiving Project on the Japanese Earthquake and Tsunami March 11th 2011</a> may lead to a more collaborated image archive development for open access to society.</p>
  <br />

<h3><a href="http://www.miraikioku.com/">Google Photo Archiving Project: Memory for Future</a></h3>
  <p>Google Japan</p>
  <p>The Memory for Future by Google provides opportunities to share and embed personal photographs in order to recover lost memorable landscape, scenes considered sweetly familiar, as well as photos and videos/movies, contributed by people through Picasa and YouTube applications in accordance to posted themes.  Differentiating images taken in the pre-disaster from the post-disaster, one can compare the two.</p>
  <br />

<h3><a href="http://shinsai.mapping.jp/">The East Japan Earthquake Archives</a></h3>
  <p>WTNV.Studio Network Media Art, Tokyo Metropolitan University</p>
  <p>Run by volunteers in Professor Hidenori Watanabe’s laboratory, WTNV.Studio Network Media Art at Tokyo Metropolitan University, this pluralistic digital archive is to enable one to visualize the damage of the Great East Japan Earthquake in a more measurable way. Images of the affected disaster areas, both regular and 360 degree panoramic images, along with testimonials extracted from “Voices from a Thousand People” published on The Asahi Shimbun, are presented on a three dimensional digital globe, Google earth, with a bird’s-eye view of the disaster damage. By using a time slider function, one can also view the images chronologically after the time this tragic event took place. </p>
  <br />

<h3><a href="http://jyoho.kahoku.co.jp/imagedb/cgi-bin/user_shinsai_search.cgi">3.11 The Great Earthquake: Memory for Future</a></h3>  
  <p>The Kahoku Shimpo</p>
  <p>A volunteer base <a href="http://flat.kahoku.co.jp/sub/volunteer/index.htm">blog site</a> called “furatto” (ふらっと) at The Kahoku Shimpo, a leading newspaper company in the Tohoku area, can be viewed as experimental citizen’s media and has been in practice since before March 11th. After the disaster, strong supporters in various volunteer groups enhanced the blog site, eventually creating a <a href="http://flat.kahoku.co.jp/index/">subcategory site</a> called “kizuna” (絆), which focuses particularly on disaster related information. Whereas, Kahoku’s <a href="http://jyoho.kahoku.co.jp/imagedb/cgi-bin/user_shinsai_search.cgi">“3.11 The Great Earthquake: Memory for Future,”</a> which also operates on a volunteer basis, focuses on images and video. In addition, <a href="http://video.kahoku.co.jp/">Animation Crossing</a> offers an enhanced search system for better viewing of moving images.</p>
  <br />

<h3><a href="http://globalvoicesonline.org/specialcoverage/japan-earthquake-tsunami-2011/">Global Voices: Japan Earthquake 2011</a></h3>
  <p>CSR Conversations for a Better World</p>     
  <p>An international, volunteer-led Global Voices Online focusing on Japan Earthquake 2011 offers citizens’ voices found in various media, such as blogs, podcasts, photo sharing sites, and videoblogs, with a grass-root perspective from around the world.</p>
  <br />       

<h3><a href="http://sendai.hypercities.com/">HyperCities Sendai (Voices from Sendai through Social Media) HyperCities</a></h3>
  <p>Built on the Google Maps and Google Earth APIs, HyperCities Sendai provides active digital media space with Twitters and has accumulated interactive communications on the Eastern Japan Great Earthquake Disaster along with geographical data.</p>
  <br />

<h3><a href="http://www.japanfocus.org/japans-3.11-earthquake-tsunami-atomic-meltdown">The Asia-Pacific Journal: Japan Focus</a></h3>
  <p>The Asia-Pacific Journal, which provides a range of in-depth articles on issues affecting Japan and the entire region has been especially active in the aftermath of the disasters in posting articles in the English language related to the earthquake, tsunami, and especially the nuclear disaster in Fukushima.</p>
  <br/>
  
<h3><a href="http://ajw.asahi.com/category/0311disaster/">3/11 Disaster in Japan - Asahi Shimbun, Asia & Japan Watch</a></h3>
  <p>The Asahi Shimbun</p>
  <p>This special website of Asia &Japan Watch (AJW), new English-language digital version of The Asahi Shimbun, provides readers with the Internet's comprehensive, archival coverage of the Japan’s Great Earthquake on March 11th, 2011. Particularly useful for in-depth coverage on the ongoing nuclear crisis at the Fukushima No.1 nuclear power plant along with real stories behind what is happening there as well as geographical data, images, and graphics.</p>
<br />

<h3><a href="http://twtr.jp/earthquake">Twitter Archiving (Official Twitter Project)</a></h3>
  <p>Collaboration of Twitter and the Library of Congress</p>
  <p>As part of the Agreement made in April 2010 between Twitter and the Library of Congress, Twitter information on the Great East Japan Earthquake and Tsunami will be archived. However, the archive has been under construction, so further information is unknown at the moment.</p>
  <br />
                                                                                                                             
</div>
 <?php endif ?>

<?php
  
  stop('9');

