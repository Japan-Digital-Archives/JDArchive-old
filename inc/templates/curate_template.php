<?php

$q = isset($_GET['q']) ? $_GET['q'] : false;

$pagelink = $curate ? 'curate' : 'seeds';

// doing pagination and stuff here
$page = isset($_GET['p']) ? intval($_GET['p']) : 1;
$filter = isset($_GET['f']) ? $_GET['f'] : 'all';
$submitter = isset($_GET['s']) ? $_GET['s'] : '';
$filtertag = isset($_GET['t']) ? $_GET['t'] : '';

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

if ($q) {
  $count = get_seeds_search_count($q);
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
  $seeds = get_seeds_search($q, $page);
} else {
  $seeds = get_seeds_paginated($conditions, $page);
}

$firstseedbase = ($page - 1) * $perpage;
$lastseed = $firstseedbase + count($seeds);

$firstseed = $seeds ? $firstseedbase + 1 : $firstseedbase;

$counts = get_seed_numbers();
$last_exported = last_exported_seed();

if ($curate) {
  start('_curate');
} else {
  start();
}

?>

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

<p class="smallp">Top 8 Contributors:</p>

<?php foreach ($people as $person): ?>

<?php $thename = $person->name ? $person->name : "Anonymous"; ?>

<a href="/<?= $pagelink ?>/?s=<?php echo $thename;?>" class="sidefilter <?php echo $submitter == $thename ? 'sidehover' : 'sidemenu'; ?>"><div class="fixedwidth"><?php echo $thename; ?></div><span class="bubble"><?php echo $person->number; ?></span></a>

<?php endforeach ?>

<hr />

<div id="export">

<p><a id="exportlink" href="export.php" onclick="return export();">Export verified seeds &raquo;</a></p>


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
<?php elseif (!$curate && $filtertag): ?>
<p style="margin-bottom:0;"><a href="/seeds/">&laquo; Back to all seeds</a></p>
<?php else: ?>
<p data="KONRADPUTSTUFFHERE"></p>
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