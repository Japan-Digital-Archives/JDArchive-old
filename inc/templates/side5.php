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
              // find out min and max
              $min = -1;
              $max = -1;
              
              foreach ($cloud as $tag) {
                if ($min == -1 || $tag->count < $min) {
                  $min = $tag->count;
                }
                if ($max == -1 || $tag->count > $max) {
                  $max = $tag->count;
                }
              }
              
              $delta = ($max - $min) / 4;
              $threshold = array();
              
              for ($i = 0; $i < 4; $i++) {
                $threshold[$i] = $min + $i * $delta;
              }
            
              foreach ($cloud as $tag) {
                if ($tag->count > $threshold[3]) {
                  $class = "largest";
                } else if ($tag->count > $threshold[2]) {
                  $class = "large";
                } else if ($tag->count > $threshold[1]) {
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