<?php
  $sid = isset($_GET['sid']);
  $seed = null;
  if ($sid) {
    $seed = get_seed($_GET['sid']);
  }
  $edit = isset($_GET['edit']);
?>

<script type="text/javascript">

<?php
  if ($seed) {
    echo 'var seed = ' . json_encode($seed) . ';';
  } else {
    echo 'var seed = null;';
  }
  if ($edit) {
    echo 'var edit = true;';
  } else {
    echo 'var edit = false;';
  }
?>

<?php
  //$showmap = isset($_GET['map']);
  $showmap = true;
  echo 'var lang = "' . language() . '";';
?>

var t4;

$(function(){
  // Autocomplete initialization
  t4 = new $.TextboxList('#form_tags_input_3', {unique: true, plugins: {autocomplete: {}}});
  t4.getContainer().addClass('textboxlist-loading');
  $.ajax({url: '/autocomplete.php', dataType: 'json', success: function(r){
    t4.plugins['autocomplete'].setValues(r);
    t4.getContainer().removeClass('textboxlist-loading');
  }});
  
  // google maps initialization
  
  <?php if ($showmap || $seed): ?>
  initialize();
  <?php endif ?>
  if (seed != null) {
    prepopulate();
  }
  document.onkeypress = stopRKey;
});

function testFields() {
  if ($('input:text[name=url]').val() == '' || $('input:text[name=title]').val() == '') {
    alert('Please fill the required fields!');
    return false;
  }
  return true;
}


var map;
var geocoder;
var marker;

function initialize() {
  var latlng = new google.maps.LatLng(38.268215,140.869356);
  var myOptions = {
    zoom: 8,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById("map_canvas"),
      myOptions);
  
  geocoder = new google.maps.Geocoder();
  
  marker = new google.maps.Marker({
    position: latlng, 
    map: map, 
  });
  
  marker.setDraggable(true);
  google.maps.event.addListener(
    marker,
    'dragend',
    function() {
      var newpos = marker.getPosition();
      $('#latlng').html(newpos.toString());
      $('#lat').val(newpos.lat());
      $('#lng').val(newpos.lng());
    });
}

function showAddress() {
  var address = $('#address').val();
  var geocoderRequest = {
    address: address
  };
  geocoder.geocode(
    geocoderRequest,
    function(result, status) {
      if (status != 'OK') {
        alert('Google could not locate this address.');
        return;
      }
      var latlng = result[0].geometry.location;
      map.setCenter(latlng);
      marker.setPosition(latlng);
      $('#latlng').html(latlng.toString());
      $('#lat').val(latlng.lat());
      $('#lng').val(latlng.lng());
    });
}

function prepopulate() {
  // disable edit!
  if (!edit) {
    enable(false);
  }
  
  $('#directions').html('Updated ' + seed.added + '. Link <a href="' + seed.url + '" target="_blank">here</a>.');
  $('#required').hide();
  
  // input textboxes
  $('[name="verified"]').val(seed.verified);
  $('[name="url"]').val(seed.url);
  $('[name="title"]').val(seed.title);
  $('[name="description"]').val(seed.description);
  $('[name="name"]').val(seed.name);
  $('[name="email"]').val(seed.email);
  
  // location stuff (TODO: test these)
  $('[name="location"]').val(seed.location);
  $('[name="lat"]').val(seed.lat);
  $('[name="lng"]').val(seed.lng);
  
  // drop downs
  $('[name="frequency"]').val(seed.frequency);
  $('[name="scope"]').val(seed.scope);
  $('[name="category"]').val(seed.category);
  
  // checkboxes
  var languages = seed.language.split(',');
  for (var i in languages) {
    $('[value="' + languages[i] + '"]').attr('checked', true);
  }
  
  // tags
  for (var i in seed.tags) {
    if (seed.tags[i] == '') continue;
    t4.add(seed.tags[i]);
  }
  
  // gmaps
  if (seed.lat && seed.lng) {
    var latlng = new google.maps.LatLng(seed.lat, seed.lng);
    map.setCenter(latlng);
    marker.setPosition(latlng);
    $('#latlng').html(latlng.toString());
  }
  
  $('#submitbutton').val('Make Changes');
}

function editme() {
  if ($('#editme').html() == "Edit Information") {
    $('#editme').html("Cancel Editing");
    enable(true);
  } else {
    $('#editme').html("Edit Information");
    enable(false);
  }
}

