<?php get_header(); ?>

<div class="container mx-auto px-4 py-6 md:py-20 flex flex-col items-center">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="bg-gray-900 p-4 rounded-lg shadow-lg flex flex-col w-full max-w-3xl">
            <img class="w-full h-48 md:h-56 object-cover mb-4 rounded-t-lg" src="<?php echo get_the_post_thumbnail_url($post, 'my_custom_size'); ?>" alt="<?php the_title(); ?>">
            <h1 class="text-2xl md:text-3xl font-bold mb-2 text-white text-center"><?php the_title(); ?></h1>
            <div class="text-sm text-gray-300 mb-4 text-center">
                Kirjoittanut <?php the_author(); ?> <?php echo get_the_date(); ?>
            </div>
            <div class="flex-grow text-white prose lg:prose-lg">
                <?php the_content(); ?>
            </div>
        </div>

        <section class="mt-6 bg-gray-900 p-4 rounded-lg shadow-lg w-full max-w-3xl text-center">
            <div class="mb-4">
                <h2 class="text-xl font-bold text-white mb-2">Kommentit</h2>
            </div>
            <?php 
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            ?>
        </section>

        <style>
            .comment-respond a, .comment-list a {
                color: #63b3ed;
                text-decoration: underline;
            }

            .comment-respond a:hover, .comment-list a:hover {
                text-decoration: none;
            }

            .comment-list {
                list-style: none;
                padding-left: 0;
            }

            .comment-author .avatar, .comment-author, .comment-metadata {
                display: inline-block;
                vertical-align: middle;
                margin: 6px;
                margin-right: 10px;
            }

            .comment-author {
                font-weight: bold;
                color: #ffffff;
            }

            .comment-metadata {
                font-size: 12px;
                color: #aaaaaa;
            }

            .comment-reply-link {
                background: #63b3ed;
                color: white;
                padding: 5px 10px;
                border-radius: 3px;
                font-size: 12px;
                transition: background-color 0.3s ease;
            }

            .comment-reply-link:hover {
                background-color: #4a90e2;
            }

            .comment-reply-link:after {
                content: none;
            }

            .comment-form label {
                color: #ffffff;
            }

            .comment-form input, .comment-form textarea {
                width: 100%;
                padding: 8px;
                margin-bottom: 8px;
                border-radius: 10px;
                background: #333;
                color: #fff;
            }

            .comment-form input[type="submit"] {
                background: #63b3ed;
                color: white;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .comment-form input[type="submit"]:hover {
                background-color: #4a90e2;
            }
            input#wp-comment-cookies-consent {
                display: none;
            }
            input#wp-comment-cookies-consent + label {
                position: relative;
                padding-left: 30px;
                cursor: pointer;
                color: #fff;
            }

            input#wp-comment-cookies-consent + label:before {
                content: "";
                position: absolute;
                left: 0;
                top: 0;
                width: 25px;
                height: 25px;
                border: 2px solid #fff;
                border-radius: 3px;
            }
            input#wp-comment-cookies-consent:checked + label:after {
                content: "";
                position: absolute;
                left: 8px;
                top: 4px;
                width: 8px;
                height: 12px;
                border: solid #fff;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }

            h3#reply-title {
                display: none;
            }
            .comment-content {
                display: inline-block;
                max-width: 100%;
                word-wrap: break-word;
                background-color: #2d2d2d;
                padding: 10px;
                border-radius: 5px;
                
                margin-bottom: 12px;
                margin-top: 5px;
                position: relative;
            }

            .comment-notes {
                margin-top: 12px;
            }

            .logged-in-as {
                margin-top: 8px;
            }

            .comment-content::before, .comment-content::after {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                font-size: 24px;
                color: #fff;
            }
            
            .comment-content::before {
                content: "“";
                left: 0px;
            }
            
            .comment-content::after {
                content: "”";
                right: 0px;
            }
        </style>

        <div class="mt-6 text-center">
            <a href="<?php echo get_permalink(151); ?>" class="text-white bg-helsinkey-blue text-md p-4 py-2 rounded-xl transition-colors hover:bg-blue-600">Takaisin kaikkiin tapahtumiin</a>
        </div>

    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
