<?php
  header("Cache-Control: must-revalidate, max-age=600");
  header("Vary: Accept-Encoding");
  require_once(dirname(__FILE__). '/inc/common.php');
  
  $language = language();
  
  start();
  
  ?>



<div>
<?php language_bar($language, array('en', 'ja')); ?>
<div><h2 data-jp="地理空間情報" data-ko="">Maps</h2></div>
</div>

<?php $language = language(); ?>
            
<?php if ($language == 'ja'): ?>

<p>震災関連のレイヤー情報とリンクのダウンロード</p>

<div class="toc">
<h3 id="0">公益事業施設、インフラストラクチャー</h3>
<br />
<p><a id="1" href="http://worldmap.harvard.edu/maps/japanmap/02">原子力発電所</a></p>
<ul>
	<li>原子力発電所の位置</li>
	<li>出典: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">国土交通省</a></li>
<li><a href="http://worldmap.harvard.edu/data/geonode:jpn_NuclearPP_UTM54N_M1z">データをダウンロードする</a></li>
</ul>

<p><a id="2" href="http://worldmap.harvard.edu/maps/japanmap/06">再生可能エネルギー発電所</a></p>
 <ul>
 	<li>再生可能エネルギー発電所の位置</li>
	<li>出典: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">国土交通省</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:jpn_RenewablePP_UTF_ULJ">データをダウンロードする</a></li>
</ul>

<p><a id="3" href="http://worldmap.harvard.edu/maps/japanmap/07">火力発電所</a>
	<ul>
		<li>火力発電所の位置</li>
		<li>出典: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">国土交通省</a></li>
		<li><a href="http://worldmap.harvard.edu/data/geonode:jpn_ThermalPP_UTF_n4w">データをダウンロードする</a></li>
</ul>

 <p><a id="4" href="http://worldmap.harvard.edu/maps/japanmap/08">病院</a></p>
<ul><li>病院の位置</li>
	<li>出典: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">国土交通省</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:Hospitals_Qzn">データをダウンロードする</a></li>
</ul>

<p><a id="5" href="http://worldmap.harvard.edu/maps/japanmap/09">消防署</a></p>
	<ul>
	<li>消防署の位置</li>
	<li>出典: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">国土交通省</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:Fire_Stations_UTF_aQC">データをダウンロードする</a></li>
</ul>

<p><a id="6" href="http://worldmap.harvard.edu/maps/japanmap/1A">警察署</a></p>
<ul>
	<li>警察機関（交番以外）の位置</li>
	<li>出典: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">国土交通省</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:Police_station_UTF_SXV">データをダウンロードする</a></li>
</ul>

<p><a id="7" href="http://worldmap.harvard.edu/maps/japanmap/1B">地方公共団体</a></p>
<ul>
<li>地方公共団体の位置</li>
<li>出典: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">国土交通省</a></li>
<li><a href="http://worldmap.harvard.edu/data/geonode:Municipal_Offices_OT8">データをダウンロードする</a></li>
</ul>

<p><a id="8" href="http://worldmap.harvard.edu/maps/japanmap/1C">学校</a></p>
<ul>
	<li>学校の位置</li>
	<li>出典: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">国土交通省</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:jpn_Schools_efB">データをダウンロードする</a></li>
</ul>

<p><a id="9" href="http://worldmap.harvard.edu/maps/japanmap/1U">港湾</a></p>
<ul>
<li>港湾の位置</li>
<li>出典: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">国土交通省</a></li>
<li><a href="http://worldmap.harvard.edu/data/geonode:jpn_Ports_UTM54N_ZAc">データをダウンロードする</a></li>
</ul>

<p><a id="10" href="http://worldmap.harvard.edu/maps/japanmap/1V">交番</a></p>
<ul>
<li>交番の位置</li>
<li>出典: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">国土交通省</a></li>
<li><a href="http://worldmap.harvard.edu/data/geonode:Police_Box_UTF_nzZ">データをダウンロードする</a></li>  
</ul>

<p><a id="11" href="http://worldmap.harvard.edu/maps/japanmap/1W">漁港</a></p>
<ul>
<li>漁港の位置</li>
<li>出典: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">国土交通省</a></li>
<li><a href="http://worldmap.harvard.edu/data/geonode:jpn_FishPort_UTM54N_Mna">データをダウンロードする</a></li>
</ul>

<br />
<h3 id="12">位置情報</h3>
<br />
<p><a id="13" href="http://worldmap.harvard.edu/maps/japanmap/48">国指定文化財（宗教建造物）</a></p>
<ul>
<li>国指定文化財（国宝・重要・登録有形）建造物の位置</li>
<li>出典: <a href="http://www.bunka.go.jp/bsys/">文化庁</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:RegReli_UTM54N_eNl">データをダウンロードする:</a></li>
</ul>

<br />
<h3 id="14">河川、湖沼</h3>
<br />
<p><a id="15" href="http://worldmap.harvard.edu/maps/japanmap/49">湖沼</a></p>
<ul>
<li>湖沼の位置</li>
<li>出典: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">国土交通省</a></li>
<li><a href="http://worldmap.harvard.edu/data/geonode:jpn_Lakes_UTM54N_F6L">データをダウンロードする:</a></li>
</ul>

