<? 

$letters = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
foreach($this->images as $img) { ?>
    <tr>
        <th></th>
        <td>
            
            <a class="fancybox" href="<?= $img->getUrlPath('original') ?>"><img src="<?= $img->getUrlPath() ?>" alt="<?= $img->getDescription() ?>" /></a>
             
            <table>
            <tr>
                <td><?= $this->t('image_description'); ?></td>
                <td><?= $img->getDescription() ?></td>
            </tr>
            <br />
            <? if ($img->getTags()) { ?>
                <tr>
                    <td><?= $this->t('image_tags'); ?></td>
                    <td><?= implode(', ', $img->getTags()) ?></td>
                </tr>
            <? } ?>
            <? if ($img->getAddress()) { ?>
                <tr>
                    <td><?= $this->t('image_location'); ?></td>
                    <td><?= $img->getAddress() ?></td>
                </tr>
            <? } ?>
            <? if ($img->getLat() && $img->getLng()) { 
                   
                   $markLetter = array_shift($letters); ?>
                   <tr>
                   <td></td><td><img src='/mvc/img/markers/green_<?= $markLetter ?>.png' /><?  
                   echo '&nbsp;&nbsp;(' . $img->getLat() . ', '. $img->getLng() . ')';
                   ?>
                   <script type="text/javascript">
                   $(document).ready(function() {
                        new JA_Image_Marker(JA_Map.instance.map, new google.maps.LatLng(<?= $img->getLat() ?>, <?= $img->getLng() ?>), '');
                        JA_Marker.showAll();
                       });
                   </script>
                   <?
               }  
            ?>
            </table>
        </td>
    </tr>
<? } ?>
