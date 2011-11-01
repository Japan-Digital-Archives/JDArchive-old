<?php
  
  require_once(dirname(__FILE__). '/inc/common.php');
  
  $language = language();
  
  start('_newabout');
  
  ?>


<div>
<?php language_bar($language, array('en', 'ja', 'ko')); ?>
<div><h2 data-jp="" data-ko="">Explore the Archive Now</h2></div>
</div>

<?php if ($language == 'ja'): ?>

<h5><a href="../seeds/">Search the Web Archive</a></h5>

<p>While our full interface is being developed you may search the collection of harvested websites and the information about each site we have collected here, including the page title, description, and associated keyword tags. From there you can go to the live version of that website online or the archived copies at the Internet Archive.</p>

<h5><a href="../contribute/">Contribute</a></h5>

<p>Have you found websites related to the disasters that you think should be archived? Consider submitting them through our form or using our bookmarklet: <a class="bookmarklet" href="javascript:q=location.href;if(document.getSelection){d=document.getSelection();}else{d='';};p=document.title;void(open('http://jedarchive.org/bookmarklet?internal=true&url='+encodeURIComponent(q)+'&description='+encodeURIComponent(d)+'&title='+encodeURIComponent(p),'Pinboard',%20'toolbar=no,width=660,height=450'));">JDArchive</a></p>

<h5><a href="../featured/">Read our Featured Testimonials</a></h5>

<p>Visit our featured testimonial page to read some of the contributions to the testimonial collection so far. We will be adding the ability to search all testimonials soon and they will also be fully integrated in the final interface.</p>

<h5><a href="http://worldmap.harvard.edu/japanmap/">Browse our Map Layers</a></h5>

<p>Together with the Center for Geographic Analysis we are preparing a growing number of rich map layers that can allow anyone to browse some of the many rich data sets that have been shared with the Japan Sendai Earthquake Data Portal, often available only thanks to the hard work of volunteer organizations, or by institutions who graciously shared their data in the aftermath of the disaster.</p>

