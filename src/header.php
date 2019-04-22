<?php

global $wwata;

?>

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
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <?php wp_head(); ?>
  </head>
  <body>
    <header>
        <div class="header-inner">
            <a href="<?php echo $wwata['home_url']; ?>" itemprop="url">
                <?php $title_tag = is_singular() ? 'span': 'h1'; ?>
                <?php if ( isset($wwata['header_img']) ) : ?>
                    <<?php echo $title_tag; ?> class="site-logo"><?php echo '<img src="'.$wwata['header_img'].'" height="80" width="300" alt="logo" />'; ?></<?php echo $title_tag; ?>>
                <?php else: ?>
                    <<?php echo $title_tag; ?> class="site-title" itemprop="name"><?php echo $wwata['site_name']; ?></<?php echo $title_tag; ?>>
                <?php endif; ?>
            </a>
            <span class="header-description"><?=get_bloginfo( 'description' )?></span>
        </div>
    </header>
    <a class="hamburger-mobile" onclick="toggleNav()"><img src="images/navigation/hamburger.svg" alt="メニュー"></a>
    <nav id="nav">
        <?php wp_nav_menu(array(
            'theme_location' => 'nav'
        )); ?>
    </nav>
    <div id="wrapper" class="wrapper">