<?php
// $Id: accessible-fix-page.tpl.php,v 1.1 2010/07/01 20:18:18 yaxbalamahaw Exp $

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
<!-- template accessible/accessible-fix/theme_overrides/corolla/accessible-fix-page.tpl.php template -->
<?php if ($main_menu && !$in_overlay): ?>
  <div id="navigation" class="clearfix"<?php if ($accessibility->aria): print ' role="navigation"'; endif; ?>>
    <?php print theme('links__system_main_menu', array(
      'links' => $main_menu,
      'attributes' => array(
        'id' => 'main-menu',
        'class' => array('links'),
      ),
      'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      ),
    )); ?>
  </div> <!-- /#navigation -->
<?php endif; ?>



  <?php if (!$in_overlay): ?>
  <div id="header-wrapper">
    <div id="header" class="clearfix<?php if ($page['header']): ?> with-blocks<?php endif; ?>"<?php if ($accessibility->aria):
      print ' role="banner"'; endif; ?>>

      <div id="branding" class="clearfix">

        <?php if ($logo): ?>
          <div id="logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
          </a></div>
        <?php endif; ?>

        <?php if ($site_name || $site_slogan): ?>
          <div id="name-and-slogan">
            <?php if ($site_name): ?>
              <?php if ($title): ?>
                <div id="site-name">
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
                </div>
              <?php else: /* Use h1 when the content title is empty */ ?>
                <h1 id="site-name">
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
                </h1>
              <?php endif; ?>
            <?php endif; ?>

            <?php if ($site_slogan): ?>
              <div id="site-slogan"><?php print $site_slogan; ?></div>
            <?php endif; ?>
          </div> <!-- /#name-and-slogan -->
        <?php endif; ?>

      </div> <!-- /#branding -->

      <?php print render($page['header']); ?>

    </div> <!-- /#header -->
  </div>  <!-- /#header-wrapper -->
  <?php endif; ?>

  <div id="main-columns-wrapper">
    <div id="main-columns" <?php if ($in_overlay): ?>class="clearfix"<?php endif; ?>>
      <div id="main">
        <div id="page" class="clearfix">
          <div<?php if ($accessibility->aria && ($breadcrumb || $messages || $tabs)): print ' role="complementary"'; endif; ?>>
            <?php if ($breadcrumb): ?><div id="breadcrumb" class="clearfix"><?php print $breadcrumb; ?></div><?php endif; ?>
            <?php if ($messages): ?><div id="messages"><?php print $messages; ?></div><?php endif; ?>
            <?php if ($tabs): ?><div class="tabs clearfix"<?php if ($accessibility->aria):
              print ' role="navigation"'; endif; ?>><?php print render($tabs); ?></div><?php endif; ?>

            <?php if ($page['highlight'] && !$in_overlay): ?>
              <?php print render($page['highlight']); ?>
            <?php endif; ?>
          </div>

          <div id="main-content"></div>
          <div<?php if ($accessibility->aria): print ' role="main"'; endif; ?>>

            <?php print render($title_prefix); ?>
            <?php if ($title && !$in_overlay): ?>
              <h1 class="page-title"><?php print $title ?></h1>
            <?php endif; ?>
            <?php print render($title_suffix); ?>
            <div<?php if ($accessibility->aria && $action_links): print ' role="complementary"'; endif; ?>>
              <?php print render($page['help']); ?>
              <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
            </div>
            <?php print render($page['content']); ?>
            <?php print $feed_icons; ?>
          </div>
        </div> <!-- /#page -->
   
        <?php if (($secondary_menu || $page['footer']) && !$in_overlay): ?>
          <div id="footer"<?php if ($accessibility->aria): print ' role="contentinfo"'; endif; ?>>
            <?php print theme('links__system_secondary_menu', array(
              'links' => $secondary_menu,
              'attributes' => array(
                  'class' => array('links'),
              ),
              'heading' => array(
                'text' => t('Secondary menu'),
                'level' => 'h2',
                'class' => array('element-invisible'),
              ),
            )); ?>
            <?php print render($page['footer']); ?>
          </div> <!-- /#footer -->
        <?php endif; ?>
      </div> <!-- /#main -->

      <?php if ($page['sidebar_first'] && !$in_overlay): ?>
        <div id="sidebar-first" class="clearfix">
          <?php print render($page['sidebar_first']); ?>
        </div> <!-- /#sidebar-first -->
      <?php endif; ?>

      <?php if ($page['sidebar_second'] && !$in_overlay): ?>
        <div id="sidebar-second" class="clearfix">
          <?php print render($page['sidebar_second']); ?>
        </div> <!-- /#sidebar-second -->
       <?php endif; ?>

    </div> <!-- /#main-columns -->
  </div> <!-- /#main-columns-wrapper -->