<br />
<h3 id="16">画像、基本図</h3>
<br />
<p><a id="17" href="http://worldmap.harvard.edu/maps/japanmap/BAh">陸前高田の津波の前と後の衛星画像</a></p>
<ul>
<li>津波前（2007年3月１日）と後（2011年3月14日）の陸前高田を撮影した衛星画像</li>
<li>出典: <a href="http://earthobservatory.nasa.gov/IOTD/view.php?id=49684">アメリカ国際宇宙局（NASA)</a></li>
<li>データをダウンロードする: <a href="http://warp.worldmap.harvard.edu/maps/59#Export_tab">津波前</a>, <a href="http://warp.worldmap.harvard.edu/maps/60#Export_tab">津波後</a></li>
</ul>

<p><a id="18" href="http://worldmap.harvard.edu/maps/japanmap/5B">1978年 東北地方南東部地勢図</a></p>
<ul>
	<li>1978年東北南東部の２万５千分１地勢図のモザイク表示</li>
	<li>出典: <a href="http://www.gsi.go.jp/ENGLISH/index.html">国土地理院</a></li>
	<li><a href="http://warp.worldmap.harvard.edu/maps/94#Export_tab">データをダウンロードする</a></li>
</ul>
<br />
<h3 id="19">2011年東日本大震災</h3>
<br />
<p><a id="20" href="http://worldmap.harvard.edu/maps/japanmap/BAg">宮城・福島　津波浸水地域</a></p>
<ul> 
	<li>宮城県と福島県海岸の津波浸水地帯。Radarsat-2 とTerraSAR-X衛生写真による津波後（2011年3月12日）の溜り水の分析から構築。</li>
	<li>出典:
		<ul><li><a href="http://www.unitar.org/unosat/node/44/1549">United Nations Institute for Training and Research Operational Satellite Applications Programme (UNITAR/UNOSAT)</a></li>
	<li><a href="http://www.zki.dlr.de/map/1950">German Aerospace Center (DLR)</a></li></ul></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:UNOSAT_Tsunami_StandingWater_xkn">データをダウンロードする</a></li>
<a href="http://worldmap.harvard.edu/data/geonode:DLR_20110316_japan_earthquake_floodmask_tsx_20110312_utm54n_cRL"></a></li>
</ul>
<p><a id="21" href="http://worldmap.harvard.edu/maps/japanmap/7P">死人数（2011年3月18日、4月9日、7月25日）</a></p>
<ul>
	<li>2011年東日本大震災による死人数</li>
	<li>出典: <a href="http://earthquake-report.com/2011/05/25/japan-tsunami-a-massive-update-for-our-catdat-situation-report-part-15/">Earthquake Report by CATDAT: The Integrated Historical Global Catastrophe Database</a></li>
	<li>データをダウンロードする: <a href="http://worldmap.harvard.edu/data/geonode:CasualtyRpt3Join_g37">3月18日</a>, <a href="http://worldmap.harvard.edu/data/geonode:CasualtyRpt19JoinFinal_TK0">4月9日</a>, <a href="http://worldmap.harvard.edu/data/geonode:Slct_Casualty2010Join1_Final_zDe">7月25日</a></li>
</ul>
<p><a id="22" href="http://worldmap.harvard.edu/maps/japanmap/7R">避難者数（3月18日、4月9日、7月25日）</a></p>
<ul>
	<li>東北地方太平洋沖地震による津波からの避難者数</li>
	<li>出典: <a href="http://earthquake-report.com/2011/05/25/japan-tsunami-a-massive-update-for-our-catdat-situation-report-part-15/">Earthquake Report by CATDAT: The Integrated Historical Global Catastrophe Database</a></li>
	<li>データをダウンロードする: <a href="http://worldmap.harvard.edu/data/geonode:CasualtyRpt3Join_3Y4">3月18日</a>, <a href="http://worldmap.harvard.edu/data/geonode:CasualtyRpt19EditFinal_G3d">4月9日</a>, <a href="http://worldmap.harvard.edu/data/geonode:Slct_Casualty2010Join1_Final_O4M">7月25日</a></li>
</ul>
<p><a id="23" href="http://worldmap.harvard.edu/maps/japanmap/7U">避難所</a></p>
<ul>
	<li>Googleによる2011年8月15日現在の避難所の所在地と避難者数</li>
	<li>出典: <a href="http://shelter-info.appspot.com/maps">Google　避難所情報</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:CoordShelters_SJ_0tf">データをダウンロードする</a></li>
</ul>
<p><a id="24" href="http://worldmap.harvard.edu/maps/japanmap/7W">停電地域の衛星写真（3月10日〜3月13日、3月16日）</a></p>
<ul>
	<li>2011年の震災後と2010年を比較して合成された衛星写真
	<ul>
	<li>黄色 - 2011年と2010年の両方で検出された光</li>
	<li>赤色 - 2011年震災後の停電地域</li>
	<li>青色 - 雲</li>
	<li>緑色 - 黄色がかった雲、または2010年には検出されなかった2011年の光</li>
	<li>赤紫 - 検出された光が雲に隠された地域</li>
	</ul></li>
	<li>出典: <a href="http://www.ngdc.noaa.gov/dmsp/data/web_data/japan/japan.html">アメリカ空軍気象衛星プログラム</a></li>
	<li>データをダウンロードする: <a href="http://worldmap.harvard.edu/data/geonode:F18201103100955.composite_Jyo">3月10日</a>, 
	<a href="http://worldmap.harvard.edu/data/geonode:F18201103110943.composite_VLS">3月11日</a>, 
	<a href="http://worldmap.harvard.edu/data/geonode:F18201103120930.composite_w3e">3月12日</a>,
	<a href="http://worldmap.harvard.edu/data/geonode:F18201103130918.composite_93x">3月13日</a>,
	<a href="http://worldmap.harvard.edu/data/geonode:F18201103161023.composite_HAV">3月16日</a></li>
