<?php

/**
 * Implements hook_menu().
 */
function jovaitas_menu() {
  $items['admin/config/people/jovaitas'] = array(
    'title' => 'Kiti nustatymai',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('admin_settings_form'),
    'access arguments' => array('administer users'),
    'type' => MENU_NORMAL_ITEM,
  );
  
  return $items;
}


/**
 * Admin form to configurable admin settings
 */
function admin_settings_form($form, &$form_state) {

  $form['shop_address'] = array(
    '#type' => 'textfield',
    '#title' => t('Parduotuvės adresas'),
    '#required' => false,
    '#default_value' => variable_get('shop_address', 'adresas'),
  );

  $form['phone_nr'] = array(
    '#type' => 'textfield',
    '#title' => t('Parduotuvės telefono numeris'),
    '#required' => false,
    '#default_value' => variable_get('phone_nr', 'telefono numeris'),
  );

  $form['phone_nr1'] = array(
    '#type' => 'textfield',
    '#title' => t('Papildomas telefono numeris'),
    '#required' => false,
    '#default_value' => variable_get('phone_nr1', 'papildomas numeris'),
  );

  $form['fax_nr'] = array(
    '#type' => 'textfield',
    '#title' => t('Faxas'),
    '#required' => false,
    '#default_value' => variable_get('fax_nr', 'faxo numeris'),
  );

  $form['fax_nr1'] = array(
    '#type' => 'textfield',
    '#title' => t('Papildomas faxas'),
    '#required' => false,
    '#default_value' => variable_get('fax_nr1', 'papildomas fax'),
  );

  $form['email_addr'] = array(
    '#type' => 'textfield',
    '#title' => t('Emailas'),
    '#required' => false,
    '#default_value' => variable_get('email_addr', 'email'),
  );

  $form['email_addr1'] = array(
    '#type' => 'textfield',
    '#title' => t('Papildomas email'),
    '#required' => false,
    '#default_value' => variable_get('email_addr1', 'email'),
  );
  
  $form['work_hours'] = array(
    '#type' => 'textfield',
    '#title' => t('Parduotuvės darbo laikas'),
    '#required' => false,
    '#default_value' => variable_get('work_hours', 'darbo laikas'),
  );

  $form['pristatymas'] = array(
    '#type' => 'textfield',
    '#title' => t('Pristatymas'),
    '#required' => false,
    '#default_value' => variable_get('pristatymas', '1-3 darbo dienos'),
  );

  $form['siuntimas'] = array(
    '#type' => 'textfield',
    '#title' => t('Siuntimas'),
    '#required' => false,
    '#default_value' => variable_get('siuntimas', 'Nuo 100eur nemokamas.'),
  );

  $form['grazinimai'] = array(
    '#type' => 'textfield',
    '#title' => t('Grąžinimai'),
    '#required' => false,
    '#default_value' => variable_get('grazinimai', 'Elektros prekės atgal nepriimamos, keičiamos tik brokuotos prekės'),
  );
 
  return system_settings_form($form);
}

// function grazinimai_form($form, &$form_submit) {
//   $form['firstname'] = array(
//     '#title' => t('First Name'),
//     '#type' => 'textfield',
//     //'#required' => TRUE,
//   );
//   $form['lastname'] = array(
//     '#title' => t('Client Name'),
//     '#type' => 'textfield',
//     //'#required' => TRUE,
//   );
//   $form['submit'] = array(
//     '#value' => 'Test',
//     '#type' => 'submit',
//   );
//   return $form;
// }

// function grazinimai_form_form_submit($form_id, &$form_state) {

// }

// function jovaitas_commerce_line_item_type_info() {
//   $line_item_types = array();
 
//   $line_item_types['naujausias'] = array(
//     'type' => 'naujausias', 
//     'name' => t('Naujausias'), 
//     'description' => t('Nuajausiu prekiu isdestymas.'), 
//     'product' => TRUE, 
//     'add_form_submit_value' => t('Add product'), 
//     'base' => 'commerce_product_line_item',
//   );
 
//   return $line_item_types;
// }