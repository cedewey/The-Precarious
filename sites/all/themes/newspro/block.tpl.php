<?php 
//print '<pre>'. check_plain(print_r($block, 1)) .'</pre>';
$out = '';
if ($block->region == 'footer_about' or $block->region == 'footer_twitter' or $block->region == 'footer_categories') { 
	if ($block->subject) $out .= '<strong class="title">'.$block->subject.'</strong>';
	$out .= str_replace(array('class="form-submit"', 'class="form-text required"'), array('class="submit"', 'class="input_small"'), $content).'<div class="clr"></div>';
} elseif ($block->region == 'home_quarter_first' or $block->region == 'home_quarter_second' or $block->region == 'home_quarter_third' or $block->region == 'home_quarter_fourth' or $block->region == 'footer_message') {
	$out .= $content;
} elseif ($block->region == 'slide_show' or $block->region == 'home_top' or $block->region == 'home_posts_first' or $block->region == 'home_posts_second' or $block->region == 'picture_posts' or $block->region == 'home_category_first' or $block->region == 'home_category_second' or $block->region == 'home_category_third' or $block->region == 'home_category_fourth') {
	if ($block->subject) $out .= '<h2 class="heading">'.$block->subject.'</h2>';
	$out .= $content;
} elseif ($block->region == 'sidebar_right_first') {
	if ($block->subject) $out .= '<h2>'.$block->subject.'</h2>';
	$out .= $content;
} elseif ($block->region == 'sidebar_right_tab') {
	newspro_set_tabs($block->bid, $block->subject, $content);
} else {
	if ($block->subject) $out .= '<h2 class="heading">'.$block->subject.'</h2>';
	//$out .= ''.str_replace(array(' class="item-list"'), '', $content).'';
	if ($block->module == 'montharchive') {
	$out .= '<div class="archive-box">'.$content.'</div>';
	}else{
	$out .= '<div class="boxa">'.$content.'</div>';
	}
}
print $out;
//print '<pre>'. check_plain(print_r($block, 1)) .'</pre>';


?>