</ul>
<br />
<h3 id="25">放射能</h3>
<br />
<p><a id="26" href="http://worldmap.harvard.edu/maps/japanmap/BAk">緊急時迅速放射能影響予測ネットワークシステム（SPEEDI）等による計算結果</a></p> 
<ul>
	<li>文部科学省SPEEDIにより計算された、2月28日、3月10日・15日・16日における最大空間放射線量率（nGy/hr)</li>
	<li>出典: <a href="http://www.sendung.de/japan-radiation-open-data/">Marian Steinbach</a></li> 
	<li>データをダウンロードする:
		<a href="http://worldmap.harvard.edu/data/geonode:_joinMaxUTM54N_psW">2月28日</a>,
		<a href="http://worldmap.harvard.edu/data/geonode:_JoinMaxUTM54N_khO">3月10日</a>,
		<a href="http://worldmap.harvard.edu/data/geonode:_JoinMaxUTM54N_nRb">3月15日</a>,
		<a href="http://worldmap.harvard.edu/data/geonode:_JoinMaxUTM54N_gW7">3月16日</a>
	</li>
</ul>
<p><a id="27" href="http://worldmap.harvard.edu/maps/japanmap/BAm">放射能汚染ルート</a></p> 
<ul>
	<li>早川由起夫群馬大学教授による放射能汚染ルート</li>
	<li>出典: <a href="http://kipuka.blog70.fc2.com/">早川由起夫教授ウェブサイト</a></li>
	<li><a href="http://warp.worldmap.harvard.edu/maps/221#Export_tab">データをダウンロードする</a></li>
</ul> 
<br />
<h3 id="28">地球科学</h3>
<br />
<p><a id="29" href="http://worldmap.harvard.edu/maps/japanmap/7d">3月11日震度分布図</a></p>
<ul>
	<li>アメリカ地質調査所による東北地方太平洋沖地震の震度分布図（マグニチュード9.0、発生日2011年3月11日、発生時刻14時46分18.1秒）</li>
	<li>出典: <a href="http://earthquake.usgs.gov/earthquakes/shakemap/global/shake/c0001xgp/">United States Geologic Survey (USGS)</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:InstruIntensity_Clip_dOd">データをダウンロードする</a></li>
</ul>
<p><a id="30" href="http://worldmap.harvard.edu/maps/japanmap/_u">今後30年間における震度6以上の地震発生確率</a></p> 
<ul>
	<li>•	防災科学技術研究所（J-SHIS)による、今後30年間における震度6弱以上の揺れに見舞われる確率確率論的地震動予測地図</li>
	<li>出典: <a href="http://www.j-shis.bosai.go.jp/download">防災科学技術研究所</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:_yr_65shinshp2_UTF_scD">データをダウンロードする</a></li>
</ul>
<p><a id="31" href="http://worldmap.harvard.edu/maps/japanmap/_w">マグニチュード5以上の地震</a></p>
<ul> 
	<li>アメリカ地質調査所による、3月10日から20日までに日本で生じた地震</li>
	<li>出典: <a href="http://earthquake.usgs.gov/earthquakes/eqarchives/epic/database.php">United States Geologic Survey (USGS)</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:__0320_UTM54N_TVM">データをダウンロードする</a></li>
</ul>
<br />
<h3 id="32">社会、人口統計</h3>
<br />
<p><a id="33" href="http://worldmap.harvard.edu/maps/japanmap/_x">65歳以上の人口割合</a></p> 
<ul>
	<li>2005年国勢調査による65歳以上人口の割合</li>
	<li>出典: <a href="http://www.e-stat.go.jp/SG1/estat/GL08020103.do?_toGL08020103_&tclassID=000001007609&cycleCode=0&requestSender=search">政府統計の総合窓口（ｅ－Ｓｔａｔ）</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:PopCensus2005_vpg">データをダウンロードする</a></li>
</ul>
<p><a id="34" href="http://worldmap.harvard.edu/maps/japanmap/_z">人口増減率</a></p>
<ul>
	<li>2005年国勢調査による2000−2005年の間の人口増減率</li>
	<li>出典: <a href="http://www.e-stat.go.jp/SG1/estat/GL08020103.do?_toGL08020103_&tclassID=000001007609&cycleCode=0&requestSender=search">政府統計の総合窓口（ｅ－Ｓｔａｔ）</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:PopCensus2005_YYw">データをダウンロードする</a></li>
</ul>
<p><a id="35" href="http://worldmap.harvard.edu/maps/japanmap/_0">人口密度</a></p> 
<ul>
	<li>1999年・2005年国勢調査による人口密度（人／平方km）</li>
	<li>出典: <a href="http://www.e-stat.go.jp/SG1/estat/GL08020103.do?_toGL08020103_&tclassID=000001007609&cycleCode=0&requestSender=search">政府統計の総合窓口（ｅ－Ｓｔａｔ）</a></li>
	<li>データをダウンロードする:
		<a href="http://worldmap.harvard.edu/data/geonode:jpn_Census95Final_UTF_obv">1999年</a>,
		<a href="http://worldmap.harvard.edu/data/geonode:PopCensus2005_kGk">2005年</a></li>
</ul>
<p><a id="36" href="http://worldmap.harvard.edu/maps/japanmap/_9 ">人口集中地区</a></p>
<ul>
	<li>人口集中地区</li>
	<li>出典: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">国土交通省</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:jpn_DenseInhab_UTM54N_wNg">データをダウンロードする</a></li>
