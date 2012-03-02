<?php

/**
 * implementation of hook_accessibility_api_data_alter_MODULE()
 */

function accessible_fix_accessibility_api_data_alter_filter($accessibility_data) {

  $accessibility_data['functionality']['filter_html_additions'] = array(
    '#type' => 'checkbox',
    '#default_value' => 1,
    'title' => t('Add h2-h6 tags to filtered html input format'),
    'description' => 'This will allow authors to use h2-h6 tags in the default filter format (filtered html)',
  );

  $accessibility_data['defaults']['functionality']['filter_html_additions'] = 'filter_html_additions';

  return $accessibility_data;
}

/**
 * implementation of pseudo hook, hook_accessible_api_settings_submitted
 */
function filter_accessible_api_settings_submitted($old_settings, $new_settings) {
  if (@$old_settings['functionality']['filter_html_additions'] == @$new_settings['functionality']['filter_html_additions']) {
    return;
  }

  $filter_record = db_select('filter', 'filter')
    ->fields('filter')
    ->condition('name', 'filter_html')
    ->execute()
    ->fetchObject();
  $filter_settings = unserialize($filter_record->settings);
  $allowed_html = isset($filter_settings['allowed_html']) ? $filter_settings['allowed_html'] : '';

  $changes_in_allowed = (strpos($allowed_html, ACCESSIBLE_FIX_FILTER_HTML_TAG_ADDITIONS) !== FALSE);
  $html_additions_enabled = (boolean)@$new_settings['functionality']['filter_html_additions'];
  if ($html_additions_enabled && !$changes_in_allowed) {
      $filter_settings['allowed_html'] .= ACCESSIBLE_FIX_FILTER_HTML_TAG_ADDITIONS;
      _accessible_fix_filter_update($filter_settings);
  }
  elseif (!$html_additions_enabled && $changes_in_allowed) { // remove html addtions
    $filter_settings['allowed_html'] = str_replace(ACCESSIBLE_FIX_FILTER_HTML_TAG_ADDITIONS, '', $allowed_html);
    _accessible_fix_filter_update($filter_settings);
  }

}



function _accessible_fix_filter_update($filter_settings) {
  db_update('filter')
    ->condition('format','html')
    ->condition('name','filter_html')
    ->fields(array('settings' => serialize($filter_settings)))
    ->execute();


  cache_clear_all('filter_formats','cache', TRUE);
  cache_clear_all('filter_list_format','cache', TRUE);
  cache_clear_all('html:', 'cache_filter', TRUE);

 }
