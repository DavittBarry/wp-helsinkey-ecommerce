<!-- About this site -->
<style>
    @media (max-width: 640px) {
        .about-container {
            max-width: 90% !important;
        }
        .about-text {
            max-width: 90% !important;
        }
    }
</style>

<div class="about-site py-6 md:py-12">
    <div class="container mx-auto about-container" style="max-width: 800px; margin-left: auto; margin-right: auto;">
        <h2 class="text-2xl md:text-3xl font-semibold mb-4 m-6 md:mb-6 text-center">
            Tietoja tästä sivustosta
        </h2>
        <div class="text-lg md:text-xl lg:text-lg xl:text-xl about-text" style="max-width: 700px; margin-left: auto; margin-right: auto;">
            <?php the_field('about_this_site'); ?>
        </div>
    </div>
</div>
