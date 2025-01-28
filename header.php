<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <?php wp_head(); ?>
    <title><?php echo the_title(); ?></title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-transparent py-0">
            <div class="container">
                <a class="navbar-brand" href="<?php echo site_url(); ?>">
                    <img src="<?php echo esc_url(get_field('header_logo', 'options')); ?>" alt="Site Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex gap-4 gap-xl-5 align-items-center dropdowns">
                    <?php if (have_rows('our_work', 'options')): ?>
                    <a href="javascript:void(0);">Our Work <img
                            src="<?php echo get_template_directory_uri()?>/images/dropdown.png"
                            style="width:10px; margin-left:3px;"></a>
                    <?php endif; ?>

                    <?php if (have_rows('about_us', 'options')): ?>
                    <a href="javascript:void(0);">About Us <img
                            src="<?php echo get_template_directory_uri()?>/images/dropdown.png"
                            style="width:10px; margin-left:3px;"></a>
                    <?php endif; ?>

                    <?php if (have_rows('why_we_are_trusted', 'options')): ?>
                    <a href="javascript:void(0);">Why We Are Trusted? <img
                            src="<?php echo get_template_directory_uri()?>/images/dropdown.png"
                            style="width:10px; margin-left:3px;"></a>
                    <?php endif; ?>

                    <?php if (have_rows('take_action', 'options')): ?>
                    <a href="javascript:void(0);">Take Action <img
                            src="<?php echo get_template_directory_uri()?>/images/dropdown.png"
                            style="width:10px; margin-left:3px;"></a>
                    <?php endif; ?>

                    <a href="<?php the_field('contact_us_link','options');?>">Contact Us</a>
                    <a href="<?php the_field('donate_link','options');?>" class="btn-prime px-4">Donate</a>
                </div>
            </div>
        </nav>


        <div class="container position-relative">
            <div class="megamenu">
                <?php if (have_rows('our_work', 'options')): ?>
                <div>
                    <p>Our Work</p>
                    <?php while (have_rows('our_work', 'options')) : the_row(); ?>
                    <a href="<?php the_sub_field('menu_link'); ?>">
                        <?php the_sub_field('menu_text'); ?>
                    </a>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>

                <?php if (have_rows('about_us', 'options')): ?>
                <div>
                    <p>About Us</p>
                    <?php while (have_rows('about_us', 'options')) : the_row(); ?>
                    <a href="<?php the_sub_field('menu_link'); ?>">
                        <?php the_sub_field('menu_text'); ?>
                    </a>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>

                <?php if (have_rows('why_we_are_trusted', 'options')): ?>
                <div>
                    <p>Why We Are Trusted?</p>
                    <?php while (have_rows('why_we_are_trusted', 'options')) : the_row(); ?>
                    <a href="<?php the_sub_field('menu_link'); ?>">
                        <?php the_sub_field('menu_text'); ?>
                    </a>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>

                <?php if (have_rows('take_action_header', 'options')): ?>
                <div>
                    <p>Take Action</p>
                    <?php while (have_rows('take_action_header', 'options')) : the_row();?>
                    <a href="<?php the_sub_field('menu_link'); ?>">
                        <?php the_sub_field('menu_text'); ?>
                    </a>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </header>
<main>