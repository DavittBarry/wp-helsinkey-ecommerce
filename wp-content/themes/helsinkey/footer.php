<footer class="site-footer">
    <div class="container mx-auto flex justify-between items-center">
        <nav class="footer-navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
        </nav>

        <div class="social-media">
        </div>

        <div class="copyright">
            &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
