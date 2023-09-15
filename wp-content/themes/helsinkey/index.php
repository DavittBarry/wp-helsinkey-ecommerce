<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Helsinkey Theme</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    
    <div class="container mx-auto">
        <h1 class="text-4xl text-center text-blue-500">Welcome to the Helsinkey Theme</h1>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Click Me
        </button>
    </div>
    
    <?php wp_footer(); ?>
</body>
</html>
