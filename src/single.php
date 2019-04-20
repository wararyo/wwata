<?php get_header() ?>
<main>
  <article class="article">
      <div class="article-eyecatch-container">
          <?php if(has_post_thumbnail()){
            $title= get_the_title(); the_post_thumbnail('full', array( 'alt' =>$title, 'class' => 'article-eyecatch-background'));
          } ?>
          <?php get_template_part( 'breadcrumb' ); ?>
          <?php if(has_post_thumbnail()){
            $title= get_the_title(); the_post_thumbnail('full', array( 'alt' =>$title, 'class' => 'article-eyecatch', 'height' => ''));
          } ?>
          <h1><?=get_the_title();?></h1>
          <div class="article-meta">
              <ul class="article-categories">
                  <li><a href="https://godios.simmon.design/category/usage/design/">デザイン</a></li>
              </ul>
              <span class="created-date">2018年4月3日</span>
              <span class="updated-date">
              <time datetime="2018-05-31T12:20:17+09:00">2018年5月31日</time>
              </span>
          </div>
      </div>
      <div class="article-content">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; endif; ?>
      </div>
  </article>
  <aside>
    <?php get_template_part( 'related-entry' ); ?>
    <?php comments_template(); ?>
    <?php comment_form(); ?>
  </aside>
</main>
<?php get_sidebar() ?>
<?php get_footer() ?>