<?php
// phpcs:ignoreFile PEAR.Commenting.FileComment.MissingVersion
/**
 * Template Name: Front page English
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
<?php get_template_part('blocks/featured-products-english-block'); ?>
<?php get_template_part('blocks/about-english-block'); ?>
<?php get_template_part('blocks/blog-english-block'); ?>
<?php get_template_part('blocks/upcoming-events-english-block'); ?>
<?php get_template_part('blocks/featured-artists-english-block'); ?>
<?php get_template_part('blocks/social-media-english-block'); ?>
<?php get_template_part('blocks/contact-english-block'); ?>

<?php
    $current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_footer('english');
    } else {
        get_footer();
    }
?>