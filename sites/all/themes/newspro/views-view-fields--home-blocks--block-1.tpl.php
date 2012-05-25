<?php
/* -dkw 9nov2011
use the new field Slider Image, which should be sized correctly when uploaded
instead of using the original image and croppng it horribly

//this was the original code, using the original image, filtered through slide_show imagecahce
//<?php if ($fields['entity_id_1']->content) { ?><li><?php print $fields['entity_id_1']->content ?>


//this was an attempt to print the original image if there was no slider_image
//but the if clause for slider_image always returns true, even if no slider_image was uploaded
//(aka, the if ! clause below always reurns false.
//<?php if ((!$fields['field_slider_image']->content) && ($fields['entity_id_1']->content)) { ?><li><?php print $fields['entity_id_1']->content; ?>

-dkw 26nov20111
added node title into "read more" link for improved accessibility and SEO.
see http://drupal.org/node/49428

*/ ?>


 
<?php if ($fields['field_slider_image']->content != '') { ?><li><?php  print $fields['field_slider_image']->content; ?>

<div class="news-box-s"><div class="text-box">
<h1><?php print $fields['title']->content; ?></h1>
<span class="date"><?php print $fields['created']->content; ?></span>
<p><?php print $fields['entity_id']->content; ?> <a href="<?php print $fields['path']->content; ?>" class="more"><?php print t('Read More<span class="element-invisible"> about '.strip_tags($fields['title']->content).'</span>') ?></a></p>
</div></div>
</li><?php } ?>