</ul>
<p><a id="37" href="http://worldmap.harvard.edu/maps/japanmap/BAA">世界の都市</a></p>
<ul>
	<li>世界の都市（人口1,000万人以上の地域）</li>
	<li>出典: <a href="http://www.naturalearthdata.com/downloads/">Natural Earth</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:world_urban_areas_110_million_fSE">データをダウンロードする</a></li>
</ul>
<br />
<h3 id="38">経済活動、雇用</h3>
<br />
<p><a id="39" href="http://worldmap.harvard.edu/maps/japanmap/BAB">貨物地域流動量（金属・機械工業品）</a></p>
<ul>
	<li>宮城県、岩手県、福島県からの金属・機械工業品の輸送トン数</li>
	<li>出典: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">国土交通省</a></li>
	<li>データをダウンロードする: 
		<a href="http://worldmap.harvard.edu/data/geonode:Miyagi_Goods_NxA">宮城県</a>,
		<a href="http://worldmap.harvard.edu/data/geonode:Iwate_Goods_9Wu">岩手県</a>,
		<a href="http://worldmap.harvard.edu/data/geonode:Fukushima_Goods_dBY">福島県</a></li>
</ul>
<p><a id="40" href="http://worldmap.harvard.edu/maps/japanmap/BAD">産業別就業者数</a></p> 
<ul>
	<li>2005年国勢調査による産業別就業者数（第１次産業：農業・林業・漁業、　第2次産業：製造業・鉱業・建設業、第3次産業：小売業・卸売業・娯楽業・法律サービス・金融業・事務業などのサービス業）</li>
	<li>出典: <a href="http://www.e-stat.go.jp/SG1/estat/GL08020103.do?_toGL08020103_&tclassID=000001007609&cycleCode=0&requestSender=search">政府統計の総合窓口（ｅ－Ｓｔａｔ）</a></li>
	<li>データをダウンロードする:
		<a href="http://worldmap.harvard.edu/data/geonode:slct_2005Indus_UTF_AdU">第１次産業</a>, 
		<a href="http://worldmap.harvard.edu/data/geonode:slct_2005Indus_UTF_tHl">第2次産業</a>,
		<a href="http://worldmap.harvard.edu/data/geonode:slct_2005Indus_UTF_DpY">第3次産業</a></li>
</ul>
<br /> 
<h3 id="41">交通</h3>
<br />
<p><a id="42" href="http://worldmap.harvard.edu/maps/japanmap/BAE">フェリー</a></p> 
<ul>
	<li>フェリーの航路</li>
	<li>出典: <a href="http://www1.gsi.go.jp/geowww/globalmap-gsi/download/download2.html">世界地図</a></li> 
	<li><a href="http://worldmap.harvard.edu/data/geonode:ferryl_jpn_hrc">データをダウンロードする</a></li> 
</ul>
<p><a id="43" href="http://worldmap.harvard.edu/maps/japanmap/BAF">駅</a></p> 
<ul>
	<li>駅の位置（拡大してご利用下さい）</li>
	<li>出典: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">国土交通省</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:jpn_stations_UTF_kb2">データをダウンロードする</a></li>
</ul>
<p><a id="44" href="http://worldmap.harvard.edu/maps/japanmap/BAG">鉄道</a></p>
<ul>
	<li>鉄道網</li>
	<li>出典: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">国土交通省</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:Railway_Dissolve_UTF_P9c">データをダウンロードする</a></li> 
</ul>
<p><a id="45" href="http://worldmap.harvard.edu/maps/japanmap/BAH">空港</a></p> 
<ul>
	<li>空港の位置</li>
	<li>出典: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">国土交通省</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:Airport_Pt_Join_ZF7">データをダウンロードする</a></li>
</ul>
<p><a id="46" href="http://worldmap.harvard.edu/maps/japanmap/BAI">道路</a></li>	 
<ul>
	<li>道路網</li> 
	<li>出典: <a href="http://www1.gsi.go.jp/geowww/globalmap-gsi/download/download2.html">世界地図</a></li> 
	<li><a href="http://worldmap.harvard.edu/data/geonode:roadl_jpn_Ke9">データをダウンロードする</a></li>
</ul>
<br />
<h3 id="47">行政区域</h3>
<br />
<p><a id="48" href="http://worldmap.harvard.edu/maps/japanmap/BAH">2010年 市町村等行政区域</a></p> 
<ul>
	<li>2010年市町村等行政区域</li>
	<li>出典: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">国土交通省</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:Admin_Dissolve_Test2_JOB">データをダウンロードする</a></li>	 
</ul>
<p><a id="49" href="http://worldmap.harvard.edu/maps/japanmap/BAL">都道府県</a></p>  
<ul>
	<li>都道府県行政区域</li>
	<li>出典: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">国土交通省</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:jpn_PrefBound_UTM54N_WNx">データをダウンロードする</a></li> 
</ul>

</div>						 
       
<?php //elseif ($language == 'ko'): ?>


<?php //elseif ($language == 'zh'): ?>

<?php else: ?>

<p>Browse information and download links of our Japan map layers</p>

<div class="toc">
<h3 id="0">Utilities & Infrastructure</h3>
<br />
<p><a id="1" href="http://worldmap.harvard.edu/maps/japanmap/02">Nuclear Power Plants</a></p>
<ul>
	<li>Point locations of Japan's nuclear power plants</li>
	<li>Source: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">Ministry of Land Infrastructure Transport and Tourism (MLIT)</a></li>
<li><a href="http://worldmap.harvard.edu/data/geonode:jpn_NuclearPP_UTM54N_M1z">Download Data</a></li>
</ul>

