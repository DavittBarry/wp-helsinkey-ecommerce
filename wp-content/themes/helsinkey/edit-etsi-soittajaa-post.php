<?php
get_header();

if (!is_user_logged_in()) {
    wp_redirect(get_permalink(166));
    exit;
}

$post_id_to_edit = $_GET['post_id'];
$post_to_edit = get_post($post_id_to_edit);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_title = sanitize_text_field($_POST['otsikko']);
    $post_content = sanitize_textarea_field($_POST['kuvaus']);
    $nimi = sanitize_text_field($_POST['nimi']);
    $sahkoposti = sanitize_email($_POST['sahkoposti']);
    $puhelinnumero = sanitize_text_field($_POST['puhelinnumero']);

    $update_post_args = array(
        'ID' => $post_id_to_edit,
        'post_title' => $post_title,
        'post_content' => $post_content,
    );
    wp_update_post($update_post_args);

    update_field('nimi', $nimi, $post_id_to_edit);
    update_field('sahkoposti', $sahkoposti, $post_id_to_edit);
    update_field('puhelinnumero', $puhelinnumero, $post_id_to_edit);

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

    echo "<script>alert('Ilmoitus muokattu.'); window.location = '" . get_permalink($post_id_to_edit) . "'; </script>";
    exit;
}
?>

<div class="container mx-auto mb-12 mt-12 p-4 bg-gray-900 text-white rounded-lg shadow-lg">
    <h2 class="text-2xl md:text-3xl font-semibold mb-4 text-center">Muokkaa 'Etsi soittajaa' -ilmoitus</h2>
    <form method="post" enctype="multipart/form-data" class="space-y-4 mb-12 text-center">
        <div class="text-center md:w-3/4 mx-auto">
            <label for="otsikko" class="block text-lg md:text-xl font-medium">Otsikko</label>
            <input type="text" id="otsikko" name="otsikko" value="<?php echo esc_attr($post_to_edit->post_title); ?>" class="mt-1 p-2 w-full md:w-3/4 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center md:w-3/4 mx-auto">
            <label for="kuvaus" class="block text-lg md:text-xl font-medium">Kuvaus</label>
            <textarea id="kuvaus" name="kuvaus" class="mt-1 h-[300px] p-2 w-full md:w-3/4 bg-gray-700 text-white border border-gray-600 rounded-md"><?php echo esc_textarea(wp_strip_all_tags($post_to_edit->post_content)); ?></textarea>
        </div>
        <div class="text-center">
            <label for="current_image" class="block text-lg font-medium">Nykyinen Kuva</label>
            <?php if (has_post_thumbnail($post_to_edit->ID)): ?>
                <a href="<?php echo get_the_post_thumbnail_url($post_to_edit->ID, 'full'); ?>" target="_blank" class="inline-block">
                    <img src="<?php echo get_the_post_thumbnail_url($post_to_edit->ID, 'thumbnail'); ?>" alt="Nykyinen Kuva" class="mx-auto">
                </a>
            <?php else: ?>
                <p>Ei nykyistä kuvaa.</p>
            <?php endif; ?>
        </div>
        <div class="text-center md:w-3/4 mx-auto">
            <label for="kuva" class="block text-lg md:text-xl font-medium">Päivitä nykyinen kuva</label>
            <input type="file" id="kuva" name="kuva" class="mt-1 w-full md:w-3/4 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center md:w-3/4 mx-auto">
            <label for="nimi" class="block text-lg md:text-xl font-medium">Nimi</label>
            <input type="text" id="nimi" name="nimi" value="<?php echo esc_attr(get_field('nimi', $post_to_edit->ID)); ?>" class="mt-1 p-2 w-full md:w-3/4 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center md:w-3/4 mx-auto">
            <label for="sahkoposti" class="block text-lg md:text-xl font-medium">Sähköposti</label>
            <input type="email" id="sahkoposti" name="sahkoposti" value="<?php echo esc_attr(get_field('sahkoposti', $post_to_edit->ID)); ?>" class="mt-1 p-2 w-full md:w-3/4 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center md:w-3/4 mx-auto">
            <label for="puhelinnumero" class="block text-lg md:text-xl font-medium">Puhelinnumero</label>
            <input type="text" id="puhelinnumero" name="puhelinnumero" value="<?php echo esc_attr(get_field('puhelinnumero', $post_to_edit->ID)); ?>" class="mt-1 p-2 w-full md:w-3/4 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center md:w-3/4 mx-auto">
            <input type="submit" value="Muokkaa" class="bg-blue-600 cursor-pointer hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        </div>
    </form>
</div>

<?php get_footer(); ?>
