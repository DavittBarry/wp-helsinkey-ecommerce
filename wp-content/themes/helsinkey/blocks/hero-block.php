<!-- Hero Section -->
<?php
$hero_image = get_field('hero_image');
$hero_headline = get_field('hero_headline');
$hero_subheadline = get_field('hero_subheadline');
if ($hero_image) :
    ?>
    <div class=
    "relative
    bg-cover
    bg-center
    h-[30vh]
    md:h-[50vh]
    lg:h-[30vh]" 
    style="background-image: url('<?php echo esc_url($hero_image['url']); ?>')">
        <div class="absolute inset-0 bg-black opacity-75"></div>
        <div class=
        "relative
        z-10
        text-center
        text-white
        flex
        flex-col
        justify-center
        mx-auto
        h-full
        w-5/6
        md:w-1/2
        lg:w-5/6">
            <h1 class=
            "text-3xl
            md:text-4xl
            lg:text-3xl
            xl:text-4xl
            font-bold
            text-c0ced5">
                <?php echo esc_html($hero_headline); ?>
            </h1>
            <p class="text-xl  md:text-2xl lg:text-xl xl:text-2xl text-c0ced5">
                <?php echo esc_html($hero_subheadline); ?>
            </p>
        </div>
    </div>
<?php endif; ?>