<p><a id="2" href="http://worldmap.harvard.edu/maps/japanmap/06">Renewable Energy Power Plants</a></p>
 <ul>
 	<li>Point locations of Japan's renewable energy power plants</li>
	<li>Source: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">Ministry of Land Infrastructure Transport and Tourism (MLIT)</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:jpn_RenewablePP_UTF_ULJ">Download Data</a></li>
</ul>

<p><a id="3" href="http://worldmap.harvard.edu/maps/japanmap/07">Thermal Power Plants</a>
	<ul>
		<li>Point locations of Japan's thermal energy power plants</li>
		<li>Source: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">Ministry of Land Infrastructure Transport and Tourism (MLIT)</a></li>
		<li><a href="http://worldmap.harvard.edu/data/geonode:jpn_ThermalPP_UTF_n4w">Download Data</a></li>
</ul>

 <p><a id="4" href="http://worldmap.harvard.edu/maps/japanmap/08">Hospitals</a></p>
<ul><li>Point locations of Japan's hospitals</li>
	<li>Source: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">Ministry of Land Infrastructure Transport and Tourism (MLIT)</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:Hospitals_Qzn">Download Data</a></li>
</ul>

<p><a id="5" href="http://worldmap.harvard.edu/maps/japanmap/09">Fire Stations</a></p>
	<ul>
	<li>Point locations of Japan's fire stations</li>
	<li>Source: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">Ministry of Land Infrastructure Transport and Tourism (MLIT)</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:Fire_Stations_UTF_aQC">Download Data</a></li>
</ul>

<p><a id="6" href="http://worldmap.harvard.edu/maps/japanmap/1A">Police Stations</a></p>
<ul>
	<li>Point locations of Japan's police stations and headquarters</li>
	<li>Source: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">Ministry of Land Infrastructure Transport and Tourism (MLIT)</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:Police_station_UTF_SXV">Download Data</a></li>
</ul>

<p><a id="7" href="http://worldmap.harvard.edu/maps/japanmap/1B">Municipal Offices</a></p>
<ul>
<li>Point locations of Japan's district municipal offices</li>
<li>Source: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">Ministry of Land Infrastructure Transport and Tourism (MLIT)</a></li>
<li><a href="http://worldmap.harvard.edu/data/geonode:Municipal_Offices_OT8">Download Data</a></li>
</ul>

<p><a id="8" href="http://worldmap.harvard.edu/maps/japanmap/1C">Schools</a></p>
<ul>
	<li>Point locations of Japan's schools
	<li>Source: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">Ministry of Land Infrastructure Transport and Tourism (MLIT)</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:jpn_Schools_efB">Download Data</a></li>
</ul>

<p><a id="9" href="http://worldmap.harvard.edu/maps/japanmap/1U">Sea Ports</a></p>
<ul>
<li>Point locations of Japan's sea ports</li>
<li>Source: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">Ministry of Land Infrastructure Transport and Tourism (MLIT)</a></li>
<li><a href="http://worldmap.harvard.edu/data/geonode:jpn_Ports_UTM54N_ZAc">Download Data</a></li>
</ul>

<p><a id="10" href="http://worldmap.harvard.edu/maps/japanmap/1V">Police Boxes</a></p>
<ul>
<li>Point locations of Japan's police boxes</li>
<li>Source: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">Ministry of Land Infrastructure Transport and Tourism (MLIT)</a></li>
<li><a href="http://worldmap.harvard.edu/data/geonode:Police_Box_UTF_nzZ">Download Data</a></li>  
</ul>

<p><a id="11" href="http://worldmap.harvard.edu/maps/japanmap/1W">Fish Ports</a></p>
<ul>
<li>Point locations of Japan's fish ports</li>
<li>Source: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">Ministry of Land Infrastructure Transport and Tourism (MLIT)</a></li>
<li><a href="http://worldmap.harvard.edu/data/geonode:jpn_FishPort_UTM54N_Mna">Download Data</a></li>
</ul>

<br />
<h3 id="12">Place Locations</h3>
<br />
<p><a id="13" href="http://worldmap.harvard.edu/maps/japanmap/48">Registered Religious Buildings</a></p>
<ul>
<li>Nationally registered religious buildings (shrines, temples, churches, etc)</li>
<li>Source: <a href="http://www.bunka.go.jp/bsys/">Agency of Cultural Affairs</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:RegReli_UTM54N_eNl">Download Data:</a></li>
</ul>

<br />
<h3 id="14">Rivers, Streams, Lakes</h3>
<br />
<p><a id="15" href="http://worldmap.harvard.edu/maps/japanmap/49">Lakes</a></p>
<ul>
<li>Polygon data of lakes in Japan</li>
<li>Source: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">Ministry of Land Infrastructure Transport and Tourism (MLIT)</a></li>
<li><a href="http://worldmap.harvard.edu/data/geonode:jpn_Lakes_UTM54N_F6L">Download Data:</a></li>
</ul>

<br />
<h3 id="16">Imagery & Base Maps</h3>
<br />
<p><a id="17" href="http://worldmap.harvard.edu/maps/japanmap/BAh">Before/After Rikuzen Takata</a></p>
<ul>
<li>Satellite imagery of Rikuzen Takata before (03/01/07) and after (03/14/11) the tsunami. </li>
<li>Source: <a href="http://earthobservatory.nasa.gov/IOTD/view.php?id=49684">アメリカ国際宇宙局（NASA)</a></li>
<li> Download Data: <a href="http://warp.worldmap.harvard.edu/maps/59#Export_tab">Before</a>, <a href="http://warp.worldmap.harvard.edu/maps/60#Export_tab">After</a></li>
</ul>

