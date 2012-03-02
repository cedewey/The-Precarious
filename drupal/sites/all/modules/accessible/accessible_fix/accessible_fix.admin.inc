<?php

/**
 * @file
 * The accessible module admininstration interface.
 * Includes module_fix/MODULE.admin.inc files for additional functionality
 */

/**
 * Admin form for Accessible Fix module.
 *
 * @param $form_state
 *   A form state array.
 * @param $sid
 *   A LDAP server ID.
 *
 * @return
 *   The form structure.
 */


// which tpls have override examples in examples/<theme>/<name>.tpl
function accessible_fix_available_tpls() {
  $themes = list_themes();
  $tpl_overrides = array();
  $template_overrides_dir = drupal_get_path('module','accessible_fix') .'/theme_overrides';
  foreach (accessible_fix_overrideable_themes() as $theme_dir) {
    foreach (scandir($template_overrides_dir .'/'. $theme_dir) as $tpl) {
      if (strpos($tpl,".tpl.php") > 0  && strpos($tpl, "accessible-fix") === 0) {
        $tpl = str_replace("accessible-fix-" ,"", $tpl);
        $tpl_stem = str_replace(".tpl.php" ,"", $tpl);
        $tpl_overrides[$theme_dir ."_". $tpl_stem] = $theme_dir . '-' . $tpl;
      }
    }
  }
  return $tpl_overrides;
}

function accessible_fix_overrideable_themes() {

  $themes = list_themes();
  $tpl_overrides = array();
  $template_overrides_dir = drupal_get_path('module','accessible_fix') .'/theme_overrides';
  foreach (scandir($template_overrides_dir) as $theme_dir) {
    if (in_array($theme_dir, array_keys($themes)) && $themes[$theme_dir]->status == 1) {
      $tpl_overrides[] = $theme_dir;
    }
  }

  return $tpl_overrides;

}
