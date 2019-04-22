<aside class="sidebar">
  <!--  検索フォーム  -->
  <form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url() ?>">
    <div class="search-box">
      <input class="search-text" type="text" value="" name="s" id="s" placeholder="サイト内検索">
      <button class="search-submit" type="submit" id="searchsubmit" >@@include('images/sidebar/search.svg')</button>
    </div>
  </form>
  <div class="feed">
    <div class="message" ><!-- ＼最新情報をお届けします／ --></div>

    <div class="feed-button push">
      <a href="javascript:void(0)" rel="nofollow" title="Push7" class="push no-deco" onClick="ga('send','event','Feed','Push',location.href,1,{'nonInteraction':1})">
        <p>@@include('images/feed/push.svg') <span class="label">プッシュ通知を受け取る</span></p>
      </a>
    </div>

    <div class="feed-button feedly">
      <a href="https://feedly.com/i/subscription/feed/<?= urlencode(get_bloginfo('rss2_url')); ?>" rel="nofollow" title="Feedly" target="_blank" class="feedly no-deco" onClick="ga('send','event','Feed','Feedly',location.href,1,{'nonInteraction':1})">
        <p>@@include('images/feed/feedly.svg')</p>
      </a>
    </div>
    <div class="feed-button rss">
      <a href="<?php bloginfo('rss2_url'); ?>" rel="nofollow" title="RSS" target="_blank" class="rss no-deco" onClick="ga('send','event','Feed','RSS',location.href,1,{'nonInteraction':1});">
        <p>@@include('images/feed/rss.svg')</p>
      </a>
    </div>
  </div>
  <?php dynamic_sidebar('sidebar'); ?>
  <div class="sticky">
    <?php dynamic_sidebar('sidebar-sticky'); ?>
  </div>
</aside>