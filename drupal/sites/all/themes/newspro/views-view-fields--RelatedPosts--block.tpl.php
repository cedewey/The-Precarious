<li>
<?php if ($fields['field_image_fid']->content) { ?><div class="image-holder"><a href="<?php print $fields['path']->content; ?>"><?php print theme('imagecache', 'teaser_related', $fields['field_image_fid']->content, '', '');?></a></div><?php } ?>
<div class="text-holder">
<h3 class="title"><?php print $fields['title']->content; ?></h3>
<ul class="info-list">
<li><?php print $fields['created']->content ?></li>
<li>2 Comments</li>
</ul>
<p><?php print $fields['body']->content; ?></p>
</div>
</li>