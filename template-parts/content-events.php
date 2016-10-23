<?php
/**
 * Template part for displaying Event posts in archives.
 *
 * @package Little_Netty
 */

$show_dates = get_field( 'show_dates' );
$venue_name = get_field( 'venue_name' );
$venue_address = get_field( 'venue_address' );
$venue_website = get_field( 'venue_website' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'event-archive' ); ?>>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<ul class="eventArchiveMeta">
		<?php

		// Venue Name (with url if available).
		if ( ! empty( $venue_website ) ) {
			echo '<li>Venue: <a href="' . $venue_website . '">' . $venue_name . '</a></li>';
		} else {
			echo '<li>Venue: ' . $venue_name . '</li>';
		}

		// Event dates.
		$date_count = 1;
		$date_plural = count( $show_dates ) > 1 ? 's' : '';
		echo '<li><h3>Date' . $date_plural . ':</h3><ul>';
			foreach ( $show_dates as $show_date ) {

				if ( $date_count > 1 ) {
					echo '<li>and</li>';
				}

				$date_count++;

				// Turn the date string into an object so we can choose which format we want to output.
				$date_object = date_create_from_format( 'd/m/Y', $show_date['date'] );

				// Format the date.
				$date_string = $date_object->format( 'jS F, Y' );

				// Print the output.
				echo '<li>' . $date_string . ' from ' . $show_date['start_time'] . ' to ' . $show_date['end_time'] . '</li>';
			}
		echo '<ul></li>';

		// Venue address.
		echo '<li><h3>Venue Address:</h3><ul>';
			foreach ( $venue_address as $address_line ) {
				echo '<li>' . $address_line['address_line'] . '</li>';
			}
		echo '<ul></li>';
		?>
		
	</ul>

	<a href="<?php the_permalink(); ?>">More</a>
</article>
