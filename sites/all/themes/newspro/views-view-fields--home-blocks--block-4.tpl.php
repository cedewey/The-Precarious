<li>
<?php if ($fields['entity_id_1']->content) { ?><a href="<?php print $GLOBALS['base_url'].''.$fields['path']->content ?>"><?php print $fields['entity_id_1']->content; ?></a><?php } ?>
<div class="text-box">
<div class="wrapp">
<span class="title"><?php print $fields['title']->content; ?></span>
<ul class="info-list">
<li><?php print $fields['created']->content; ?></li>
<?php if ($fields['comment_count']->content) { ?><li><?php print format_plural($fields['comment_count']->content, '1 Comment', '@count Comments') ?></li><?php } ?>
</ul>
</div>
</div>
</li>
~~~~
<li>
<?php if ($fields['entity_id_1']->content) { ?><a href="#"><?php print $fields['entity_id_1']->content; ?><span class="cover">&nbsp;</span></a><?php } ?>
</li>