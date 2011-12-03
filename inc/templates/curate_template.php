<?php

$q = isset($_GET['q']) ? $_GET['q'] : false;

$pagelink = $curate ? 'curate' : 'seeds';

// doing pagination and stuff here
$page = isset($_GET['p']) ? intval($_GET['p']) : 1;
$filter = isset($_GET['f']) ? $_GET['f'] : 'all';
$submitter = isset($_GET['s']) ? $_GET['s'] : '';
$filtertag = isset($_GET['t']) ? $_GET['t'] : '';
$filterlang = isset($_GET['l']) ? $_GET['l'] : '';

$people = get_submitters();

// validate filters
if ($filter != 'all' && $filter != 'verified' && $filter != 'notyet' && $filter != 'rejected') {
  $filter = 'all';
}

if (!$curate) {
  $filter = 'verified';
}

// validate page
$page = $page ? $page : 1;
$perpage = 30;

$conditions = array();
if ($submitter) {
  $conditions['name'] = $submitter;
}
if ($filter != 'all') {
  $conditions['verified'] = $filter;
}
if ($filtertag) {
  $conditions['tags'] = $filtertag;
}
if ($filterlang) {
  $conditions['language'] = $filterlang;
}

if ($q) {
  if (strpos($q, "tag:") === 0) {
    $tag = substr($q, 4);
    header("Location: /$pagelink/?t=$tag");
  } else {
    $count = get_seeds_search_count($q, $filterlang);
    $searchterm = str_replace('*', '', $q);
  }
} else {
  $count = get_seed_number($conditions);
}

$counts = get_seed_numbers();  // primarily for verification filter only
if ($count < $perpage * ($page - 1)) {
  // a redirect is necessary
  $newpage = ceil((float)$count / (float)$perpage);
  $newpage = $newpage ? $newpage : 1;
  header("Location: /$pagelink/?f=$filter&p=$newpage");
}


if ($q) {
  $seeds = get_seeds_search($q, $page, $filterlang);
} else {
  $seeds = get_seeds_paginated($conditions, $page);
}

$firstseedbase = ($page - 1) * $perpage;
$lastseed = $firstseedbase + count($seeds);

$firstseed = $seeds ? $firstseedbase + 1 : $firstseedbase;

$counts = get_seed_numbers();
$last_exported = last_exported_seed();

//doing some localization stuff here

$basePath = realpath('./inc/lang');
$langPath = $basePath."/".$filterlang.".txt";

if (!file_exists($langPath)) {
	$langPath = realpath($basePath."/curate_template.english.txt");
}

$langFileCont = file_get_contents($langPath);
$transDict = json_decode($langFileCont, true);

$notSumbitTxt = $transDict["notSumbitTxt"];
$liveLinkTxt = $transDict["liveLinkTxt"];
$mostRecentTxt = $transDict["mostRecentTxt"];
$earliestTxt = $transDict["earliestTxt"];
$allTxt = $transDict["allTxt"];
$notInArchiveTxt = $transDict["notInArchiveTxt"];

if ($curate) {
  start('_curate');
} else {
  $language = language();
  start();
}

?>


<?php if ($q && $count): ?>
<script type="text/javascript">
$(function(){
  highlightSearchTerms('<?php echo urldecode($searchterm); ?>');
});
</script>
<?php endif ?>

<?php if ($curate): ?>
<div id="cmenu">

<?php if (isset($_GET['t'])): ?>
<a href="/<?= $pagelink ?>/?t=<?php echo $filtertag; ?>" class="sidefilter sidehover"><div class="fixedwidth"><?php echo $filtertag; ?></div><span class="bubble"><?php echo $count; ?></span></a>
<hr />
<?php endif ?>

<a href="/<?= $pagelink ?>/?f=all" class="sidefilter <?php echo ($filter == 'all' && !isset($_GET['s']) && !isset($_GET['t'])) ? 'sidehover' : 'sidemenu'; ?>" id="sideall">All Seeds <span class="bubble"><?php echo $counts['all']; ?></span></a>
<a href="/<?= $pagelink ?>/?f=verified" class="sidefilter <?php echo $filter == 'verified' ? 'sidehover' : 'sidemenu'; ?>" id="sideverified">Verified <span class="bubble"><?php echo $counts['verified']; ?></span></a>
<a href="/<?= $pagelink ?>/?f=notyet" class="sidefilter <?php echo $filter == 'notyet' ? 'sidehover' : 'sidemenu'; ?>" id="sidenotyet">Not Yet Verified <span class="bubble"><?php echo $counts['notyet']; ?></span></a>
<a href="/<?= $pagelink ?>/?f=rejected" class="sidefilter <?php echo $filter == 'rejected' ? 'sidehover' : 'sidemenu'; ?>" id="sidereject">Rejected <span class="bubble"><?php echo $counts['rejected']; ?></span></a>

<hr />

<p class="smallp">Top 10 Contributors:</p>

<?php foreach ($people as $person): ?>

<?php $thename = $person->name ? $person->name : "Anonymous"; ?>

