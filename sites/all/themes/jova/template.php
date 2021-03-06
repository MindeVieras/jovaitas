<?php

/**
 * Implement hook_preprocess_html()
 */
function jova_preprocess_html(&$vars) {

	drupal_add_css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(
		'type' => 'external'
	));
}

/**
 * Implements hook_preprocess_page().
 */
function jova_preprocess_page(&$variables) {
  // drupal_add_library('system', 'ui');
  // drupal_add_library('system', 'ui.tabs');
}

/**
 * Implements hook_css_alter().
 */
function jova_css_alter(&$css) {
  unset($css['modules/poll/poll.css']);
  unset($css['modules/system/system.menus.css']);
  unset($css['modules/system/system.theme.css']);
  unset($css['misc/ui/jquery.ui.core.css']);
  unset($css['misc/ui/jquery.ui.theme.css']);
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
function jova_menu_tree__menu_kategorijos($variables) {
  return '<ul class="categories-menu">' . $variables['tree'] . '</ul>';
}

/**
 * Implements hook_menu_link().
 */
function jova_menu_link($variables) {

  // Default menu output
  $element = $variables['element'];
  $sub_menu = '';
  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);

  // Categories menu output
  if ($element['#original_link']['menu_name'] == 'menu-kategorijos') {
    $arrow_icon = '';
    $menu_link = l($element['#title'], $element['#href'], $element['#localized_options']);

    // Append arrow icon if #below (submenu)
    if ($element['#below']) {
      $arrow_icon = '<div class="expand-icon"><i class="fa fa-chevron-right"></i></div>';
    }

    $output = '<span class="cat-link">' . $menu_link . $arrow_icon . '</span>';

  }

  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
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
    // var_dump($form);
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

/**
 * Implements hook_preprocess_views_view().
 *
 * Add collection term as view header.
 */
function jova_preprocess_views_view(&$vars) {
  $view = $vars['view'];
  if ($view->name == 'collection_products') {
    if ($view->current_display == 'page') {
      // Keep the previous theming.
      $vars['classes_array'][] = 'view-collection-taxonomy-term';
      $tid = $view->args['0'];
      $term = taxonomy_term_load($tid);
      $vars['collection_title'] = $term->name;
      $vars['collection_image_url'] = NULL;
      if (!empty($term->field_image) && !empty($term->field_image[LANGUAGE_NONE][0]['uri'])) {
        $vars['collection_image_url'] = file_create_url($term->field_image[LANGUAGE_NONE][0]['uri']);
      }
    }
  }
}