function enable(enabled) {
  if (!enabled) {
    $(':input').attr('disabled', 'disabled');
    marker.setDraggable(false);
  } else {
    $(':input').removeAttr('disabled');
    marker.setDraggable(true);
  }
}

function stopRKey(evt) { 
  var evt = (evt) ? evt : ((event) ? event : null); 
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
} 


</script>



<?php if ($message): ?>
<div class="message">Thank you for your contribution!  Your seed has been added to our database.</div>
<?php endif ?>

<p id="directions" data-zh="我们需要您的帮助找可以存档的资料！请填以下的表格，越详细越好。" data-jp="アーカイブにウェブサイトを収録するため、皆様のご協力をお願い致します。なるべく詳しく以下の質問事項にお答え下さい。"  data-ko="재해 관련 웹사이트를 찾기위하여 여러분들의 도움이 필요합니다! 하단의 제출서를 최대한 자세히 작성해 주십시요.">We need your help finding websites to archive!  Please fill out the form below as thoroughly as possible.</p>
<p id="required"><span class="red">*</span><span data-jp="必須事項" data-zh="必填控件" data-ko="필수항목">Required Field</span></p>

<form name="seed" action="" method="post" onSubmit="return testFields()">
<table class="seedform">
<?php if ($seed): ?>
  <th>Status</th>
  <td>
    <select name="verified">
      <option value="0">Not Yet Verified</option>
      <option value="1">Verified</option>
      <option value="2">Rejected</option>
    </select>
  </td>
<?php endif ?>
<tr>
  <th><span data-ko="인터넷 URL">URL</span><span class="red">*</span></th>
  <td><input type="text" name="url" size="60" value="<?php if (isset($bk_url)) echo $bk_url; ?>"/><br /><span class="hint" data-jp="ウェブサイトのURL" data-zh="请为该存档的网页提供一个完整的网上地址" data-ko="재해관련 웹페이지의 주소">Full URL of website to archive</span></td>
</tr>
<tr>
  <th><span data-jp="ウェブサイトのタイトル" data-zh="网页标题" data-ko="페이지 이름">Page Title</span><span class="red">*</span></th>
  <td><input type="text" name="title" size="60" value="<?php if (isset($bk_title)) echo $bk_title; ?>"/><br /><span class="hint" data-jp="ウェブサイトの説明したタイトル" data-zh="形容其网页的内容的标题" data-ko="묘사적인 웹페이지 제목">A descriptive title for the page</span></td>
</tr>
<tr>
  <th data-jp="説明" data-zh="内容简述" data-ko="내용">Description</th>
  <td><textarea name="description" cols="60" rows="5"><?php if (isset($bk_description)) echo $bk_description; ?></textarea><br /><span class="hint" data-zh="请提供其网页的概括，说明它如何与本项目有关联" data-jp="そのウェブサイトに何が記載され、どう関連しているか、説明して下さい。" data-ko="웹페이지의 내용과 이번 재해와의 관련성을 짧게 설명하여 주십시요.">Briefly describe what is on the page and how it is relevant.</span></td>
</tr>
<tr>
  <th data-jp="収録回数" data-zh="收集频率" data-ko="기록 횟수">Frequency</th>
  <td>
    <select name="frequency">
      <option value="once" data-jp="一度のみ" data-zh="一次" data-ko="단 한번만">Archive Once</option>
      <option value="daily"data-jp="毎日" data-zh="每天" data-ko="매일">Daily</option>
      <option value="weekly" data-jp="毎週" data-zh="每周" data-ko="매주">Weekly</option>
      <option value="monthly" data-jp="毎月" data-zh="每月" data-ko="매달">Monthly</option>
      
      <?php if ($internal): ?>
        <option value="done">Already Archived by IA</option>
      <?php endif ?>
      
    </select>
    <span class="hint" data-zh="我们应该存档其网页的频率" data-jp="このウェブサイトを収録すべき回数" data-ko="이 웹사이트는 몇번이나 저장/기록하면 되겠습니까?">How often should we archive this website?</span>
  </td>
</tr>

