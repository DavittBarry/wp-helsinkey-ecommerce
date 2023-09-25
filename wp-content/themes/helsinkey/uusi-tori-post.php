<?php
/**
 * Template Name: Uusi tori post
 */
get_header();

if (!is_user_logged_in()) {
    wp_redirect(get_permalink(166));
    exit;
}

$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_post = array(
        'post_title'    => sanitize_text_field($_POST['otsikko']),
        'post_content'  => sanitize_text_field($_POST['kuvaus']),
        'post_status'   => 'publish',
        'post_type'     => 'tori'
    );

    $post_id = wp_insert_post($new_post);

    if ($post_id && !is_wp_error($post_id)) {
        if (!empty($_FILES['kuva']['name'])) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            $file = $_FILES['kuva'];
            $movefile = wp_handle_upload($file, ['test_form' => false]);

            if ($movefile && !isset($movefile['error'])) {
                set_post_thumbnail($post_id, $movefile['url']);
            }
        }

        // Update ACF fields
        update_field('sijainti', sanitize_text_field($_POST['sijainti']), $post_id);
        update_field('hinta', sanitize_text_field($_POST['hinta']), $post_id);

        update_field('yhteystiedot_nimi', sanitize_text_field($_POST['yhteystiedot_nimi']), $post_id);
        update_field('yhteystiedot_sahkoposti', sanitize_email($_POST['yhteystiedot_sahkoposti']), $post_id);
        update_field('yhteystiedot_puhelinnumero', sanitize_text_field($_POST['yhteystiedot_puhelinnumero']), $post_id);

        $success = true;
        $new_post_url = get_permalink($post_id);
    }
    else {
        $error_message = 'Jotain meni pieleen. Yritä uudelleen.';
    }
}
?>

<script>
    function showSuccessPopup() {
        alert('Ilmoitus onnistuneesti lähetetty!');
    }
</script>

<div class="container mx-auto mb-12 mt-12 p-4 bg-gray-900 text-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold mb-4 text-center">Uusi tori post</h2>
    <form method="post" enctype="multipart/form-data" class="space-y-4 mb-12 text-center">
        <div class="text-center">
            <label for="otsikko" class="block text-lg font-medium">Otsikko</label>
            <input type="text" id="otsikko" name="otsikko" class="mt-1 p-2 w-1/2 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center">
            <label for="kuvaus" class="block text-lg font-medium">Kuvaus</label>
            <textarea id="kuvaus" name="kuvaus" class="mt-1 p-2 w-1/2 bg-gray-700 text-white border border-gray-600 rounded-md"></textarea>
        </div>
        <div class="text-center">
            <label for="kuva" class="block text-lg font-medium">Kuva</label>
            <input type="file" id="kuva" name="kuva" class="mt-1 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center">
            <label for="sijainti" class="block text-lg font-medium">Sijainti</label>
            <input type="text" id="sijainti" name="sijainti" class="mt-1 p-2 w-1/2 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center">
            <label for="yhteystiedot_nimi" class="block text-lg font-medium">Nimi</label>
            <input type="text" id="yhteystiedot_nimi" name="yhteystiedot_nimi" class="mt-1 p-2 w-1/2 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center">
            <label for="yhteystiedot_sahkoposti" class="block text-lg font-medium">Sähköposti</label>
            <input type="email" id="yhteystiedot_sahkoposti" name="yhteystiedot_sahkoposti" class="mt-1 p-2 w-1/2 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center">
            <label for="yhteystiedot_puhelinnumero" class="block text-lg font-medium">Puhelinnumero</label>
            <input type="text" id="yhteystiedot_puhelinnumero" name="yhteystiedot_puhelinnumero" class="mt-1 p-2 w-1/2 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center">
            <label for="hinta" class="block text-lg font-medium">Hinta (€)</label>
            <input type="text" id="hinta" name="hinta" class="mt-1 p-2 w-1/2 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center">
            <input type="submit" value="Lähetä" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        </div>
    </form>
</div>

<?php
if ($success) {
    echo '<script type="text/javascript">
            showSuccessPopup();
            window.location.href = "' . $new_post_url . '";
        </script>';
}
?>

<?php get_footer(); ?>
