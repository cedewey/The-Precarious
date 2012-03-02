<?php
// $Id$

/**
 * Context options form & reaction
 */
class context_redirect_reaction extends context_reaction {
  function options_form($context) {
    $values = $this->fetch_from_context($context);
    $form['#tree'] = TRUE;
    $form['redirect_path'] = array(
      '#title' => t('Redirect URL or path'),
      '#type' => 'textfield',
      '#default_value' => $values ? $values['redirect_path'] : '',
      '#description' => t('Provide a valid internal URL (ie. node/1) or path (ie. company/about-us) or an external URL (ie. http://drupal.org).'),
    );
    //TODO - option to select redirect type
    $form['admin_key'] = array(
      '#title' => t('Admin Key'),
      '#type' => 'textfield',
      '#default_value' => $values ? $values['admin_key'] : '',
      '#field_prefix' => url('', array('query' => array('admin_key' => ''), 'absolute' => TRUE)),
      '#description' => t('You can optionally provide an "admin key" which you can enter as a get variable in the page url to prevent the redirect triggering (eg. ?admin_key=no-redirect-please your admin key would be "no-redirect-please"). Leave blank to disable this.'),
    );
    return $form;
  }

  /**
   * See if context contains redirect reaction
   */
  function execute() {
    $contexts = $this->get_contexts();

    foreach ($contexts as $context) {
      if (!empty($context->reactions[$this->plugin])) {
        if ($url = $context->reactions[$this->plugin]['redirect_path']) {
          if ($this->context_redirect_validate_redirect($url, $context)) {

            //tell admins why we got where we got if internal
            if (user_access('administer site configuration') && module_exists('context_ui')) {
              $name = l($context->name, "admin/structure/context/list/{$context->name}", array('query' => 'destination=' . $_GET['q']));
              drupal_set_message(t("Context redirect trigger by !name context", array('!name' => $name)));
            }

            //be careful we don't redirect when on URL or we'll get infinite loop
            if (empty($_SESSION['context_redirect_processed'])) {
              $_SESSION['context_redirect_processed'] = TRUE;
              $this->context_redirect_goto($url);
            }
            else {
              unset($_SESSION['context_redirect_processed']);
            }
          }
        }
      }
    }
  }

  /**
   * validate redirect
	 * make sure URL is the active page or we'll get infinite loop
   */
  function context_redirect_validate_redirect($url, $context) {
    if (!valid_url($url)) {
      return FALSE;
    }

    if ($url == $_GET['q']) {
      return FALSE;
    }
    else if ($url == drupal_get_path_alias($_GET['q'])) {
      return FALSE;
    }
    if ($_GET['q'] == "admin/structure/context/list/{$context->name}" || $_GET['q'] == "admin/structure/context/list") {
      return FALSE;
    }

    //admin key override
    if ($admin_key = $context->reactions['context_redirect']['admin_key']) {
      if ($_GET['admin_key'] == $admin_key) {
        return FALSE;
      }
    }

    //TODO - Invoke API so other modules can decide if redirect should happen

    return TRUE;
  }

  /**
   * do the redirect
	 * copy of drupal_goto
   */
  function context_redirect_goto($url) {
    $url = url($url, array('absolute' => TRUE));
    // Remove newlines from the URL to avoid header injection attacks.
    $url = str_replace(array("\n", "\r"), '', $url);

    // Allow modules to react to the end of the page request before redirecting.
    // We do not want this while running update.php.
    if (!defined('MAINTENANCE_MODE') || MAINTENANCE_MODE != 'update') {
      module_invoke_all('exit', $url);
    }

    // Even though session_write_close() is registered as a shutdown function, we
    // need all session data written to the database before redirecting.
    session_write_close();
    header('Location: ' . $url, TRUE, '302');
    exit();
  }
}
