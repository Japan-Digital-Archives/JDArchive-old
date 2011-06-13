<?php

require_once(dirname(__FILE__). '/inc/common.php');

$edit = isset($_GET['edit']);
$tags = get_tag_count();
$curate = isset($_GET['curate']);

//$baseurl = $curate ? 'curate' : 'seeds';
$baseurl = 'curate';
start();


?>

<?php if ($edit): ?>
<script>
function edit_tag(name, tid) {
  var reply = prompt("Rename this tag:", name);
  if (reply == name || reply == null) {
    return false;
  }
  $('#tag' + tid).attr('href', '/edit_tag.php?id=' + tid + '&new=' + reply);
  return true;
}
</script>
<?php endif ?>

<h2>All Tags (<?php echo count($tags); ?>)</h2>

<table id="tabletags">
<tr>

<?php

for ($i = 0; $i < 3; $i++) {
  echo "<td><ul>";
  $count = 0;
  foreach ($tags as $tag) {
    if ($count++ % 3 != $i) continue;
    echo "<li>";
    echo "<a href='/$baseurl/?t={$tag->name}'>{$tag->name}</a>" . " ({$tag->count})";
    if ($edit) {
      echo "&nbsp; <span class='smallspan'>";
      echo "<a href='' id='tag{$tag->tid}' onclick='return edit_tag(" . '"' . $tag->name . '", "' . $tag->tid . '"' . ");'>Edit</a></span>";
    }
    echo "</li>";
  }
  echo "</ul></td>";
}

?>

</tr>
</table>

<?php


stop('_tags');
