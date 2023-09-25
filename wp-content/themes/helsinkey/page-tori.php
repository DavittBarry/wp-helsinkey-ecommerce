<?php
/**
 * Template Name: Tori
 */
get_header(); ?>

<div class="container mx-auto mt-3 md:mt-3">
    <div class="tori-section py-6 md:py-6">
        <h2 class="text-2xl md:text-3xl font-semibold mb-4 md:mb-6 text-center">
            Tori
        </h2>

        <div class="text-center mb-8">
            <?php if (is_user_logged_in()) : ?>
                <button id="newToriPost" class="bg-helsinkey-blue hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Lisää uusi ilmoitus
                </button>
            <?php else : ?>
                <a href="<?php echo get_permalink(166); ?>" class="bg-helsinkey-blue hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Lisää uusi ilmoitus
                </a>
            <?php endif; ?>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
            <?php
            $args = array(
                'post_type' => 'tori',
                'posts_per_page' => -1
            );
            $tori_query = new WP_Query($args);
            if ($tori_query->have_posts()) :
                while ($tori_query->have_posts()) :
                    $tori_query->the_post();
                    $hinta = get_field('hinta');
            ?>
                <div class="tori-item bg-gray-900 p-4 shadow-lg rounded text-white flex flex-col">
                    <img class="w-full h-36 md:h-48 object-cover mb-2 md:mb-4 rounded" src="<?php echo get_the_post_thumbnail_url($post, array(600, 400)); ?>" alt="<?php the_title(); ?>">
                    <h3 class="text-lg md:text-xl font-bold mb-2 text-center">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <div class="flex-grow text-white">
                        <?php 
                        $description = get_the_content();
                        $max_length = 100;
                        if (strlen($description) > $max_length) {
                            $short_description = substr($description, 0, $max_length) . '...';
                            echo $short_description;
                        } else {
                            echo $description;
                        }
                        ?>
                    </div>
                    <div class="mt-auto flex justify-center items-center">
                        <p class="bg-gray-800 text-white text-md md:text-lg px-2 mt-6 md:px-4 py-2 rounded-xl">
                            <span style="vertical-align: middle;">€</span> <?php echo $hinta; ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="text-white bg-helsinkey-blue text-xs md:text-sm ml-6 mt-6 px-2 md:px-4 py-2 rounded-xl transition-colors hover:bg-blue-600">
                            Näytä ilmoitus
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        <?php if (is_user_logged_in()) : ?>
            const newToriPostBtn = document.getElementById('newToriPost');
            newToriPostBtn.addEventListener('click', function() {
                window.location.href = "<?php echo get_permalink(192); ?>";
            });
        <?php endif; ?>
    });
</script>

<?php get_footer(); ?>
