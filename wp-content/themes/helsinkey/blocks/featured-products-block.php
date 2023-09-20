<!-- Featured Products -->
<div class="featured-products py-6 md:py-12">
    <div class="container mx-auto">
        <h2 class=
        "text-2xl
        md:text-3xl
        lg:text-2xl
        xl:text-3xl
        font-semibold
        mb-4
        md:mb-6
        text-center"
        >Suositut tuotteet</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
            <?php 
            $featured_products = get_field('featured_products');
            if ($featured_products) : ?>
                <?php foreach ($featured_products as $post): ?>
                    <?php setup_postdata($post); ?>
                    <div class=
                    "product-item
                    bg-gray-900
                    p-2
                    md:p-4
                    rounded
                    shadow-lg"
                    >
                        <img class=
                        "w-full
                        h-36
                        md:h-48
                        object-cover
                        mb-2
                        md:mb-4
                        rounded" src="
                        <?php echo
                        get_the_post_thumbnail_url($post, 'my_custom_size');
                        ?>
                        " alt="
                        <?php the_title(); ?>
                        ">
                        <h3 class=
                        "text-lg
                        md:text-xl
                        lg:text-lg
                        xl:text-xl
                        font-bold
                        mb-1
                        md:mb-2"><?php the_title(); ?></h3>
                        <p class=
                        "text-sm
                        md:text-base
                        mb-1
                        md:mb-2"><?php 
                        echo wp_trim_words(get_the_content(), 10, '...'); ?>
                        </p>
                        <div class="flex justify-center items-center">
                            <p class=
                            "bg-gray-800
                            text-white
                            text-md
                            md:text-lg
                            px-3
                            md:px-3
                            py-3
                            rounded-xl"><?php echo
                            get_woocommerce_currency_symbol() 
                            . get_post_meta(get_the_ID(), '_price', true); 
                            ?></p>
                            <a href="<?php the_permalink(); ?>" class=
                            "text-white
                            bg-helsinkey-blue
                            text-xs
                            md:text-sm
                            ml-6
                            px-2
                            md:px-4
                            py-2
                            rounded-xl
                            transition-colors hover:bg-blue-600">Näytä tuote</a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata();?>
            <?php endif; ?>
        </div>
    </div>
</div>