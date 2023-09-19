<?php
/*
Template Name: Front Page
*/
get_header(); 
?>

<!-- Hero Section -->
<?php
$hero_image = get_field('hero_image');
if ($hero_image):
?>
    <div class="hero-section" style="background-image: url('<?php echo esc_url($hero_image['url']); ?>')">
        <!-- Hero Content Here -->
    </div>
<?php endif; ?>

<!-- Featured Products -->
<div class="featured-products">
    <?php the_field('featured_products'); ?>
</div>

<!-- About Us -->
<div class="about-us">
    <?php the_field('about_us'); ?>
</div>

<!-- And so on for other sections -->

<?php get_footer(); ?>