<a href="/<?= $pagelink ?>/?s=<?php echo $thename;?>" class="sidefilter <?php echo $submitter == $thename ? 'sidehover' : 'sidemenu'; ?>"><div class="fixedwidth"><?php echo $thename; ?></div><span class="bubble"><?php echo $person->number; ?></span></a>

<?php endforeach ?>

<hr />

<div id="export">

<p><a id="exportlink" href="export.php" onclick="return export_seeds();">Export verified seeds &raquo;</a></p>


<table class="smallleft">
<tr>
  <th>Start:</th>
  <th>End:</th>

</tr>
<tr>
  <td>#<input id="startseed" size="3" value="0"/></td>
  <td>#<input id="endseed" size="3" /></td>
</tr>
</table>



<p><br /><b>Last Exported:</b> #<?php echo $last_exported['sid']; ?><br />(on <?php echo $last_exported['timestamp']; ?>)
</p>

<p id="smallcomment">Click <a id="exportlinkall" href="export.php" onclick="return export();">here</a> to export <b>all</b> seeds (including unverified).</p>
</div>
</div>

<?php endif ?>

<?php if ($curate): ?>
<div id="seeds">
<?php elseif (!$curate && ($filtertag || $q)): ?>
<p style="margin-bottom:0;"><a href="/seeds/">&laquo; Back to all seeds</a></p>
<?php /*else: 
<p data="en">Welcome to our temporary search engine. The full interface which connects the many components of the archive is currently being developed. In the meantime, you may search the collection of harvested websites and the information about each site we have collected here, including the page title, description, and associated keyword tags. Currently, search results will link to the live version of the website but soon this will be connected to the archived copy at the Internet Archive. The collection contains a very large number of Japanese and English language websites, but also significant Chinese and Korean language sites as well.</p> */ ?>
<?php endif ?>

<?php if (!$curate): ?>
<div>
<div>
<?php language_bar($language, array('en','zh','ko','ja')); ?>
<div><h2 data-jp="ウェブ・アーカイブを検索する" data-ko="웹 아카이브 검색" data-zh="搜索网上档案">Search the Web Archive</h2></div>
</div>

<?php if ($language=='ja'): ?>
<p>暫定的な検索エンジンをご用意致しました。私たちは現在、当アーカイブに収蔵された多くの資料や記録を結ぶべくインターフェースを構築中です。しかしそれが完成するまでの間であっても、収集されたウェブサイトやそれらについての情報（例えばページのタイトルや説明、関連するタグなど）を検索することができます。現段階では、検索結果はオンライン上に存在するウェブサイトそのものにリンクされていますが、まもなくしてインターネット・アーカイブに収められたコピーへとつながることになります。</p>
<?php elseif ($language == 'ko'): ?>
<p>저희의 임시 검색 기능을 소개합니다.  다양한 아카이브 내용에 접속할 수 있는 최종 인터페이스는 현재 구축 중에 있습니다. 작업이 완료되기까지 수집된 웹사이트들과 각 사이트들의 정보를 제목, 설명, 관련키워드 태그 등을 통해 검색해 보실 수 있습니다.  현재는 검색결과가 실제의 웹사이트로 연결되지만, 곧 인터넷 아카이브에 저장된 웹사이트사본으로 연결되게 될 것입니다.</p>

<?php elseif ($language == 'zh'):?>
<p>欢迎来到我们临时及部分的搜索引擎。综合本档案各个部分的全体界面正在开发 中。您现在能暂时搜索已被“收割”的网页以及关于各个网页的资料（包括 网页标 题，简述，有关的关键字标签）。此时，您的搜索结果会连接到网页的实况版；然 而，这将会与网页档案（Internet Archive）所收藏的复本连接。</p>

<?php else: ?>
<p>Welcome to our temporary and partial search engine. The full interface which connects the many components of the archive is currently being developed. In the meantime, you may search the collection of harvested websites and the information about each site we have collected here, including the page title, description, and associated keyword tags. Currently, result will link to the live version of the website but soon this will be connected to the archived copy at the Internet Archive.</p>

<?php endif ?>
</div>
<div class="searchbigdiv">
<form method="get" action="/seeds/">
<div class="searchdiv">
<input class="searchbox" name="q" value="<?php 
  if ($filtertag) {
    echo "tag:$filtertag";
  } else {
    echo $q;
  }
 ?>" id="q" type="text" autocomplete=off />
<input class="searchsubmit" id="searchsubmitbut" tabindex="0" title="Search" type="submit" value="">
</div>

<select name="l" class="droplang">
  <option value="">すべての言語を検索</option>
  <option value="chinese" <?php if ($filterlang == 'chinese') echo "selected"; ?>>中国語のみ</option>
  <option value="english" <?php if ($filterlang == 'english') echo "selected"; ?>>英語のみ</option>
  <option value="japanese" <?php if ($filterlang == 'japanese') echo "selected"; ?>>日本語のみ</option>
  <option value="korean" <?php if ($filterlang == 'korean') echo "selected"; ?>>韓国語のみ</option>
</select>
</form>
</div>

<?php endif ?>
<div id="paginationtop" class="pagination">

