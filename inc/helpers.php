<?php
/**
 * Tabula Rasa Helpers
 *
 * @package Little_Netty
 */

/**
 * Print Pre: outputs a pre-styled block to make debug prints more easy to read.
 *
 * @param string $stuff_to_print Text to be wrapped in styled pre-tag.
 */
function print_pre( $stuff_to_print ) {
	echo '<pre style="
		background:#ededed;
		color:#444;
		border:1px solid #ccc;
		border-radius:10px;
		font-size:10px;
		padding:10px;
		margin:10px;
		text-align:left;
	">';
	var_dump( $stuff_to_print );
	echo '</pre>';
}

/**
 * DISABLE ADMIN BAR
 */
// Disable the Admin Bar By Default.
add_filter( 'show_admin_bar', '__return_false' );

// Remove the Admin Bar preference in user profile to remove temptation...
remove_action( 'personal_options', '_admin_bar_preferences' );
