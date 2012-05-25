<?php  /*
-dkw 26nov2011
print caption after image in full article display.

clayton rearranged the order where related posts get printed out

-dkw28nov2011 added author byline with link to their articles
meant I had to move up the call to user_load to have the info a bit earlier

-dkw30nov2011 added invisible node titles to the comment links
for improved accessibility

-dkw30nov2011 moved the closing paren for the else clause to include the related posts
this had gotten broken with the rearranging of things clayton did a few days ago.

-clayton2dec2011 added fb plugin for comments
-clayton11jan2012 removed fb comment script
*/ ?>


<!-- FB Comments code (commented out) 
<div id="fb-root"></div>
<script type="text/javascript">(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
 end FB Comments code -->

<!-- start article list page-->
<?php if ($page == 0) { ?>
<div class="info-block">
 <?php if (isset($node->field_image[$node->language][0])) { ?>
  <div class="image-block">
    <a href="<?php print $node_url ?>" title="<?php print $node->field_image[$node->language][0]['title'] ?>">
      <?php print theme('image_style', array('style_name' => 'teaser', 'path' => $node->field_image[$node->language][0]['uri'], 'alt' => $node->field_image[$node->language][0]['alt'], 'title' => $node->field_image[$node->language][0]['title'], 'attributes' => array(),'getsize' => false) );?>
    </a>
  </div>
 <?php } ?>
 <div class="text-block">
  <h2 class="info-title">
    <a href="<?php print $node_url ?>"><?php print $title ?></a>
  </h2>
  <?php if ($display_submitted) { ?>
  <ul class="description-list">
    <li class="date"><?php print $date; ?></li>
    <?php if ($node->comment and !($node->comment == 1 and !$node->comment_count)) { ?>
    <li class="comments"><a href="<?php print url("node/$node->nid", array('fragment' => 'comment-form')) ?>">
    <?php print format_plural($node->comment_count, '1 Comment', '@count Comments') ?><span class="element-invisible"> about <?php print strip_tags($title); ?></span></a></li>
    <?php } ?>
  </ul>
  <?php } ?>

  <?php hide($content['links']); print render($content) ?>
 </div>
</div>
<!-- end article listing-->

<?php } else { ?>
<!-- Page is an article -->
<div class="text-content">

 <!-- article image -->
 <?php if (isset($node->field_image[$node->language][0])) { ?>
 <div class="image-box">
    <a href="<?php print file_create_url($node->field_image[$node->language][0]['uri']); ?>" title="<?php print $node->field_image[$node->language][0]['title'] ?>" class="gim" rel="prettyPhoto[pp_gal]"><?php print theme('image_style', array('style_name' => 'body', 'path' => $node->field_image[$node->language][0]['uri'], 'alt' => $node->field_image[$node->language][0]['alt'], 'title' => $node->field_image[$node->language][0]['title'], 'attributes' => array(),'getsize' => false) );?>
    </a>
  <div class="image-caption">
  <?php print $node->field_image[$node->language][0]['title']  ?>
  </div>
 </div>
 <?php } ?>
<!-- end article image --> 

<!-- Article Title -->
 <strong class="post-title"><?php print $title ?></strong>
<!-- end Article Title -->

<!-- Start Submission Data -->
 <?php if ($display_submitted) { ?>
 <ul class="description-list">
  <?php if ($node->uid) {
	$account = user_load($node->uid);
  ?>
  <li class="author"><a href="/content-by-author/<?php print ($account->name);?>"/>Posted by <?php print ($account->name); ?></a></li>
  <?php } ?>
  <li class="date"><?php print $date; ?></li>
  <?php if ($node->comment and !($node->comment == 1 and !$node->comment_count)) { ?>
  <li class="comments"><a href="<?php print url("node/$node->nid", array('fragment' => 'comment-form')) ?>"><?php print format_plural($node->comment_count, '1 Comment', '@count Comments') ?><span class="element-invisible"> about <?php print strip_tags($title); ?></span></a></li>
  <?php } ?>
 </ul>
 <?php } ?>
<!-- end Submission Data -->

<!-- Start article Body -->
 <?php hide($content['links']); hide($content['comments']); print render($content); ?>
 <div class="tlinks">
  <?php print render($content['links']) ?>
 </div>
</div>
<!--end article body-->
<br />


<!--start About the Author-->
<?php if ($node->uid) {
?>
<div class="content-holder">
  <h2 class="heading"><?php print t('About author') ?></h2>
  <div class="author-box">
    <div class="image-box">
      <?php print theme('user_picture', array('account' => $account)); ?>
    </div>
    <div class="text-block">
      <p><?php print $account->signature; ?></p>
    </div>
  </div>
</div>
<?php } ?>
<!--end About the Author-->

<!--start Facebook Comments (commented out)
<div class="fb-comments" expr:href='data:post.url' data-href="http://www.theprecarious.com" data-num-posts="2" data-width="500"></div>
--end Facebook Comments-->

<!--start Comments Block-->
<?php print render($content['comments']) ?>
<!--end Comments Block-->

<!--start Related Posts block-->
<?php /*print '<pre>'. check_plain(print_r($node, 1)) .'</pre>'*/; ?>
<?php
//$output = relatedcontent($node->nid, false, 'newspro_node_view', array(true));
//   if (is_array($output)) foreach ($output as $group => $contents) {
//     print '<div class="content-holder"><h2 class="heading">'.t('Related Posts').'</h2><ul class="post-list">'.implode('', $contents).'</ul></div>';
//   }
  $name = 'related_posts';
  $display_id = 'block_1';
  // Load the view
  if ($view = views_get_view($name)) {
    if ($view->access($display_id)) {
      $output = $view->execute_display($display_id);
      $view->destroy();
	  print '<div class="content-holder"><h2 class="heading">'.t('Related Posts').'</h2>'.$output['content'].'</div>';
    }
    $view->destroy();
  }
?>
<!--end Related Posts block-->
<!-- end Page is an Article -->
<?php } ?>
