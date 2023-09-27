<?php
/*
Template Name: Checkout English
*/
?>

<?php
$current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_header('english');
    } else {
        get_header();
    }
?>

<div class="container mx-auto px-4 py-6 md:py-20 flex flex-col items-center">
    <div class="bg-gray-900 p-4 rounded-lg shadow-lg w-full max-w-3xl text-white">
        <h1 class="text-2xl md:text-3xl font-bold mb-2 text-center">Checkout</h1>
        
        <?php
        if ( WC()->cart->is_empty() ) {
            wp_safe_redirect( wc_get_page_permalink( 'cart' ) );
            exit;
        } else {
            echo do_shortcode('[woocommerce_checkout]');
        }
        ?>
    </div>
</div>

<style>
    input[type="text"], input[type="number"], input[type="email"] {
        background-color: #707070;
        color: white;
        padding: 10px;
        width: 50px;
        border: 1px solid #606060;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #4A90E2;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
    }

    input[type="submit"]:hover {
        background-color: #357ABD;
    }

    .woocommerce-checkout .payment_methods {
        background-color: #707070;
        border: 1px solid #606060;
        border-radius: 4px;
    }

    .woocommerce-message {
        background-color: #707070;
        color: white;
        border: 1px solid #606060;
        border-radius: 4px;
    }

    textarea, input[type="tel"] {
        background-color: #707070;
        color: white;
        padding: 10px;
        border: 1px solid #606060;
        border-radius: 4px;
    }

    button[name="woocommerce_checkout_place_order"] {
        color: black;
    }

    button[name="woocommerce_checkout_place_order"].hide-button {
        display: none !important;
    }

    body > div.container.mx-auto.px-4.py-6.md\:py-20.flex.flex-col.items-center > div > div > div.woocommerce-form-coupon-toggle > div {
        display: none !important;
    }

    #payment > div {
        display: none !important;
    }


    @media screen and (max-width: 768px) {
        input[type="text"], input[type="number"], input[type="email"] {
            width: auto;
        }
    }
</style>

<?php
    $current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_footer('english');
    } else {
        get_footer();
    }
?>
