<?php
/**
 * Template Name: Soittimet Page
 */
get_header(); ?>

<div class="container mx-auto mt-3 md:mt-3">
    <!-- Products Section -->
    <div class="special-offers-section py-6 md:py-6">
        <h2 class="text-2xl md:text-3xl font-semibold mb-4 md:mb-6 text-center">
            Soittimet
        </h2>

        <?php /* <!-- Instrument Categories Section -->
        <div class="instrument-categories text-center mb-8">
            <div class="flex flex-no-wrap justify-center items-center overflow-x-auto"> */ ?>
                <!-- <?php
                /*$terms = get_terms([
                    'taxonomy' => 'product_cat',
                    'hide_empty' => true,
                ]);

                foreach ($terms as $term) { */ ?>
                    <a href="<?php //echo get_term_link($term->term_id); ?>" class="category-item bg-gray-900 rounded-lg p-4 m-2 text-white hover:bg-helsinkey-blue transition-colors duration-300">
                        <?php //echo $term->name; ?>
                    </a>
                <?php
                /* } */ ?>
            </div>
        </div> -->
        <?php /* */ ?>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1
            );
            $product_query = new WP_Query($args);
            if ($product_query->have_posts()) :
                while ($product_query->have_posts()) :
                    $product_query->the_post();
            ?>
                <div class="special-offer-item bg-gray-900 p-4 rounded-lg shadow-lg flex flex-col">
                    <!-- Product Thumbnail -->
                    <img class="w-full h-36 md:h-48 object-cover mb-2 md:mb-4 rounded" src="<?php echo get_the_post_thumbnail_url($post, array(600, 400)); ?>" alt="<?php the_title(); ?>">
                    
                    <!-- Product Title -->
                    <h3 class="text-lg md:text-xl font-bold mb-2 text-white text-center">
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
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>