<?php if ($fields['subject']->content != '') { ?>
<li>
<h3 class="title"><?php print $fields['subject']->content; ?></h3>
<ul class="info-list">
<li><?php print $fields['changed']->content; ?></li>
</ul>
</li>
<?php } ?>