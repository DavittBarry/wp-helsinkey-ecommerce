<?php
/**
 * Template Name: Kirjautuminen
 */
if (is_user_logged_in()) {
    wp_redirect(home_url()); 
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $creds = array();
    $creds['user_login'] = $_POST['kayttajatunnus'];
    $creds['user_password'] = $_POST['salasana'];
    $user = wp_signon($creds, false);

    if (is_wp_error($user)) {
        $error = $user->get_error_message();
    } else {
        wp_redirect(home_url());
        exit;
    }
}

get_header(); 
?>

<div class="container mx-auto mt-3">
    <h2 class="text-2xl font-semibold mb-4">Kirjautuminen</h2>
    <?php if (isset($error)) : ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
    <form action="" method="post">
        <label for="kayttajatunnus">Käyttäjätunnus</label>
        <input type="text" id="kayttajatunnus" name="kayttajatunnus">
        
        <label for="salasana">Salasana</label>
        <input type="password" id="salasana" name="salasana">
        
        <input type="submit" value="Kirjaudu">
    </form>
</div>

<?php get_footer(); ?>
