<?php get_header(); ?>

<div class="container mx-auto px-4 py-6 md:py-20 flex flex-col items-center">
    <div class="bg-gray-900 p-4 rounded-lg shadow-lg flex flex-col w-full max-w-3xl">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="bg-gray-900 p-4 rounded-lg flex flex-col items-center">

                <?php if (has_post_thumbnail()) : ?>
                    <div class="relative w-full  mb-2 md:mb-4 rounded" id="image-zoom-container">
                        <img id="zoomable-image" class="w-full  object-cover rounded" src="<?php the_post_thumbnail_url('large'); ?>" data-full-img="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                        <a href="<?php the_post_thumbnail_url('full'); ?>" class="absolute inset-0" target="_blank"></a>
                    </div>
                <?php endif; ?>

                <h1 class="text-2xl md:text-3xl font-bold mb-2 text-white text-center">
                    <?php the_title(); ?>
                </h1>

                <div class="flex-grow text-white prose lg:prose-lg text-center">
                    <?php the_content(); ?>
                </div>

                <div class="mt-4 text-white text-center">
                    <div class="mt-2">
                        <p class="font-bold">Sijainti:</p>
                        <p class="mt-1"><?php the_field('sijainti'); ?></p>
                    </div>
                    <div class="mt-2">
                        <p class="font-bold">Hinta:</p>
                        <p class="mt-1">€<?php the_field('hinta'); ?></p>
                    </div>
                    <div class="mb-8 mt-6">
                        <p class="font-bold">Yhteystiedot:</p>
                        <ul class="mt-3">
                            <li class="mt-2">
                                <strong>Nimi:</strong>
                                <p class="ml-2 mt-1"><?php the_field('yhteystiedot_nimi'); ?></p>
                            </li>
                            <li class="mt-2">
                                <strong>Sähköposti:</strong>
                                <p class="ml-2 mt-2">
                                    <a href="mailto:<?php the_field('yhteystiedot_sahkoposti'); ?>" class="text-white mt-2">
                                        <?php the_field('yhteystiedot_sahkoposti'); ?>
                                    </a>
                                </p>
                            </li>
                            <li class="mt-2">
                                <strong>Puhelinnumero:</strong>
                                <p class="ml-2">
                                    <a href="tel:<?php the_field('yhteystiedot_puhelinnumero'); ?>" class="text-white">
                                        <?php the_field('yhteystiedot_puhelinnumero'); ?>
                                    </a>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </article>

            <div class="mt-6 text-center">
                <a href="<?php echo get_permalink(11); ?>" class="text-white bg-helsinkey-blue text-md p-4 py-2 rounded-xl transition-colors hover:bg-blue-600">Takaisin kaikkiin ilmoituksiin</a>
            </div>

        <?php endwhile; endif; ?>
    </div>
</div>

<script>
    // Simple Image Zoom
    const imageContainer = document.getElementById('image-zoom-container');
    const zoomableImage = document.getElementById('zoomable-image');

    let fullImage = new Image();
    fullImage.src = zoomableImage.getAttribute('data-full-img');

    imageContainer.addEventListener('mousemove', function(e) {
        const x = e.clientX - e.target.offsetLeft;
        const y = e.clientY - e.target.offsetTop;

        zoomableImage.src = fullImage.src;
        zoomableImage.style.transformOrigin = `${x}px ${y}px`;
        zoomableImage.style.transform = 'scale(1.5)';
    });

    imageContainer.addEventListener('mouseleave', function() {
        zoomableImage.src = zoomableImage.getAttribute('data-full-img');
        zoomableImage.style.transformOrigin = 'center center';
        zoomableImage.style.transform = 'scale(1)';
    });
</script>

<style>
    #image-zoom-container {
        overflow: hidden;
    }

    #zoomable-image {
        transition: transform 0.1s ease-out;
    }
</style>

<?php get_footer(); ?>
