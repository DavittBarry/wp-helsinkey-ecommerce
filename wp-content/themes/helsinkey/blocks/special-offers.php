<!-- Special Offers -->
<div class="special-offers-section py-6 md:py-12">
    <div class="container mx-auto">
        <h2 class=
        "text-2xl
        md:text-3xl
        font-semibold
        mb-4
        md:mb-6
        text-center">Erikoistarjoukset</h2>
        <?php 
        $args = array(
            'post_type' => 'special_offers',
            'posts_per_page' => 3,
        );
        $special_offers_query = new WP_Query($args);

        if ($special_offers_query->have_posts()) : 
            while ($special_offers_query->have_posts()): 
                $special_offers_query->the_post(); ?>
                <div class="special-offer-item">
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>">Lue lisää</a>
                </div>
            <?php endwhile; 
            wp_reset_postdata();
        endif; ?>
    </div>
</div>