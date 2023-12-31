<?php
/**
 * Template Name: Instruments Page
 */
    $current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_header('english');
    } else {
        get_header();
    }
?>

<div class="container mx-auto mt-3 md:mt-3">
    <div class="special-offers-section py-6 md:py-6">
        <h2 class="text-2xl md:text-3xl font-semibold mb-4 md:mb-6 text-center">
            Instruments
        </h2>

        <p class="mb-4 md:mb-6 text-center">
            Find your dream instrument
        </p>

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
                    <img class="w-full h-36 md:h-48 object-cover mb-2 md:mb-4 rounded" src="<?php echo get_the_post_thumbnail_url($post, 'my_custom_size'); ?>" alt="<?php the_title(); ?>">
                    
                    <h3 class="text-lg md:text-xl font-bold mb-2 text-white text-center">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    
                    <div class="flex-grow text-white">
                        <?php the_excerpt(); ?>
                    </div>

                    <div class="mt-auto flex justify-center items-center">
                        <p class="bg-gray-800 text-white text-md md:text-lg px-2 mt-6 md:px-4 py-2 rounded-xl">
                            <?php echo get_woocommerce_currency_symbol() . get_post_meta(get_the_ID(), '_price', true); ?>
                        </p>
                        
                        <a href="<?php the_permalink(); ?>" class="text-white bg-helsinkey-blue text-xs md:text-sm ml-6 mt-6 px-2 md:px-4 py-2 rounded-xl transition-colors hover:bg-blue-600">
                            View Product
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

<?php
    $current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_footer('english');
    } else {
        get_footer();
    }
?>
