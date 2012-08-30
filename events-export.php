<?php
/*
Template Name: Events Export
*/
?>

<?php get_header(); ?>

<div class="sleeve_main">

	<div id="main">
		<h2><?php the_title(); ?></h2>

		<ul id="postlist">
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php p2_load_entry(); ?>
			<?php endwhile; ?>

		<?php endif; ?>
		</ul>
        <div class="events">
            <?php

            $events = tribe_get_events('posts_per_page=-1');
            $month = null;

            foreach ($events as $event) : setup_postdata($event);

                $event_month = date('F, Y', strtotime($event->EventStartDate));
                $event_start = date('F jS', strtotime($event->EventStartDate));
                $event_end = date('F jS', strtotime($event->EventEndDate));
                if ( $month != $event_month ) : $month = $event_month; ?>
                    <h3><?php echo $month ?></h3>
                <?php endif; ?>

                <h4>
                    <a href="<?php echo get_permalink($event->ID) ?>"><?php echo $event->post_title ?></a>
                    <?php edit_post_link(__(' ( edit )'), null, null, $event->id) ?>
                </h4>
                <div class="postcontent">
                <?php
                    if ( $event_start != $event_end ) {
                        printf('<span class="date">Date: %s - %s</span>', $event_start, $event_end);
                    } else {
                        printf('<span class="date">Date: %s</span>', $event_start);
                    }
                ?>
                    <?php echo apply_filters('the_content', $event->post_content); ?>
                </div>

            <?php endforeach; ?>
        </div>

	</div> <!-- main -->

</div> <!-- sleeve -->

<?php get_footer(); ?>