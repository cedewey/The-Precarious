<?php

function accessible_fix_admin_module_fixes_block($form) {
 require_once('block.documentation.inc');
 $form['accessible_fix']['block'] = array(
  '#type' => 'fieldset',
  '#title' => t('Block Fixes'),
  '#collapsible' => TRUE,
  '#collapsed' => TRUE,
 );

  $form['accessible_fix']['block']['invisible_block_headings'] = array(
  '#markup' => $invisible_block_headings,
 );


 return $form;

}

function accessible_fix_admin_module_fixes_block_submit($form, &$form_state) {



}

function accessible_fix_accessibility_api_data_alter_block($accessibility_data) {
  // roles that should automatically be added to structures; not selectable in user interface

  $accessibility_data['aria_fixed_roles']['blocks'] = array(
   'aggregator' => array('complementary'),
   'blog' => array('navigation'),
   'book' => array('navigation'),
   'comment' => array('navigation'),
   'forum' => array('navigation'),
   'help' => array('complementary'),
   'locale' => array('complementary'),
   'menu' => array('navigation'),
   'node_syndicate' => array('complementary'),
   'node_recent' => array('navigation'),
   'poll' => array('complementary'),
   'profile' => array('complementary'),
   'search' => array('search'),
   'shortcut' => array('navigation'),
   'statistics' => array('navigation'),
   'system_main' => array('main'),
   'system_powered-by' => array('complementary'),
   'system_help' => array('complementary'),
   'user_login' => array('form'),
   'user_new' => array('complementary'),
   'user_online' => array('complementary'),
   'system_main' => array('main'),
    );

   return $accessibility_data;
}
