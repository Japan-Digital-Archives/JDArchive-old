<? foreach($this->images as $img) { ?>
    <tr>
        <th></th>
        <td>
            <img src="<?= $img->getUrlPath() ?>" alt="<?= $img->getDescription() ?>" /> 
            <br /> 
            <?= $img->getDescription() ?>
            <? if ($img->getTags()) { ?>
                <ul>
                <? foreach($img->getTags() as $tag) {?>
                    <li><?= $tag ?></li>
                <? } ?>
                </ul>
            <? } ?>
        </td>
    </tr>
<? } ?>
