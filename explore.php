<?php
  header("Cache-Control: must-revalidate, max-age=600");
  header("Vary: Accept-Encoding");
  require_once(dirname(__FILE__). '/inc/common.php');
  
  $language = language();
  
  start('_newabout');
  
  ?>


<div>
<?php language_bar($language, array('en', 'ja')); ?>
<div><h2 data-jp="ここまでのアーカイブ" data-ko="">Explore the Archive Now</h2></div>
</div>

<?php if ($language == 'ja'): ?>

<h5><a href="../seeds/">ウェブ・アーカイブを検索する</a></h5>

<p>暫定的にご用意した検索エンジンをご利用になることで、当アーアイブに収蔵されたウェブサイトやそれらについての情報、例えばページのタイトルや説明、関連するタグなどを検索することができます。検索結果を通じて、オンライン上に存在するウェブサイトそのものへと移動するか、またはインターネット・アーカイブに保存されたコピーをご覧頂くこともできます。</p>

<p class ="learn"><strong><a href="../contribute/">皆様からのご協力</a></strong>&nbsp;- アーカイブに適うと皆様が考える震災関連のウェブサイトは収蔵されていましたか？もしそうでなければ、投稿用のページかまたはJDArchiveのブックマークをお使いになり投稿にご協力下さい。</p>

<h5><a href="../featured/">特選　わたしの「東日本大震災」を読む</a></h5>

<p>これまでに皆様から寄せられた「わたしの『東日本大震災』」から、いつくかの投稿をご紹介しております。近い将来にはすべての投稿をご覧頂けるようになり、新しいインターフェースにも完全に統合されることになります。</p>

<p class ="learn"><strong><a href="../testimonial/">皆様からのご協力</a></strong> - 震災に関するあなたの物語をみんなで共有しませんか。あの3月11日の、そしてその後の、震災にまつわる個人的な体験をできる限り多く集めたいと望んでおります。</p>

<h5><a href="http://worldmap.harvard.edu/japanmap/">地理空間情報レイヤーを閲覧する</a></h5>

<p>地理学分析センターと恊働することで、私たちがご提供する地理空間情報レイヤーは深化し続けています。このレイヤー情報により、同センターが制作したJapan Sendai Earthquake Data Portalと共有している豊富なデータをどなたでもご覧頂くことができます。これは、ボランティア機関による多大なご努力や震災後に寛大にもその情報を提供して下さっている機関なくしてはなし得ないでしょう。</p>

