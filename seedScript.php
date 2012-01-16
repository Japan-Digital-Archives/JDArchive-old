<?php

exec(`/usr/local/bin/python /usr/home/jedarchi/public_html/production/python/getUnarchivedSeeds.py`);
$file = file_get_contents('/usr/home/jedarchi/public_html/production/python/missing_seeds.txt');
echo $file
?>
