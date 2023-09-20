<!-- Upcoming Events -->
<div class="events-section py-6 md:py-12">
    <div class="container mx-auto">
        <h2 class=
        "text-2xl
        md:text-3xl
        font-semibold
        mb-4
        md:mb-6
        text-center">Tulevat tapahtumat</h2>
        <?php 
        $args = array(
            'post_type' => 'events',
            'posts_per_page' => 3,
        );
        $events_query = new WP_Query($args);

        if ($events_query->have_posts()) : 
            while ($events_query->have_posts()): 
                $events_query->the_post(); ?>
                <div class="event-item">
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>">Lue lisää</a>
                </div>
            <?php endwhile; 
            wp_reset_postdata();
        endif; ?>
    </div>
</div>