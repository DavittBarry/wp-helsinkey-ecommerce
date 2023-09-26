<!DOCTYPE html>
<html lang="fi">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>
<body <?php body_class(); ?> style="margin:0; padding:0; min-height:100vh; display:flex; flex-direction:column;">
    <footer class="bg-gray-900 text" style="margin-top:auto;">
        <div class="container mx-auto flex flex-col justify-between items-center py-4">
            <nav class="text-center mb-4 w-full text-xl md:text-base">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location'  => 'footer-menu',
                        'container_class' => 'footer-menu-container flex flex-col w-full',
                        'menu_class'      => 'flex flex-col w-full justify-center items-center',
                        'link_before'     => '<div class="rounded p-1 hover:bg-hover-blue transition ease-in-out duration-200">',
                        'link_after'      => '</div>'
                    )
                );
                ?>
            </nav>
            <div class="text-center w-full text-base md:text-sm lg:text-base mb-4">
                <h3 class="font-bold mb-2">Sivukartta</h3>
                <a href="/?page_id=8" class="rounded p-1 hover:bg-hover-blue transition ease-in-out duration-200">Musakauppa</a> |
                <a href="/?page_id=10" class="rounded p-1 hover:bg-hover-blue transition ease-in-out duration-200">Soittimet</a> |
                <a href="/?page_id=11" class="rounded p-1 hover:bg-hover-blue transition ease-in-out duration-200">Tori</a> |
                <a href="/?page_id=12" class="rounded p-1 hover:bg-hover-blue transition ease-in-out duration-200">Etsi soittajaa</a> |
                <a href="http://localhost:8001/?page_id=160" class="rounded p-1 hover:bg-hover-blue transition ease-in-out duration-200">Käyttäjäprofiili</a> |
                <a href="http://localhost:8001/?page_id=201" class="rounded p-1 hover:bg-hover-blue transition ease-in-out duration-200">Ostoskori</a>
            </div>
            <div class="text-center w-full text-base md:text-sm lg:text-base">
                &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
            </div>
        </div>
    </footer>

    <div id="scrollToTopBtn" class="fixed bottom-10 right-10 z-50 bg-blue-500 hover:bg-blue-600 text-white w-16 h-16 flex justify-center items-center rounded-full cursor-pointer opacity-0 invisible transition-opacity duration-300 hover:duration-200 text-3xl">
        <span class="relative bottom-[0.1rem]">&#8593;</span>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const scrollToTopBtn = document.getElementById("scrollToTopBtn");
            
            const showHideBtn = () => {
                const halfwayPoint = (document.body.scrollHeight - window.innerHeight) / 2;

                if (window.scrollY >= halfwayPoint) {
                    scrollToTopBtn.classList.remove("opacity-0", "invisible");
                    scrollToTopBtn.classList.add("opacity-100");
                } else {
                    scrollToTopBtn.classList.remove("opacity-100");
                    scrollToTopBtn.classList.add("opacity-0", "invisible");
                }
            };

            const scrollToTop = () => {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth",
                });
            };

            window.addEventListener("scroll", showHideBtn);
            scrollToTopBtn.addEventListener("click", scrollToTop);
        });
    </script>

    <?php wp_footer(); ?>
</body>
</html>
