<?php

    /**
     * Template Name: Homepage Template
     */

    $hero_heading       = get_field('hero_heading');
    $hero_subheading    = get_field('hero_subheading');
    $hero_image         = get_field('hero_image');
    $hero_button_text   = get_field('hero_button_text');

    $subhero_heading_text = get_field('subhero_heading_text');
    $subhero_content      = get_field('subhero_content');

    $wwd_section_heading        = get_field('wwd_section_heading');
    $wwd_section_introduction   = get_field('wwd_section_introduction');
    $wwd_content_tab            = get_field('wwd_content_tab');

    $work_section_heading       = get_field('work_section_heading');
    $work_section_introduction  = get_field('work_section_introduction');

    $clients_section_heading        = get_field('clients_section_heading');
    $clients_section_introduction   = get_field('clients_section_introduction');
    $client_list                    = get_field('client_list');

    $contact_form_email_recipient   = get_field('contact_form_email_recipient');
    $contact_section_content        = get_field('contact_section_content');

    get_header();
?>

<header>
    <?php get_template_part('template-parts/content', 'nav') ?>
    <div class="header-inner" style="background-image: url(<?php echo $hero_image ?>)">
        <div class="header-text">
            <h1 class="display-3 main-heading"><?php echo $hero_heading ?></h1>
            <h4><?php echo $hero_subheading ?></h4>
            <a href="#heading"><button class="btn btn-main"><?php echo $hero_button_text ?></button></a>
        </div>
    </div>
</header>

<section class="body-section light-bg" id="heading">
    <h2><?php echo $subhero_heading_text ?></h2>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <?php echo $subhero_content ?>
                <a href="#"><button class="btn btn-main btn-hollow">What We Do</button></a>
                <a href="#"><button class="btn btn-main btn-hollow">What We've Done</button></a>
            </div>
        </div>
    </div>
</section>

<section class="body-section" id="about">
    <h2><?php echo $wwd_section_heading ?></h2>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="text-main"><?php echo $wwd_section_introduction ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 tabs">
                <div class="row">
                    <?php
                        $iterator = 0;
                        foreach($wwd_content_tab as $tab) {
                            if ($iterator == 0) {
                                $activeClass = 'tab-active';
                            } else {
                                $activeClass = '';
                            }
                            echo '
                                <div class="col-md-3">
                                    <button class="btn btn-main btn-tab ' . $activeClass . '" data-tabId="' . $tab["tab_id"] . '">' . $tab["tab_name"] . '</button>
                                </div>
                            ';
                            $iterator++;
                        }
                    ?>

                </div>
            </div>
        </div>
        <?php
            if ( have_rows('wwd_content_tab') ):
                while ( have_rows('wwd_content_tab') ) : the_row();
                    $category_slug = get_sub_field('content_category_link')->slug;
                    $category_name = get_sub_field('content_category_link')->name;
                    echo '
                        <div class="row tab-data" data-tabId="' . get_sub_field('tab_id') . '">
                            <div class="col-md-6">
                                <img class="img-fluid" src="' . get_Sub_field('content_image') .'" alt="">
                            </div>
                            <div class="col-md-6">
                                <p>
                                    ' . get_sub_field('content_text') . '
                                    <br>
                                    
                                    
                                    <a href="/' . $category_slug . '"><button class="btn btn-main btn-hollow">View Projects</button></a>
                                </p>
                            </div>
                        </div>
                    ';
                endwhile;
            endif;
        ?>

    </div>
</section>

<section class="body-section pad-top-only" id="projects">
    <h2><?php echo $work_section_heading ?></h2>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="text-main"><?php echo $work_section_introduction ?></p>
                <a href="/projects"><button class="btn btn-main btn-hollow">View all projects</button></a>
            </div>
        </div>
    </div>
    <div class="project-grid">
        <?php
            $query = new WP_Query( array(
                'post_type'         => 'post',
                'posts_per_page'    => 8
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

<section class="body-section" id="clients">
    <h2><?php echo $clients_section_heading ?></h2>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="text-main"><?php echo $clients_section_introduction ?></p>
            </div>
        </div>
    </div>
    <div class="client-grid">
        <div class="container">
            <div class="row">
                <?php
                    if ( $client_list ) {
                        foreach ( $client_list as $client ) {
                            echo '
                             <div class="col-md-3">
                                <img class="img-fluid" src="' . $client['client_image'] . '" alt="">
                            </div>
                            ';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</section>

<section class="body-section" id="contact">
    <h2>Contact Us</h2>
    <div class="container">
        <div class="row margin-top">
            <div class="col-md-6">
                <form action="#" class="contact-form">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" name="message" id="message" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit Form">
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <?php echo $contact_section_content ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>