<p class= "learn"><strong><a href="../maps/">さらに詳しい情報を見る</a></strong>－ レイヤーやその元となった資料の詳細、またデータをダウンロードするためのリンクはこちらをご覧下さい。</p>
<hr />
<br />
<p>震災関連アーカイブへの取り組みにおいて主導的役割を果たしているプロジェクトをいくつかご紹介致します。これらの多くのプロジェクトとは豊富な密接なパートナー関係にあり、豊富な情報量を持つアーカイブ・プラットフォームの構築に向けて連携しております。</p>
<br />
<div id = "projects">
<h3><a href="http://www.dcrc.tohoku.ac.jp/archive/">みちのく震録伝</a></h3>
<p>東北大学 防災科学研究拠点 東北大学大学院工学研究科附属災害制御研究センター</p>
<p>国立大学として地域のリーダー的役割を担ってきた東北大学は、新たに東日本大震災のデジタルアーカイブプロジェクトを始動させました。今回の震災に関して「みちのく震録伝」は産官学の諸機関と連携しつつ、被災地を中心としたあらゆる記憶、記録、事例を集めた総合的なアーカイブの構築を目指しており、復旧や復興の過程も記録し、ほぼリアルタイムで公開することを目指しています。プロジェクトが動き始めて間もないため、詳細については今後明らかになるようです。</p>
<br />
<h3><a href="http://warp.ndl.go.jp/WARP_disaster.html">政府官公庁および被災地域の自治体を中心とするウェブサイトの保存</a></h3>
<p>国立国会図書館</p>
<p>国立国会図書館は日本における唯一の国立図書館として、今回の震災の体験を記録そして文化遺産として保存し、将来世代へと引き継ぐことを目的に、幅広くデジタル資料を収集・アーカイブしています。その中には、国立国会図書館法により使用許可取得が不要と定められた、政府官公庁や被災した地方自治体のウェブサイトなどが含まれます。国立国会図書館はインターネット・アーカイブや他のデジタルアーカイブに関わる非営利団体、そしてハーバード大学のエドウィン・O・ライシャワー日本研究所と協力関係にあります。</p>
<br />
<h3><a href="http://www.smt.city.sendai.jp/en/">3がつ11にちをわすれないために</a></h3>
<p>せんだいメディアテーク</p>
<p>「情報発信は支援活動を応援し、記録は未来への財産となるように」との理念のもと、日本における最先端の情報センターの一つであるせんだいメディアテークは、型にはまらないアーカイブプロジェクトを牽引してきました。市民、専門家、スタッフが恊働しながら復旧・復興プロセスを記録することに注力する一方、映像、写真、音声、テキストなどの多様なメディアを通じて発信し続けています。</p>
<br />
<h3><a href="http://311archives.jp/">東日本大震災・災害復興まるごとデジタルアーカイブス</a></h3>
<p>独立行政法人 防災科学技術研究所</p>
<p>３１１まるごとアーカイブスは、市民や被災自治体、国の研究機関、大学、NPO、ボランティア、民間企業などと官民恊働で取り組む東日本大震災支援のe-コミュニティ・プラットフォームです。
被災地の失われた「過去」の記憶をデジタルで再生し、被災した「現在」と復興に向けた「未来」の映像や資料をデジタルで記録、そして被災地の復興状況や将来の防災学習・防災研究等の貴重な資料をまるごとアーカイブすることを目的としています。
</p>
<br />
<h3>3.11将来への記憶</h3>
<a href="http://jyoho.kahoku.co.jp/imagedb/cgi-bin/user_shinsai_search.cgi">河北新報</a>
<p><a href="http://flat.kahoku.co.jp/sub/volunteer/">ボランティア情報 　絆　3.11大震災</a></p>
<p>「ふらっと」は、河北新報社によって運営されている実験的取り組みの一つであるブログで、市民参加型の地域ソーシャル・ネットワーキング・サービスとして３月１１日以前から既に開設されていました。震災後は、多様なボランティア団体からの支援がこのブログを強力に後押しし、震災関連情報に特化した「絆」と呼ばれるサブカテゴリーを生み出しました。その一方で同社の「３．１１大震災　将来への記憶」は、同じように一般の方からの投稿を中心として、写真や動画の保存を進めています。</p>
<br />
<h3><a href="http://www.japanfocus.org/">アジア太平洋ジャーナル：ジャパン・フォーカス</a></h3>
<p>アジア太平洋ジャーナルは、日本や太平洋地域に影響を与える諸問題についての掘り下げた論文を幅広く提供する雑誌です。震災後は特に地震、津波、とりわけ福島の原発事故に関わる英語で書かれた論文を精力的に掲載しています。</p>
<br />
<h3><a href="http://www.japanfocus.org/">アサヒ・ジャパン・ウォッチ　3/11 Disaster in Japan</a></h3>
<p>朝日新聞は日本における主要な新聞の一つであり、記事、写真、豊富なインタラクティブ・グラフィックスを含めた震災とその後に関する報道記事を、総合的な資料として発信しています。</p>
<br />
<h3><a href="http://savemlak.jp/wiki/saveMLAK">save MLAK</a></h3>
<p>博物館・美術館（Museum）、図書館（Library）、文書館（Archives）、公民館（Kominkan） の関係者及び支援者によるサポートネットワークであるsaveMLAKは、東日本大震災によって被災した施設や人々が、 どのような被害を受けているのかという被災情報、どのような支援を必要としているのかという救援情報を共有し、施設の復旧や展示物の修復に向けて協力できる専門の知識や技能を持ったボランティアの派遣など、必要と思われることを提供しています。2011年東日本大震災デジタルアーカイブの収集・保存活動に対しても、被災した諸機関のウェブサイトについての情報を多数提供して下さっています。</p>
<br />
<h3><a href="http://archive.shinsai.yahoo.co.jp/">Yahoo 写真保存プロジェクト</a></h3>
<p>このウェブサイトはYahoo! JAPANによるもので、東日本大震災の被災地の姿や思い出の品物の写真などを保存していくプロジェクトです。様々な方法での検索が簡単に行え、キーワード、位置情報（経度・緯度など）、撮影時期（震災前、震災後）、種類、都道府県、そして市町村などの条件により写真を探すことができます。APIプラットフォームへの公開アクセスが先頃発表され、社会に開かれたオープン・アクセスに向けたより幅広い協力を得ながらの写真アーカイブへとつながることでしょう。</p>
<br />
<h3><a href="http://www.miraikioku.com/">Google 写真保存プロジェクト：未来へのキオク</a></h3>
<p>Google による「未来へのキオク」は、写真・動画共有サービスPicasaやYouTubeを用い、震災で失われた美しい風景や、懐かしい景色、また、写真・動画などの思い出を、個人の思いや願いが込められた募集テーマごとに投稿者からアップロードして頂き、それらを表示・公開するプロジェクトです。被災前の町の風景や震災後の被災地の現在の様子を比較できるのが特徴です。</p>
<br />
<h3><a href="http://jsis-bjk.cocolog-nifty.com/omoide/online_album.html">思い出サルベージアルバム・オンライン</a></h3>
<p>日本社会情報学会 日本社会情報学会災害支援チーム</p>
<p>日本社会情報学会が進める写真修復保存プロジェクトは、被災地で泥水にさらされた写真を集め、洗浄・複写・保存し、持ち主の手元に戻す過程のすべてを支援しています。過疎化が進み、情報技術の基盤も十分とは言えない宮城県山元町に支援地を絞り、次代へと伝えるべく地域の復興過程の記録にも取り組んでいます。</p>
<br />                                                
<h3><a href="http://savethememory.jp/">セーブ・ザ・メモリープロジェクト</a></h3>
<p>セーブ・ザ・メモリープロジェクトは、「心の震災復興事業」として、リコージャパンや富士通などの写真関連企業により進められる写真のデジタル修復保存プロジェクトです。</p>
<br />   
<h3><a href="http://globalvoicesonline.org/specialcoverage/japan-earthquake-tsunami-2011/">東日本大震災（2011/03）</a></h3>
<p>グローバル・ボイス</p>     
<p>グローバル・ボイスは国際的なボランティア・ネットワークとして、2011年東日本大震災に関する世界中の市民の声をオンライン上で取り上げています。それらの声は、ブログ、ポッドキャスト、写真共有サイト、そしてビデオブログなどの多様なメディアを通じて、草の根の視点から集められています。</p>
<br />       
<h3><a href="http://sendai.hypercities.com/">HyperCities Sendai (Voices from Sendai through Social Media) HyperCities</a></h3>
<p>Google MapsとGoogle EarthのAPIを利用して作られた同ウェブサイトは、地図情報プラットフォーム上にツイッターの呟きを重ねる双方向のハイパーメディア環境を特徴とするデジタル情報システムで、大震災直後からテキストメッセージを地図情報と共に随時発信しています。</p>
<br />                                            
<h3><a href="http://tsunami-memorial.org/">津波祈念資料館</a></h3>
<p>特定非営利活動法人 地球のステージ （代表理事　精神科医 桑山紀彦氏） による災害の映像や物語のアーカイブプロジェクトです。大震災で受けた心の傷やPTSD（心的外傷後ストレス障害）の予防やその回復のための支援として、災害の映像や物語を共有できる環境をつくり、大切な「記憶」を次の世代に伝えていくことを目指しています。</p>
<br />     
<h3><a href="http://ajw.asahi.com/category/0311disaster/">3/11 Disaster in Japan - Asahi Japan Watch (朝日新聞　デジタル英語版)</a></h3>
<p>朝日新聞のデジタル英語版Asahi Japan Watch は、東日本大震災に関するインターネット情報を総合的に公開しています。特に今なお収束していない第一福島原子力発電所に関する調査報道や読み応えのある記事は、地図情報、画像、図表などを交えながら背後で一体何が起きているのかに迫っています。</p>
<br />
</div>


