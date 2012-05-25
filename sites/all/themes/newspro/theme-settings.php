<?php

function newspro_form_system_theme_settings_alter(&$form, $form_state) {

  $form['advansed_theme_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Advansed Theme Settings'),
  );

  $form['advansed_theme_settings']['tm_skin'] = array(
    '#type' => 'select',
    '#title' => t('Theme Skin'),
    '#default_value' => theme_get_setting('tm_skin'),
    '#options' => array (
      0 => t('Blue'),
	  1 => t('Green'),
	  2 => t('Red'),
    ),
  );
  
  $form['advansed_theme_settings']['tm_page'] = array(
    '#type' => 'select',
    '#title' => t('Page'),
    '#default_value' => theme_get_setting('tm_page'),
    '#options' => array (
      0 => t('Right Sidebar'),
	  1 => t('Full Width'),
    ),
  );
}

