<?php
    $hero_image = get_field('hero_image');

    $subhero_heading_text   = get_field('subhero_heading_text');
    $subhero_content        = get_field('subhero_content');

    $primary_image      = get_field('primary_showcase_image');
    $secondary_images   = get_field('secondary_images');
    $post_content       = get_field('post_content');

    if ($hero_image) {
        $banner = $hero_image;
    } else {
        $banner = get_bloginfo('stylesheet_directory') . '/assets/img/banner.jpg';
    }

    if ($subhero_heading_text) {
        $subhero_heading = $subhero_heading_text;
    } else {
        $subhero_heading = get_the_title();
    }

    get_header();
?>

<header class="header-small">
    <?php get_template_part('template-parts/content', 'nav') ?>
    <div class="header-inner" style="background-image: url(<?php echo $banner ?>)">
        <div class="header-text">
            <h1 class="display-3 main-heading"><?php the_title(); ?></h1>
        </div>
    </div>
</header>

<section class="body-section light-bg" id="heading">
    <h2><?php echo $subhero_heading ?></h2>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="text-main"><?php echo $subhero_content ?></p>
            </div>
        </div>
    </div>
</section>

<section class="body-section project-showcase">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main-image">
                    <img class="img-fluid" src="<?php echo $primary_image ?>" alt="">
                </div>
            </div>
        </div>
        <div class="row row-pad-top">
            <?php
                if ( have_rows('secondary_images') ) :
                    while ( have_rows('secondary_images') ) : the_row();
                        echo '
                            <div class="col-md-3">
                                <img class="img-fluid secondary-image" src="' . get_sub_field("secondary_image") . '" alt="">
                            </div>
                        ';
                    endwhile;
                endif;
            ?>
        </div>
        <div class="row row-pad-top-2">
            <div class="col-12">
                <?php echo $post_content ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
