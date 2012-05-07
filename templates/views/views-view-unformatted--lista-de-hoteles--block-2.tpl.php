<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
  <?php $flag = ($id%2==0) ? 'omega' : 'alpha'; ?>
  <div class="<?php print $classes_array[$id]; ?> grid_5 <?php print $flag; ?>">
    <?php print $row; ?>
  </div>
<?php if($flag == 'omega') :?>
	<div class="grid_1">&nbsp;</div>
<?php endif; ?>
<?php endforeach; ?>
