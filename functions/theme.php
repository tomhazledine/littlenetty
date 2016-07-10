<?php 
// Theme-specific functions

// Print Pre
function print_pre($stuffToPrint){
  echo '<pre style="
    background:#ededed;
    color:#444;
    border:1px solid #ccc;
    border-radius:10px;
    font-size:10px;
    padding:10px;
    margin:10px;
  ">';
  var_dump($stuffToPrint);
  echo '</pre>';
}

// Echo Pre
function echo_pre($stuffToEcho){
  echo '<pre style="
    background:#ededed;
    color:#444;
    border:1px solid #ccc;
    border-radius:10px;
    font-size:10px;
    padding:10px;
    margin:10px;
  ">';
  echo $stuffToEcho;
  echo '</pre>';
}

// Declare Custom Menus
register_nav_menus( array(
  'header_menu' => 'Header Menu',
  'footer_menu' => 'Footer Menu'
  ) );

// Featured Image Support
if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'thumbnail', 150, 100, true );
  add_image_size( 'potfolio_s', 238, 119, true );
  add_image_size( 'mobile_gallery', 1000, 1000, false);
}

// Excerpt Length
function custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// strip width and height from featured images
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
function remove_thumbnail_dimensions( $html ) {
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
  return $html;
}

// Queue scripts properly
function my_scripts_method() {
  if( !is_admin()){
    wp_deregister_script('jquery');
    wp_register_script('jquery', ("//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"), false, '1.11.2', true);
    wp_enqueue_script('jquery');

    wp_register_script('custom-script', get_stylesheet_directory_uri() . '/assets/js/app.js', array( 'jquery' ), false, true);
    wp_enqueue_script('custom-script');
  }
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
?>