
<?php if ($page == 0) { ?>
<div class="info-block">
<?php if (isset($node->field_image[$node->language][0])) { ?><div class="image-block"><a href="<?php print $node_url ?>" title="<?php print $node->field_image[$node->language][0]['title'] ?>"><?php print theme('image_style', array('style_name' => 'teaser', 'path' => $node->field_image[$node->language][0]['uri'], 'alt' => $node->field_image[$node->language][0]['alt'], 'title' => $node->field_image[$node->language][0]['title'], 'attributes' => array(),'getsize' => false) );?></a></div><?php } ?>
<div class="text-block">
<h2 class="info-title"><a href="<?php print $node_url ?>"><?php print $title ?></a></h2>
<?php if ($display_submitted) { ?>
<ul class="description-list">
<li class="date"><?php print $date; ?></li>
<?php if ($node->comment and !($node->comment == 1 and !$node->comment_count)) { ?><li class="comments"><a href="<?php print url("node/$node->nid", array('fragment' => 'comment-form')) ?>"><?php print format_plural($node->comment_count, '1 Comment', '@count Comments') ?></a></li><?php } ?>
</ul>
<?php } ?>
<?php hide($content['links']); print render($content) ?>
</div>
</div>
<?php } else { ?>
<div class="text-content">
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27547144-1']);
  _gaq.push(['_setDomainName', 'theprecarious.com']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php if (isset($node->field_image[$node->language][0])) { ?><div class="image-box"><a href="<?php print file_create_url($node->field_image[$node->language][0]['uri']); ?>" title="<?php print $node->field_image[$node->language][0]['title'] ?>" class="gim" rel="prettyPhoto[pp_gal]"><?php print theme('image_style', array('style_name' => 'body', 'path' => $node->field_image[$node->language][0]['uri'], 'alt' => $node->field_image[$node->language][0]['alt'], 'title' => $node->field_image[$node->language][0]['title'], 'attributes' => array(),'getsize' => false) );?></a></div><?php } ?>
<strong class="post-title"><?php print $title ?></strong>
<?php if ($display_submitted) { ?>
<ul class="description-list">
<li class="date"><?php print $date; ?></li>
<?php if ($node->comment and !($node->comment == 1 and !$node->comment_count)) { ?><li class="comments"><a href="<?php print url("node/$node->nid", array('fragment' => 'comment-form')) ?>"><?php print format_plural($node->comment_count, '1 Comment', '@count Comments') ?></a></li><?php } ?>
</ul>
<?php } ?>
<?php hide($content['links']); hide($content['comments']); print render($content); ?>
<div class="tlinks"><?php print render($content['links']) ?></div>
</div>
<?php print render($content['comments']) ?>
<?php } ?>

<?php //print '<pre>'. check_plain(print_r($content, 1)) .'</pre>'; ?>