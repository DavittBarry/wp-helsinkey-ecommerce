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
$hero_headline = get_field('hero_headline');
$hero_subheadline = get_field('hero_subheadline');
if ($hero_image) :
?>
    <div class="relative bg-cover bg-center h-[30vh] md:h-[50vh] lg:h-[30vh]" style="background-image: url('<?php echo esc_url($hero_image['url']); ?>')">
        <div class="absolute inset-0 bg-black opacity-75"></div>
        <div class="relative z-10 text-center text-white flex flex-col justify-center mx-auto h-full w-5/6 md:w-1/2 lg:w-5/6">
            <h1 class="text-3xl md:text-4xl lg:text-3xl xl:text-4xl font-bold text-c0ced5">
                <?php echo esc_html($hero_headline); ?>
            </h1>
            <p class="text-xl md:text-2xl lg:text-xl xl:text-2xl text-c0ced5">
                <?php echo esc_html($hero_subheadline); ?>
            </p>
        </div>
    </div>
<?php endif; ?>

<!-- Featured Products -->
<div class="featured-products py-6 md:py-12">
    <div class="container mx-auto">
        <h2 class="text-2xl md:text-3xl lg:text-2xl xl:text-3xl font-semibold mb-4 md:mb-6 text-center">Suositut tuotteet</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
            <?php 
            $featured_products = get_field('featured_products');
            if ($featured_products): ?>
                <?php foreach ($featured_products as $post): ?>
                    <?php setup_postdata($post); ?>
                    <div class="product-item bg-gray-900 p-2 md:p-4 rounded shadow-lg">
                        <img class="w-full h-36 md:h-48 object-cover mb-2 md:mb-4 rounded" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                        <h3 class="text-lg md:text-xl lg:text-lg xl:text-xl font-bold mb-1 md:mb-2"><?php the_title(); ?></h3>
                        <p class="text-sm md:text-base mb-1 md:mb-2"><?php echo wp_trim_words(get_the_content(), 10, '...'); ?></p>
                        <div class="flex justify-center items-center"> <!-- Centered Flex Container -->
                            <p class="bg-gray-800 text-white text-xs md:text-sm px-2 md:px-2 py-2 rounded-xl"><?php echo get_woocommerce_currency_symbol() . get_post_meta(get_the_ID(), '_price', true); ?></p>
                            <a href="<?php the_permalink(); ?>" class="text-white bg-helsinkey-blue text-xs md:text-sm ml-6 px-2 md:px-4 py-2 rounded-xl transition-colors hover:bg-blue-600">Näytä tuote</a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata();?>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- About Us -->
<div class="about-us py-6 md:py-12">
    <div class="container mx-auto">
        <?php the_field('about_us'); ?>
    </div>
</div>

<?php get_footer(); ?>

