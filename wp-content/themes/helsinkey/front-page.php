<?php
// phpcs:ignoreFile PEAR.Commenting.FileComment.MissingVersion
/**
 * Template Name: Front page
 * 
 * @category WordPress
 * @package  Helsinkey
 * @author   Davitt Barry <davittbarry333@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://davittportfolio.com
 * @requires PHP 8.1
 */

$current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_header('english');
    } else {
        get_header();
    }
?>

<?php get_template_part('blocks/hero-block'); ?>
<?php get_template_part('blocks/featured-products-block'); ?>
<?php get_template_part('blocks/about-block'); ?>
<?php get_template_part('blocks/blog-block'); ?>
<?php get_template_part('blocks/upcoming-events-block'); ?>
<?php get_template_part('blocks/featured-artists-block'); ?>
<?php get_template_part('blocks/social-media-block'); ?>
<?php get_template_part('blocks/contact-block'); ?>

<?php
    $current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_footer('english');
    } else {
        get_footer();
    }
?>