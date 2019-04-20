<?php get_header() ?>
<main class="entries">

  <!-- Thumbnail -->
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <a class="entry" href="<?php the_permalink() ?>">
    <?php if ( has_post_thumbnail() ) {
      $id = get_the_ID();
      $square_S = get_the_post_thumbnail_url( $id, 'square-small' );
      $square_L = get_the_post_thumbnail_url( $id, 'square-large' );
      $srcset = $square_L.' 2000w, '.$square_S.' 414w';
      $args = [
          'srcset' => $srcset,
          'sizes'  => '(max-width: 414px) 33.3vw, (max-width: 375px) 50vw',
          'class' => 'entry-image'
      ];
      the_post_thumbnail( 'rectangle-large', $args );
    } else {
        $square_L = get_theme_file_uri( '/images/no-image-sl.png' );
        echo '<img class="entry-image" src="'.$square_L.'" alt="no image" title="no image" height="220" width="220" />';
    } ?>

    <div class="entry-inner">
      <span class="entry-category"><?php echo get_the_category()[0]->name; ?></span>
      <h2 class="entry-title"><?php the_title(); ?></h2>
      <div class="entry-content">
        <?php the_excerpt(); ?>
      </div>
      <div class="entry-footer">
        <span class="entry-date"><?php the_date(); ?></span>   
      </div>
    </div>
  </a>
  <?php endwhile; ?>
  <?php else: ?>
  <p style="margin-bottom:30px;">お探しの記事はありません</P>
  <?php endif; ?>
</main>
<?php get_sidebar() ?>
<?php get_footer() ?>