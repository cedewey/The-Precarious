<?php

/**
 * @file
 * The accessible module to make accessiblity tweaks not yet integrated
 * into core or other modules.
 *
 */

/**
 * form alter function for block configuration form
 *
 */

function _accessible_fix_form_block_admin_configure_alter(&$form, $form_state) {
  
  $storage_id = $form['module']['#value'] .'_'. $form['delta']['#value'];
  $new_fields = module_invoke_all('accessible_fix_add_fields', 'block', $storage_id);

  if (count($new_fields)) {
    
    $form['accessible'] = array(
        '#type' => 'fieldset',
        '#access' => 1,
        '#title' => 'Accessibility',
        '#collapsible' => 1,
        '#collapsed' => 1,
        '#weight' => 0,
      );
  
    foreach($new_fields as $field_name => $field) {
       $form['accessible'][$field_name] = $field; 
      }    
    $form['#submit'][] = 'accessible_fix_block_form_submit'; 
  }

}


/**
 * form submit function for block configuration form
 *
 */
function _accessible_fix_block_form_submit($form_id, $form_state) {
  $storage_id = $form_state['values']['module'] .'_'. $form_state['values']['delta'];
  accessible_fix_store_data($form_state['values'], 'block', $storage_id);
}




