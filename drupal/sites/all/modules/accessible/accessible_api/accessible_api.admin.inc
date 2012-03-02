<?php

/**
 * @file
 * The accessible module admininstration interface.
 *
 */

/**
 * Admin form for Accessible API  module.
 *
 * @param $form_state
 *   A form state array.
 * @param $sid
 *   A LDAP server ID.
 *
 * @return
 *   The form structure.
 */
function accessible_api_admin_edit($form, &$form_state, $op) {

  if ($op == "edit" || $op == NULL) {

    $options = accessible_api_options('functionality');
    $default_options = array_keys(accessible_api_data('functionality'));


    /** 'functionality' section */
    $form['functionality'] = array(
      '#type' => 'fieldset',
      '#title' => t('Accessibility Functionality'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
    );
    $form['functionality']['functionality'] = array(
        '#type' => 'checkboxes',
        '#title' => 'Accessibility Functionality',
        '#size' => 10,
        '#options' => $options,

      );
//         '#default_value' =>  accessible_api_settings('functionality')
    accessible_api_add_fields($form);

    /** 'preferences' section */
    $form['preferences'] = array(
      '#type' => 'fieldset',
      '#title' => t('Accessibility Preferences'),
      '#description' =>t('Many of the options below are simply preferences.
            Modules and themes within Drupal may or may not follow them.'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
    );

    $options = accessible_api_options('guideline_types');
    $form['preferences']['guideline_types'] = array(
        '#type' => 'checkboxes',
        '#title' => 'Guidelines to be Followed',
        '#size' => 10,
        '#options' => $options,

      );
    //        '#default_value' =>  accessible_api_settings('guideline_types'),

    $options = accessible_api_options('tools');
    $form['preferences']['tools'] = array(
        '#type' => 'checkboxes',
        '#title' => 'Tools you would like to utilize.',
        '#size' => 10,
        '#options' => $options,

      );

    $form['preferences']['prefs_in_theme'] = array(
        '#type' => 'checkbox',
        '#title' => 'Make accessibility preferences available in theme layer as "accessible" variable.',
        '#description' => t('By allowing these settting to be available in the theme
          layer, some themes can change the way their html markup is done to
          meet your preferences.'),
    );

    $form['buttons']['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Update'),
    );

    return $form;
  }
  else {
    drupal_goto(ACCESSIBLE_MENU_BASE_PATH);
  }
}

/**
 * Submit hook for the admin settings form.
 */
function accessible_api_admin_edit_submit($form, &$form_state) {

  $form_state['storage']['old_accessible_api_settings'] = accessible_api_settings();
  form_state_values_clean($form_state);
  $settings = array();
  foreach ($form_state['values'] as $id => $data) {
    $value = is_array($data) ? array_filter($data) : $data;
    $settings[$id] = $value;
  }
  accessible_api_settings_save($settings);
  drupal_set_message(t('The configuration options have been saved.'));
  $form_state['redirect'] = ACCESSIBLE_MENU_BASE_PATH;
}

function accessible_api_add_fields(&$form, $type = NULL) {
  $data = accessible_api_data($type);
  foreach ($data as $id => $items) {
    if (isset($items['form'])) {
      $form = array_merge($form, $items['form']);
    }
  }
}

function accessible_api_options($type) {
  $data = accessible_api_data($type);
  $options = array();
  foreach ($data as $id => $item) {
    if (!isset($item['form'])) {
      $options[$id] = "<strong>" . $item['title'] . "</strong>. " . $item['description'];
      if (@$item['reference']) {
        $options[$id] .= ' '. l($item['reference'], $item['reference']);
      }
    }
  }
  return $options;
}