<p><a id="18" href="http://worldmap.harvard.edu/maps/japanmap/5B">1978 Southeast Tohoku Topography</a></p>
<ul>
	<li>Mosaic of Southeast Tohoku 1:25000 Topography Maps from 1978</li>
	<li>Source: <a href="http://www.gsi.go.jp/ENGLISH/index.html">Geospatial Information Authority of Japan (GSI)</a></li>
	<li><a href="http://warp.worldmap.harvard.edu/maps/94#Export_tab">Download Data</a></li>
</ul>
<br />
<h3 id="19">2011 Tohoku Disaster</h3>
<br />
<p><a id="20" href="http://worldmap.harvard.edu/maps/japanmap/BAg">Tsunami Inundation of Miyagi/Fukushima</a></p>
<ul> 
	<li>Tsunami Inundation zone in Miyagi/Fukushima prefecture. Satellite-detected standing bodies of water remaining after the tsunami. (03/12/2011) Datasets by UNOSAT (Radarsat-2 satellite) and DLR (TerraSAR-X satellite).
	<li>Sources:
		<ul><li><a href="http://www.unitar.org/unosat/node/44/1549">United Nations Institute for Training and Research Operational Satellite Applications Programme (UNITAR/UNOSAT)</a></li>
	<li><a href="http://www.zki.dlr.de/map/1950">German Aerospace Center (DLR)</a></li></ul></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:UNOSAT_Tsunami_StandingWater_xkn">Download Data</a></li>
<a href="http://worldmap.harvard.edu/data/geonode:DLR_20110316_japan_earthquake_floodmask_tsx_20110312_utm54n_cRL"></a></li>
</ul>
<p><a id="21" href="http://worldmap.harvard.edu/maps/japanmap/7P">Reported Casualties (3/18, 4/9, and 7/25)</a></p>
<ul>
	<li>Reported Casualties from the 2011 Tohoku Disaster compiled by CATDAT</a></li>
	<li>Source: <a href="http://earthquake-report.com/2011/05/25/japan-tsunami-a-massive-update-for-our-catdat-situation-report-part-15/">Earthquake Report by CATDAT: The Integrated Historical Global Catastrophe Database</a></li>
	<li>Download Data: <a href="http://worldmap.harvard.edu/data/geonode:CasualtyRpt3Join_g37">03/18</a>, <a href="http://worldmap.harvard.edu/data/geonode:CasualtyRpt19JoinFinal_TK0">04/09</a>, <a href="http://worldmap.harvard.edu/data/geonode:Slct_Casualty2010Join1_Final_zDe">07/25</a></li>
</ul>
<p><a id="22" href="http://worldmap.harvard.edu/maps/japanmap/7R">Shelter Population (3/18, 4/9, and 7/25)</a></p>
<ul>
	<li>Reported Shelter Population after the Tohoku Tsunami compiled by CATDAT</li>
	<li>Source: <a href="http://earthquake-report.com/2011/05/25/japan-tsunami-a-massive-update-for-our-catdat-situation-report-part-15/">Earthquake Report by CATDAT: The Integrated Historical Global Catastrophe Database</a></li>
	<li>Download Data: <a href="http://worldmap.harvard.edu/data/geonode:CasualtyRpt3Join_3Y4">03/18</a>, <a href="http://worldmap.harvard.edu/data/geonode:CasualtyRpt19EditFinal_G3d">04/09</a>, <a href="http://worldmap.harvard.edu/data/geonode:Slct_Casualty2010Join1_Final_O4M">07/25</a></li>
</ul>
<p><a id="23" href="http://worldmap.harvard.edu/maps/japanmap/7U">Shelters</a></p>
<ul>
	<li>Shelters and their reported populations on 08/15 by Google Crisis Response</li>
	<li>Source: <a href="http://shelter-info.appspot.com/maps">Google Crisis Map</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:CoordShelters_SJ_0tf">Download Data</a></li>
</ul>
<p><a id="24" href="http://worldmap.harvard.edu/maps/japanmap/7W">Blackout Satellite Imagery (3/10 - 3/13 and 3/16)</a></p>
<ul>
	<li>Composite satellite imagery that compares observations after the earthquake (03/16/11) to images of lights observed in 2010.
	<ul>
	<li>Yellow - functioning lights in 2010 and 2011.</li>
	<li>Red - power outages detected in 2011</li>
	<li>Blue - clouds</li>
	<li>Green - clouds with yellow tint or new lights detected in 2011 but not in 2010</li>
	<li>Magenta - lights obscured by clouds.</li>
	</ul></li>
	<li>Source: <a href="http://www.ngdc.noaa.gov/dmsp/data/web_data/japan/japan.html">U.S. Air Force Defense Meteorological Satellite Program (DMSP)</a></li>
	<li>Download Data: <a href="http://worldmap.harvard.edu/data/geonode:F18201103100955.composite_Jyo">03/10</a>, 
	<a href="http://worldmap.harvard.edu/data/geonode:F18201103110943.composite_VLS">03/11</a>, 
	<a href="http://worldmap.harvard.edu/data/geonode:F18201103120930.composite_w3e">03/12</a>,
	<a href="http://worldmap.harvard.edu/data/geonode:F18201103130918.composite_93x">03/13</a>,
	<a href="http://worldmap.harvard.edu/data/geonode:F18201103161023.composite_HAV">03/16</a></li>
