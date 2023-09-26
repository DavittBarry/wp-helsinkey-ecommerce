<?php get_header(); ?>

<div class="container mx-auto px-4 py-6 md:py-20 flex flex-col items-center">
    <div class="bg-gray-900 p-4 rounded-lg shadow-lg flex flex-col w-full max-w-3xl">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="bg-gray-900 p-4 rounded-lg flex flex-col items-center">

                <?php if (has_post_thumbnail()) : ?>
                    <div class="relative w-full  mb-2 md:mb-4 rounded" id="image-zoom-container">
                        <img id="zoomable-image" class="w-full object-cover rounded" src="<?php the_post_thumbnail_url('large'); ?>" data-full-img="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                        <a href="<?php the_post_thumbnail_url('full'); ?>" class="absolute inset-0" target="_blank"></a>
                    </div>
                <?php endif; ?>

                <?php
                    $current_user = wp_get_current_user();
                    if (is_user_logged_in() && $current_user->ID === get_the_author_meta('ID')) {
                ?>
                    <div class="mt-6 mb-6 text-center">
                        <a href="<?php echo add_query_arg(['page_id' => 238, 'post_id' => get_the_ID()], home_url()); ?>"
                            class="text-white bg-green-600 text-md p-4 py-2 rounded-xl transition-colors hover:bg-green-700">
                            Muokkaa
                        </a>
                    </div>
                <?php } ?>

                <h1 class="text-2xl md:text-3xl font-bold mb-2 text-white text-center">
                    <?php the_title(); ?>
                </h1>

                <div class="flex-grow text-white prose lg:prose-lg text-center">
                    <?php the_content(); ?>
                </div>

                <div class="mt-4 text-white text-center">
                    <ul>
                        <li class="mt-2">
                            <strong>Nimi:</strong>
                            <p class="ml-2 mt-1"><?php the_field('nimi'); ?></p>
                        </li>
                        <li class="mt-2">
                            <strong>Sähköposti:</strong>
                            <p class="ml-2 mt-1">
                                <a href="mailto:<?php the_field('sahkoposti'); ?>" class="text-white mt-2">
                                    <?php the_field('sahkoposti'); ?>
                                </a>
                            </p>
                        </li>
                        <li class="mt-2">
                            <strong>Puhelinnumero:</strong>
                            <p class="ml-2">
                                <a href="tel:<?php the_field('puhelinnumero'); ?>" class="text-white">
                                    <?php the_field('puhelinnumero'); ?>
                                </a>
                            </p>
                        </li>
                    </ul>
                </div>
            </article>

            <div class="mt-6 text-center">
                <a href="<?php echo get_permalink(12); ?>" class="text-white bg-helsinkey-blue text-md p-4 py-2 rounded-xl transition-colors hover:bg-blue-600">Takaisin kaikkiin ilmoituksiin</a>
            </div>

        <?php endwhile; endif; ?>
    </div>
</div>


<style>
    #image-zoom-container {
        overflow: hidden;
    }

    #zoomable-image {
        transition: transform 0.1s ease-out;
    }
</style>

<?php get_footer(); ?>
