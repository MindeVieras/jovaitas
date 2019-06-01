<?php

/**
 * @file
 * Jovaitas Admin configuration page functions.
 */

/**
 * Form constructor for the admin config form.
 *
 * @ingroup forms
 */
function jovaitas_admin_settings_form($form, &$form_state) {

  $form['shop_address'] = [
    '#type' => 'textfield',
    '#title' => t('Parduotuvės adresas'),
    '#default_value' => variable_get('shop_address', ''),
  ];
  $form['phone_nr'] = [
    '#type' => 'textfield',
    '#title' => t('Parduotuvės telefono numeris'),
    '#default_value' => variable_get('phone_nr', ''),
  ];
  $form['phone_nr1'] = [
    '#type' => 'textfield',
    '#title' => t('Papildomas telefono numeris'),
    '#default_value' => variable_get('phone_nr1', ''),
  ];
  $form['fax_nr'] = [
    '#type' => 'textfield',
    '#title' => t('Faxas'),
    '#default_value' => variable_get('fax_nr', ''),
  ];
  $form['fax_nr1'] = [
    '#type' => 'textfield',
    '#title' => t('Papildomas faxas'),
    '#default_value' => variable_get('fax_nr1', ''),
  ];
  $form['email_addr'] = [
    '#type' => 'textfield',
    '#title' => t('Emailas'),
    '#default_value' => variable_get('email_addr', ''),
  ];
  $form['email_addr1'] = [
    '#type' => 'textfield',
    '#title' => t('Papildomas email'),
    '#default_value' => variable_get('email_addr1', ''),
  ];
  $form['work_hours'] = [
    '#type' => 'textfield',
    '#title' => t('Parduotuvės darbo laikas'),
    '#default_value' => variable_get('work_hours', t('darbo laikas')),
  ];
  $form['pristatymas'] = [
    '#type' => 'textfield',
    '#title' => t('Pristatymas'),
    '#default_value' => variable_get('pristatymas', t('1-3 darbo dienos')),
  ];
  $form['siuntimas'] = [
    '#type' => 'textfield',
    '#title' => t('Siuntimas'),
    '#default_value' => variable_get('siuntimas', t('Nuo 70eur nemokamas.')),
  ];
  $form['grazinimai'] = [
    '#type' => 'textfield',
    '#title' => t('Grąžinimai'),
    '#default_value' => variable_get('grazinimai', t('Elektros prekės atgal nepriimamos, keičiamos tik brokuotos prekės')),
  ];

  return system_settings_form($form);
}
