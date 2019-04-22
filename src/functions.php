<?php

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'CURRENT_THEME_NAME',  get_option( 'stylesheet' ) );
define( 'THEME_VERSION',  wp_get_theme( 'wwata' )->Version );
define( 'PARENT',  get_parent_theme_file_uri() );
define( 'PARENT_CSS',  PARENT . '' );
define( 'PARENT_JS',  PARENT . '/js' );
define( 'PARENT_PATH',  get_parent_theme_file_path() );
define( 'PARENT_INC',  PARENT_PATH . '/include' );
define( 'PLACEHOLDER_IMAGE',  'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==' );

/**** グローバル変数 ****/
$wwata = get_option( 'theme_mods_' . CURRENT_THEME_NAME );

$wwata['site_name'] = get_bloginfo( 'name' );
$wwata['home_url'] = esc_url( get_home_url( null, '/' ) );

/****  Script CSS読み込み  ****/
function load_script_css(){
  //デバッグ時はタイムスタンプをバージョンとする
  //(キャッシュが残らないので開発しやすい)
  $version = (defined('WP_DEBUG') && true === WP_DEBUG)?time():THEME_VERSION;

  //jQueryは使わない！
  wp_deregister_script('jquery');

  wp_enqueue_script( "main_script", get_template_directory_uri()."/js/script.js", array(), $version, true );
  wp_enqueue_style( "style", get_stylesheet_uri(), false, $version );
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

// サムネイルからwidth height を削除する
add_filter( 'post_thumbnail_html', 'custom_attribute' );
function custom_attribute( $html ){
    $html = preg_replace('/(width|height)="\d*"\s/', '', $html);
    return $html;
}

/****  ナビゲーション  ****/
add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'nav', 'グローバルナビゲーション' );
  register_nav_menu( 'footer', 'フッター' );
}

/**** ウィジェット ****/
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'サイドバー',
		'id' => 'sidebar',
		'before_widget' => "<div class='widget'>",
		'after_widget' => "</div>",
		'before_title' => "<h3 class='widget-header'>",
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => 'サイドバー(スクロールに追従)',
		'id' => 'sidebar-sticky',
		'before_widget' => "<div class='widget'>",
		'after_widget' => "</div>",
		'before_title' => "<h3 class='widget-header'>",
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => 'フッター右',
		'id' => 'footer-right',
		'before_widget' => "<div class='widget'>",
		'after_widget' => "</div>",
		'before_title' => "<h3 class='widget-header'>",
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => 'フッター左',
		'id' => 'footer-left',
		'before_widget' => "<div class='widget'>",
		'after_widget' => "</div>",
		'before_title' => "<h3 class='widget-header'>",
		'after_title' => '</h3>'
	));
}

/****  サムネイルサポート  ****/
add_theme_support('post-thumbnails'); 