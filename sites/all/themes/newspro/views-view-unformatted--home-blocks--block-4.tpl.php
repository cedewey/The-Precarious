<?php 
$l = '';
$r = '';
foreach ($rows as $id => $row) {
$c = explode('~~~~',$row);
$l .= $c[0];
$r .= $c[1];
}
?>
<div class="pictures-box"><div class="main-picture"><div class="picture-block"><ul class="fade-gallery">
<?php print $l; ?>
</ul></div></div>
<div class="pictures-section"><ul class="pictures-list">
<?php print $r; ?>
</ul></div></div>