<?php
// -dkw 6nov2011. To show images with the home category view:
// copied one of the other view .tpl files. this view uses "field_image" instead of "entity_id_1", so made that change.
// commented out line for printing body, which we don't want for this view.
// also, added some line breaks so the text is forced to take up at least as much vertical space as the image, otherwise
// breaks the formatting. surely there's a better way to fix the formatting....
//
// -dkw 9nov2011 added class clr to text-holder so next teaser would not float next to it.
// thus was able to remove extra linebreaks.
//
// -dkw 28nov2011 added strip_tags() call around nid when printing href to comment form. Otherwise tags broke the link.
//
// -dkw 30nov2011
// added node title into "comments" link for improved accessiblity and SEO.

$out = '<li>';
if (($fields['field_image']->content)) {$out .= '<div class="image-holder">'.$fields['field_image']->content.'</div>';}
$out .= '<div class="text-holder" >';
$out .= '<div class="clr" >';
//$out .= '<br><h3 class="title">'.$fields['title']->content.'</h3>';
$out .= '<h3 class="title">'.$fields['title']->content.'</h3>';
$out .= '<ul class="info-list">';
//$out .= '<br><li>'.$fields['created']->content.'<br></li>';
$out .= '<li>'.$fields['created']->content.'</li>';
if ($fields['comment_count']->content) $out .= '<li><a href="'.url('node/'.strip_tags($fields['nid']->content), array('fragment' => 'comment-form')).'">'.format_plural($fields['comment_count']->content, '1 Comment', '@count Comments').'<span class="element-invisible"> about '.strip_tags($fields['title']->content).'</span></a></li>';
$out .= '</ul>';
//$out .= '<p>'.$fields['entity_id']->content.'</p>';
$out .= '</div>';
$out .= '</div>';
$out .= '</li>';
print $out;
?>