</ul>
<br />
<h3 id="25">Radiation</h3>
<br />
<p><a id="26" href="http://worldmap.harvard.edu/maps/japanmap/BAk">SPEEDI Radiation Levels</a></p> 
<ul>
	<li>The maximum radiation level (nGy/hr) of the day (2/28, 03/10, 03/15 and 03/16) harvested by Marian Steinbach from the Ministry of Education, Culture, Sports, Science and Technology’s (MEXT) System for Prediction of Environment Emergency Dose Information (SPEEDI).</li>
	<li>Source: <a href="http://www.sendung.de/japan-radiation-open-data/">Marian Steinbach</a></li> 
	<li>Download Data:
		<a href="http://worldmap.harvard.edu/data/geonode:_joinMaxUTM54N_psW">02/28</a>,
		<a href="http://worldmap.harvard.edu/data/geonode:_JoinMaxUTM54N_khO">03/10</a>,
		<a href="http://worldmap.harvard.edu/data/geonode:_JoinMaxUTM54N_nRb">03/15</a>,
		<a href="http://worldmap.harvard.edu/data/geonode:_JoinMaxUTM54N_gW7">03/16</a>
	</li>
</ul>
<p><a id="27" href="http://worldmap.harvard.edu/maps/japanmap/BAm">Radiation Pathways</a></p> 
<ul>
	<li>Radiation pathway map created by Professor Yukio Hayakawa of Gunma University</li>
	<li>Source: <a href="http://kipuka.blog70.fc2.com/">Dr. Yukio Hayakawa</a></li>
	<li><a href="http://warp.worldmap.harvard.edu/maps/221#Export_tab">Download Data</a></li>
</ul> 
<br />
<h3 id="28">Earth Sciences</h3>
<br />
<p><a id="29" href="http://worldmap.harvard.edu/maps/japanmap/7d">03/11 ShakeMap Intensity</a></p>
<ul>
	<li>USGS ShakeMap Instrumental Intensity map of the 9.0 Magnitude Earthquake off the east coast of Honshu, Japan, 3/11/2011 05:46 GMT</li>
	<li>Source: <a href="http://earthquake.usgs.gov/earthquakes/shakemap/global/shake/c0001xgp/">United States Geologic Survey (USGS)</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:InstruIntensity_Clip_dOd">Download Data</a></li>
</ul>
<p><a id="30" href="http://worldmap.harvard.edu/maps/japanmap/_u">Earthquake Risk 30yrs </a></p> 
<ul>
	<li>Risk of a 6+ shindo (Japanese Meteorological Agency seismic intensity scale) Earthquake in 30 years </li>
	<li>Source: <a href="http://www.j-shis.bosai.go.jp/download">Japan Seismic Hazard Information Station (J-SHIS)</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:_yr_65shinshp2_UTF_scD">Download Data</a></li>
</ul>
<p><a id="31" href="http://worldmap.harvard.edu/maps/japanmap/_w">Earthquakes 5+ Magnitude</a></p>
<ul> 
	<li>Earthquakes around Japan between 03/10-03/20 from the U.S. Geologic Survey</li>
	<li>Source: <a href="http://earthquake.usgs.gov/earthquakes/eqarchives/epic/database.php">United States Geologic Survey (USGS)</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:__0320_UTM54N_TVM">Download Data</a></li>
</ul>
<br />
<h3 id="32">Society & Demographics</h3>
<br />
<p><a id="33" href="http://worldmap.harvard.edu/maps/japanmap/_x">65+ Population</a></p> 
<ul>
	<li>Japan's Percent of Population Over 65 years old from the 2005 Population Census</li>
	<li>Source: <a href="http://www.e-stat.go.jp/SG1/estat/GL08020103.do?_toGL08020103_&tclassID=000001007609&cycleCode=0&requestSender=search">E-STAT: Portal Site of Official Statistics of Japan</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:PopCensus2005_vpg">Download Data</a></li>
</ul>
<p><a id="34" href="http://worldmap.harvard.edu/maps/japanmap/_z">Population Growth (00-05)</a></p>
<ul>
	<li>Japan's Population Growth Rate from 2000 to 2005 from the 2005 Population Census.</li>
	<li>Source: <a href="http://www.e-stat.go.jp/SG1/estat/GL08020103.do?_toGL08020103_&tclassID=000001007609&cycleCode=0&requestSender=search">E-STAT: Portal Site of Official Statistics of Japan</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:PopCensus2005_YYw">Download Data</a></li>
</ul>
<p><a id="35" href="http://worldmap.harvard.edu/maps/japanmap/_0">Population Density</a></p> 
<ul>
	<li>Japan's Population Density from the 1999 and 2005 Population Census (population/square km)</li>
	<li>Source: <a href="http://www.e-stat.go.jp/SG1/estat/GL08020103.do?_toGL08020103_&tclassID=000001007609&cycleCode=0&requestSender=search">E-STAT: Portal Site of Official Statistics of Japan</a></li>
	<li>Download Data:
		<a href="http://worldmap.harvard.edu/data/geonode:jpn_Census95Final_UTF_obv">1999</a>,
		<a href="http://worldmap.harvard.edu/data/geonode:PopCensus2005_kGk">2005</a></li>
</ul>
<p><a id="36" href="http://worldmap.harvard.edu/maps/japanmap/_9 ">Densely Inhabited Areas</a></p>
<ul>
	<li>Japan's densely inhabited areas</li>
	<li>Source: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">Ministry of Land Infrastructure Transport and Tourism (MLIT)</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:jpn_DenseInhab_UTM54N_wNg">Download Data</a></li>
