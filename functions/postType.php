<?php
// Custom Post Type = Test
	// register post type
	function testPost() {
		$labels = array(
			'name'               => _x( 'Tests', 'post type general name' ),
			'singular_name'      => _x( 'Test', 'post type singular name' ),
			'add_new'            => _x( 'Add New', 'Test' ),
			'add_new_item'       => __( 'Add New Test' ),
			'edit_item'          => __( 'Edit Test' ),
			'new_item'           => __( 'New Tests' ),
			'all_items'          => __( 'All Tests' ),
			'view_item'          => __( 'View Test' ),
			'search_items'       => __( 'Search Tests' ),
			'not_found'          => __( 'No Tests found' ),
			'not_found_in_trash' => __( 'No Tests found in the Trash' ), 
			'parent_item_colon'  => '',
			'menu_name'          => 'Tests'
		);
		$args = array(
			'labels'        => $labels,
			'description'   => 'Holds our Tests and Test-item-specific data',
			'public'        => true,
			'menu_position' => 5,
			'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
			'has_archive'   => true,
		);
	register_post_type( 'tests', $args );
	}
	add_action( 'init', 'testPost' );
	
	// Test tags:
	function testTaxonomies() {
		$labels = array(
			'name'              => _x( 'Test Tags', 'taxonomy general name' ),
			'singular_name'     => _x( 'Test Tag', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Test Tags' ),
			'all_items'         => __( 'All Test Tags' ),
			'parent_item'       => __( 'Parent Test Tag' ),
			'parent_item_colon' => __( 'Parent Test Tag:' ),
			'edit_item'         => __( 'Edit Test Tag' ), 
			'update_item'       => __( 'Update Test Tag' ),
			'add_new_item'      => __( 'Add New Test Tag' ),
			'new_item_name'     => __( 'New Test Tag' ),
			'menu_name'         => __( 'Test Tags' ),
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
		);
		register_taxonomy( 'testtax_tag', 'test', $args );
	}
	add_action( 'init', 'testTaxonomies', 0 );

	// custom interaction messages
	function my_updated_messages( $messages ) {
		global $post, $post_ID;
		$messages['test'] = array(
			0 => '', 
			1 => sprintf( __('Test updated. <a href="%s">View Test</a>'), esc_url( get_permalink($post_ID) ) ),
			2 => __('Custom field updated.'),
			3 => __('Custom field deleted.'),
			4 => __('Test updated.'),
			5 => isset($_GET['revision']) ? sprintf( __('Test restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => sprintf( __('Test published. <a href="%s">View product</a>'), esc_url( get_permalink($post_ID) ) ),
			7 => __('Test saved.'),
			8 => sprintf( __('Test submitted. <a target="_blank" href="%s">Preview Test</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			9 => sprintf( __('Test scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Test</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
			10 => sprintf( __('Test draft updated. <a target="_blank" href="%s">Preview Test</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		);
		return $messages;
	}
	add_filter( 'post_updated_messages', 'my_updated_messages' );

	// contextual help
	function my_contextual_help( $contextual_help, $screen_id, $screen ) { 
		if ( 'test' == $screen->id ) {
			$contextual_help = '<h2>Tests</h2>
			<p>These are the Tests that appear in the \'Tests\' section of the site. You can see a list of them on this page in reverse chronological order - the latest one we added is first.</p> 
			<p>You can view/edit the details of each Test by clicking on its name, or you can perform bulk actions using the dropdown menu and selecting multiple items.</p>';
		} elseif ( 'edit-test' == $screen->id ) {
			$contextual_help = '<h2>Editing Tests</h2>
			<p>This page allows you to view/modify Tests\' details.</p>';
		}
		return $contextual_help;
	}
	add_action( 'contextual_help', 'my_contextual_help', 10, 3 );
