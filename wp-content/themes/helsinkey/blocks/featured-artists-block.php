<!-- Esitellyt taiteilijat -->
<div class="featured-artists py-6 md:py-12">
    <div class="container mx-auto">
        <h2 class="text-2xl md:text-3xl font-semibold mb-4 md:mb-6 text-center">Esitellyt taiteilijat</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
            <?php 
            $args = array(
                'post_type' => 'artists',
                'posts_per_page' => -1,
            );
            $artists_query = new WP_Query($args);
            $total_artists = $artists_query->found_posts;
            
            $artist_count = 0;
            if ($artists_query->have_posts()) : 
                while ($artists_query->have_posts()): 
                    $artists_query->the_post(); 
                    $artist_count++;
                    ?>
                    <div class="artist-item bg-gray-900 p-2 md:p-4 rounded shadow-lg <?php echo ($artist_count > 3) ? 'hidden lg:hidden' : ''; ?> <?php echo ($artist_count > 2) ? 'hidden md:hidden lg:block' : ''; ?>">
                        <!-- Taiteilijan esikatselukuva -->
                        <img class="w-full h-36 md:h-48 object-cover mb-2 md:mb-4 rounded" src="<?php echo get_the_post_thumbnail_url($post, 'my_custom_size'); ?>" alt="<?php the_title(); ?>">
                        
                        <!-- Taiteilijan nimi -->
                        <h3 class="text-lg md:text-xl font-bold mb-1 md:mb-2 text-white text-center"><?php the_title(); ?></h3>
                        
                        <!-- Taiteilijan esittely -->
                        <p class="text-sm md:text-base text-white">
                            <?php echo wp_trim_words(get_the_content(), 10, '...'); ?>
                        </p>
                        
                        <!-- Näytä profiili -painike -->
                        <div class="mt-auto flex justify-center items-center">
                            <a href="<?php the_permalink(); ?>" class="text-white bg-helsinkey-blue text-xs md:text-sm ml-6 mt-6 px-2 md:px-4 py-2 rounded-xl transition-colors hover:bg-blue-600">Näytä profiili</a>
                        </div>
                    </div>
                <?php endwhile; 
                wp_reset_postdata();
            endif; ?>
        </div>
        <!-- "Näytä kaikki taiteilijat" -painike -->
        <?php if ($total_artists > 2): ?>
            <div class="mt-12 text-center lg:hidden xl:hidden 2xl:hidden">
                <a href="<?php echo get_permalink(8); ?>" class="text-white bg-helsinkey-blue text-md md:text-md p-4 md:p-4 py-2 rounded-xl transition-colors hover:bg-blue-600">Näytä kaikki taiteilijat</a>
            </div>
        <?php endif; ?>
        <?php if ($total_artists > 3): ?>
            <div class="mt-12 text-center hidden lg:block xl:block 2xl:block">
                <a href="<?php echo get_permalink(8); ?>" class="text-white bg-helsinkey-blue text-md md:text-md p-4 md:p-4 py-2 rounded-xl transition-colors hover:bg-blue-600">Näytä kaikki taiteilijat</a>
            </div>
        <?php endif; ?>
    </div>
</div>
