<?php
// $id$

/**
 * @file
 * Admin interface for the WYSIWYG fix.
 */

/**
 * Adds fieldset and elements to accessibility_fix admin form.
 */
function accessible_fix_admin_module_fixes_wysiwyg($form) {

 $message = accessible_fix_admin_module_fixes_wysiwyg_get_problems();
 $is_acheck_available = accessible_fix_wysiwyg_is_acheck_avialable();

 $form['accessible_fix_wysiwyg'] = array(
   '#type' => 'fieldset',
   '#title' => t('WYSIWYG Fixes'),
   '#collapsible' => TRUE,
   // Open if WYSIWYG and TinyMCE are enabled, but acheck cannot be found.
   '#collapsed' => !is_null($message) || $is_acheck_available ,
   '#description' => '<p>' .
     t('If you want accessibility checking functionality, ' .
     'please download Achecker from ' .
     l('Atutor', 'http://www.atutor.ca/achecker/download.php') .
     '. Once downloaded, you will need to extract the "acheck" folder to ' .
     "TinyMCE's jscripts/tiny_mce/plugins folder.  For example, if you " .
     'extracted tinymce to sites/all/libraries, then extract "acheck" to ' .
     'sites/all/libraries/tinymce/jscripts/tiny_mce/plugins.') . '</p>',
   );

 if (is_null($message) && !$is_acheck_available) {
   $message = 'Acheck was not found.  Please make sure you extracted the ' .
              '"acheck" folder to the correct location.';
 }

 $form['accessible_fix_wysiwyg']['accessible_fix_wysiwyg_is_acheck_enabled'] = array(
   '#markup' => !is_null($message) ? ('<p>' . $message . '</p>'): ('<p>' . t('To enable the Achecker ' .
     'plugin, check the "Check Accessibility" checkbox for a '
     . l('WYSIWYG profile','admin/config/content/wysiwyg') . '.') . '<p>'),
 );


 return $form;

}

function accessible_fix_admin_module_fixes_wysiwyg_get_problems() {
  $message = NULL;
  if (!accessible_fix_wysiwyg_is_wysiwyg_enabled()) {
    $message = t('The WYSIWYG moduel is not enabled. Fix is not applicable.');
  } else if (!accessible_fix_wysiwyg_is_tinymce_avialable()) {
    $message = t('TinyMCE is not available.  Fix is not applicable');
  }
  return $message;
}
