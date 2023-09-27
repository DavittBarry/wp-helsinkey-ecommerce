<?php
/**
 * Template Name: New find a musician post english
 */
$current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
if ($current_language === 'en') {
    get_header('english');
} else {
    get_header();
}

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
        'post_type'     => 'etsi_soittajaa'
    );

    $post_id = wp_insert_post($new_post);

    if ($post_id && !is_wp_error($post_id)) {
        // Setting the post language to English using Polylang
        if (function_exists('pll_set_post_language')) {
            pll_set_post_language($post_id, 'en');
        }

        if (!empty($_FILES['kuva']['name'])) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            require_once(ABSPATH . 'wp-admin/includes/image.php');

            $file = $_FILES['kuva'];
            $upload_overrides = ['test_form' => false];
            $movefile = wp_handle_upload($file, $upload_overrides);

            if ($movefile && !isset($movefile['error'])) {
                $filetype = wp_check_filetype(basename($movefile['file']), null);
                $wp_upload_dir = wp_upload_dir();

                $attachment = array(
                    'guid'           => $wp_upload_dir['url'] . '/' . basename($movefile['file']),
                    'post_mime_type' => $filetype['type'],
                    'post_title'     => preg_replace('/\.[^.]+$/', '', basename($movefile['file'])),
                    'post_content'   => '',
                    'post_status'    => 'inherit'
                );

                $attach_id = wp_insert_attachment($attachment, $movefile['file'], $post_id);
                $attach_data = wp_generate_attachment_metadata($attach_id, $movefile['file']);
                wp_update_attachment_metadata($attach_id, $attach_data);

                set_post_thumbnail($post_id, $attach_id);
            }
        }

        // Update ACF fields
        update_field('nimi', sanitize_text_field($_POST['nimi']), $post_id);
        update_field('sahkoposti', sanitize_email($_POST['sahkoposti']), $post_id);
        update_field('puhelinnumero', sanitize_text_field($_POST['puhelinnumero']), $post_id);

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
        alert('Post sent successfully!');
    }
</script>

<div class="container mx-auto mb-12 mt-12 p-4 bg-gray-900 text-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold mb-4 text-center">New 'Find a musician' post</h2>
    <form method="post" enctype="multipart/form-data" class="space-y-4 mb-12 text-center">
        <div class="text-center">
            <label for="otsikko" class="block text-lg font-medium">Title</label>
            <input type="text" id="otsikko" name="otsikko" class="mt-1 p-2 w-1/2 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center">
            <label for="kuvaus" class="block text-lg font-medium">Description</label>
            <textarea id="kuvaus" name="kuvaus" class="mt-1 h-[300px] p-2 w-1/2 bg-gray-700 text-white border border-gray-600 rounded-md"></textarea>
        </div>
        <div class="text-center">
            <label for="kuva" class="block text-lg font-medium">Picture</label>
            <input type="file" id="kuva" name="kuva" class="mt-1 w-1/2 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center">
            <label for="nimi" class="block text-lg font-medium">Name</label>
            <input type="text" id="nimi" name="nimi" class="mt-1 p-2 w-1/2 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center">
            <label for="sahkoposti" class="block text-lg font-medium">E-mail</label>
            <input type="email" id="sahkoposti" name="sahkoposti" class="mt-1 p-2 w-1/2 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center">
            <label for="puhelinnumero" class="block text-lg font-medium">Phonenumber</label>
            <input type="text" id="puhelinnumero" name="puhelinnumero" class="mt-1 p-2 w-1/2 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center">
            <input type="submit" value="Send" class="bg-blue-600 cursor-pointer hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
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

<?php
    $current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_footer('english');
    } else {
        get_footer();
    }
?>
