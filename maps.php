<?php
  
  require_once(dirname(__FILE__). '/inc/common.php');
  
  $language = language();
  
  start();
  
  ?>



<div>
<?php language_bar($language, array('en', 'ja')); ?>
<div><h2 data-jp="Maps" data-ko="">Maps</h2></div>
</div>

<?php $language = language(); ?>
            
<?php //if ($language == 'ja'): ?>
          
<?php //elseif ($language == 'zh'): ?>       
            
<?php //elseif ($language == 'ko'): ?>           
        
<?php //if: ?>
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
<li>Source: <a href="http://earthobservatory.nasa.gov/IOTD/view.php?id=49684">NASA Observatory</a></li>
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
<?php //endif ?>
<?php
stop('_map');
?>