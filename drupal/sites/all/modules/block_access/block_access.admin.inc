<?php
// $Id$
/*
 * @file block_access.admin.inc
 * Admin interfaces for block_access module
 */

function block_access_admin_list() {
  $form['list'] = array();
  $modules = module_implements('block_info');
  return theme('block_access_admin_list', array('modules' => $modules));
}

function block_access_module_form($form, &$form_state, $module) {
  $form = array();
  $form['module'] = array(
    '#type' => 'hidden',
    '#value' => $module
  );
  $delta = 0;
  $role_options = user_roles();
  // Add fieldset for each permission
  block_access_fieldset($form, $role_options, 'view', $module, $delta);
  block_access_fieldset($form, $role_options, 'move', $module, $delta);
  block_access_fieldset($form, $role_options, 'enable', $module, $delta);
  block_access_fieldset($form, $role_options, 'disable', $module, $delta);
  block_access_fieldset($form, $role_options, 'config', $module, $delta);
  block_access_fieldset($form, $role_options, 'delete', $module, $delta);
  block_access_fieldset($form, $role_options, 'config_lang', $module, $delta);
  block_access_fieldset($form, $role_options, 'config_title', $module, $delta);
  block_access_fieldset($form, $role_options, 'config_desc', $module, $delta);
  block_access_fieldset($form, $role_options, 'config_body', $module, $delta);
  block_access_fieldset($form, $role_options, 'config_region', $module, $delta);
  block_access_fieldset($form, $role_options, 'config_page_visibility', $module, $delta);
  block_access_fieldset($form, $role_options, 'config_type_visibility', $module, $delta);
  block_access_fieldset($form, $role_options, 'config_role_visibility', $module, $delta);
  block_access_fieldset($form, $role_options, 'config_user_visibility', $module, $delta);
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Save'),
  );
  return $form;
}

function block_access_module_form_submit($form, &$form_state) {
  $values = $form_state['values'];
  $module = $values['module'];
  block_access_config_set_roles('view',          $values['view_roles'], $module, $delta);
  block_access_config_set_roles('move',          $values['move_roles'], $module, $delta);
  block_access_config_set_roles('enable',        $values['enable_roles'], $module, $delta);
  block_access_config_set_roles('disable',       $values['disable_roles'], $module, $delta);
  block_access_config_set_roles('config',        $values['config_roles'], $module, $delta);
  block_access_config_set_roles('delete',        $values['delete_roles'], $module, $delta);
  block_access_config_set_roles('config_lang',   $values['config_lang_roles'], $module, $delta);
  block_access_config_set_roles('config_title',  $values['config_title_roles'], $module, $delta);
  block_access_config_set_roles('config_desc',   $values['config_desc_roles'], $module, $delta);
  block_access_config_set_roles('config_body',   $values['config_body_roles'], $module, $delta);
  block_access_config_set_roles('config_region', $values['config_region_roles'], $module, $delta);
  block_access_config_set_roles('config_type',   $values['config_type_visibility_roles'], $module, $delta);
  block_access_config_set_roles('config_user',   $values['config_user_visibility_roles'], $module, $delta);
  block_access_config_set_roles('config_role',   $values['config_role_visibility_roles'], $module, $delta);
  block_access_config_set_roles('config_page',   $values['config_page_visibility_roles'], $module, $delta);
}
