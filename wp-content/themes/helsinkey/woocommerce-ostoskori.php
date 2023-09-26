<?php
/*
Template Name: Ostoskori
*/
?>

<?php get_header(); ?>

<?php
if (isset($_POST['update_cart'])) {
    wp_safe_redirect(get_permalink(201));
    exit;
}
?>

<div class="container mx-auto px-4 py-6 md:py-20 flex flex-col items-center">
    <div class="bg-gray-900 p-4 rounded-lg shadow-lg w-full max-w-3xl text-white">
        <h1 class="text-2xl md:text-3xl font-bold mb-2 text-center">Ostoskori</h1>
        <?php
        if ( WC()->cart->is_empty() ) {
            echo '<p class="mt-6 text-center">Ostoskori on tyhjä.</p>';
        } else {
            ?>
            <form class="woocommerce-cart-form" action="<?php echo get_permalink(201); ?>" method="post">
                <div class="overflow-x-auto">
                    <table class="shop_table min-w-full text-center">
                        <thead>
                            <tr>
                                <th>Poista</th>
                                <th>Kuva</th>
                                <th>Tuote</th>
                                <th>Hinta</th>
                                <th>Määrä</th>
                                <th>Välisumma</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo apply_filters(
                                            'woocommerce_cart_item_remove_link',
                                            sprintf(
                                                '<a href="%s" class="remove custom-remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                __( 'Remove this item', 'woocommerce' ),
                                                esc_attr( $_product->get_id() ),
                                                esc_attr( $_product->get_sku() )
                                            ),
                                            $cart_item_key
                                        );
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $_product->get_image(); ?>
                                    </td>
                                    <td>
                                        <?php echo $_product->get_name(); ?>
                                    </td>
                                    <td>
                                        <?php echo WC()->cart->get_product_price( $_product ); ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ( $_product->is_sold_individually() ) {
                                            $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                        } else {
                                            $product_quantity = woocommerce_quantity_input(
                                                array(
                                                    'input_name'   => "cart[{$cart_item_key}][qty]",
                                                    'input_value'  => $cart_item['quantity'],
                                                    'max_value'    => $_product->get_max_purchase_quantity(),
                                                    'min_value'    => '0',
                                                    'product_name' => $_product->get_name(),
                                                ),
                                                $_product,
                                                false
                                            );
                                        }
                                        echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ); ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-center mt-4">
                    <input type="submit" id="update_cart_button" name="update_cart" class="custom-button" value="Päivitä ostoskori" disabled>
                </div>
                <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
            </form>
            <div class="cart_totals">
                <h2>Yhteensä</h2>
                <p>Subtotal: <?php echo WC()->cart->get_cart_subtotal(); ?></p>
                <p>Total: <?php echo WC()->cart->get_cart_total(); ?></p>
                <a href="<?php echo wc_get_checkout_url(); ?>" class="mt-6 checkout-button custom-button">Siirry kassalle</a>
            </div>
            <?php
        }
        ?>
    </div>
</div>


<style>
    .shop_table th, .shop_table td {
        padding: 10px;
        text-align: center;
        border: none;
    }

    #update_cart_button[disabled] {
        background-color: #808080 !important;
        cursor: not-allowed;
    }

    #update_cart_button.enabled {
        background-color: #4A90E2;
        cursor: pointer;
    }

    .scrollbar-thick::-webkit-scrollbar {
        width: 12px;
    }

    .scrollbar-thumb-gray-500::-webkit-scrollbar-thumb {
        background-color: gray;
    }

    input[type="text"], input[type="number"], input[type="email"] {
        background-color: #707070;
        color: white;
        padding: 10px;
        width: 50px;
        border: 1px solid #606060;
        border-radius: 4px;
    }

    #update_cart_button {
        background-color: #808080;
        cursor: not-allowed;
    }

    #update_cart_button.custom-button {
        background-color: #4A90E2;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        border-radius: 4px;
    }

    #update_cart_button.custom-button:hover {
        background-color: #357ABD;
    }

    .cart_totals {
        border: none;
        padding: 20px;
        text-align: center;
    }

    .remove {
        color: white;
        text-decoration: none;
    }

    .remove:hover {
        color: red;
    }

    a.checkout-button {
        display: inline-block;
        background-color: #4A90E2;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        cursor: pointer;
        border-radius: 4px;
    }

    a.checkout-button:hover {
        background-color: #357ABD;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const qtyInputs = document.querySelectorAll('input[type=number]');
        const updateButton = document.getElementById('update_cart_button');

        updateButton.disabled = true;
        updateButton.classList.remove('enabled');

        qtyInputs.forEach(input => {
            input.addEventListener('change', () => {
                updateButton.disabled = false;
                updateButton.classList.add('enabled');
        });
    });

    const desiredRedirectURL = "<?php echo esc_url(get_permalink(201)); ?>";

    const form = document.querySelector('.woocommerce-cart-form');
    form.addEventListener('submit', (event) => {
        if (window.location.href.includes('woocommerce-ostoskori.php')) {
            event.preventDefault();
            const formData = new FormData(form);
            fetch(form.getAttribute('action'), {
                method: 'POST',
                body: formData,
            })
            .then((response) => {
                if (response.ok) {
                    window.location.href = desiredRedirectURL;
                }
            });
        }
    });
});
</script>

<?php get_footer(); ?>
