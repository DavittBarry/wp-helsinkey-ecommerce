<?php
/**
 * Template Name: Log in
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
        $current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
        if ($current_language === 'en') {
            wp_redirect(home_url('?page_id=267&lang=en'));
        } else {
            wp_redirect(home_url());
        }
        exit;
    }
}


$current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_header('english');
    } else {
        get_header();
    }
?>

<div class="container mx-auto mt-12 p-4 mb-6 bg-gray-900 text-white rounded-lg shadow-lg flex flex-col items-center">
    <h2 class="text-2xl font-semibold mb-4 text-center">Log in</h2>

    <?php if (isset($error) && !empty($error)) : ?>
        <div class="bg-red-600 p-2 rounded-lg mb-4 w-1/2 text-center">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <form action="" method="post" class="space-y-4 w-1/2">
        <div>
            <label for="kayttajatunnus" class="block text-lg font-medium">Username</label>
            <input type="text" id="kayttajatunnus" name="kayttajatunnus" class="mt-1 p-2 w-full bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>

        <div>
            <label for="salasana" class="block text-lg font-medium">Password</label>
            <input type="password" id="salasana" name="salasana" class="mt-1 p-2 w-full bg-gray-700 text-white border border-gray-600 rounded-md">
        </div>

        <div class="text-center">
            <input type="submit" value="Log in" class="bg-blue-600 cursor-pointer  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
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
