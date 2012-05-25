<?php
$out = '<li>';
if (isset($fields['entity_id_1']->content)) {$out .= '<div class="image-holder">'.$fields['entity_id_1']->content.'</div>';}
$out .= '<div class="text-holder">';
$out .= '<h3 class="title">'.$fields['title']->content.'</h3>';
$out .= '<ul class="info-list">';
$out .= '<li>'.$fields['created']->content.'</li>';
if ($fields['comment_count']->content) $out .= '<li><a href="'.url('node/'.$fields['nid']->content, array('fragment' => 'comment-form')).'">'.format_plural($fields['comment_count']->content, '1 Comment', '@count Comments').'</a></li>';
$out .= '</ul>';
$out .= '<p>'.$fields['entity_id']->content.'</p>';
$out .= '</div>';
$out .= '</li>';
print $out;
?>