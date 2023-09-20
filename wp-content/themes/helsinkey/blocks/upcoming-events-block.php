<!-- Upcoming Events -->
<div class="events-section py-6 md:py-12">
    <div class="container mx-auto">
        <h2 class="text-2xl md:text-3xl font-semibold mb-4 md:mb-6 text-center">Tulevat tapahtumat</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
            <?php 
            $args = array(
                'post_type' => 'events',
                'posts_per_page' => 3,
            );
            $events_query = new WP_Query($args);
            $total_events = $events_query->found_posts;
            
            $event_count = 0;
            if ($events_query->have_posts()) : 
                while ($events_query->have_posts()): 
                    $events_query->the_post(); 
                    $event_count++;
                    ?>
                    <div class="event-item bg-gray-900 p-2 md:p-4 rounded shadow-lg flex flex-col <?php echo ($event_count === 3) ? 'hidden lg:block' : ''; ?>">
                        <!-- Event Thumbnail -->
                        <img class="w-full h-36 md:h-48 object-cover mb-2 md:mb-4 rounded" src="<?php echo get_the_post_thumbnail_url($post, 'my_custom_size'); ?>" alt="<?php the_title(); ?>">
                        
                        <!-- Event Title -->
                        <a href="<?php the_permalink(); ?>">
                            <h3 class="text-lg md:text-xl font-bold mb-1 md:mb-2 text-white"><?php the_title(); ?></h3>
                        </a>
                        
                        <!-- Event Excerpt -->
                        <div class="flex-grow">
                            <p class="text-sm md:text-base text-white">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </p>
                        </div>

                        <!-- Event Date and Location -->
                        <div class="text-sm mx-auto md:text-base text-white mt-2"> 
                            <?php echo get_field('event_location'); ?> @ <?php echo get_field('event_date'); ?>
                        </div>

                        <!-- Read More Button -->
                        <div class="mt-auto flex justify-center items-center">
                            <a href="<?php the_permalink(); ?>" class="text-white bg-helsinkey-blue text-xs md:text-sm ml-6 mt-6 px-2 md:px-4 py-2 rounded-xl transition-colors hover:bg-blue-600">Lue lisää</a>
                        </div>
                    </div>
                <?php endwhile; 
                wp_reset_postdata();
            endif; ?>
        </div>
        <!-- "Read All" button -->
        <?php if ($total_events > 2): ?>
            <div class="mt-12 text-center lg:hidden xl:hidden 2xl:hidden">
                <a href="<?php echo get_permalink(get_option('page_for_events')); ?>" class="text-white bg-helsinkey-blue text-md md:text-md p-4 md:p-4 py-2 rounded-xl transition-colors hover:bg-blue-600">Näytä kaikki tapahtumat</a>
            </div>
        <?php endif; ?>
        <?php if ($total_events > 3): ?>
            <div class="mt-12 text-center hidden lg:block xl:block 2xl:block">
                <a href="<?php echo get_permalink(get_option('page_for_events')); ?>" class="text-white bg-helsinkey-blue text-md md:text-md p-4 md:p-4 py-2 rounded-xl transition-colors hover:bg-blue-600">Näytä kaikki tapahtumat</a>
            </div>
        <?php endif; ?>
    </div>
</div>