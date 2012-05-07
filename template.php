<?php
/**
 * @file
 * Contains theme override functions and preprocess functions for the theme.
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. You can modify or override Drupal's theme
 *   functions, intercept or make additional variables available to your theme,
 *   and create custom PHP logic. For more information, please visit the Theme
 *   Developer's Guide on Drupal.org: http://drupal.org/theme-guide
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   The Drupal theme system uses special theme functions to generate HTML
 *   output automatically. Often we wish to customize this HTML output. To do
 *   this, we have to override the theme function. You have to first find the
 *   theme function that generates the output, and then "catch" it and modify it
 *   here. The easiest way to do it is to copy the original function in its
 *   entirety and paste it here, changing the prefix from theme_ to qellupunuy_.
 *   For example:
 *
 *     original: theme_breadcrumb()
 *     theme override: qellupunuy_breadcrumb()
 *
 *   where qellupunuy is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_breadcrumb() function.
 *
 *   If you would like to override either of the two theme functions used in Zen
 *   core, you should first look at how Zen core implements those functions:
 *     theme_breadcrumbs()      in zen/template.php
 *     theme_menu_local_tasks() in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called template suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node-forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and template suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440
 *   and http://drupal.org/node/190815#template-suggestions
 */


/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function qellupunuy_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function qellupunuy_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function qellupunuy_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // qellupunuy_preprocess_node_page() or mapi2012_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function qellupunuy_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function qellupunuy_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  $variables['classes_array'][] = 'count-' . $variables['block_id'];
}
// */

/**
 * Preprocess variables
 */
  global $language;
  $lang = $language->language;
  switch ($lang) {
    case 'es':
      $GLOBALS['fblang'] = 'es_LA';
      $GLOBALS['gplang'] = 'es-419';
      $GLOBALS['twlang'] = 'es';
    break;
    case 'en':
      $GLOBALS['fblang'] = 'en_US';
      $GLOBALS['gplang'] = '';
      $GLOBALS['twlang'] = '';
    break;
    case 'pt-br':
      $GLOBALS['fblang'] = 'pt_BR';
      $GLOBALS['gplang'] = 'pt-BR';
      $GLOBALS['twlang'] = 'pt';
    break;
  }

/*
	Estilos específicos de la página de inicio
	Sólo se cargan cuando estamos en <front>
*/
if(drupal_is_front_page()) {
	$options = array(
		'group'  => CSS_THEME,
		'weight' => 10,
		'preprocess' => FALSE
	);
  drupal_add_css(drupal_get_path('theme', 'qellupunuy') . "/styles/page-front.css", $options);
  drupal_add_js(drupal_get_path('theme', 'qellupunuy') . "/scripts/page-front.js", array('weight'=>15));
  
  $og_attributes = array('og:url', 'og:title', 'og:image', 'og:description', 'fb:app_id');
  
  foreach ($og_attributes as $k => $og_attribute) {
    $attr = theme_get_setting($og_attribute);
    if(!empty($attr)) {
      $element = array(
        '#tag' => 'meta',
        '#weight' => ($k + 10),
        '#attributes' => array(
          'property' => $og_attribute,
          'content' => $attr,
        ),
      );
      drupal_add_html_head($element, "qelluchaska_meta_$og_attribute");
    }
  }
}

function qellupunuy_preprocess_search_block_form(&$variables, $hook) {
  $variables['form']['search_block_form']['#title'] = t('');
  $variables['form']['search_block_form']['#attributes'] = array('placeholder' => "Ejm: Hotel en Machupicchu");
   
  // Rebuild the rendered version (search form only, rest remains unchanged)
  unset($variables['form']['search_block_form']['#printed']);
  $variables['search']['search_block_form'] = drupal_render($variables['form']['search_block_form']);
     
  // Collect all form elements to make it easier to print the whole form.
  $variables['search_form'] = implode($variables['search']);
} // End phptemplate_preprocess_search_block function

