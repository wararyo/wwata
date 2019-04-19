<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>{{Title}}</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <!-- OGP -->
    <head prefix="og: http://ogp.me/ns# website: http://ogp.me/ns/website#">
    <meta property="og:title" content="{{Title}}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{url}}" />
    <meta property="og:image" content="{{ogp}}" />
    <meta property="og:site_name" content="{{site_name}}" />
    <meta property="og:description" content="{{description}}" />
    <!-- TwitterCard -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="{{ogp}}" />

    <meta name="theme-color" content="{{color}}">

    <!-- rss feed -->
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

    <!-- Vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js"></script>
    <?php wp_head(); ?>
  </head>
  <body>
    <header>
        <div class="header-inner">
            <h1><a href="{{url}}">{{title}}</a></h1>
            <span class="header-description">{{description}}</span>
        </div>
    </header>
    <a class="hamburger-mobile" onclick="toggleNav()"><img src="images/navigation/hamburger.svg" alt="メニュー"></a>
    <nav id="nav">
        <ul>
            <li><a href="#">トップ</a></li>
            <li><a href="#">メニュー1</a></li>
            <li><a href="#">メニュー2</a></li>
        </ul>
    </nav>
    <div id="wrapper" class="wrapper">
    <main class="entries">
      <a class="entry" href="https://blog.simmon.design/character-counter-in-vuejs/">
        <img class="entry-image" width="600" height="358" src="https://blog.simmon.design/wp-content/uploads/2018/11/character-counter-in-vuejs-320x320.png" class="wp-post-image lazyloaded" alt="Character counter in Vue.js" sizes="(max-width: 414px) 33.3vw, (max-width: 375px) 50vw">
        <div class="entry-inner">
          <span class="entry-category">JavaScript</span>
          <h2 class="entry-title">【Vue.js】フォームに入力した文字数をカウントする方法</h2>
          <div class="entry-content">
            <p>最近Vue.jsを勉強し始めたので、フォームに入力した文字数をリアルタイムに表示するものを作ってみました。コード</p>
          </div>
          <div class="entry-footer">
            <span class="entry-date">2018年11月29日</span>   
          </div>
        </div>
      </a>
      <a class="entry" href="https://blog.simmon.design/character-counter-in-vuejs/">
        <img class="entry-image" width="600" height="358" src="https://blog.simmon.design/wp-content/uploads/2018/11/character-counter-in-vuejs-320x320.png" class="wp-post-image lazyloaded" alt="Character counter in Vue.js" sizes="(max-width: 414px) 33.3vw, (max-width: 375px) 50vw">
        <div class="entry-inner">
          <span class="entry-category">JavaScript</span>
          <h2 class="entry-title">【Vue.js】フォームに入力した文字数をカウントする方法</h2>
          <div class="entry-content">
            <p>最近Vue.jsを勉強し始めたので、フォームに入力した文字数をリアルタイムに表示するものを作ってみました。コード</p>
          </div>
          <div class="entry-footer">
            <span class="entry-date">2018年11月29日</span>   
          </div>
        </div>
      </a>
    </main>

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
      <div class="widget">
          <p>ウィジェットのテスト</p>
      </div>
    </aside>
    </div><!-- navigation-wrapper -->

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-pane copyright">
                <p>&copy; {{Name}}.</p>
            </div>
        </div>
    </footer>

    <!-- SweetScroll -->
    <script src="https://unpkg.com/sweet-scroll/sweet-scroll.min.js"></script>
    <script>
        const sweetScroll = new SweetScroll({
            trigger: "a[href^='#']",
            offset: isPhone() ? -360 : -80,
            duration: 500
        });
    </script>

    <!-- SVG Effect -->
    <svg height="0" style="display: none;">
    <filter id="drop-shadow">
        <feGaussianBlur in="SourceAlpha" stdDeviation="4"></feGaussianBlur>
        <feColorMatrix result="matrixOut" in="offOut" type="matrix" values="1 0 0 0 0
                0 1 0 0 0
                0 0 1 0 0
                0 0 0 0.25 0"></feColorMatrix>
        <feOffset dx="0" dy="2" result="offsetblur"></feOffset>
        <feMerge>
            <feMergeNode></feMergeNode>
            <feMergeNode in="SourceGraphic"></feMergeNode>
        </feMerge>
    </filter>
    </svg>
    <?php wp_footer() ?>
  </body>
</html>