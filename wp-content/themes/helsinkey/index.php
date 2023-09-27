<?php
    $current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_header('english');
    } else {
        get_header();
    }
?>

<div class="container mx-auto">
    <?php 
    if (have_posts()) : 
        ?>
        <div>
            <?php 
            while (have_posts()) : 
                the_post(); 
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
                <?php 
            endwhile; 
            ?>
        </div>
        <?php 
    else : 
        ?>
        <p>No posts found.</p>
        <?php 
    endif; 
    ?>
</div>

<?php
    $current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_footer('english');
    } else {
        get_footer();
    }
?>
