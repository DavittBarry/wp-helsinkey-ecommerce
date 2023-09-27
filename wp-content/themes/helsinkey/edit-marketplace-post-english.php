<?php
/**
 * Template Name: Edit marketplace english post
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

$post_id_to_edit = $_GET['post_id'];
$post_to_edit = get_post($post_id_to_edit);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_title = sanitize_text_field($_POST['otsikko']);
    $post_content = sanitize_textarea_field($_POST['kuvaus']);
    $sijainti = sanitize_text_field($_POST['sijainti']);
    $hinta = sanitize_text_field($_POST['hinta']);
    $nimi = sanitize_text_field($_POST['yhteystiedot_nimi']);
    $sahkoposti = sanitize_email($_POST['yhteystiedot_sahkoposti']);
    $puhelinnumero = sanitize_text_field($_POST['yhteystiedot_puhelinnumero']);

    $update_post_args = array(
        'ID' => $post_id_to_edit,
        'post_title' => $post_title,
        'post_content' => $post_content,
    );
    wp_update_post($update_post_args);

    update_field('sijainti', $sijainti, $post_id_to_edit);
    update_field('hinta', $hinta, $post_id_to_edit);
    update_field('yhteystiedot_nimi', $nimi, $post_id_to_edit);
    update_field('yhteystiedot_sahkoposti', $sahkoposti, $post_id_to_edit);
    update_field('yhteystiedot_puhelinnumero', $puhelinnumero, $post_id_to_edit);

    if (!empty($_FILES['kuva']['name'])) {
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/media.php');

        $file = $_FILES['kuva'];
        $upload_overrides = array('test_form' => false);
        $uploaded_file = wp_handle_upload($file, $upload_overrides);

        if (isset($uploaded_file['file'])) {
            $file_name_and_location = $uploaded_file['file'];
            $file_title_for_media_library = $_FILES['kuva']['name'];

            $attachment = array(
                'post_mime_type' => $uploaded_file['type'],
                'post_title' => addslashes($file_title_for_media_library),
                'post_content' => '',
                'post_status' => 'inherit'
            );

            $attach_id = wp_insert_attachment($attachment, $file_name_and_location);
            set_post_thumbnail($post_id_to_edit, $attach_id);
        }
    }

    echo "<script>alert('Post edited.'); window.location = '" . get_permalink($post_id_to_edit) . "'; </script>";
    exit;
}
?>

<div class="container mx-auto mb-12 mt-12 p-4 bg-gray-900 text-white rounded-lg shadow-lg">
    <h2 class="text-2xl md:text-3xl font-semibold mb-4 text-center">Edit Marketplace post</h2>
    
    <form method="post" enctype="multipart/form-data" class="space-y-4 mb-12 text-center">
        <div class="text-center md:w-3/4 mx-auto">
            <label for="otsikko" class="block text-lg md:text-xl font-medium">Title</label>
            <input type="text" id="otsikko" name="otsikko" value="<?php echo esc_attr($post_to_edit->post_title); ?>" class="mt-1 p-2 w-full md:w-3/4 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center md:w-3/4 mx-auto">
            <label for="kuvaus" class="block text-lg md:text-xl font-medium">Description</label>
            <textarea id="kuvaus" name="kuvaus" class="mt-1 h-[300px] p-2 w-full md:w-3/4 bg-gray-700 text-white border border-gray-600 rounded-md"><?php echo esc_textarea(wp_strip_all_tags($post_to_edit->post_content)); ?></textarea>
        </div>
        <div class="text-center">
            <label for="current_image" class="block text-lg font-medium">Current picture</label>
            <?php if (has_post_thumbnail($post_to_edit->ID)): ?>
                <a href="<?php echo get_the_post_thumbnail_url($post_to_edit->ID, 'full'); ?>" target="_blank" class="inline-block">
                    <img src="<?php echo get_the_post_thumbnail_url($post_to_edit->ID, 'thumbnail'); ?>" alt="Nykyinen Kuva" class="mx-auto">
                </a>
            <?php else: ?>
                <p>No current picture.</p>
            <?php endif; ?>
        </div>
        <div class="text-center md:w-3/4 mx-auto">
            <label for="kuva" class="block text-lg md:text-xl font-medium">Update current picture</label>
            <input type="file" id="kuva" name="kuva" class="mt-1 w-full md:w-3/4 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center md:w-3/4 mx-auto">
            <label for="sijainti" class="block text-lg md:text-xl font-medium">Location</label>
            <input type="text" id="sijainti" name="sijainti" value="<?php echo esc_attr(get_field('sijainti', $post_to_edit->ID)); ?>" class="mt-1 p-2 w-full md:w-3/4 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center md:w-3/4 mx-auto">
            <label for="hinta" class="block text-lg md:text-xl font-medium">Price (€)</label>
            <input type="text" id="hinta" name="hinta" value="<?php echo esc_attr(get_field('hinta', $post_to_edit->ID)); ?>" class="mt-1 p-2 w-full md:w-3/4 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center md:w-3/4 mx-auto">
            <label for="yhteystiedot_nimi" class="block text-lg md:text-xl font-medium">Name</label>
            <input type="text" id="yhteystiedot_nimi" name="yhteystiedot_nimi" value="<?php echo esc_attr(get_field('yhteystiedot_nimi', $post_to_edit->ID)); ?>" class="mt-1 p-2 w-full md:w-3/4 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center md:w-3/4 mx-auto">
            <label for="yhteystiedot_sahkoposti" class="block text-lg md:text-xl font-medium">E-mail</label>
            <input type="email" id="yhteystiedot_sahkoposti" name="yhteystiedot_sahkoposti" value="<?php echo esc_attr(get_field('yhteystiedot_sahkoposti', $post_to_edit->ID)); ?>" class="mt-1 p-2 w-full md:w-3/4 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center md:w-3/4 mx-auto">
            <label for="yhteystiedot_puhelinnumero" class="block text-lg md:text-xl font-medium">Phone number</label>
            <input type="text" id="yhteystiedot_puhelinnumero" name="yhteystiedot_puhelinnumero" value="<?php echo esc_attr(get_field('yhteystiedot_puhelinnumero', $post_to_edit->ID)); ?>" class="mt-1 p-2 w-full md:w-3/4 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center md:w-3/4 mx-auto">
            <input type="submit" value="Edit" class="bg-blue-600 cursor-pointer hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        </div>
    </form>
</div>

<?php
    $current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_footer('english');
    } else {
        get_footer();
    }
?>
