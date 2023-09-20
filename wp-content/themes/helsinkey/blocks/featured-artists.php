<!-- Featured Artists -->
<div class="featured-artists-section py-6 md:py-12">
    <div class="container mx-auto">
        <h2 class=
        "text-2xl
        md:text-3xl
        font-semibold
        mb-4
        md:mb-6
        text-center">Esittelyssä olevat artistit</h2>
        <?php 
        $args = array(
            'post_type' => 'artists',
            'posts_per_page' => 3,
        );
        $artists_query = new WP_Query($args);

        if ($artists_query->have_posts()) : 
            while ($artists_query->have_posts()): 
                $artists_query->the_post(); ?>
                <div class="artist-item">
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>">Lue lisää</a>
                </div>
            <?php endwhile; 
            wp_reset_postdata();
        endif; ?>
    </div>
</div>