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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'eventArchive half' ); ?>>
	
	<svg class="eventArchiveIcon">
		<use xlink:href="#machine" />
	</svg>

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

			// Turn the date string into an object so we can choose which format we want to output.
			$date_object = date_create_from_format( 'd/m/Y', $show_date['date'] );


			if ( $date_count > 1 ) {
				// echo '<span class="eventDates eventDatesAnd"> and </span>';

				// Format the date.
				$date_string = $date_object->format( 'jS F' );

				// Print the output.
				echo '<span class="eventDates">' . $date_string . ' from ' . $show_date['start_time'] . ' to ' . $show_date['end_time'] . '</span>';
			} else {

				// Format the date.
				$date_string = $date_object->format( 'jS F, Y' );

				// Print the output.
				echo '<span class="eventDates">' . $date_string . ' from ' . $show_date['start_time'] . ' to ' . $show_date['end_time'] . '</span>';

			}

			$date_count++;
		}
		?>
	</div>

	<div class="eventVenueWrapper">
		<?php
		// Venue Name (with url if available).
		if ( ! empty( $venue_website ) ) {
			echo '<span class="eventVenueName"><a href="' . $venue_website . '">' . $venue_name . '</a></span>';
		} else {
			echo '<span class="eventVenueName">' . $venue_name . '</span>';
		}

		// Venue address.
		echo '<div class="eventVenueAddress">';
			foreach ( $venue_address as $address_line ) {
				echo '<span class="eventVenueAddressLine">' . $address_line['address_line'] . '</span>';
			}
		echo '</span>';
		?>
	</div>

	<!-- <a href="<?php the_permalink(); ?>">More</a> -->
</article>
