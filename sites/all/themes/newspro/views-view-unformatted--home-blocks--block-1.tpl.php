<div class="gallery-holder"><ul class="gallery">
<?php 
$s = '';
$i = false;
foreach ($rows as $id => $row) {
print $row;
if (!$i) {
	$s .= '<li class="active"><a href="#">&nbsp;</a></li>';
	$i = true;
} else {
	$s .= '<li><a href="#">&nbsp;</a></li>';
}
}
?>
</ul><ul class="switcher">
<?php print $s ?>
</ul></div>
<a href="#" class="prev">&nbsp;</a>
<a href="#" class="next">&nbsp;</a>