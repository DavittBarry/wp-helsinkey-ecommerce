<!-- Blog or News Section -->
<div class="blog-section py-6 md:py-12">
    <div class="container mx-auto">
        <h2 class=
            "text-2xl
            md:text-3xl
            font-semibold
            mb-4
            md:mb-6
            text-center"
        >Uusimmat blogikirjoitukset</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
            <?php 
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
            );
            $blog_query = new WP_Query($args);

            if ($blog_query->have_posts()) : 
                while ($blog_query->have_posts()): 
                    $blog_query->the_post(); ?>
                    <div class="blog-item">
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>">Lue lisää</a>
                    </div>
                <?php endwhile; 
                wp_reset_postdata();
            endif; ?>
        </div>
    </div>
</div>