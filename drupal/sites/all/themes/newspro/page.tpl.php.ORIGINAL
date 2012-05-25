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
						<li><a href="#" class="rss">Subscribe by RSS</a></li>
						<li><a href="#" class="email">Subscribe by Email</a></li>
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