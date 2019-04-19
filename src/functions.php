<?php
/****  script css読み込み  ****/
function load_script_css(){
	wp_deregister_script('jquery');
	wp_enqueue_script( "main_script", get_template_directory_uri()."/js/script.js", array(), false, true );
	wp_enqueue_style( "style", get_stylesheet_uri(), false );
}
add_action('wp_enqueue_scripts', 'load_script_css');