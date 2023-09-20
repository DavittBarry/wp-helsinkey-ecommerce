<?php get_header(); ?>

<div class="container mx-auto px-4 py-6 md:py-12">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="bg-gray-900 p-4 rounded-lg shadow-lg flex flex-col">
            <!-- Blog Thumbnail -->
            <img class="w-full h-48 md:h-56 object-cover mb-4 rounded-t-lg" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">

            <!-- Blog Title -->
            <h1 class="text-2xl md:text-3xl font-bold mb-2 text-white"><?php the_title(); ?></h1>

            <!-- Blog Metadata -->
            <div class="text-sm text-gray-300 mb-4">
                Kirjoittanut <?php the_author(); ?> <?php echo get_the_date(); ?>
            </div>

            <!-- Blog Content -->
            <div class="flex-grow text-white prose lg:prose-lg">
                <?php the_content(); ?>
            </div>
        </article>

        <!-- Comments Section -->
        <section class="mt-6 bg-gray-900 p-4 rounded-lg">
            <?php if (comments_open() || get_comments_number()) : ?>
                <div class="mb-4">
                    <h2 class="text-xl font-bold text-white">Kommentit</h2>
                </div>
                <div class="space-y-4">
                    <?php 
                        $comments_args = array(
                            'comment_field' => '<div class="mb-4"><label class="block text-gray-300" for="comment">' . _x('Comment', 'noun') . '</label><textarea id="comment" name="comment" class="w-full p-2 rounded bg-gray-700 text-white" aria-required="true"></textarea></div>',
                            'fields' => array(
                                'author' => '<div class="mb-4"><label class="block text-gray-300" for="author">Nimi</label><input id="author" name="author" type="text" class="w-full p-2 rounded bg-gray-700 text-white"></div>',
                                'email' => '<div class="mb-4"><label class="block text-gray-300" for="email">Sähköposti</label><input id="email" name="email" type="text" class="w-full p-2 rounded bg-gray-700 text-white"></div>',
                            ),
                            'class_submit' => 'bg-helsinkey-blue text-white px-4 py-2 rounded hover:bg-blue-600',
                            'label_submit' => 'Lähetä kommentti',
                        );
                        comment_form($comments_args);
                    ?>
                </div>
            <?php else : ?>
                <div class="text-white">
                    Kommentit on suljettu.
                </div>
            <?php endif; ?>
        </section>

        <!-- Back to All Blogs -->
        <div class="mt-6 text-center">
            <a href="<?php echo get_permalink(117); ?>" class="text-white bg-helsinkey-blue text-md p-4 py-2 rounded-xl transition-colors hover:bg-blue-600">Takaisin kaikkiin blogeihin</a>
        </div>

    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
