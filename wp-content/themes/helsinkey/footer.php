<!DOCTYPE html>
<html lang="fi">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> style="margin:0; padding:0; min-height:100vh; display:flex; flex-direction:column;">

    <footer class="bg-gray-900 text" style="margin-top:auto;">
        <div class="container mx-auto flex flex-col justify-between items-center py-4">
            <nav class="text-center mb-4 w-full">
                <?php wp_nav_menu( array(
                    'theme_location' => 'footer-menu',
                    'container_class' => 'footer-menu-container flex flex-col w-full',
                    'menu_class' => 'flex flex-col space-y-4 w-full'
                )); ?>
            </nav>

            <div class="text-center w-full">
                &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