<?php
  $url = '';
  if ($filter && $filter != 'all' && $curate) {
    $url = "f=$filter";
  } else if ($submitter) {
    $url = "s=$submitter";
  } else if ($filtertag) {
    $url = "t=$filtertag";
  } else if ($q) {
    $url = "q=$q";
  }
  
  // the only filter that can be applied with another...
  if ($filterlang) {
    $url .= $url ? "&" : "";
    $url .= "l=$filterlang";
  }
  
  if ($firstseed > $perpage) {
    $newpage = $page - 1;
    echo "<a href='/$pagelink/?$url&p=1'>&laquo; Newest</a> &nbsp;";
    echo "<a href='/$pagelink/?$url&p=$newpage'>&lsaquo; Newer</a> &nbsp;";
  }
  echo "$firstseed - $lastseed of $count";
  if ($lastseed < $count) {
    $newpage = $page + 1;
    $maxpage = ceil((float)$count / (float)$perpage);
    echo "&nbsp; <a href='/$pagelink/?$url&p=$newpage'>Older &rsaquo;</a> ";
    echo "&nbsp;<a href='/$pagelink/?$url&p=$maxpage'>Oldest &raquo;</a>";
  }
?>
</div>

<?php foreach ($seeds as $seed): ?>

<?php
  $title = $seed->title ? $seed->title : $seed->url;
  $verified = '';
  switch ($seed->verified) {
    case 0:
      $verified = 'Not Yet';
      break;
    case 1:
      $verified = 'Verified';
      break;
    case 2:
      $verified = 'Rejected';
      break;
  }
  $titleurl = $curate ? '/edit/?sid=' . $seed->sid . '&' . $url . '&p=' . $page : $seed->url;
  
?>

<div class="entry <?php echo 'verified' . $seed->verified ?>">

<div class="seed">
  <h3><a href="<?php echo $titleurl; ?>"><?php echo $title ?></a>
  
  <?php if ($curate): ?>
  <span class="verifytag <?php echo 'verified' . $seed->verified; ?>"><?php echo $verified; ?></span>
  <?php endif ?> 
  </h3>
  <?php if ($curate): ?>
  <p class="byline">
  Seed #<?php echo $seed->sid; ?>,
  Updated on <?php echo $seed->added ?>
  
  <?php 
    if ($seed->name) {
      $name = $seed->name;
      $name = "<a href='/$pagelink/?s=$name'>$name</a>";
      echo "&nbsp; Submitted by " . $name;
    }
  ?>
  
  </p>
  <?php endif ?>
  <p><?php echo $seed->description ?></p>
  <div class="tags">
  <?php
    if ($seed->tags) {
      $tags = explode(",", $seed->tags);
      foreach ($tags as $tag) {
        echo "<a href='/$pagelink/?t=$tag' class='onetag'>$tag</a>";
      }
    }
  ?>
  </div>

  <div class="ialinks">
  	<?php
  		$scope = $seed->scope;
  		$frequency = $seed->frequency;
		$isArchived = $seed->isArchived;
		$currentSid = $seed->sid;
		$lastExportId = $last_exported["sid"];
  		$iaurl=$seed->url;
  		echo " <a href='$iaurl'>$liveLinkTxt</a> &nbsp;&nbsp;";
  		if ($currentSid > $lastExportId) {
  			echo "<strong>$notSumbitTxt</strong>&nbsp;&nbsp;";
  		} else if ($isArchived=='0') {
			echo "<strong>$notInArchiveTxt</strong>&nbsp;&nbsp;";
		}
		else {
	  		echo "<strong>Archived Copies: <a href='http://wayback.archive-it.org/2438/9/$iaurl'>$mostRecentTxt</a> </strong> | <strong>
	  		<a href='http://wayback.archive-it.org/2438/20110301000000/$iaurl'>$earliestTxt</a> </strong>
	  		| <strong>
	  		<a href='http://wayback.archive-it.org/2438/*/$iaurl'>$allTxt</a> &nbsp;&nbsp;</strong>";
	  		}
			if($curate) {
		  		echo " <strong>Scope: </strong>".ucfirst($scope)." &nbsp;&nbsp;<strong>Frequency:</strong> ".ucfirst($frequency).""; 
			}
  	?>
  </div>

</div>
</div>

<?php endforeach ?>


<div id="paginationbottom" class="pagination">

<?php
  if ($firstseed > $perpage) {
    $newpage = $page - 1;
    echo "<a href='/$pagelink/?$url&p=1'>&laquo; Newest</a> &nbsp;";
    echo "<a href='/$pagelink/?$url&p=$newpage'>&lsaquo; Newer</a> &nbsp;";
  }
  echo "$firstseed - $lastseed of $count";
  if ($lastseed < $count) {
    $newpage = $page + 1;
    $maxpage = ceil((float)$count / (float)$perpage);
    echo "&nbsp; <a href='/$pagelink/?$url&p=$newpage'>Older &rsaquo;</a> ";
    echo "&nbsp;<a href='/$pagelink/?$url&p=$maxpage'>Oldest &raquo;</a>";
  }
?>
</div>

<?php if ($curate): ?>
</div>
<?php endif ?>	
