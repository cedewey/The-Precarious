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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div class="wrapper<?php print newspro_tm_skin(); ?>">
		<div class="gallery-section">
			<div class="frame">

				<div class="gallery-block">
					<?php if ($page['slide_show']) { ?><?php print render($page['slide_show']); ?><?php } ?>
					<div class="news-box">
						<div class="text-box"><div class="text-box-t"></div>
							<?php if ($page['home_top'] and false) { ?><?php print render($page['home_top']); ?><?php } ?>
						</div>
						<div class="search-box">
							<?php if ($page['sidebar_right_first']) { ?><?php print render($page['sidebar_right_first']); ?><?php } ?> 
						</div>
					</div>
				</div>

			</div>
		</div>
		<div id="main">
			<div id="content">
				<div class="post-holder">
					<div class="post-box">
						<?php if ($page['home_posts_first']) { ?><?php print render($page['home_posts_first']); ?><?php } ?>
					</div>
					<div class="post-box">
						<?php if ($page['home_posts_second']) { ?><?php print render($page['home_posts_second']); ?><?php } ?> 
					</div>
				</div>
				<?php if ($page['picture_posts']) { ?><?php print render($page['picture_posts']); ?><?php } ?> 
				<div class="post-wrapper">
					<div class="post-box">
						<?php if ($page['home_category_first']) { ?><?php print render($page['home_category_first']); ?><?php } ?> 
					</div>
					<div class="post-box">
						<?php if ($page['home_category_second']) { ?><?php print render($page['home_category_second']); ?><?php } ?> 
					</div>
				</div>
				<div class="post-wrapper">
					<div class="post-box">
						<?php if ($page['home_category_third']) { ?><?php print render($page['home_category_third']); ?><?php } ?> 
					</div>
					<div class="post-box">
						<?php if ($page['home_category_fourth']) { ?><?php print render($page['home_category_fourth']); ?><?php } ?> 
					</div>
				</div>
			</div>
			<div id="sidebar">
				<?php if ($page['sidebar_right_tab']) { render($page['sidebar_right_tab']); print newspro_set_tabs(false, false, false, true); } ?> 
				<?php if ($page['sidebar_right_bottom']) { ?><?php print render($page['sidebar_right_bottom']); ?><?php } ?> 
			</div>
		</div>
		<div class="header-holder">

			<div id="header">
				<div class="top-bar">
					<span class="date"><?php print format_date(time(),'custom','l, j F Y') ?></span>
					<?php print newspro_tree_top() ?>
					<ul class="subscribe-list">
						<li><a href="rss.xml" class="rss">Subscribe by RSS</a></li>
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
<?php //print '<pre>'. check_plain(print_r($page['sidebar_right_tab'], 1)) .'</pre>'; ?>
</body>
</html>
