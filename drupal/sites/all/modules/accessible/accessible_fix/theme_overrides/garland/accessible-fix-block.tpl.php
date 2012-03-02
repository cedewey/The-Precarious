<?php
// $Id: accessible-fix-block.tpl.php,v 1.2 2010/06/14 16:24:17 yaxbalamahaw Exp $
?>
<!-- template accessible/accessible-fix/theme_overrides/garland/accessible-fix-block.tpl.php template -->
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
<?php if (!empty($block->subject)): ?>
  <h2 class="title"<?php print $title_attributes; ?>><?php print $block->subject ?></h2>
<?php endif;?>
  <?php print render($title_suffix); ?>

  <div class="content"<?php print $content_attributes; ?>><?php print $content ?></div>
</div>
