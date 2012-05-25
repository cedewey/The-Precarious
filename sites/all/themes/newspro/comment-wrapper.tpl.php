<div class="content-holder">
<div class="comment-section">
<?php print render($content['comments']); ?>
	<div class="box">
	<h2><?php print t('Post new comment'); ?></h2>
	<?php print render($content['comment_form']); ?>
	</div>
</div></div>
<?php //print '<pre>'. check_plain(print_r($node, 1)) .'</pre>' ?>
