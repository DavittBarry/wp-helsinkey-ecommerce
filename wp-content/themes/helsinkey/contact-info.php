<?php
/*
Template Name: Contact info
*/
?>

<?php
$current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_header('english');
    } else {
        get_header();
    }
?>

<div class="mt-8">
    <h1 class="text-3xl mt-6 font-semibold mb-4 text-center">Contact info:</h1>

    <?php get_template_part('blocks/social-media-english-block'); ?>
    <?php get_template_part('blocks/contact-english-block'); ?>
</div>

<?php
    $current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_footer('english');
    } else {
        get_footer();
    }
?>
