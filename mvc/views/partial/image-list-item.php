<div class="image-list-sub-item">
    <label for="image_upload[<?= $this->id ?>][description]"><?= $this->t('image_description') ?></label>&nbsp;
    <input type="text" class="text-input" name="image_upload[<?= $this->id ?>][description]" value="<?= $this->name ?>" />
</div>

<div class="image-list-sub-item">
    <label for="image_upload[<?= $this->id ?>][tags]"><?= $this->t('image_tags') ?></label>&nbsp;
    <input type="text" class="text-input tagbox" id="tagbox_<?= $this->id ?>" name="image_upload[<?= $this->id ?>][tags]" value="" />
    <div class="instructions"><?= $this->t('image_tags_instructions') ?></div>
</div>

<div class="image-list-sub-item image_location" id="image_location_<?= $this->id ?>">
    <label for="image_upload[<?= $this->id ?>][address]"><?= $this->t('image_location') ?></label>&nbsp;
    <input type="text" id="image_address_<?= $this->id ?>" class="address-input" name="image_upload[<?= $this->id ?>][address]" name="location" size="60" value="<?= isset($this->address) ? $this->address : '' ?>" />
    <button type="button" class="geocode_button" onClick="JA.setImageLocation('<?= $this->id ?>')"><?= $this->t('location_find_on_map') ?></button>
    <script>$('#image_address_<?= $this->id ?>').bind("keypress", function(e) {if (e.keyCode == 13) {JA.setImageLocation('<?= $this->id ?>');return false;}});</script>
    <div class="marker_info">
    </div>
    <input type="hidden" class="lat" name="image_upload[<?= $this->id ?>][lat]" value="" />
    <input type="hidden" class="lng" name="image_upload[<?= $this->id ?>][lng]" value="" />
</div>
<input type="hidden" class="name" name="image_upload[<?= $this->id ?>][name]" value="<?= $this->id ?>" />
<input type="hidden" class="ext" name="image_upload[<?= $this->id ?>][ext]" value="<?= $this->ext ?>" />

