<?php
//同タグ・同カテゴリー記事を取得
$count = 5;

$tags = get_the_tags();
$categories = get_the_category();
$id = get_the_ID();
$args;


if($categories){
  $cat_array = array();
  foreach($categories as $category){
    array_push($cat_array, $category->slug);
  }
}

if($tags){
  $tag_array = array();
  foreach($tags as $tag){ 
    array_push($tag_array, $tag->slug);
  }

  $args = array(
    'tax_query' => array(
      'relation' => 'OR',
      array(
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => $cat_array,
        'include_children' => true,
        'operator' => 'IN'
      ),
      array(
        'taxonomy' => 'post_tag',
        'field' => 'slug',
        'terms' => $tag_array,
        'include_children' => false,
        'operator' => 'IN'
      )
    ),
    'post__not_in' => array($id),
    'orderby'=>'rand',
    'posts_per_page' => $count
  );
}else{
  $args = array(
    'category_name' => $cats_string,
    'post__not_in' => array($id),
    'orderby'=>'rand',
    'posts_per_page' => $count
  );
}

$the_query = new WP_Query($args); ?>

<?php if ( $the_query->have_posts() ) : ?>
<div id="related" class="related">
  <h2>関連記事</h2>
  <ul class="related-entry">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <li>
        <a href="<?php the_permalink(); ?>">
          <div class="related-image">
            <?php
              if ( has_post_thumbnail() ) :
                the_post_thumbnail( 'medium');
              else:
                $square_L = get_theme_file_uri( '/images/no-image-sl.png' );
                echo '<img src="'.$square_L.'" alt="no image" title="no image" height="250" width="250" />';
              endif;
            ?>
          </div>
          <div class="related-title">
            <h3><?php the_title(); ?></h3>
          </div>
        </a>
      </li>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </ul>
    
</div>
<?php endif; ?>