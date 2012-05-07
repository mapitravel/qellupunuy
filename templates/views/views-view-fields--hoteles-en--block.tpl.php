<?php
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php 
	$title 	= $fields['title']->content;
	$path	= $fields['path']->content;
	$price  = $fields['field_precio']->content;
	$categoria = $fields['taxonomy_vocabulary_2']->content;
	$stars = explode(" ", $categoria);
	$stars = $stars[1];
?>
<tr class="simple-item">
  <th class="simple-name"><a href="<?php print $path; ?>"><?php print $title; ?></a></th>
  <td class="simple-price"><?php print t('From'); ?> <?php print $price; ?></td>
  <td class="simple-stars-data"><span class="simple-stars simple-stars-<?php print $stars; ?>"><em><?php print $categoria; ?></em></span></td>
</tr>