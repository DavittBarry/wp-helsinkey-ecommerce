<!DOCTYPE html>
<html lang="fi">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <script src=
        "https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js"
        defer>
    </script>
</head>
<body <?php body_class(); ?> 
    style=
        "margin:0;
        padding:0;
        min-height:100vh;
        display:flex;
        flex-direction:column;"
>

    <footer class="bg-gray-900 text" style="margin-top:auto;">
        <div class=
            "container
            mx-auto
            flex
            flex-col
            justify-between
            items-center
            py-4">
            <!-- Navigation Menu -->
            <nav class="text-center mb-4 w-full text-xl md:text-base">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location'  => 'footer-menu',
                        'container_class' =>
                            'footer-menu-container
                            flex
                            flex-col
                            w-full',
                        'menu_class'      => 
                            'flex
                            flex-col
                            w-full
                            justify-center
                            items-center',
                        'link_before'     =>
                            '<div class=
                                "rounded
                                p-1
                                hover:bg-hover-blue
                                transition
                                ease-in-out
                                duration-200">',
                        'link_after'      => '</div>'
                    )
                );
                ?>
            </nav>
            <!-- Footer Text -->
            <div class="text-center w-full text-base md:text-sm lg:text-base">
                &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
