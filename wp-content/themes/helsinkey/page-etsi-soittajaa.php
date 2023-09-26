<?php
/**
 * Template Name: Etsi Soittajaa
 */
get_header(); ?>

<div class="container mx-auto mt-3 md:mt-3">
    <div class="etsi-soittajaa-section py-6 md:py-6">
        <h2 class="text-2xl md:text-3xl font-semibold mb-4 md:mb-6 text-center">
            Etsi soittajaa
        </h2>

        <p class="mb-4 md:mb-6 text-center">
            Etsi muusikoita bändiisi tai projektiisi
        </p>

        <div class="text-center mb-8">
            <?php if (is_user_logged_in()) : ?>
                <button id="newEtsiSoittajaaPost" class="bg-helsinkey-blue hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Lisää uusi ilmoitus
                </button>
            <?php else : ?>
                <a href="<?php echo get_permalink(221); ?>" class="bg-helsinkey-blue hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Lisää uusi ilmoitus
                </a>
            <?php endif; ?>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
            <?php
            $args = array(
                'post_type' => 'etsi_soittajaa',
                'posts_per_page' => -1
            );
            $etsi_soittajaa_query = new WP_Query($args);
            if ($etsi_soittajaa_query->have_posts()) :
                while ($etsi_soittajaa_query->have_posts()) :
                    $etsi_soittajaa_query->the_post();
            ?>
                <div class="etsi-soittajaa-item bg-gray-900 p-4 shadow-lg rounded text-white flex flex-col">
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
                        <a href="<?php the_permalink(); ?>" class="text-white bg-helsinkey-blue text-xs md:text-sm mt-6 px-2 md:px-4 py-2 rounded-xl transition-colors hover:bg-blue-600">
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
            const newEtsiSoittajaaPostBtn = document.getElementById('newEtsiSoittajaaPost');
            newEtsiSoittajaaPostBtn.addEventListener('click', function() {
                window.location.href = "<?php echo get_permalink(221); ?>";
            });
        <?php endif; ?>
    });
</script>

<?php get_footer(); ?>