<div id = "learn">
<p><strong><a href="../maps/">Learn More</a></strong>－ Read more about the layers, their sources, and find links to download the data.</p>
</div>
<hr />
<p>Below is a list of some of the other leading projects engaged in archiving of the disasters, many of whom are close partners working with us in building a content rich archival platform.</p>
<br />
<div id = "projects">
<h3><a href="http://www.dcrc.tohoku.ac.jp/archive/">みちのく震録伝</a></h3>
<p>東北大学 防災科学研究拠点 東北大学大学院工学研究科附属災害制御研究センター</p>
<p>As a leading national university in the region, Tohoku University recently launched a digital archiving project on the Eastern Japan Great Earthquake Disaster. Collaborating with the government, industry, and academia, the project aims to build a comprehensive archive on disasters in the region, with a broad spectrum of memory, records, case studies. It aims to record the recovery and rebuilding process of the disaster and to disseminate information a near real time basis. As of this writing, detail of the project is unknown since this archiving project has been recently released.</p>
<br />
<h3><a href="http://warp.ndl.go.jp/WARP_disaster.html">政府官公庁および被災地域の自治体を中心とするウェブサイトの保存</a></h3>
<p>国立国会図書館</p>
<p>As the only national library in Japan, the National Diet Library (NDL) can harvest and archive a wide array of government websites, including the websites of local governments affected by the disasters in Eastern Japan, and other digital materials without permission under the current NDL Law in order to preserve records and cultural heritage of the experience of the massive Eastern Japan Great Earthquake Disaster to pass on to the future generations. The NDL is also collaborates with Internet Archive, a non-profit organization on digital library, and Edwin O. Reischauer Institute at Harvard University.</p>
<br />
<h3><a href="http://www.smt.city.sendai.jp/en/">3がつ11にちをわすれないために</a></h3>
<p>せんだいメディアテーク</p>
<p>In view of the new belief that disaster relief effort can be supported by information dissemination and that records of the disaster can be priceless assets for the future, Sendai Mediatheque (SMT), one of the cutting-edge information centers in Japan, is leading a unique disaster recovery archiving project. In collaboration with citizens, experts, and SMT staff, this archive project focuses on recording the recovery and rebuilding process from the disaster while disseminating thoughts and information through various media, such as images, photos, sounds, and texts. </p>
<br />
<h3><a href="http://311archives.jp/">東日本大震災・災害復興まるごとデジタルアーカイブス</a></h3>
<p>独立行政法人 防災科学技術研究所</p>
<p>Collaborating with citizens and local governments affected by the disaster as well as research institutions, universities, NPOs, volunteers, and commercial companies, 311 Marugoto Archive offers an e-community platform to support disaster recovery and rebuilding efforts. The project aims to restore and regenerate a memory of the lost past by offering digitization of memory while recording the recovery process and valuable information resources produced in the process for future disaster education, disaster prevention and research as a whole.</p>
<br />
<h3>3.11将来への記憶</h3>
<a href="http://jyoho.kahoku.co.jp/imagedb/cgi-bin/user_shinsai_search.cgi">河北新報</a>
<p><a href="http://flat.kahoku.co.jp/sub/volunteer/">ボランティア情報 　絆　3.11大震災</a></p>
<p>A volunteer base blog site at Kahoku, called “furatto” (ふらっと), is viewed as experimental citizen’s media and has been in practice since before March 11th. After this disaster, strong supporters in various volunteer groups enhanced the blog site, eventually creating a subcategory site called “kizuna” (絆) which particularly focuses on disaster related information. Whereas, Kahoku’s “3.11 The Great Earthquake: Memory for Future (311 大震災　将来への記憶), which is also on a volunteer basis, focuses on images and video.</p>
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
<h3><a href="http://archive.shinsai.yahoo.co.jp/">Yahoo 写真保存プロジェクト</a></h3>
<p>This site is a damaged photo recovery project by Yahoo! JAPAN. Easy to use various ways of search, one can search by keywords, geographical points (e.g., latitude, longitude), time period (pre-disaster, post-disaster), type, prefecture, and community. Yahoo’s recent release on their free-of-charge API platform to access <a href="http://archive.shinsai.yahoo.co.jp/">Yahoo Photo Archiving Project on the Japanese Earthquake and Tsunami March 11th 2011 (Yahoo 写真保存プロジェクト)</a> may lead to a more collaborated image archive development for open access to society.</p>
<br />
<h3><a href="http://www.miraikioku.com/">Google 写真保存プロジェクト：未来へのキオク</a></h3>
<p>The Memory for Future by Google provides opportunities to share and embed personal photographs in order to recover lost memorable landscape, scenes considered sweetly familiar, as well as photos and videos/movies, contributed by people through Picasa and YouTube applications in accordance to posted themes.  Differentiating images taken in the pre-disaster from the post-disaster, one can compare the two.</p>
<br />
<h3><a href="http://jsis-bjk.cocolog-nifty.com/omoide/online_album.html">思い出サルベージアルバム・オンライン</a></h3>
<p>日本社会情報学会 日本社会情報学会災害支援チーム</p>
<p>Photo recovery project led by the Japan Society for Socio-Information Studies supports the entire process of collecting damaged photos from the disaster areas, which includes washing and cleaning, digitizing, archiving, and returning the photos to the original owner. With exclusive focus on a rural and deserted community insufficient of IT infrastructure in Yamamoto-cho, Miyagi Prefecture, the project also records the recovery process of the community to pass on to the next generation.</p>
<br />                                                
<h3><a href="http://savethememory.jp/">セーブ・ザ・メモリープロジェクト</a></h3>
<p>This photo recovery project is organized by another photo industry, such as Ricoh Japan and Fujitsu, and supports disaster survivors’ mental health.</p>
<br />   
<h3><a href="http://globalvoicesonline.org/specialcoverage/japan-earthquake-tsunami-2011/">東日本大震災（2011/03）</a></h3>
<p>CSR Conversations for a Better World</p>     
<p>An international, volunteer-led Global Voices Online focusing on Japan Earthquake 2011 offers citizens’ voices found in various media, such as blogs, podcasts, photo sharing sites, and videoblogs, with a grass-room perspective from around the world.</p>
<br />       
<h3><a href="http://sendai.hypercities.com/">HyperCities Sendai (Voices from Sendai through Social Media) HyperCities</a></h3>
<p>Built on the Google Maps and Google Earth APIs, HyperCities Sendai provides active digital media space with Twitters and has accumulated interactive communications on the Eastern Japan Great Earthquake Disaster along with geographical data.</p>
<br />                                            
<h3><a href="http://tsunami-memorial.org/">津波祈念資料館</a></h3>
<p>Led by a psychiatrist, a volunteer base Tsunami Memorial Theater and Library supports recovery process for those suffering from PTSD by the Eastern Japan Great Earthquake Disaster. Creating a virtual space for images and stories sharable with patients and disaster victims, the project hopes to pass the priceless memory to the next generations.</p>
<br />     
<h3><a href="http://ajw.asahi.com/category/0311disaster/">3/11 Disaster in Japan - Asahi Japan Watch (The Asahi Shimbun)</a></h3>
<p>This special website by Asahi Japan Watch (AJW), new English-language digital version of the Asahi Shimbun, provides readers with the Internet's comprehensive, archival coverage of the Japan’s Great Earthquake on March 11th, 2011. Particularly useful for in-depth coverage on the ongoing nuclear crisis at the Fukushima No.1 nuclear power plant along with real stories behind what is happening there as well as geographical data, images, and graphics.</p>
<br />
</div>


