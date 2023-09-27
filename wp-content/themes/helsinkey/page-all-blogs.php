<?php
/*
Template Name: All Blogs Page
*/
$current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_header('english');
    } else {
        get_header();
    }
?>

<!-- All Blogs Page -->
<div class="blog-section py-6 md:py-12">
    <div class="container mx-auto">
        <h2 class="text-2xl md:text-3xl font-semibold mb-4 md:mb-6 text-center">Kaikki blogikirjoitukset</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
            <?php 
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
            );
            $all_blogs_query = new WP_Query($args);

            if ($all_blogs_query->have_posts()) : 
                while ($all_blogs_query->have_posts()): 
                    $all_blogs_query->the_post(); ?>
                    <div class="blog-item bg-gray-900 p-2 md:p-4 rounded shadow-lg flex flex-col">
                        <!-- Blog Thumbnail -->
                        <img class="w-full h-36 md:h-48 object-cover mb-2 md:mb-4 rounded" src="<?php echo get_the_post_thumbnail_url($post, array(600, 400)); ?>" alt="<?php the_title(); ?>">
                        
                        <!-- Blog Title -->
                        <a href="<?php the_permalink(); ?>">
                            <h3 class="text-lg md:text-xl font-bold mb-1 md:mb-2 text-white text-center"><?php the_title(); ?></h3>
                        </a>
                        
                        <!-- Blog Excerpt -->
                        <div class="flex-grow">
                            <p class="text-sm md:text-base text-white">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </p>
                        </div>
                        
                        <!-- Read More Button -->
                        <div class="mt-auto mx-auto flex justify-center items-center">
                            <a href="<?php the_permalink(); ?>" class="text-white bg-helsinkey-blue text-xs md:text-sm mt-6 px-2 md:px-4 py-2 rounded-xl transition-colors hover:bg-blue-600">Lue lisää</a>
                        </div>
                    </div>
                <?php endwhile; 
                wp_reset_postdata();
            endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
