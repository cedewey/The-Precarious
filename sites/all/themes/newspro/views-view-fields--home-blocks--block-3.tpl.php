<li>
<?php if ($fields['entity_id_1']->content) { ?><div class="image-holder"><?php print $fields['entity_id_1']->content ?></div><?php } ?>
<div class="text-holder">
<h3 class="title"><?php print $fields['title']->content; ?></h3>
<ul class="info-list">
<li><?php print $fields['created']->content; ?></li>
<?php if ($fields['comment_count']->content) { ?><li><?php print format_plural($fields['comment_count']->content, '1 Comment', '@count Comments') ?></li><?php } ?>
</ul>
<p><?php print $fields['entity_id']->content; ?></p>
</div>
</li>