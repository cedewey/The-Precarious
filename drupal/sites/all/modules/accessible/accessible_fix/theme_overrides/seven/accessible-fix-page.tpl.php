<?php
// $Id: accessible-fix-page.tpl.php,v 1.1 2010/07/01 20:18:18 yaxbalamahaw Exp $
?>
  <div class="element-invisible"><a id="main-content"></a></div>
  <div id="branding" class="clearfix"<?php if ($accessibility->aria): print ' role="banner"'; endif; ?>>
    <?php print $breadcrumb; ?>
    <?php print render($title_prefix); ?>
    <?php if ($title): ?>
      <h1 class="page-title"><?php print $title; ?></h1>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php if ($primary_local_tasks): ?><ul class="tabs primary"<?php if ($accessibility->aria):
       print ' role="navigation"'; endif; ?>><?php print render($primary_local_tasks); ?></ul><?php endif; ?>
  </div>

  <div id="page"<?php if ($accessibility->aria): print ' role="main"'; endif; ?>>
    <?php if ($secondary_local_tasks): ?><ul class="tabs secondary"<?php if ($accessibility->aria):
       print ' role="navigation"'; endif; ?>><?php print render($secondary_local_tasks); ?></ul><?php endif; ?>

    <div id="content" class="clearfix">
      <div<?php if ($accessibility->aria && ($messages || $action_links)):
        print ' role="complementary"'; endif; ?>>
        <?php if ($messages): ?>
          <div id="console" class="clearfix"><?php print $messages; ?></div>
        <?php endif; ?>
        <?php if ($page['help']): ?>
          <div id="help">
            <?php print render($page['help']); ?>
          </div>
        <?php endif; ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
      </div>
      <?php print render($page['content']); ?>
    </div>

    <div id="footer"<?php if ($accessibility->aria): print ' role="contentinfo"'; endif; ?>>
      <?php print $feed_icons; ?>
    </div>

  </div>
