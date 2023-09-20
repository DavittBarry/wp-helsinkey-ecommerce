<?php get_header(); ?>

<div class="container mx-auto py-6 md:py-12">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="bg-gray-900 p-2 md:p-4 rounded shadow-lg flex flex-col">
            <!-- Blog Thumbnail -->
            <img class="w-full h-48 object-cover mb-2 md:mb-4 rounded" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">

            <!-- Blog Title -->
            <h1 class="text-2xl md:text-3xl font-bold mb-1 md:mb-2 text-white"><?php the_title(); ?></h1>

            <!-- Blog Content -->
            <div class="flex-grow text-white">
                <?php the_content(); ?>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="mt-6">
            <?php 
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
            ?>
        </div>

    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
