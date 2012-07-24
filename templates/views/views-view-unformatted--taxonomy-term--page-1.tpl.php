<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<table class="simple-prices">
<thead>
  <th><?php print t('Lodging'); ?></th>
  <th><?php print t('Price'); ?></th>
  <th><?php print t('Stars'); ?></th>
  <th><?php print t('Share'); ?></th>
</thead>
<tbody>
<?php foreach ($rows as $id => $row): ?>
  <?php print $row; ?>
<?php endforeach; ?>
</tbody>
</table>
