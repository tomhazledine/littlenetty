<?php
/**
 * The template for displaying Events archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Little_Netty
 */

get_header(); ?>

<section class="eventsFeed">
	<?php
	// Set up 'Events' loop (all 'events', in date-order).
	$events_args = array(
		'posts_per_page'    => 10,
		'post_type'         => 'events',
		'meta_key'          => 'show_dates_0_date',
		'orderby'           => 'meta_value_num',
		'order'             => 'ASC',
	);
	$events_posts = new WP_Query($events_args);

	// The 'Events' loop.
	if ( $events_posts->have_posts() ) :
		while ( $events_posts->have_posts() ) :
			$events_posts->the_post();

			get_template_part( 'template-parts/content-events' );

		endwhile;
	else :

		echo '<h3>No Events</h3>';

	endif;
	wp_reset_postdata();
	?>

</section>


<?php include"footer.php"; ?>
