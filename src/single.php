<?php get_header() ?>
<main>
  <article class="article">
      <div class="article-eyecatch-container">
          <?php if(has_post_thumbnail()){
            $title= get_the_title(); the_post_thumbnail('full', array( 'alt' =>$title, 'class' => 'article-eyecatch-background'));
          } ?>
          <ol id="breadcrumb" class="breadcrumb"><li><a href="https://godios.simmon.design/">ホーム</a></li><li><a href="https://godios.simmon.design/category/usage/">使い方</a></li><li><a href="https://godios.simmon.design/category/usage/design/">デザイン</a></li></ol>
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
    <div id="related" class="related">
      <h2>関連記事</h2>
      <div id="related-entry">
        <ul class="related-entry">
          <li>
            <a href="https://godios.simmon.design/release/1-0-0/">
              <div class="related-image">
                <img width="600" height="358" src="https://godios.simmon.design/wp-content/uploads/2018/04/fashion.jpg" class="wp-post-image lazyloaded" alt="パーカーとカメラとヘッドホン" srcset="https://godios.simmon.design/wp-content/uploads/2018/04/fashion-368x234.jpg 2000w, https://godios.simmon.design/wp-content/uploads/2018/04/fashion-320x320.jpg 600w, https://godios.simmon.design/wp-content/uploads/2018/04/fashion.jpg 375w" data-src="https://godios.simmon.design/wp-content/uploads/2018/04/fashion.jpg" data-srcset="https://godios.simmon.design/wp-content/uploads/2018/04/fashion-368x234.jpg 2000w, https://godios.simmon.design/wp-content/uploads/2018/04/fashion-320x320.jpg 600w, https://godios.simmon.design/wp-content/uploads/2018/04/fashion.jpg 375w" sizes="(max-width: 414px) 33.3vw, (max-width: 375px) 50vw">
              </div>
              <div class="related-title">
                <h3>Godios 1.0.0 リリース</h3>
              </div>
            </a>
          </li>
          <li>
            <a href="https://godios.simmon.design/release/1-0-0/">
              <div class="related-image">
                <img width="600" height="358" src="https://godios.simmon.design/wp-content/uploads/2018/04/fashion.jpg" class="wp-post-image lazyloaded" alt="パーカーとカメラとヘッドホン" srcset="https://godios.simmon.design/wp-content/uploads/2018/04/fashion-368x234.jpg 2000w, https://godios.simmon.design/wp-content/uploads/2018/04/fashion-320x320.jpg 600w, https://godios.simmon.design/wp-content/uploads/2018/04/fashion.jpg 375w" data-src="https://godios.simmon.design/wp-content/uploads/2018/04/fashion.jpg" data-srcset="https://godios.simmon.design/wp-content/uploads/2018/04/fashion-368x234.jpg 2000w, https://godios.simmon.design/wp-content/uploads/2018/04/fashion-320x320.jpg 600w, https://godios.simmon.design/wp-content/uploads/2018/04/fashion.jpg 375w" sizes="(max-width: 414px) 33.3vw, (max-width: 375px) 50vw">
              </div>
              <div class="related-title">
                <h3>Godios 1.0.0 リリース</h3>
              </div>
            </a>
          </li> 
          <li>
            <a href="https://godios.simmon.design/release/1-0-0/">
              <div class="related-image">
                <img width="600" height="358" src="https://godios.simmon.design/wp-content/uploads/2018/04/fashion.jpg" class="wp-post-image lazyloaded" alt="パーカーとカメラとヘッドホン" srcset="https://godios.simmon.design/wp-content/uploads/2018/04/fashion-368x234.jpg 2000w, https://godios.simmon.design/wp-content/uploads/2018/04/fashion-320x320.jpg 600w, https://godios.simmon.design/wp-content/uploads/2018/04/fashion.jpg 375w" data-src="https://godios.simmon.design/wp-content/uploads/2018/04/fashion.jpg" data-srcset="https://godios.simmon.design/wp-content/uploads/2018/04/fashion-368x234.jpg 2000w, https://godios.simmon.design/wp-content/uploads/2018/04/fashion-320x320.jpg 600w, https://godios.simmon.design/wp-content/uploads/2018/04/fashion.jpg 375w" sizes="(max-width: 414px) 33.3vw, (max-width: 375px) 50vw">
              </div>
              <div class="related-title">
                <h3>Godios 1.0.0 リリース</h3>
              </div>
            </a>
          </li>    
        </ul>
      </div>
    </div>                            
    <?php comments_template(); ?>
    <?php comment_form(); ?>
  </aside>
</main>
<?php get_sidebar() ?>
<?php get_footer() ?>