<?php
/*
 * -dkw 8dec2011 generate rss link dynamically based on whether we're on a taxonomy term "subpage" or not
 */
?>

<?php print render($page['header']); ?>
<?php 
$nn = newspro_get_node_style(); 
if ($nn != 'n') {
	$ss = $nn;
} else {
	$ss = theme_get_setting('tm_page');
}
?>

<body>
	<div class="wrapper<?php print newspro_tm_skin(); ?>">
<?php if (theme_get_setting('tm_page') == 0) { ?>
		<div id="main">
<?php } else { ?>
		<div id="wide"><div id="main">
<?php } ?>
			<div id="content">
				<?php if (isset($breadcrumb)) { print $breadcrumb; } ?>
				<?php if (isset($title) and !(arg(0) == 'node' and is_numeric(arg(1)) and !arg(2))){ print '<h1 class="wide-title">'. $title .'</h1>'; } ?>
				<?php if (isset($tabs)) { print ''. render($tabs) .'<div class="clear"></div>'; } ?>
				<?php if (isset($messages)) { print $messages; } ?>
				<?php if (isset($help)) { print $help; } ?>
				<?php print render($page['content']); ?>
			</div>
<?php if (theme_get_setting('tm_page') == 0) { ?>
			<div id="sidebar">
				<div class="search-box"><div class="holder"><div class="frame">
					<?php if ($page['sidebar_right_first']) { ?><?php print render($page['sidebar_right_first']); ?><?php } ?> 
				</div></div></div>
        <?php if ($page['sidebar_right_tab']) { render($page['sidebar_right_tab']); print newspro_set_tabs(false, false, false, true); } ?>
				<?php if ($page['sidebar_right_bottom']) { ?><?php print render($page['sidebar_right_bottom']); ?><?php } ?> 
			</div>
<?php } else { ?>
		</div>
<?php } ?>
		</div>
		<div class="header-holder">

			<div id="header">
				<div class="top-bar">
					<span class="date"><?php print format_date(time(),'custom','l, j F Y') ?></span>
					<?php print newspro_tree_top() ?>
					<ul class="subscribe-list">
         <?php 
         /*-dkw 8dec2011 generate rss link dynamically based on whether we're on a taxonomy term "subpage" or not
          if we're on a taxonomy term page, link to that term's feed
          otherwise, the default is the feed for the whole side
          curent_path() should return the unaliased system path, so it should match against "taxonomy/term/#"
          Prepend the hostname to fix the case of tags rss pages coming up as tags/taxonomy/term
          */
         $rss_link = "http://".$_SERVER['HTTP_HOST']."/rss.xml";
         $current_path = current_path();
         if (preg_match("/taxonomy\/term\/\d+/", $current_path)) { $rss_link = "http://".$_SERVER['HTTP_HOST']."/".$current_path."/feed"; }
         ?>
						<li><a href="<?php print $rss_link?>" class="rss">Subscribe by RSS</a></li>
						<li><a href="http://groups.google.com/group/the-precarious-announcements/" target="_blank" class="email">Subscribe by Email</a></li>
                                                <li><?php print theme_text_resize_block() ?></li>
					</ul>
				</div>
				<div class="logo-area">
					<strong class="logo"><a href="<?php print check_url($front_page); ?>"><?php print $site_name; ?></a></strong>
					<div class="ad">
						<?php if ($page['top_banner']) { ?><?php print render($page['top_banner']); ?><?php } ?>
					</div>
				</div>
				<?php print newspro_tree_cat() ?>
			</div>

		</div>
	</div>
	<div class="footer-holder<?php print newspro_tm_skin(); ?>">
		<div class="footer-section">
			<div class="holder">
				<div id="footer">
					<div class="about-column">
						<?php if ($page['footer_about']) { ?><?php print render($page['footer_about']); ?><?php } ?>
					</div>
					<div class="twitter-column">
						<?php if ($page['footer_twitter']) { ?><?php print render($page['footer_twitter']); ?><?php } ?>
					</div>
					<div class="categories-column">
						<?php if ($page['footer_categories']) { ?><?php print render($page['footer_categories']); ?><?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bar">
			<?php print newspro_tree_bottom() ?>
			<span class="copyright"><?php print render($page['footer_message']); ?> | <a href="http://www.themesnap.com">Designed by ThemeSnap.com</a></span>
		</div>
	</div>
<?php //print $closure; ?>
</body>
</html>
