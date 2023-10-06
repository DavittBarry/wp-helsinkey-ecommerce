<?php
$current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_header('english');
    } else {
        get_header();
    }
?>

<div class="container mx-auto px-4 py-6 md:py-20 flex flex-col items-center">
    <div class="bg-gray-900 p-4 rounded-lg shadow-lg flex flex-col w-full max-w-3xl">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="bg-gray-900 p-4 rounded-lg flex flex-col items-center">

                <h1 class="text-2xl md:text-3xl font-bold mb-2 text-white text-center">
                    <?php the_title(); ?>
                </h1>

                <div class="flex-grow text-white prose lg:prose-lg text-center">
                    <?php the_content(); ?>
                </div>
            </article>

            <div class="mt-6 mb-6 text-center">
                <a href="<?php echo get_permalink(10); ?>" class="text-white bg-helsinkey-blue text-md p-4 py-2 rounded-xl transition-colors hover:bg-blue-600">Takaisin kaikkiin tuotteisiin</a>
            </div>

            <style>
                .cart {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                div.woocommerce-tabs.wc-tabs-wrapper > ul {
                    display: none !important;
                }

                .quantity .qty {
                    color: white !important;
                    background-color: #4A5568 !important;
                    border: 1px solid #2D3748 !important;
                    border-radius: 0.375rem !important;
                    padding: 0.5rem 0.75rem !important;
                    width: 50% !important;
                }

                .single_add_to_cart_button {
                    color: white !important;
                    background-color: #3B82F6 !important;
                    padding: 0.3rem !important;
                    margin-left: 1rem;
                    transition: background-color 0.3s ease-in-out !important;
                }

                .single_add_to_cart_button:hover {
                    background-color: #2563EB !important;
                }

                #product-73 > section > ul > li > a.woocommerce-LoopProduct-link.woocommerce-loop-product__link > h2 {
                    color: white;
                }

                woocommerce-loop-product__title {
                    color: white;
                }

                #product-73 > section > h2 {
                    color: white;
                }
                .product_meta {
                    display: none !important;
                }

                #product-78 > div.woocommerce-tabs.wc-tabs-wrapper > ul {
                    display: none !important;
                }

                @media (max-width: 768px) {
                    .cart {
                        justify-content: center;
                    }
                    .quantity .qty {
                        width: 40% !important;
                    }
                    .single_add_to_cart_button {
                        padding: 0.8rem !important;
                    }
                }
            </style>

        <?php endwhile; endif; ?>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var elements = document.getElementsByClassName("related products");
        for (var i = 0; i < elements.length; i++) {
            var h2Elements = elements[i].getElementsByTagName('h2');
            for (var j = 0; j < h2Elements.length; j++) {
                if (h2Elements[j].innerText === "Related products") {
                    h2Elements[j].innerText = "Liittyvät tuotteet";
                    h2Elements[j].style.color = "white";
                }
            }
        }
        var productTitles = document.getElementsByClassName("woocommerce-loop-product__title");
        for (var i = 0; i < productTitles.length; i++) {
            productTitles[i].style.color = "white";
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        var buttons = document.querySelectorAll('.button.product_type_simple.add_to_cart_button.ajax_add_to_cart');
        buttons.forEach(function(button) {
            if (button.textContent.trim() === "Add to cart") {
                button.textContent = "Lisää ostoskoriin";
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var descriptionTabs = document.querySelectorAll('.woocommerce-Tabs-panel.woocommerce-Tabs-panel--description.panel.entry-content.wc-tab');
        descriptionTabs.forEach(function(tab) {
            var headerElements = tab.querySelectorAll('h1, h2, h3, h4, h5, h6');
            headerElements.forEach(function(header) {
                if (header.textContent.trim() === "Description") {
                    header.textContent = "Kuvaus";
                    header.style.color = "white";
                }
            });
        });
    });

</script>

<?php
    $current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_footer('english');
    } else {
        get_footer();
    }
?>
