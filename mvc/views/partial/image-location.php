<h2><?= $this->t('image_choose_location'); ?></h2>

<span class="note"><?= $this->t('image_location_note') ?></span><br />
<input type="text" id="image_address" name="location" size="60" />
<button type="button" id="image_geocode_button"><?= $this->t('location_find_on_map') ?></button>

<div id="image_map_canvas"></div>
