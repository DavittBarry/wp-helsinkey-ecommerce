<?php
/**
 * Template Name: Edit tori post
 */
get_header();

if (!is_user_logged_in()) {
    wp_redirect(get_permalink(166));
    exit;
}

$post_to_edit = get_post($_GET['post_id']);
$post_to_edit_id = $post_to_edit->ID;
?>

<div class="container mx-auto mb-12 mt-12 p-4 bg-gray-900 text-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold mb-4 text-center">Muokkaa 'Tori' -ilmoitus</h2>
    <form method="post" enctype="multipart/form-data" class="space-y-4 mb-12 text-center">
        <div class="text-center">
            <label for="otsikko" class="block text-lg font-medium">Otsikko</label>
            <input type="text" id="otsikko" name="otsikko" value="<?php echo esc_attr($post_to_edit->post_title); ?>" class="mt-1 p-2 w-1/2 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center">
            <label for="kuvaus" class="block text-lg font-medium">Kuvaus</label>
            <textarea id="kuvaus" name="kuvaus" class="mt-1 p-2 w-1/2 bg-gray-700 text-white border border-gray-600 rounded-md"><?php echo esc_textarea($post_to_edit->post_content); ?></textarea>
        </div>
        <div class="text-center">
            <label for="sijainti" class="block text-lg font-medium">Sijainti</label>
            <input type="text" id="sijainti" name="sijainti" value="<?php echo esc_attr(get_field('sijainti', $post_to_edit_id)); ?>" class="mt-1 p-2 w-1/2 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center">
            <label for="hinta" class="block text-lg font-medium">Hinta (€)</label>
            <input type="text" id="hinta" name="hinta" value="<?php echo esc_attr(get_field('hinta', $post_to_edit_id)); ?>" class="mt-1 p-2 w-1/2 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center">
            <label for="yhteystiedot_nimi" class="block text-lg font-medium">Nimi</label>
            <input type="text" id="yhteystiedot_nimi" name="yhteystiedot_nimi" value="<?php echo esc_attr(get_field('yhteystiedot_nimi', $post_to_edit_id)); ?>" class="mt-1 p-2 w-1/2 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center">
            <label for="yhteystiedot_sahkoposti" class="block text-lg font-medium">Sähköposti</label>
            <input type="email" id="yhteystiedot_sahkoposti" name="yhteystiedot_sahkoposti" value="<?php echo esc_attr(get_field('yhteystiedot_sahkoposti', $post_to_edit_id)); ?>" class="mt-1 p-2 w-1/2 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center">
            <label for="yhteystiedot_puhelinnumero" class="block text-lg font-medium">Puhelinnumero</label>
            <input type="text" id="yhteystiedot_puhelinnumero" name="yhteystiedot_puhelinnumero" value="<?php echo esc_attr(get_field('yhteystiedot_puhelinnumero', $post_to_edit_id)); ?>" class="mt-1 p-2 w-1/2 bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>
        <div class="text-center">
            <input type="submit" value="Muokkaa" class="bg-blue-600 cursor-pointer hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        </div>
    </form>
</div>

<?php get_footer(); ?>
