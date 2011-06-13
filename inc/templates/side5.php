<?php

$cloud = get_tag_count(30);

// sort alphabetically
function cmp_cloud($a, $b) {
  return strcmp($a->name, $b->name);
}
usort($cloud, "cmp_cloud");

$curate = isset($_GET['curate']);
$currentFile = $_SERVER["PHP_SELF"];
$parts = Explode('/', $currentFile);
if ($parts[count($parts) - 1] == 'tags.php') {
  $curate = true;
}
if ($curate) {
  $theurl = 'curate';
} else {
  $theurl = 'seeds';
}



?>

      <div id="sidebar">
        <ul>
          
          <li>
            <h2>Popular Tags</h2>
            
            <div class="tagcloud">
            
            <?php
              foreach ($cloud as $tag) {
                if ($tag->count > 20) {
                  $class = "largest";
                } else if ($tag->count > 10) {
                  $class = "large";
                } else if ($tag->count > 7) {
                  $class = "medium"; 
                } else {
                  $class = "small";
                }
                echo "<a class='$class' href='/$theurl/?t={$tag->name}' >{$tag->name}</a>";
              }
              
              
              if ($curate) {
                echo "<a class='small' href='/tags/'>All tags &raquo;</a>";
              }
            ?>

            </div>
            
          </li>

        </ul>
      </div>
      <!-- end #sidebar -->