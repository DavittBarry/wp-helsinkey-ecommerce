<?php die('taxonomy-product_cat.php loaded'); ?>

<?php
get_header();
?>


<div class="container mx-auto mt-3 md:mt-3">
    <!-- Products Section -->
    <div class="special-offers-section py-6 md:py-12">
        <h2 class="text-2xl md:text-3xl font-semibold mb-4 md:mb-6 text-center">
            <?php single_term_title(); ?>
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
            ?>
                <div class="special-offer-item bg-gray-900 p-4 rounded-lg shadow-lg flex flex-col">
                    <!-- Product Thumbnail -->
                    <img class="w-full h-36 md:h-48 object-cover mb-2 md:mb-4 rounded" src="<?php echo get_the_post_thumbnail_url($post, array(600, 400)); ?>" alt="<?php the_title(); ?>">
                    
                    <!-- Product Title -->
                    <h3 class="text-lg md:text-xl font-bold mb-2 text-white">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    
                    <!-- Product Excerpt -->
                    <div class="flex-grow text-white">
                        <?php the_excerpt(); ?>
                    </div>

                    <!-- Product Price -->
                    <div class="mt-auto flex justify-center items-center">
                        <p class="bg-gray-800 text-white text-md md:text-lg px-2 mt-6 md:px-4 py-2 rounded-xl">
                            <?php echo get_woocommerce_currency_symbol() . get_post_meta(get_the_ID(), '_price', true); ?>
                        </p>
                        
                        <!-- View Product Button -->
                        <a href="<?php the_permalink(); ?>" class="text-white bg-helsinkey-blue text-xs md:text-sm ml-6 mt-6 px-2 md:px-4 py-2 rounded-xl transition-colors hover:bg-blue-600">
                            Näytä tuote
                        </a>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No products found for this category.</p>';
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