<tr>
  <th data-jp="範囲" data-zh="收集深浅性" data-ko="범위">Scope</th>
  <td>
    <select name="scope">
      <option value="page" data-zh="一页" data-jp="１ページのみ" data-ko="첫 페이지">One page</option>
      <option value="full" data-zh="整个网页" data-jp="サイト全て" data-ko="웹사이트 전체">Full site</option>
      <option value="directory" data-zh="文件名录" data-jp="ディレクトリーも含む" data-ko="디렉토리">Directory</option>
    </select>
    <span class="hint" data-zh="我们应该多“深”的收集其网页上的资料？" data-jp="収録すべきでウェブサイトの範囲" data-ko="웹사이트의 어디까지를 저장하는 것이 좋겠습니까?">How "deep" do you want us to go?</span>
  </td>
</tr>
<tr>
  <th data-jp="タグ付け" data-zh="标签" data-ko="태그">Tags</th>
  <td>
    <div class="form_friends"> 
      <input type="text" name="tags" value="" id="form_tags_input_3" /> 
    </div>
    <span class="hint" data-zh="按Enter键，选择或输入新的标签" data-jp="エンターキーを押しながらタグを選択（もしくは新しいものを入力）して下さい。" data-ko="항목을 선택하시거나 새로운 태그를 삽입하기 위해서는 엔터키를 쳐 주십시요.">Select (or enter a new) tag by pressing the Enter key.</span>
  </td>

</tr>

<?php if ($showmap || $seed): ?>
<tr>
  <th data-jp="地名" data-zh="地理位置">Location</th>
  <td>
    <input type="text" id="address" name="location" size="60" /><button type="button" onclick="showAddress();">Find on Map!</button>
    <div><span class="hint" data-jp="主に言及されている地名を検索して下さい。見つからない場合は直接マーカーを動かすことができます。" data-zh="在以下地图移动红色的气球标志，寻找并设定以上网页所指的地方。">Search to designate a location that this website is primarily about. Move the point if necessary.</span></div>
    <div id="map_canvas" style="width: 550px; height: 300px"></div>
    <div id="latlng"></div>
    <input type="hidden" id="lat" name="lat" />
    <input type="hidden" id="lng" name="lng" />
  </td>
</tr>
<?php endif ?>
<tr>
  <th data-jp="カテゴリー" data-zh="种类" data-ko="분류">Category</th>
  <td>
    <select name="category">
      <option value="website" data-jp="ウェブサイト" data-zh="网页" data-ko="웹사이트">Website</option>
      <option value="audio" data-jp="オーディオ" data-zh="音响" data-ko="오디오">Audio</option>
      <option value="blog" data-jp="ブログ" data-zh="博客" data-ko="블로그">Blog</option>
      <option value="maps" data-jp="地図" data-zh="地图" data-ko="지도">Maps</option>
      <option value="photos" data-jp="写真" data-zh="相片" data-ko="사진">Photos</ptions>
      <option value="video" data-jp="動画" data-zh="录像" data-ko="비디오">Video</option>
    </select>
  </td>
</tr>

</tr>
<tr>
  <th data-zh="语言" data-jp="言語" data-ko="언어">Language</th>
  <td>
      <input type="checkbox" name="language[]" value="english" /><span data-zh="英语" data-jp="英語" data-ko="영어">English</span>&nbsp;&nbsp;
      <input type="checkbox" name="language[]" value="japanese" /><span  data-zh="日语" data-jp="日本語" data-ko="일본어">Japanese</span>&nbsp;&nbsp;
      <input type="checkbox" name="language[]" value="chinese" /><span  data-zh="中文" data-jp="中国語" data-ko="중국어">Chinese</span>&nbsp;&nbsp;
      <input type="checkbox" name="language[]" value="korean" /><span  data-zh="韩语" data-jp="韓国語" data-ko="한국어" >Korean</span>&nbsp;&nbsp;
      <input type="checkbox" name="language[]" value="other" /><span  data-zh="其他" data-jp="その他の言語" data-ko="다른 언어" >Other</span>&nbsp;&nbsp;
  </td>
</tr>

<tr>
  <th data-zh="您的姓名" data-jp="お名前" data-ko="귀하의 성함">Your Name</th>
  <td><input type="text" name="name" size="60"/></td>
</tr>
<tr>
  <th data-jp="Eメールアドレス" data-zh="您的电子邮件" data-ko="귀하의 이메일 주소">Your Email</th>
  <td><input type="text" name="email" size="60"/><br /><span class="hint" data-zh="若我们需要后续情报" data-jp="さらに詳細な情報提供をお願いする可能性があります。" data-ko="">In case we need more details</span></td>
</tr>
<tr>
  <th></th>
  <td><input type="submit" id="submitbutton" value="Submit!" /></td>
</tr>
</table>

</form>
