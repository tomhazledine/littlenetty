<?php
/**
 * Enqueuing Scripts & Styles
 *
 * @package  Little_Netty
 */

/**
 * Enqueue scripts and styles.
 */
function tabularasa_scripts() {
	wp_enqueue_style( 'tabularasa-style', get_template_directory_uri() . '/assets/css/main.css' );

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/static/modernizr-2.6.2.min.js' );

	wp_enqueue_script( 'tabularasa-scripts', get_template_directory_uri() . '/assets/js/app.js', array( 'jquery', 'modernizr' ), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tabularasa_scripts' );
