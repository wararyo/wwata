<?php
$url=(empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$title = wp_title('|', false, 'right').get_bloginfo('name');
$url_encoded=urlencode(mb_convert_encoding($url, "UTF-8"));
$title_encoded=urlencode(mb_convert_encoding($title, "UTF-8"));
?>

<div class="share-buttons">

<!-- twitter -->

<div class="share-button">
<a class="no-deco" target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo $url_encoded ?>&text=<?php echo $title_encoded; if(get_option("mention")){echo "&via=".get_option("twitter_account");} ?>" onClick="ga('send','event','Share','Twitter',location.href,1,{'nonInteraction':1});">
鳥
</a>
</div>

<!-- facebook -->
<div class="share-button">
<a class="no-deco" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url_encoded; ?>&t=<?php echo $title_encoded; ?>" onClick="ga('send','event','Share','Facebook',location.href,1,{'nonInteraction':1});" >
f
</a>
</div>

<!-- hatebu -->
<div class="share-button">
<a class="no-deco" target="_blank" href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url_encoded; ?>&title=<?php echo $title_encoded; ?>" onClick="ga('send','event','Share','Hatena',location.href,1,{'nonInteraction':1});">
B!
</a>
</div>

<!-- pocket -->
<div class="share-button">
<a class="no-deco" target="_blank" href="http://getpocket.com/edit?url=<?php echo $url_encoded; ?>&title=<?php echo $title_encoded; ?>" onClick="ga('send','event','Share','Pocket',location.href,1,{'nonInteraction':1});">
↓
</a>
</div>

<!-- line -->
<div class="share-button">
<a class="no-deco" target="_blank" href="http://line.me/R/msg/text/?<?php echo $title_encoded." "; ?><?php echo $url_encoded; ?>" onClick="ga('send','event','Share','LINE',location.href,1,{'nonInteraction':1});">
Q
</a>
</div>
</div><!-- .share-buttons -->