</ul>
<p><a id="37" href="http://worldmap.harvard.edu/maps/japanmap/BAA">Global Urban Areas</a></p>
<ul>
	<li>Urban Areas of the World 1:10,000,000</li>
	<li>Source: <a href="http://www.naturalearthdata.com/downloads/">Natural Earth</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:world_urban_areas_110_million_fSE">Download Data</a></li>
</ul>
<br />
<h3 id="38">Economic Activities & Employment</h3>
<br />
<p><a id="39" href="http://worldmap.harvard.edu/maps/japanmap/BAB">Goods Transport: Metal & Machinery</a></p>
<ul>
	<li>Metal and Machinery Goods transported from Miyagi, Iwate, and Fukushima Prefectures in tons.</li>
	<li>Source: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">Ministry of Land Infrastructure Transport and Tourism (MLIT)</a></li>
	<li>Download Data: 
		<a href="http://worldmap.harvard.edu/data/geonode:Miyagi_Goods_NxA">Miyagi</a>,
		<a href="http://worldmap.harvard.edu/data/geonode:Iwate_Goods_9Wu">Iwate</a>,
		<a href="http://worldmap.harvard.edu/data/geonode:Fukushima_Goods_dBY">Fukushima</a></li>
</ul>
<p><a id="40" href="http://worldmap.harvard.edu/maps/japanmap/BAD">Sector Employment</a></p> 
<ul>
	<li>Percentage of Japanese Employed in the different industry sector from the 2005 Population Census. Primary Sector: agriculture, forestry, fishing
Secondary Sector: manufacturing, mining, and construction
Tertiary Sector: Services industry ie: retail sales, distribution, entertainment, law, banking, clerical services etc.</li>
	<li>Source: <a href="http://www.e-stat.go.jp/SG1/estat/GL08020103.do?_toGL08020103_&tclassID=000001007609&cycleCode=0&requestSender=search">E-STAT: Portal Site of Official Statistics of Japan</a></li>
	<li>Download Data:
		<a href="http://worldmap.harvard.edu/data/geonode:slct_2005Indus_UTF_AdU">Primary</a>, 
		<a href="http://worldmap.harvard.edu/data/geonode:slct_2005Indus_UTF_tHl">Secondary</a>,
		<a href="http://worldmap.harvard.edu/data/geonode:slct_2005Indus_UTF_DpY">Tertiary</a></li>
</ul>
<br /> 
<h3 id="41">Transportation</h3>
<br />
<p><a id="42" href="http://worldmap.harvard.edu/maps/japanmap/BAE">Ferry</a></p> 
<ul>
	<li>Japan’s ferry lines </li>
	<li>Source: <a href="http://www1.gsi.go.jp/geowww/globalmap-gsi/download/download2.html">Global Map</a></li> 
	<li><a href="http://worldmap.harvard.edu/data/geonode:ferryl_jpn_hrc">Download Data</a></li> 
</ul>
<p><a id="43" href="http://worldmap.harvard.edu/maps/japanmap/BAF">Train Stations</a></p> 
<ul>
	<li>Japan’s Train stations. (Zoom in to see the stations)</li>
	<li>Source: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">Ministry of Land Infrastructure Transport and Tourism (MLIT)</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:jpn_stations_UTF_kb2">Download Data</a></li>
</ul>
<p><a id="44" href="http://worldmap.harvard.edu/maps/japanmap/BAG">Railways</a></p>
<ul>
	<li>Japan's railway system</li>
	<li>Source: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">Ministry of Land Infrastructure Transport and Tourism (MLIT)</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:Railway_Dissolve_UTF_P9c">Download Data</a></li> 
</ul>
<p><a id="45" href="http://worldmap.harvard.edu/maps/japanmap/BAH">Airports</a></p> 
<ul>
	<li>Point locations of Japan's airports.</li>
	<li>Source: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">Ministry of Land Infrastructure Transport and Tourism (MLIT)</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:Airport_Pt_Join_ZF7">Download Data</a></li>
</ul>
<p><a id="46" href="http://worldmap.harvard.edu/maps/japanmap/BAI">Roads</a></li>	 
<ul>
	<li>Japan’s roads</li> 
	<li>Source: <a href="http://www1.gsi.go.jp/geowww/globalmap-gsi/download/download2.html">Global Map</a></li> 
	<li><a href="http://worldmap.harvard.edu/data/geonode:roadl_jpn_Ke9">Download Data</a></li>
</ul>
<br />
<h3 id="47">Boundaries</h3>
<br />
<p><a id="48" href="http://worldmap.harvard.edu/maps/japanmap/BAH">2010 Municipal Districts</a></p> 
<ul>
	<li>Japan’s administrative boundaries of the 2010 municipal districts</li>
	<li>Source: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">Ministry of Land Infrastructure Transport and Tourism (MLIT)</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:Admin_Dissolve_Test2_JOB">Download Data</a></li>	 
</ul>
<p><a id="49" href="http://worldmap.harvard.edu/maps/japanmap/BAL">Prefectures</a></p>  
<ul>
	<li>Japan’s administrative boundaries of prefectures</li>
	<li>Source: <a href="http://nlftp.mlit.go.jp/ksj/jpgis/jpgis_datalist.html">Ministry of Land Infrastructure Transport and Tourism (MLIT)</a></li>
	<li><a href="http://worldmap.harvard.edu/data/geonode:jpn_PrefBound_UTM54N_WNx">Download Data</a></li> 
</ul>

</div>						 
<?php endif ?>
<?php
stop('_map');
?>
