<footer class=" bg-gray-900 text-white">
    <div class="container mx-auto flex justify-between items-center py-4">
        <nav>
            <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container_class' => 'footer-menu-container' ) ); ?>
        </nav>

        <div class="text-sm">
            &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
