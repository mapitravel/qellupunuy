<?php
/**
 * @file
 * Contains theme override functions and preprocess functions for the theme.
 */

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
  $variables['form']['search_block_form']['#title'] = NULL;
  $variables['form']['search_block_form']['#attributes'] = array('placeholder' => "Ejm: Hotel en Machupicchu");
   
  // Rebuild the rendered version (search form only, rest remains unchanged)
  unset($variables['form']['search_block_form']['#printed']);
  $variables['search']['search_block_form'] = drupal_render($variables['form']['search_block_form']);
     
  // Collect all form elements to make it easier to print the whole form.
  $variables['search_form'] = implode($variables['search']);
}

/**
 * Implements theme_preprocess_html().
 */
function qellupunuy_preprocess_html(&$variables, $hook) {
  // URL JSON for Hotels.
  if (theme_get_setting('qpurl')) {
    drupal_add_js(array('qellupunuy' => array('qpurl' => theme_get_setting('qpurl'))), 'setting');
  }
  
  // Is it external?
  if (theme_get_setting('qpexternal')) {
    drupal_add_js(array('qellupunuy' => array('qpexternal' => 1)), 'setting');
  } else {
    drupal_add_js(array('qellupunuy' => array('qpexternal' => 0)), 'setting');
  }
}
