<?php

/**
 * Implements hook_block_info().
 *
 */
function jovaitas_block_info() {

  $blocks = [];

  $blocks['block_top_bar'] = [
    'info' => 'Jovaitas: Virsutine editinama justa.',
    'cache' => DRUPAL_NO_CACHE
  ];

  return $blocks;
}

/**
 * Implements hook_block_configure().
 *
 */
function jovaitas_block_configure($delta = '') {

  $form = [];

  switch ($delta) {
    case 'block_top_bar':
      $form['top_bar_content'] = [
        '#type' => 'text_format',
        '#title' => 'Turinys',
        '#description' => 'Įrašykite viršutinės juostos tekstą.',
        '#default_value' => variable_get('top_bar_content', 'Viršutines juostos tekstas.'),
      ];
      break;
  }

  return $form;
}


/**
 * Implements hook_form_alter().
 *
 */
function jovaitas_form_alter(&$form, &$form_state, $form_id) {

  switch ($form_id) {
    case 'block_admin_configure':
      $form['#after_build'][] = 'after_block_form_after_build';
      break;
  }
}

// Block Form after_build function
function after_block_form_after_build($form) {
  
  // Remove unwanted form fields
  unset($form['settings']['title']);
  unset($form['settings']['top_bar_content']['format']['guidelines']);
  unset($form['regions']);
  unset($form['visibility_title']);
  unset($form['visibility']);
  
  // Alter form
  $form['settings']['top_bar_content']['format']['#attributes'] = array('hidden' => true);
  $form['actions']['submit']['#value'] = 'Išsaugoti';
  
  return $form;
}

/**
 * Implements hook_block_save().
 *
 */
function jovaitas_block_save($delta = '', $edit = array()) {
  
  // We need to save settings from the configuration form.
  // We need to check $delta to make sure we are saving the right block.  
  switch ($delta) {
    case 'block_top_bar':
      // Have Drupal save the string to the database.
      variable_set('top_bar_content', $edit['top_bar_content']['value']);
      break;
  }
}

/**
 * Implements hook_block_view().
 *
 */
function jovaitas_block_view($delta = '') {

  $block = [];

  switch ($delta) {
    case 'block_top_bar':
      $block['subject'] = t('My Block Title');
      $block['content'] = _top_bar_content_callback();
      break;
  }

  return $block;
}

function _top_bar_content_callback() {

  $content = variable_get('top_bar_content', 'Viršutines juostos tekstas.');

  $edit_url = "/admin/structure/block/manage/jovaitas/block_top_bar/configure";
  return theme('top_bar_template', ['content' => $content, 'edit_url' => $edit_url]);
}

/**
 * Implements hook_theme().
 *
 */
function jovaitas_theme() {

  return [
    'top_bar_template' => [
      'template'  => 'templates/topbar'
    ]
  ];
}
