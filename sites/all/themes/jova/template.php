<?php

/**
 * Implement hook_preprocess_html()
 */
function jova_preprocess_html(&$vars) {

  drupal_add_css('https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css', array(
   'type' => 'external'
  ));
  drupal_add_css('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css', array(
   'type' => 'external'
  ));
	drupal_add_css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css', array(
		'type' => 'external'
	));
	drupal_add_js('https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', array(
		'type' => 'external'
	));
	drupal_add_js('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js', array(
		'type' => 'external'
	));
}

/**
 * Implements hook_preprocess_page().
 */
function jova_preprocess_page(&$variables) {
  drupal_add_library('system', 'ui');
  drupal_add_library('system', 'ui.tabs');
}

/**
 * Implements hook_css_alter().
 */
function jova_css_alter(&$css) {
  unset($css['modules/poll/poll.css']);
  unset($css['modules/system/system.menus.css']);
  unset($css['modules/system/system.theme.css']);
  unset($css['modules/node/node.css']);
  unset($css['profiles/commerce_kickstart/modules/contrib/views/css/views.css']);
}
/**
 * Implements theme_menu_local_tasks().
 */
function jova_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<ul class="nav nav-tabs">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  return $output;
}

function jova_form_system_site_information_settings_alter(&$form, $form_state, $form_id) {
  $form['site_information']['mymodule_site_organisation'] = array(
    '#type' => 'textfield',
    '#title' => t('Site Organization'),
    '#default_value' => variable_get('mymodule_site_organisation', ''),
  );
  $form['#submit'][] = 'mymodule_handler';
}
function jova_handler($form, &$form_state) {
  variable_set('mymodule_site_organisation', $form_state['values']['mymodule_site_organisation']);
}

/**
 * Return a themed breadcrumb trail.
 *
 */
function jova_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div id="breadcrumbs">' . implode(' / ', $breadcrumb) . '</div>';
    return $output;
  }
}

/**
 * Implements hook_menu_tree().
 */
function jova_menu_tree($variables) {
  return '<ul class="side-menu">' . $variables['tree'] . '</ul>';
}

/**
 * Implements hook_form_alter().
 */
function jova_form_alter(&$form, &$form_state, $form_id) {

  if($form_id == 'contact_site_form'){
    $form['#attributes']['class'][] = 'kontaktu-forma';
    $form['copy']['#access'] = 0;
    $form['cid']['#access'] = FALSE;
  }
  
  if ($form_id == 'commerce_addressbook_customer_profile_form') {
    $form['actions']['submit']['#value'] = t('Išsaugoti profilį');
  }

  if ($form_id == 'commerce_checkout_form_checkout') {
    $form['buttons']['cancel']['#prefix'] = '<span class="button-operator">'.t('arba').'</span>';
  }
  if ($form_id == 'commerce_checkout_form_shipping') {
    $form['buttons']['back']['#prefix'] = '<span class="button-operator">'.t('arba').'</span>';
  }

  if(strpos($form_id, 'commerce_cart_add_to_cart_form') !== FALSE) {

    $form['#prefix'] = '<i class="fa fa-shopping-cart"></i>';
    //$form['submit']['#prefix'] = '<div class="ideti">'.t('Į krepšely').'</div>';
    $form['submit']['#value'] = t('Į krepšelį');
  }

  if($form_id == 'views_form_commerce_cart_form_default'){
    //$form['#attributes']['class'][] = 'your-class';
    //$form['edit_delete'][0]['#value']
    // $del_butt = array($form['edit_delete']);
    // foreach ($del_butt as $key => $value) {
    //   $value[$key] = 'X';
    // }
  }

  if($form_id == 'commerce_checkout_form_checkout'){
    //$form['#attributes']['class'][] = 'your-class';
    unset($form['cart_contents']['#title']);
  }

  return $form;
}