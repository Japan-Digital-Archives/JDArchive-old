<tr>
  <th>
    <?= $this->t('location'); ?>
  </th>
  <td>
    <input type="text" id="address" name="location" size="60" />
    <button type="button" id="geocode_button">Find on Map!</button>
    <div id="map_canvas"></div>
    <ul id="location_list">
    </ul>
  </td>
</tr>
