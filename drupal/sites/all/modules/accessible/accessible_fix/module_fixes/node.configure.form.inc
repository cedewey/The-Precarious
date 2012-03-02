<?php

/**
 * @file
 * The accessible module to make accessiblity tweaks not yet integrated
 * into core or other modules.
 *
 */

 function _accessible_fix_form_alter(&$form, $form_state, $form_id) {

  $node_types = accessible_fix_node_enabled_node_types();
  $node_type = str_replace('_node_form', '', $form_id);
  if ($node_type == $form_id || (! in_array($node_type, $node_types))) return;


  $storage_id = ($form['nid']['#value']) ? $form['nid']['#value'] : NULL;
  $new_fields = module_invoke_all('accessible_fix_add_fields', 'node', $storage_id);
  if (count($new_fields)) {
    $form['accessible'] = array(
      '#type' => 'fieldset',
      '#access' => 1,
      '#title' => 'Accessibility',
      '#collapsible' => 1,
      '#collapsed' => 1,
      '#group' => 'additional_settings',
      '#attached' => Array('js' => Array(0 => 'modules/node/node.js')),
      '#weight' => 95,
    );

    foreach($new_fields as $field_name => $field) {
     $form['accessible'][$field_name] = $field;
    }
    $form['#submit'][] = 'accessible_fix_node_form_submit';
  }
 }

function accessible_fix_node_enabled_node_types() {

  static $types;
  if (is_array($types)) return $types;

  // get all nodes that have a body
  function has_body($node_summary) {
    return (is_object($node_summary) && isset($node_summary->has_body)
            && $node_summary->has_body);
  };

   $types =  array_keys(node_type_get_types());
  return $types;
}

function accessible_fix_node_enabled_node_types_has_body($node_defn) {
  return $node_defn->has_body;
}



function _accessible_fix_node_form_submit($form_id, $form_state) {

  $storage_id = ($form_state['values']['nid']) ? $form_state['values']['nid'] : NULL;
  accessible_fix_store_data($form_state['values'], 'node', $storage_id);

}
