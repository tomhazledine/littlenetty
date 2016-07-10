<?php /* Template Name: Events Page */ ?>
<?php include"header.php"; ?>

<section class="eventsFeed">
    <?php
    // Set up 'Events' loop [all 'events', in date-order]
    $eventsFeed_args = array(
        'posts_per_page'    => -1,
        'post_type'         => 'event',
        'meta_key'          => 'start_date',
        'orderby'           => 'meta_value_num',
        'order'             => 'DESC'
    );
    $eventsFeed_posts = new WP_Query($eventsFeed_args);

    // The 'Events' loop
    if($eventsFeed_posts->have_posts()) :
        while($eventsFeed_posts->have_posts()) :
            // Set up Post object
            $eventsFeed_posts->the_post();

            // Get the Event's custom fields
            $event_venueName    = get_field('venue_name');
            $event_venueAddress = get_field('venue_address');
            $event_dateStart    = get_field('start_date');
            $event_days         = get_field('days');
            $event_timeStart    = get_field('start_time');
            $event_timeEnd      = get_field('end_time');

            // Is this a multi-day event?
            $dayCount = count($event_days);
            $event_multiDay = ($dayCount > 1 ? true : false );

            // Get the dates and times of the event
            $startTimeStamp = strtotime($event_dateStart);
            $startDate = date("l F jS\, Y", $startTimeStamp);
            $rawEndDate = $event_dateStart + ($dayCount - 1);
            $endTimeStamp = strtotime($rawEndDate);
            $endDate = date("l F jS\, Y", $endTimeStamp);
            
            // Is the event in the future or the past?
            $today = date("Ymd");
            $future = ($event_dateStart > $today || $rawEndDate > $today ? true : false );

            // Variable content echoed in article
            $visibleEndDate = ($event_multiDay ? ' – '.$endDate : '' );
            $futureStatement = ($future ? 'will be on' : 'took place on' );
            $tenseClass = ($future ? 'future' : 'past' );

            ?>

            <article class="event <?= $tenseClass; ?>">
                <h2>
                    <?php if ($future) {
                        echo '<a href="'.get_the_permalink().'"><h2>';
                        the_title();
                        echo '</a>';
                    } else {
                        the_title();
                    }?>
                </h2>
                <?php if ($future) {
                    echo '</a>';
                } ?>
                <p>This event <?= $futureStatement; ?> <?= $startDate; ?><?= $visibleEndDate; ?>.</p>
            </article>

        <?php endwhile;
    else: // Shown if no event posts exist ?>

        <h3>No Events</h3>

    <?php endif; wp_reset_postdata(); ?>

</section>


<?php include"footer.php"; ?>