<?php
/**
 * Template Name: Rekisteröidy
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kayttajanimi = sanitize_text_field($_POST['kayttajanimi']);
    $sahkoposti = sanitize_email($_POST['sahkoposti']);
    $salasana = sanitize_text_field($_POST['salasana']);

    $kayttaja_id = wp_create_user($kayttajanimi, $salasana, $sahkoposti);

    if (is_wp_error($kayttaja_id)) {
        $virheviesti = $kayttaja_id->get_error_message();
    } else {
        wp_redirect(get_permalink(166));
        exit;
    }
}

get_header();
?>

<div class="container mx-auto mt-12 p-4 bg-gray-900 text-white rounded-lg shadow-lg flex flex-col items-center">
    <h2 class="text-2xl font-semibold mb-4 text-center">Rekisteröidy</h2>

    <?php if (isset($virheviesti) && !empty($virheviesti)) : ?>
        <div class="bg-red-600 p-2 rounded-lg mb-4 w-1/2 text-center">
            <?php echo $virheviesti; ?>
        </div>
    <?php endif; ?>

    <form action="" method="post" class="space-y-4 w-1/2">
        <div>
            <label for="kayttajanimi" class="block text-lg font-medium">Käyttäjänimi</label>
            <input type="text" id="kayttajanimi" name="kayttajanimi" required class="mt-1 p-2 w-full bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>

        <div>
            <label for="sahkoposti" class="block text-lg font-medium">Sähköposti</label>
            <input type="email" id="sahkoposti" name="sahkoposti" required class="mt-1 p-2 w-full bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>

        <div>
            <label for="salasana" class="block text-lg font-medium">Salasana</label>
            <input type="password" id="salasana" name="salasana" required class="mt-1 p-2 w-full bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>

        <div class="text-center">
            <input type="submit" value="Rekisteröidy" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        </div>
    </form>
</div>

<?php get_footer(); ?>
