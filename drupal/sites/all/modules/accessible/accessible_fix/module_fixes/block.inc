<?php



/**
 * Implements hook_form_FORM_ID_alter()
 */

function accessible_fix_form_block_add_block_form_alter(&$form, $form_state) {
  require_once('block.configure.form.inc');
  _accessible_fix_form_block_admin_configure_alter($form, $form_state);
}


function accessible_fix_form_block_admin_configure_alter(&$form, $form_state) {
  require_once('block.configure.form.inc');
  _accessible_fix_form_block_admin_configure_alter($form, $form_state);

}


/**
 * submit function is added in above form alters, so needs to be at module level so its available
 */
function accessible_fix_block_form_submit($form_id, $form_state) {
  require_once('block.configure.form.inc');
  _accessible_fix_block_form_submit($form_id, $form_state);
}


/**
 * implements hook_preprocess_block
 * to get block's accessibility configuration in block template
 * as variables
**/
function accessible_fix_preprocess_block(&$variables) {

  $storage_id = $variables['block']->module .'_'. $variables['block']->delta;
  $block_access_data = accessible_fix_get_data('block', $storage_id);
  $conf = accessible_api_settings('functionality');

  $variables['block']->accessible = new stdClass;  // need to make available even if empty for themeing

  /**
   * author configured data
   */

  $author_aria_roles = array();
  if ($block_access_data) {
    $author_aria_roles = array_keys($block_access_data['aria_roles']);

    foreach ($block_access_data as $key => $value) {
      $variables['block']->accessible->{$key} = $value;
    }

    // get data into block array http://drupal.org/node/254940#html-class-variable
    if (@$variables['block']->accessible->heading_invisible) {
      $variables['title_attributes_array']['class'][] = 'element-invisible';
    }
  }

  // get fixed block aria roles from api data array
  $fixed_aria_roles = array();
  if (isset($conf['fixed_aria_roles']) && (boolean)$conf['fixed_aria_roles']) {
    $aria_fixed_roles_blocks = accessible_api_data('aria_fixed_roles', 'blocks');
    if (isset($aria_fixed_roles_blocks[$storage_id])) {
      $fixed_aria_roles = $aria_fixed_roles_blocks[$storage_id];
    }
    elseif (isset($aria_fixed_roles_blocks[$variables['block']->module])) {
      $fixed_aria_roles = $aria_fixed_roles_blocks[$variables['block']->module];
    }
  }

  $current_roles = (isset($variables['content_attributes_array']['role']) && $variables['content_attributes_array']['role']) ? $variables['content_attributes_array']['role'] : array();

  $variables['content_attributes_array']['role'] = array_unique(array_merge($current_roles, $author_aria_roles, $fixed_aria_roles));
  // duplicates should be resolved in drupal_attributes() function with array_unique, but isn't yet. todo is patch

  if (accessible_api_settings('functionality','skip_nav')) {

    foreach ($variables['elements'] as $id => $element) {
      if ($id == '#block' &&
          (
           @in_array('block-menu', $variables['classes_array']) ||
           @in_array('navigation', $variables['content_attributes_array']['role'])
           )
         ) {
        $achor_name = 'end-menu-'. $element->bid;
        $variables['title_suffix'][] = array(
          '#markup' => l(
            t("skip !menu_name navigation", array('!menu_name' => $element->subject)),
            current_path(),
            array(
              'attributes' => array('class' => array('element-invisible')),
              'fragment' => $achor_name,
              )
            ),
          );
        $variables['content'] .= "<a id=\"$achor_name\"></a>";

      }
    }
  }
}
