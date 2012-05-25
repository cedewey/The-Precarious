<?php
// $Id$
/* 
 * @file block_access.db.inc
 * DB interface for block_access module
 */

/**
 * delete a block_access permission for a module or specific block for all roles
 * @param $module - the name of the module
 * @param $module - the permission being removed
 * @param $delta  - optional block delta
 */
function block_access_delete_roles($module, $perm, $delta=NULL) {
  $delete = db_delete('block_access_roles')
    ->condition('module', $module, '=')
    ->condition('permission', $perm, '=');
  if ($delta !== NULL) {
    $delete->condition('delta', $delta, '=');
  }
  else {
    $delete->isNull('delta');
  }
  return $delete->execute();
}

/**
 * insert a block_access_roles record
 * @param $rid - role ID
 * @param $module - the name of the module
 * @param $perm - the permission being added
 * @param $delta - optional block delta
 */
function block_access_add_role($rid, $module, $perm, $delta=NULL) {
  $record = array(
    'rid' => $rid,
    'module' => $module,
    'delta' => $delta,
    'permission' => $perm);
  $result = drupal_write_record('block_access_roles', $record);
  return $result;
}

/**
 * fetch roles defined for a given module/perm/block
 * @param $module - the name of the module
 * @param $perm - the permission
 * @param $delta - optional block delta
 * @returns array of role IDs
 */
function block_access_get_roles($module, $perm, $delta=NULL) {
  $query = db_select('block_access_roles', 'b')
    ->fields('b', array('rid'))
    ->condition('module', $module, '=')
    ->condition('permission', $perm, '=')
    ->condition('delta', $delta, '=');

  $result = $query->execute();

  // If we didn't find any for the delta, use the module defaults
  if (empty($result)) {
    $query->isNull('delta');
    $result = $query->execute();
  }

  $ret = array();
  foreach ($result as $record) {
    $ret[] = $record->rid;
  }

  return $ret;
}

/**
 * get permissions for a given module
 * @param $module - the name of the module
 * @returns an array of Role IDs and their permissions
 */
function block_access_get_module($module) {
  $query = db_select('block_access_roles', 'b')
    ->fields('b', array('rid', 'permission'))
    ->condition('module', $module, '=')
    ->isNull('delta');

  $result = $query->execute();
  $ret = array();
  while ($ob = $result->fetchObject()) {
    if (isset($ret[$ob->rid])) {
      $ret[$ob->rid][] = $ob->permission;
    }
    else {
      $ret[$ob->rid] = array($ob->permission);
    }
  }
  return $ret;
}

/**
 * Fetches block details from the {block} table for a given module/delta
 *
 * @param $module string
 *   name of the module
 * @param $delta int
 *   block delta
 * @return array
 *   block details array
 */
function block_access_get_block($module, $delta) {
  $result = db_query(
    "SELECT * FROM {block} WHERE module = :module AND delta = :delta", 
    array(':module' => $module, ':delta' => $delta)
  );
  return $result->fetchAssoc();
}

/**
 * Fetches roles for a given block
 *
 * @param $module string
 *   name of the module
 * @param $delta int
 *   block delta
 * @return array
 *   array of role IDs
 */
function block_access_get_block_roles($module, $delta) {
  $result = db_query(
    "SELECT rid FROM {block_role} WHERE  module = :module AND delta = :delta",
    array(':module' => $module, ':delta' => $delta)
  );
  $ret = array();
  while ($row = $result->fetchAssoc()) {
    $ret[] = $row['rid'];
  }
  return $ret;
}
