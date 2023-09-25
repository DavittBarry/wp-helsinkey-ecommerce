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
        echo '<div id="viesti" class="virhe"><p>' . $virheviesti . '</p></div>';
    } else {
        wp_redirect(get_permalink(166));
        exit;
    }
}

get_header();
?>

<div class="kontti">
    <h1>Rekisteröidy</h1>
    <form action="" method="post">
        <div class="lomakeryhma">
            <label for="kayttajanimi">Käyttäjänimi:</label>
            <input type="text" name="kayttajanimi" required>
        </div>
        <div class="lomakeryhma">
            <label for="sahkoposti">Sähköposti:</label>
            <input type="email" name="sahkoposti" required>
        </div>
        <div class="lomakeryhma">
            <label for="salasana">Salasana:</label>
            <input type="password" name="salasana" required>
        </div>
        <div class="lomakeryhma">
            <input type="submit" value="Rekisteröidy">
        </div>
    </form>
</div>

<?php get_footer(); ?>
