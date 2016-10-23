<?php
/**
* Custom Post Type = Test
*
* @package Little_Netty
*/

/**
 * Register post type
 */
function event_post() {
	$labels = array(
		'name'               => _x( 'Events', 'post type general name' ),
		'singular_name'      => _x( 'Event', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Event' ),
		'add_new_item'       => __( 'Add New Event' ),
		'edit_item'          => __( 'Edit Event' ),
		'new_item'           => __( 'New Events' ),
		'all_items'          => __( 'All Events' ),
		'view_item'          => __( 'View Event' ),
		'search_items'       => __( 'Search Events' ),
		'not_found'          => __( 'No Events found' ),
		'not_found_in_trash' => __( 'No Events found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Events',
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our Events and event-specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
		'has_archive'   => true,
		// 'rewrite'       => array('slug' => 'events')
	);
	register_post_type( 'events', $args );
}
add_action( 'init', 'event_post' );

/**
 * Custom interaction messages
 * @param  array $messages Custom UI messages for the 'events' post type.
 * @return array           $messages
 */
function event_updated_messages( $messages ) {
	global $post, $post_ID;
	$messages['events'] = array(
		0 => '',
		1 => sprintf( __( 'Event updated. <a href="%s">View Event</a>' ), esc_url( get_permalink( $post_ID ) ) ),
		2 => __( 'Custom field updated.' ),
		3 => __( 'Custom field deleted.' ),
		4 => __( 'Event updated.' ),
		5 => isset( $_GET['revision'] ) ? sprintf( __( 'Event restored to revision from %s' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __( 'Event published. <a href="%s">View product</a>' ), esc_url( get_permalink( $post_ID ) ) ),
		7 => __( 'Event saved.' ),
		8 => sprintf( __( 'Event submitted. <a target="_blank" href="%s">Preview Event</a>' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
		9 => sprintf( __( 'Event scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Event</a>' ), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
		10 => sprintf( __( 'Event draft updated. <a target="_blank" href="%s">Preview Event</a>' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
	);
	return $messages;
}
add_filter( 'post_updated_messages', 'event_updated_messages' );

// contextual help
function event_contextual_help( $contextual_help, $screen_id, $screen ) { 
	if ( 'events' == $screen->id ) {
		$contextual_help = '<h2>Events</h2>
		<p>These are the Events that appear in the \'Events\' section of the site. You can see a list of them on this page in reverse chronological order - the latest one we added is first.</p> 
		<p>You can view/edit the details of each Test by clicking on its name, or you can perform bulk actions using the dropdown menu and selecting multiple items.</p>';
	} elseif ( 'edit-event' == $screen->id ) {
		$contextual_help = '<h2>Editing Events</h2>
		<p>This page allows you to view/modify Event details.</p>';
	}
	return $contextual_help;
}
add_action( 'contextual_help', 'event_contextual_help', 10, 3 );
