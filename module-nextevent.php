<?php
/**
 * NEXT EVENT
 *
 * Displays the next upcoming event.
 *
 * @package  Little_Netty
 */

?>
<div class="nextEvent clearfix">
	<?php
	// Set up 'Events' loop (all 'events', in date-order).
	$events_args = array(
		'posts_per_page'    => 1,
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

			$show_dates = get_field( 'show_dates' );
			$venue_name = get_field( 'venue_name' );
			$venue_address = get_field( 'venue_address' );
			$venue_website = get_field( 'venue_website' );

			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'eventArchive' ); ?>>
				
				<svg class="eventArchiveIcon">
					<use xlink:href="#machine" />
				</svg>

				<p>Little Netty's next craft-fair appearance will be at</p>

				<h2 class="eventTitle">
					<!-- <a href="<?php the_permalink(); ?>"> -->
						<?php the_title(); ?>
					<!-- </a> -->
				</h2>
				
				<div class="eventDatesWrapper">
					<?php
					// Event dates.
					$date_count = 1;
					$date_plural = count( $show_dates ) > 1 ? 's' : '';
					foreach ( $show_dates as $show_date ) {

						if ( $date_count > 1 ) {
							echo '<span class="eventDates eventDatesAnd"> and </span>';
						}

						$date_count++;

						// Turn the date string into an object so we can choose which format we want to output.
						$date_object = date_create_from_format( 'd/m/Y', $show_date['date'] );

						// Format the date.
						$date_string = $date_object->format( 'jS F, Y' );

						// Print the output.
						echo '<span class="eventDates">' . $date_string . ' from ' . $show_date['start_time'] . ' to ' . $show_date['end_time'] . '</span>';
					}
					?>
				</div>

				<div class="eventVenueWrapper">
					<em>at</em>
					<?php
					// Venue Name (with url if available).
					echo '<span class="eventVenueName">' . $venue_name . '</span>';
					?>
				</div>

			</article>
			<?php

		endwhile;
	else :

		echo '<h3>No Events</h3>';

	endif;
	wp_reset_postdata();
	?>

	<a href="/events" class="button">See all upcoming events</a>
</div>