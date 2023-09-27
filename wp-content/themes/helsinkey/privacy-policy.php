<?php
/* Template Name: Privacy Policy */

$current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_header('english');
    } else {
        get_header();
    }
?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl mt-6 font-semibold mb-4 text-center">Privacy Policy</h1>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Data Controller</h2>
        <p>
            Company Name: <span class="font-semibold">Helsinkey</span><br>
            Email: <a href="mailto:davittbarry333@gmail.com" class="font-semibold">davittbarry333@gmail.com</a>
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Purpose of Personal Data Processing</h2>
        <p>
            Personal data is collected to improve the user experience of the service and to maintain customer relationships.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Contents of the Register</h2>
        <ul>
            <li>Name</li>
            <li>Email Address</li>
            <li>Phone Number</li>
            <li>Address</li>
        </ul>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Data Disclosure</h2>
        <p>
            Data is not disclosed to third parties.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Rights and Opportunities for Influence</h2>
        <p>
            The registered person has the right to inspect, modify, or delete their personal data.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Cookies</h2>
        <p>
            Cookies are used to improve the user experience of the service.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Changes to the Privacy Policy</h2>
        <p>
            The right is reserved to change this privacy policy.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Contact Information</h2>
        <p>
            All requests and questions related to this privacy policy should be sent by email to <a href="mailto:davittbarry333@gmail.com" class="font-semibold">davittbarry333@gmail.com</a>.
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
