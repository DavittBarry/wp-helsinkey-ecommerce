<?php
/**
 * Template Name: Käyttäjäprofiili
 */
?>

<style>
    .user-posts .post {
        border: 1px solid #333;
        padding: 16px;
        margin-bottom: 16px;
    }

    .user-posts .post h4 {
        margin-bottom: 8px;
    }

    .user-posts .post-content {
        font-size: 16px;
        line-height: 1.5;
    }
</style>
<?php

get_header();

$current_user = wp_get_current_user();

if (0 == $current_user->ID) {
    auth_redirect();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'])) {
        update_user_meta($current_user->ID, 'first_name', sanitize_text_field($_POST['first_name']));
        update_user_meta($current_user->ID, 'last_name', sanitize_text_field($_POST['last_name']));
        update_user_meta($current_user->ID, 'user_email', sanitize_email($_POST['email']));
    }
}

?>

<div class="container mx-auto mt-12 p-4 bg-gray-900 text-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold mb-4">Käyttäjäprofiili</h2>

    <!-- Display current user details -->
    <div class="mb-8">
        <h3 class="text-xl font-semibold mb-2">Nykyiset tiedot:</h3>
        <p>Etunimi: <?php echo esc_html($current_user->first_name); ?></p>
        <p>Sukunimi: <?php echo esc_html($current_user->last_name); ?></p>
        <p>Sähköposti: <?php echo esc_html($current_user->user_email); ?></p>
    </div>

    <form action="" method="post" class="space-y-4">
        <input type="hidden" name="action" value="update-user">

        <div>
            <label for="first_name" class="block text-lg font-medium">Etunimi</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo esc_attr($current_user->first_name); ?>" class="mt-1 p-2 w-2/3 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>

        <div>
            <label for="last_name" class="block text-lg font-medium">Sukunimi</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo esc_attr($current_user->last_name); ?>" class="mt-1 p-2 w-2/3 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>

        <div>
            <label for="email" class="block text-lg font-medium">Sähköposti</label>
            <input type="email" id="email" name="email" value="<?php echo esc_attr($current_user->user_email); ?>" class="mt-1 p-2 w-2/3 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>

        <div>
            <input type="submit" value="Päivitä tiedot" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        </div>
    </form>

    <!-- Display user posts -->
    <div class="user-posts mt-8">
        <h3 class="text-xl font-semibold mb-2">Your Posts:</h3>
        <?php
        $args = array(
            'author' => $current_user->ID,
            'post_type' => 'post',
        );
        $user_posts = new WP_Query($args);
        if ($user_posts->have_posts()): while ($user_posts->have_posts()): $user_posts->the_post();
        ?>
            <div class="post mb-4 p-2 rounded-lg bg-gray-800">
                <h4 class="text-lg font-medium"><?php the_title(); ?></h4>
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; endif; ?>
    </div>
</div>

<?php get_footer(); ?>
