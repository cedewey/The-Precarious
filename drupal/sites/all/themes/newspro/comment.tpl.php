<div class="comment-block">
<?php print $picture ?>
<div class="text-block">
<div class="info-line">
<strong class="author"><?php print theme('username', array('account' => $content['comment_body']['#object'])) ?></strong>
<span class="date"><?php print format_date($content['comment_body']['#object']->created); ?></span>
</div>
<p><em><?php hide($content['links']); print render($content) ?></em></p>
<div class="ref-holder">
 <?php print render($content['links']) ?>
</div>
</div>
</div>

<?php //print '<pre>'. check_plain(print_r($comment, 1)) .'</pre>' ?>