<?php //elseif ($language == 'ko'): ?>


<?php //elseif ($language == 'zh'): ?>

<?php else: ?>

<h5><a href="../seeds/?la=en">Search the Web Archive</a></h5>

<p>With this preliminary tool, you can <a href="../seeds/?la=en">search</a> the collection of harvested websites and the information about each site we have collected, including the page title, description, and associated keyword tags. From there you can go to the live version of that website online or the archived copies at the Internet Archive.</p>

<p class ="learn"><strong><a href="../contribute/?la=en">Contribute</a></strong> - Have you found websites related to the disasters that you think should be archived? Consider submitting them through our <a href="../contribute/?la=en">form</a>.</p>

<h5><a href="../featured/">Read our Featured Testimonials</a></h5>

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
        <h3><a href="http://www.dcrc.tohoku.ac.jp/archive/">Digital Archive on Earthquakes in Tohoku</a></h3>
        <p>Graduate School of Engineering, Tohoku University Disaster Control Research Center</p>
        <p>As a leading national university in the region, Tohoku University recently launched a digital archiving project on the Eastern Japan Great Earthquake Disaster. Collaborating with the government, industry, and academia, the project aims to build a comprehensive archive on disasters in the region, with a broad spectrum of memory, records, case studies. It aims to record the recovery and rebuilding process of the disaster and to disseminate information a near real time basis. As of this writing, detail of the project is unknown since this archiving project has been recently released.</p>
