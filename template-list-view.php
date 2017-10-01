<?php

    /**
     * Template Name: List View Template
     */

    get_header();
?>

<header class="header-small">
    <?php get_template_part('template-parts/content', 'nav') ?>
    <div class="header-inner" style="background-image: url(<?php bloginfo('stylesheet_directory') ?>/assets/img/banner.jpg)">
        <div class="header-text">
            <h1 class="display-3 main-heading">Our projects</h1>
        </div>
    </div>
</header>

<section class="body-section pad-top-only" id="projects">
    <h2>Our Projects</h2>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="text-main">Generic project information that applies to all. Need to get this later.</p>
            </div>
        </div>
    </div>
    <div class="project-grid">
        <?php
        $query = new WP_Query( array(
            'post_type'         => 'post',
            'posts_per_page'    => 9999
        ) );

        if ( $query->have_posts() ):
            while ( $query->have_posts() ) : $query->the_post();
                echo '
                        <div class="project-item" style="background-image: url(' . get_the_post_thumbnail_url() . ')">
                            <a href="' . get_the_permalink() . '" class="project-link"><div class="item-info-container">
                                    <h3>' . get_the_title() .'</h3>
                                    <span>' . get_the_category()[0]->name . '</span>
                                </div></a>
                        </div>
                    ';
            endwhile;
        endif;
        ?>
    </div>
</section>

<?php get_footer(); ?>
