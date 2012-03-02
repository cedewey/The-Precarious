<?php
// $Id: accessible-fix-page.tpl.php,v 1.4 2010/07/01 01:45:29 yaxbalamahaw Exp $
?>
<!-- template accessible/accessible-fix/theme_overrides/garland/accessible-fix-page.tpl.php template -->
  <?php print render($page['header']); ?>

  <div id="wrapper">
    <div id="container" class="clearfix">

      <div id="header"<?php if ($accessibility->aria): print ' role="banner"'; endif; ?>>
        <div id="logo-floater">
        <?php if ($logo || $site_title): ?>
          <?php if ($title): ?>
            <div id="branding"><strong><a href="<?php print $front_page ?>" title="<?php print $site_name_and_slogan ?>">
            <?php if ($logo): ?>
              <img src="<?php print $logo ?>" alt="<?php print $site_name_and_slogan ?>" id="logo" />
            <?php endif; ?>
            <?php print $site_html ?>
            </a></strong></div>
          <?php else: /* Use h1 when the content title is empty */ ?>
            <h1 id="branding"><a href="<?php print $front_page ?>" title="<?php print $site_name_and_slogan ?>">
            <?php if ($logo): ?>
              <img src="<?php print $logo ?>" alt="<?php print $site_name_and_slogan ?>" id="logo" />
            <?php endif; ?>
            <?php print $site_html ?>
            </a></h1>
        <?php endif; ?>
        <?php endif; ?>
        </div>

        <div<?php if ($accessibility->aria && ($primary_nav || $secondary_nav)):
               print ' role="navigation"'; endif; ?>>
          <?php if ($primary_nav): print $primary_nav; endif; ?>
          <?php if ($secondary_nav): print $secondary_nav; endif; ?>
        </div>
      </div> <!-- /#header -->

      <?php if ($page['sidebar_first']): ?>
        <div id="sidebar-first" class="sidebar">
          <?php print render($page['sidebar_first']); ?>
        </div>
      <?php endif; ?>

      <div id="center"><div id="squeeze"><div class="right-corner"><div class="left-corner">
          <?php print $breadcrumb; ?>
          <?php if (@$page['highlight']): ?>
            <div id="highlight"
            <?php if ($accessibility->aria): print ' role="complementary"'; endif; ?>>
              <?php render($page['highlight']); ?>
            </div>
          <?php endif; ?>
          <a id="main-content"></a>
          <div<?php if ($accessibility->aria): print ' role="main"'; endif; ?>>
            <?php if ($tabs): ?><div id="tabs-wrapper" class="clearfix"<?php if ($accessibility->aria):
              print ' role="navigation"'; endif; ?>><?php endif; ?>
            <?php print render($title_prefix); ?>
            <?php if ($title): ?>
              <h1<?php print $tabs ? ' class="with-tabs"' : '' ?>><?php print $title ?></h1>
            <?php endif; ?>
            <?php print render($title_suffix); ?>
            <?php if ($tabs): ?><ul class="tabs primary"><?php print render($tabs) ?></ul></div><?php endif; ?>
            <?php if ($tabs2): ?><ul class="tabs secondary"><?php print render($tabs2) ?></ul><?php endif; ?>
            <div<?php if ($accessibility->aria && ($messages || $action_links)): print ' role="complementary"'; endif; ?>>
              <?php print $messages; ?>
              <?php print render($page['help']); ?>
              <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
            </div>
            <div class="clearfix">
              <?php print render($page['content']); ?>
            </div>
            <?php print $feed_icons ?>
          </div>
          <div<?php if ($accessibility->aria): print ' role="contentinfo"'; endif; ?>>
            <?php print render($page['footer']) ?>
          </div>
      </div></div></div></div> <!-- /.left-corner, /.right-corner, /#squeeze, /#center -->

      <?php if ($page['sidebar_second']): ?>
        <div id="sidebar-second" class="sidebar">
          <?php print render($page['sidebar_second']); ?>
        </div>
      <?php endif; ?>

    </div> <!-- /#container -->
  </div> <!-- /#wrapper -->
