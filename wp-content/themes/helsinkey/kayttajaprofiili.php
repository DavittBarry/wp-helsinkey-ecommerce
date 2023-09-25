<?php
/**
 * Template Name: Käyttäjäprofiili
 */
get_header();

$current_user = wp_get_current_user();

if (0 == $current_user->ID) {
    auth_redirect();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_post_id'])) {
        wp_delete_post($_POST['delete_post_id']);
        header("Refresh:0");
    }
    elseif (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'])) {
        update_user_meta($current_user->ID, 'first_name', sanitize_text_field($_POST['first_name']));
        update_user_meta($current_user->ID, 'last_name', sanitize_text_field($_POST['last_name']));
        update_user_meta($current_user->ID, 'user_email', sanitize_email($_POST['email']));
    }
}
?>

<div class="container mx-auto mt-12 p-4 bg-gray-900 text-white rounded-lg shadow-lg w-3/4">
    <h2 class="text-2xl font-semibold mb-4 text-center">Käyttäjäprofiili</h2>

    <div class="flex justify-center">
        <div class="w-1/4">
            <div class="mb-8 text-left">
                <h3 class="text-xl font-semibold mb-3">Nykyiset tiedot:</h3>
                <p class="m-2 mb-5">
                    <strong class="block mb-1">Etunimi:</strong> <?php echo !empty($current_user->first_name) ? esc_html($current_user->first_name) : 'Ei asetettu'; ?>
                </p>
                <p class="m-2 mb-5">
                    <strong class="block mb-1">Sukunimi:</strong> <?php echo !empty($current_user->last_name) ? esc_html($current_user->last_name) : 'Ei asetettu'; ?>
                </p>
                <p class="m-2">
                    <strong class="block mb-1">Sähköposti:</strong> <?php echo !empty($current_user->user_email) ? esc_html($current_user->user_email) : 'Ei asetettu'; ?>
                </p>
            </div>

            <form action="" method="post" class="space-y-4 text-left">
                <input type="hidden" name="toiminta" value="päivitä-käyttäjä">
                
                <div>
                    <label for="first_name" class="block text-lg font-medium">Etunimi</label>
                    <input type="text" id="first_name" name="first_name" value="<?php echo esc_attr($current_user->first_name); ?>" class="mt-1 p-2 w-full bg-gray-700 text-white border border-gray-600 rounded-md">
                </div>

                <div>
                    <label for="last_name" class="block text-lg font-medium">Sukunimi</label>
                    <input type="text" id="last_name" name="last_name" value="<?php echo esc_attr($current_user->last_name); ?>" class="mt-1 p-2 w-full bg-gray-700 text-white border border-gray-600 rounded-md">
                </div>

                <div>
                    <label for="email" class="block text-lg font-medium">Sähköposti</label>
                    <input type="email" id="email" name="email" value="<?php echo esc_attr($current_user->user_email); ?>" class="mt-1 p-2 w-full bg-gray-700 text-white border border-gray-600 rounded-md">
                </div>

                <div class="text-center">
                    <input type="submit" value="Päivitä tiedot" style="cursor: pointer;" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                </div>
            </form>
        </div>
    </div>


    <div class="user-posts mt-8">
        <h3 class="text-xl font-semibold mb-2 text-center">Omat julkaisut:</h3>
        <?php
        $post_types = ['tori', 'etsi soittajaa', 'post', 'artists', 'events'];
        foreach ($post_types as $type) {
            if (!current_user_can('administrator') && !in_array($type, ['tori', 'etsi soittajaa'])) {
                continue;
            }
            echo '<h4 class="text-lg font-bold mb-2 text-center">' . ucfirst($type) . '</h4>';
            $args = array(
                'author' => $current_user->ID,
                'post_type' => $type
            );
            $user_posts = new WP_Query($args);
            if ($user_posts->have_posts()): 
                while ($user_posts->have_posts()): $user_posts->the_post();
                ?>
                    <div class="post mb-6 w-1/2 p-4 rounded-lg mx-auto bg-gray-800 text-center">
                        <h4 class="text-xl font-bold mb-2"><?php the_title(); ?></h4>
                        <div class="post-content mb-2">
                            <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                        </div>
                        <p class="mb-2">Lähetetty: <?php echo get_the_date(); ?></p>
                        <div>
                            <a href="<?php the_permalink(); ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">Muokkaa</a>
                            <form action="" method="post" class="inline-block">
                                <input type="hidden" name="delete_post_id" value="<?php the_ID(); ?>">
                                <input type="submit" value="Poista" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block" style="cursor: pointer;" onclick="return confirm('Haluatko varmasti poistaa tämän julkaisun?')">
                            </form>
                        </div>
                    </div>
                <?php 
                endwhile; 
            else:
                echo '<p class="post mb-6 w-1/2 p-4 rounded-lg mx-auto bg-gray-800 text-center">Ei julkaisuja</p>';
            endif; 
            wp_reset_query();
        }
        ?>
    </div>
</div>

<?php get_footer(); ?>
