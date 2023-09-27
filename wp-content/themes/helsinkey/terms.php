<?php
/* Template Name: Terms of Use */

$current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_header('english');
    } else {
        get_header();
    }
?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl mt-6 font-semibold mb-4 text-center">Terms of Use</h1>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Scope of the Agreement</h2>
        <p>
            These terms of use apply to the service provided by <span class="font-semibold">Helsinkey</span>.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Description of the Service</h2>
        <p>
            The service provides the opportunity to purchase music, instruments, and services.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">User Account</h2>
        <p>
            Creating a user account requires an email address, phone number, and personal information.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Limitation of Liability</h2>
        <p>
            The service provider is not responsible for any damages that may result from the use of the service.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Changes to the Terms of Use</h2>
        <p>
            The right is reserved to change these terms of use.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Contact Information</h2>
        <p>
            All requests and questions related to these terms of use should be sent by email to <a href="mailto:davittbarry333@gmail.com" class="font-semibold">davittbarry333@gmail.com</a>.
        </p>
    </section>
</div>

<?php
    $current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_footer('english');
    } else {
        get_footer();
    }
?>
