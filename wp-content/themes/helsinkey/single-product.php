<?php get_header(); ?>

<div class="container mx-auto px-4 py-6 md:py-20 flex flex-col items-center">
    <div class="bg-gray-900 p-4 rounded-lg shadow-lg flex flex-col w-full max-w-3xl">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="bg-gray-900 p-4 rounded-lg shadow-lg flex flex-col items-center">

                <!-- Product Title -->
                <h1 class="text-2xl md:text-3xl font-bold mb-2 text-white text-center">
                    <?php the_title(); ?>
                </h1>

                <!-- Product Content -->
                <div class="flex-grow text-white prose lg:prose-lg text-center">
                    <?php the_content(); ?>
                </div>
            </article>

            <!-- Back to All Products -->
            <div class="mt-6 text-center">
                <a href="<?php echo get_permalink(10); ?>" class="text-white bg-helsinkey-blue text-md p-4 py-2 rounded-xl transition-colors hover:bg-blue-600">Takaisin kaikkiin tuotteisiin</a>
            </div>

            <!-- Style for Quantity Input, Tags, and Categories -->
            <style>
                /* Quantity Input */
                .quantity .qty {
                    color: black !important;
                    background-color: white !important;
                    height: 36px;
                }
                
                /* For the Description header */
                .woocommerce-Tabs-panel--description h2 {
                    color: white !important;
                }

                .related.products h2 {
                    color: white !important;
                }
                
                .product_meta {
                    
                    display: none !important;
                }

                /* Tags and Categories */
                .tagcloud a, .product_meta .posted_in a, .product_meta .tagged_as a {
                    color: white !important;
                    background-color: #4A5568 !important;
                    border-radius: 12px;
                    padding: 5px;
                    transition: ease-in-out 0.2s;
                    display: none !important;
                }
                .tagcloud a:hover, .product_meta .posted_in a:hover, .product_meta .tagged_as a:hover {
                    background-color: #4299E1 !important;
                    display: none !important;
                }
            </style>

        <?php endwhile; endif; ?>
    </div>
</div>

<?php get_footer(); ?>
