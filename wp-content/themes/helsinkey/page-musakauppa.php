<?php
/**
 * Template Name: Musakauppa Page
 */
get_header(); ?>

<div class="container mx-auto mt-3 md:mt-3">
    <!-- Artists Section -->
    <div class="special-offers-section py-6 md:py-6">
        <h2 class="text-2xl md:text-3xl font-semibold mb-4 md:mb-6 text-center">
            Musakauppa
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
            <?php
            $args = array(
                'post_type' => 'artists',
                'posts_per_page' => -1
            );
            $artists_query = new WP_Query($args);
            if ($artists_query->have_posts()) :
                while ($artists_query->have_posts()) :
                    $artists_query->the_post();
            ?>
                <div class="special-offer-item bg-gray-900 p-4 rounded-lg shadow-lg flex flex-col">
                    <!-- Artist Thumbnail -->
                    <img class="w-full h-36 md:h-48 object-cover mb-2 md:mb-4 rounded" src="<?php echo get_the_post_thumbnail_url($post, array(600, 400)); ?>" alt="<?php the_title(); ?>">
                    
                    <!-- Artist Title -->
                    <h3 class="text-lg md:text-xl font-bold mb-2 text-white text-center">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    
                    <!-- Artist Excerpt -->
                    <div class="flex-grow text-white">
                        <?php the_excerpt(); ?>
                    </div>

                    <!-- View Profile Button -->
                    <div class="mt-auto flex justify-center items-center">
                        <a href="<?php the_permalink(); ?>" class="text-white bg-helsinkey-blue text-xs md:text-sm mt-6 px-2 md:px-4 py-2 rounded-xl transition-colors hover:bg-blue-600">
                            Näytä profiili
                        </a>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
