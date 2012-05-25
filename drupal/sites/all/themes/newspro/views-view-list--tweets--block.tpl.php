<ul class="tweets-list">
<?php foreach ($rows as $id => $row): ?>
<li><?php print $row; ?></li>
<?php endforeach; ?>
</ul>
<div class="tweet-ref">
<a href="http://twitter.com/<?php print variable_get('twitter_global_name','themesnapdemos'); ?>" class="follow">Follow me!</a>
</div>