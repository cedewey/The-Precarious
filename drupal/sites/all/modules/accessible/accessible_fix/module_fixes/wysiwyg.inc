<?php
// $id$

/**
 * Implementation of hook_wysiwyg_plugin()
 *
 * Adds the acheck plugin as a tinymce WYSIWYG option.  Must have downloaded and
 * and extracted the acheck folder to:
 * sites/all/libraries/tinymce/jscripts/tinymce/plugins/
 */
function accessible_fix_wysiwyg_plugin($editor) {
  if ($editor == 'tinymce' && accessible_fix_wysiwyg_is_acheck_avialable()) {
    $plugins = array(
      'acheck' => array(
        'path' => $editor['library path'] . '/plugins/tinymce',
        'title' => t('Check Accessibility'),
        'url' => 'http://www.atutor.ca/achecker/download.php',
        'buttons' => array('acheck' => t('Check Accessibility')),
        'internal' => TRUE,
        'load' => TRUE,
      ),
    );
    return $plugins;
  }
}

/**
 * Checks for WYSIWYG.
 *
 * @return TRUE if the WYSIWYG module is available.  FALSE otherwise.
 */
function accessible_fix_wysiwyg_is_wysiwyg_enabled() {
 return module_exists('wysiwyg');
}

/**
 * Checks for TinyMCE.
 *
 * @return TRUE if the TinyMCE library is available.  FALSE otherwise.
 */
function accessible_fix_wysiwyg_is_tinymce_avialable() {
  $tinymce_path = wysiwyg_get_path('tinymce');
  return file_exists($tinymce_path . '/jscripts/tiny_mce/tiny_mce.js');
}

/**
 * Checks for acheck.
 *
 * @return TRUE if the acheck plugin is available.  FALSE otherwise.
 */
function accessible_fix_wysiwyg_is_acheck_avialable() {
  $tinymce_path = wysiwyg_get_path('tinymce');
  return file_exists($tinymce_path . '/jscripts/tiny_mce/plugins/acheck/editor_plugin.js');
}
