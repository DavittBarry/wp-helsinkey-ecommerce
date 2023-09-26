<?php get_header(); ?>

<div class="container mx-auto px-4 py-6 md:py-20 flex flex-col items-center">
    <div class="bg-gray-900 p-4 rounded-lg shadow-lg flex flex-col w-full max-w-3xl">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="bg-gray-900 p-4 rounded-lg flex flex-col items-center">

                <h1 class="text-2xl md:text-3xl font-bold mb-2 text-white text-center">
                    <?php the_title(); ?>
                </h1>

                <div class="flex-grow text-white prose lg:prose-lg text-center">
                    <?php the_content(); ?>
                </div>
            </article>

            <div class="mt-6 mb-6 text-center">
                <a href="<?php echo get_permalink(10); ?>" class="text-white bg-helsinkey-blue text-md p-4 py-2 rounded-xl transition-colors hover:bg-blue-600">Takaisin kaikkiin tuotteisiin</a>
            </div>

            <style>
                .cart {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                div.woocommerce-tabs.wc-tabs-wrapper > ul {
                    display: none !important;
                }

                .quantity .qty {
                    color: white !important;
                    background-color: #4A5568 !important;
                    border: 1px solid #2D3748 !important;
                    border-radius: 0.375rem !important;
                    padding: 0.5rem 0.75rem !important;
                    width: 50% !important;
                }

                .single_add_to_cart_button {
                    color: white !important;
                    background-color: #3B82F6 !important;
                    padding: 0.3rem !important;
                    margin-left: 1rem;
                    transition: background-color 0.3s ease-in-out !important;
                }

                .single_add_to_cart_button:hover {
                    background-color: #2563EB !important;
                }

                .product_meta {
                    display: none !important;
                }

                body > div.container.mx-auto.px-4.py-6.md\:py-20.flex.flex-col.items-center > div > article > div > div > div > div.woocommerce-notices-wrapper > div {
                    display: none !important;
                }

                #product-78 > div.woocommerce-tabs.wc-tabs-wrapper > ul {
                    display: none !important;
                }

                @media (max-width: 768px) {
                    .cart {
                        justify-content: center;
                    }
                    .quantity .qty {
                        width: 40% !important;
                    }
                    .single_add_to_cart_button {
                        padding: 0.8rem !important;
                    }
                }
            </style>

        <?php endwhile; endif; ?>
    </div>
</div>

<?php get_footer(); ?>
