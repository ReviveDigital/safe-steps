<?php
if ( ! function_exists( 'theme_setup' ) ) :

function theme_setup() {
	add_theme_support( 'title-tag' );
}
endif;
add_action( 'after_setup_theme', 'theme_setup' );

register_nav_menus( array(
   'primary' => esc_html__( 'Primary', 'safesteps' ),
) );

// Enqueue Scripts and Styles
function safesteps() {
    wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '0.0.17' );
    wp_enqueue_style( 'font', 'https://use.typekit.net/gol7kgt.css');
    wp_enqueue_style( 'swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css');
    wp_enqueue_script( 'slider', 'https://unpkg.com/swiper/swiper-bundle.min.js');
    wp_enqueue_script( 'jQuery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js');
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/general.min.js',array(),'1.0.0',true);

    if(is_page(361)) { 
      wp_enqueue_script( 'google-js', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyDub7y3LHxTj6mZDzTFex1_VPM9G8ZNhcw', '', '' );
    }
}

add_action( 'wp_enqueue_scripts', 'safesteps' );

function safesteps_login() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/admin/style-login.css' );
}

add_action( 'login_enqueue_scripts', 'safesteps_login' );

function safesteps_admin() {
    wp_enqueue_style( 'admin', get_stylesheet_directory_uri() . '/admin/style-admin.css' );
}

add_action( 'admin_enqueue_scripts', 'safesteps_admin' );

// Disable Head Code
function remove_head_mess() {
   remove_action('admin_print_styles','print_emoji_styles' );
   remove_action('wp_head','print_emoji_detection_script', 7 );
   remove_action('admin_print_scripts','print_emoji_detection_script' );
   remove_action('wp_print_styles','print_emoji_styles' );
   remove_action('wp_head','wp_shortlink_wp_head', 10, 0);
   remove_action('wp_head','wp_generator');
   remove_action('wp_head','wp_oembed_add_discovery_links', 10 );
   remove_action('wp_head','wp_oembed_add_host_js');
   remove_action('wp_head','rsd_link');
   remove_action('wp_head','wlwmanifest_link');
   remove_action('wp_head','rest_output_link_wp_head');
   remove_action('wp_head', 'wp_resource_hints', 2 );
   remove_filter('wp_mail', 'wp_staticize_emoji_for_email' );
   remove_filter('the_content_feed', 'wp_staticize_emoji' );
   remove_filter('comment_text_rss', 'wp_staticize_emoji' );
   remove_action('wp_head', 'feed_links', 2);
   remove_action('wp_head', 'feed_links_extra', 3);

}
add_action( 'init', 'remove_head_mess' );

//Gravity Form Loading SVG
add_filter("gform_ajax_spinner_url", "spinner_url", 10, 2);
function spinner_url($image_src, $form){
    return  get_bloginfo('template_directory') . '/images/loading.svg' ;
}

// Google Maps
function my_acf_init() {
  acf_update_setting('google_api_key', 'AIzaSyDub7y3LHxTj6mZDzTFex1_VPM9G8ZNhcw');
}
add_action('acf/init', 'my_acf_init');

function get_excerpt(){
  $excerpt = get_the_content();
  $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
  $excerpt = strip_shortcodes($excerpt);
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, 250);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
  $excerpt = $excerpt.'...';
  return $excerpt;
}

//Function Includes
require_once('functions/cpt.php');
require_once('functions/options.php');
require_once('functions/resizing.php');

add_filter('gform_init_scripts_footer', 'init_scripts');
function init_scripts() {
    return true;
}

$role = get_role( 'editor' );
$role->add_cap( 'gravityforms_view_entries' );