<br />
      <h3><a href="http://warp.ndl.go.jp/WARP_disaster.html">Web Archiving of Local Governments’ Websites in Disaster Areas (part of WARP [Web Archiving Project]</a></h3>
          <p>The National Diet Library, JAPAN</p>
          <p>As the only national library in Japan, the National Diet Library (NDL) can harvest and archive a wide array of government websites, including the websites of local governments affected by the disasters in Eastern Japan, and other digital materials without permission under the current NDL Law in order to preserve records and cultural heritage of the experience of the massive Eastern Japan Great Earthquake Disaster to pass on to the future generations. The NDL is also collaborates with Internet Archive, a non-profit organization on digital library, and Edwin O. Reischauer Institute at Harvard University.</p>
<br />
      <h3><a href="http://recorder311.smt.jp/">To Not Forget March 11th</a></h3>
          <p>Sendai Mediatheque</p>
          <p>In view of the new belief that disaster relief effort can be supported by information dissemination and that records of the disaster can be priceless assets for the future, Sendai Mediatheque (SMT), one of the cutting-edge information centers in Japan, is leading a unique disaster recovery archiving project. In collaboration with citizens, experts, and SMT staff, this archive project focuses on recording the recovery and rebuilding process from the disaster while disseminating thoughts and information through various media, such as images, photos, sounds, and texts. </p>
<br />
      <h3><a href="http://311archives.jp/">All 311 Comprehensive Archiving Project</a></h3>
          <p>National Research Institute for Earth Science and Disaster Prevention [NIED]</p>
          <p>Collaborating with citizens and local governments affected by the disaster as well as research institutions, universities, NPOs, volunteers, and commercial companies, 311 Marugoto Archive offers an e-community platform to support disaster recovery and rebuilding efforts. The project aims to restore and regenerate a memory of the lost past by offering digitization of memory while recording the recovery process and valuable information resources produced in the process for future disaster education, disaster prevention and research as a whole.</p>
<br />
      <h3><a href="http://jyoho.kahoku.co.jp/imagedb/cgi-bin/user_shinsai_search.cgi">3.11 The Great Earthquake: Memory for Future</a></h3>  
      <p>A volunteer base <a href="http://flat.kahoku.co.jp/sub/volunteer/">blog site</a> at Kahoku, called “furatto” (ふらっと), is viewed as experimental citizen’s media and has been in practice since before March 11th. After this disaster, strong supporters in various volunteer groups enhanced the blog site, eventually creating a subcategory site called “kizuna” (絆) which particularly focuses on disaster related information. Whereas, Kahoku’s “3.11 The Great Earthquake: Memory for Future,“ which is also on a volunteer basis, focuses on images and video.</p>
<br />
      <h3><a href="http://www.japanfocus.org/">The Asia-Pacific Journal: Japan Focus</a></h3>
      <p>The Asia-Pacific Journal, which provides a range of in-depth articles on issues affecting Japan and the entire region has been especially active in the aftermath of the disasters in posting articles in the English language related to the earthquake, tsunami, and especially the nuclear disaster in Fukushima.</p>
 <br />
      <h3><a href="http://www.japanfocus.org/">Asahi Japan Watch - 3/11 Disaster in Japan</a></h3>
      <p>Asahi, one of Japan’s leading newspapers, has created a comprehensive resource for news coverage about the disasters going back to March 11th, including articles, photographs, and rich interactive graphics.</p>
<br />
      <h3><a href="http://savemlak.jp/wiki/saveMLAK">save MLAK (Save Museum, Library, Archives, and Kominkan)</a></h3>
      <p>The saveMLAK is a project led by the staff and supporters of museums, libraries, archives, and community centers (kōminkan) in Japan. The project is collecting information on the harm to people and damage to facilities caused by the Eastern Japan Great Earthquake Disaster as well as identifying their needs in the relief effort. The saveMLAK project works to provide the people and institutions affected by the disaster with whatever assistance that project members in the museum, library, archive, and the kōminkan community can provide. The project is contributing information about the many websites of affected institutions to the Digital Archive of Japan's 2011 Disasters for our web archiving efforts.</p>
<br />
      <h3><a href="http://archive.shinsai.yahoo.co.jp/">Yahoo Photo Archiving Project on the Japanese Earthquake and Tsunami March 11th 2011</a></h3>
          <p>This site is a damaged photo recovery project by Yahoo! JAPAN. Easy to use various ways of search, one can search by keywords, geographical points (e.g., latitude, longitude), time period (pre-disaster, post-disaster), type, prefecture, and community. Yahoo’s recent release on their free-of-charge API platform to access <a href="http://archive.shinsai.yahoo.co.jp/">Yahoo Photo Archiving Project on the Japanese Earthquake and Tsunami March 11th 2011</a> may lead to a more collaborated image archive development for open access to society.</p>
<br />
      <h3><a href="http://www.miraikioku.com/">Google Photo Archiving Project: Memory for Future</a></h3>
      <p>The Memory for Future by Google provides opportunities to share and embed personal photographs in order to recover lost memorable landscape, scenes considered sweetly familiar, as well as photos and videos/movies, contributed by people through Picasa and YouTube applications in accordance to posted themes.  Differentiating images taken in the pre-disaster from the post-disaster, one can compare the two.</p>
<br />
      <h3><a href="http://jsis-bjk.cocolog-nifty.com/omoide/online_album.html">Memory Salvage  Album Online</a></h3>
          <p>The Japan Society for Socio-Information Studies-BJK</p>
          <p>Photo recovery project led by the Japan Society for Socio-Information Studies supports the entire process of collecting damaged photos from the disaster areas, which includes washing and cleaning, digitizing, archiving, and returning the photos to the original owner. With exclusive focus on a rural and deserted community insufficient of IT infrastructure in Yamamoto-cho, Miyagi Prefecture, the project also records the recovery process of the community to pass on to the next generation.</p>
<br />                                                
      <h3><a href="http://savethememory.jp/">Save the Memory Project</a></h3>
      <p>This photo recovery project is organized by another photo industry, such as Ricoh Japan and Fujitsu, and supports disaster survivors’ mental health.</p>
<br />   
      <h3><a href="http://globalvoicesonline.org/specialcoverage/japan-earthquake-tsunami-2011/">Global Voices: Japan Earthquake 2011</a></h3>
        <p>CSR Conversations for a Better World</p>     
        <p>An international, volunteer-led Global Voices Online focusing on Japan Earthquake 2011 offers citizens’ voices found in various media, such as blogs, podcasts, photo sharing sites, and videoblogs, with a grass-room perspective from around the world.</p>
<br />       
      <h3><a href="http://sendai.hypercities.com/">HyperCities Sendai (Voices from Sendai through Social Media) HyperCities</a></h3>
        <p>Built on the Google Maps and Google Earth APIs, HyperCities Sendai provides active digital media space with Twitters and has accumulated interactive communications on the Eastern Japan Great Earthquake Disaster along with geographical data.</p>
<br />                                            
      <h3><a href="http://tsunami-memorial.org/">Tsunami Memorial Theater and Library</a></h3>
        <p>Led by a psychiatrist, a volunteer base Tsunami Memorial Theater and Library supports recovery process for those suffering from PTSD by the Eastern Japan Great Earthquake Disaster. Creating a virtual space for images and stories sharable with patients and disaster victims, the project hopes to pass the priceless memory to the next generations.</p>
<br />     
      <h3><a href="http://ajw.asahi.com/category/0311disaster/">3/11 Disaster in Japan - Asahi Japan Watch (The Asahi Shimbun)</a></h3>
        <p>This special website by Asahi Japan Watch (AJW), new English-language digital version of the Asahi Shimbun, provides readers with the Internet's comprehensive, archival coverage of the Japan’s Great Earthquake on March 11th, 2011. Particularly useful for in-depth coverage on the ongoing nuclear crisis at the Fukushima No.1 nuclear power plant along with real stories behind what is happening there as well as geographical data, images, and graphics.</p>
<br />
                                                                                                                             
</div>
 <?php endif ?>

<?php
  
  stop('9');

