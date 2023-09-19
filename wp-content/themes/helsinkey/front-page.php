<?php
// phpcs:ignoreFile PEAR.Commenting.FileComment.MissingVersion
/**
 * Template Name: Front Page
 * 
 * @category WordPress
 * @package  Helsinkey
 * @author   Davitt Barry <davittbarry333@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://davittportfolio.com
 * @requires PHP 8.1
 */

get_header(); 
?>

<!-- Hero Section -->
<?php
$hero_image = get_field('hero_image');
if ($hero_image) :
    ?>
    <div class="hero-section" 
        style="background-image: url('<?php echo esc_url($hero_image['url']); ?>')"
    >
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

<?php get_footer(); ?>