<?php elseif ($language == 'ko'): ?>

<p>TODO</p>

<?php elseif ($language == 'zh'): ?>

<?php else: ?>

<h5><a href="../seeds/">Search the Web Archive</a></h5>

<p>While our full interface is being developed you may <a href="../seeds/">search</a> the collection of harvested websites and the information about each site we have collected here, including the page title, description, and associated keyword tags. From there you can go to the live version of that website online or the archived copies at the Internet Archive.</p>

<p class ="learn"><strong><a href="../contribute/">Contribute</a></strong> - Have you found websites related to the disasters that you think should be archived? Consider submitting them through our <a href="../contribute/">form</a> or using our bookmarklet: <a class="bookmarklet" href="javascript:q=location.href;if(document.getSelection){d=document.getSelection();}else{d='';};p=document.title;void(open('http://jedarchive.org/bookmarklet?internal=true&url='+encodeURIComponent(q)+'&description='+encodeURIComponent(d)+'&title='+encodeURIComponent(p),'Pinboard',%20'toolbar=no,width=660,height=450'));">JDArchive</a></p>

<h5><a href="../featured/">Read our Featured Testimonials</a></h5>

<p>Visit our featured testimonial page to read some of the contributions to the testimonial collection so far. We will be adding the ability to search all testimonials soon and they will also be fully integrated in the final interface.</p>

<p class ="learn"><strong><a href="../testimonial/">Contribute</a></strong> - Would you like to share your story of the earthquake and tsunami? We hope to collect as many personal stories of the events on and after March 11, 2011 in Japan as possible.</p>

<h5><a href="http://worldmap.harvard.edu/japanmap/">Browse our Map Layers</a></h5>

<p>Together with the Center for Geographic Analysis we are preparing a growing number of rich map layers that can allow anyone to browse some of the many rich data sets that have been shared with the Japan Sendai Earthquake Data Portal, often available only thanks to the hard work of volunteer organizations, or by institutions who graciously shared their data in the aftermath of the disaster.</p>

<p class="learn"><strong><a href="../maps/">Learn More</a></strong> － Read more about the layers, their sources, and find links to download the data.</p>
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
      <h3><a href="http://www.smt.city.sendai.jp/en/">To Not Forget March 11th</a></h3>
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
                                                                                                                             
<p><a href="../otherprojects/">Other Projects</a></p>                                                                                                                             
</div>
 <?php endif ?>

<?php
  
  stop('9');

