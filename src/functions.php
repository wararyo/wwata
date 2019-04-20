<?php
/****  Script CSS読み込み  ****/
function load_script_css(){
  wp_deregister_script('jquery');
  wp_enqueue_script( "main_script", get_template_directory_uri()."/js/script.js", array(), false, true );
  wp_enqueue_style( "style", get_stylesheet_uri(), false );
}
add_action('wp_enqueue_scripts', 'load_script_css');

/**** コメント表示 ****/
function wwata_comments($comment, $args, $depth){
$GLOBALS['comment'] = $comment; 
?>
<li class="comment" id="comment-<?php comment_ID() ?>">
  <div class="comment-body">
    <?php comment_author_link();?>
    <a class="comment-date" href="<?php the_permalink()?><?='#comment-'.comment_ID(); ?>"><?php comment_date("Y-m-d"); ?>  <?php comment_time(); ?></a>

    <?php comment_text(); ?>

    <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
  </div>
<!--</li> #comment-## liの閉じタグはWP側で付与されるので記述しない-->
<?php
}

add_filter( 'post_thumbnail_html', 'custom_attribute' );
function custom_attribute( $html ){
    // width height を削除する
    $html = preg_replace('/(width|height)="\d*"\s/', '', $html);
    return $html;
}