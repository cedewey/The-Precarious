<?php


function accessible_fix_form_alter(&$form, $form_state, $form_id) {
  require_once('node.configure.form.inc');
  _accessible_fix_form_alter($form, $form_state, $form_id );

}

/**
 * submit function is added in above form alters, so needs to be at module level so its available
 */
function accessible_fix_node_form_submit($form_id, $form_state) {
  require_once('node.configure.form.inc');
  _accessible_fix_node_form_submit($form_id, $form_state);
}



/** this is the strangest hack.  since the title and title attributes are stored at the node
 * level, they must propagate up to the page level.  title does fine propagating upward, but title attributes do not.
 * so need to use a global and hook_node_view to get the values to page_preprocess function.
 *
 * not even sure how to articulate this as a feature/bug in drupal issue queue
 */

function accessible_fix_node_view($node, $view_mode) {
  global $accessible_fix_node_to_page_invisible_heading;
  if ($a11y = accessible_fix_get_data('node', $node->nid)) {
    $accessible_fix_node_to_page_invisible_heading = $a11y['heading_invisible'];
  }
}


/**
 * implements hook_preprocess_node
 * to get node's accessibility configuration in node theming variables
 */

function accessible_fix_preprocess_node(&$variables) {
  $storage_id = $variables['nid'];

  $variables['node']->accessible = new stdClass;  // need to make available even if empty for themeing

  if (! ($a11y = accessible_fix_get_data('node', $storage_id))) return;

  foreach($a11y as $key => $value) {
    $variables['node']->accessible->{$key} = $value;
  }

  //if ($a11y['heading_invisible']) {
    $variables['title_attributes_array'][] = 'element-invisible';
 // }


  $aria_roles = array_keys($a11y['aria_roles']);
  $current_roles = (isset($variables['content_attributes_array']['role'])) ? $variables['content_attributes_array']['role'] : array();
  $variables['content_attributes_array']['role'] = array_unique(array_merge($current_roles, $aria_roles));

  // duplicates should be resolved in drupal_attributes() function with array_unique, but isn't yet. todo is patch

}
