<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:image" content="<?php echo site_url(); ?>/wp-content/uploads/2025/02/Share-Img.webp">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <?php wp_head(); ?>    
    <title><?php echo the_title(); ?></title>
   
</head>

<body>
	<?php if( get_field('enable_ribbon_on_top' , 'options') ) { ?>
    <section class="bg-sec position-relative" style="z-index:110;">
        <div class="container py-2 d-flex justify-content-between align-items-center">
        <marquee width="100%" direction="left" height="100px" onMouseOver="this.stop()" onMouseOut="this.start()">
            <?php while (have_rows('header_ribbon', 'options')) : the_row(); ?>                           
                <span class="mb-0 text-white">
                    <?php the_sub_field('ribbon_text'); ?>
                </span>
                
            <?php endwhile; ?>
            </marquee>
            <?php while (have_rows('header_ribbon', 'options')) : the_row(); ?>          
            <a href="<?php the_sub_field('view_button_link'); ?>"
                style="background:#fff; color:var(--sec); padding:2px 50px; border-radius:5px;">
                View
            </a>
            <?php endwhile; ?>

        </div>
    </section>
    <?php } ?>

    <header>
        <nav class="navbar navbar-expand-xl py-0">
            <div class="container">
                <a class="navbar-brand" href="<?php echo site_url(); ?>">
                    <img src="<?php echo esc_url(get_field('header_logo', 'options')); ?>" alt="Site Logo" class="site-logo img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">                   
                  
                    <?php if (have_rows('our_work', 'options')): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Our Work <img
                                    src="<?php echo get_template_directory_uri()?>/images/dropdown.png"
                                    style="width:10px; margin-left:3px;">
                            </a>                    
                            <ul class="dropdown-menu">                    
                                <?php while (have_rows('our_work', 'options')) : the_row(); ?>
                                <li><a class="dropdown-item" href="<?php the_sub_field('menu_link'); ?>"><?php the_sub_field('menu_text'); ?></a></li>
                                <?php endwhile; ?>                       
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (have_rows('about_us', 'options')): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            About Us <img
                                    src="<?php echo get_template_directory_uri()?>/images/dropdown.png"
                                    style="width:10px; margin-left:3px;">
                            </a>                    
                            <ul class="dropdown-menu">                    
                                <?php while (have_rows('about_us', 'options')) : the_row(); ?>
                                <li><a class="dropdown-item" href="<?php the_sub_field('menu_link'); ?>"><?php the_sub_field('menu_text'); ?></a></li>
                                <?php endwhile; ?>                       
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (have_rows('why_we_are_trusted', 'options')): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Why We Are Trusted?  <img
                                    src="<?php echo get_template_directory_uri()?>/images/dropdown.png"
                                    style="width:10px; margin-left:3px;">
                            </a>                    
                            <ul class="dropdown-menu">                    
                                <?php while (have_rows('why_we_are_trusted', 'options')) : the_row(); ?>
                                <li><a class="dropdown-item" href="<?php the_sub_field('menu_link'); ?>"><?php the_sub_field('menu_text'); ?></a></li>
                                <?php endwhile; ?>                       
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if (have_rows('take_action_header', 'options')): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Take Action  <img
                                    src="<?php echo get_template_directory_uri()?>/images/dropdown.png"
                                    style="width:10px; margin-left:3px;">
                            </a>                    
                            <ul class="dropdown-menu">                    
                                <?php while (have_rows('take_action_header', 'options')) : the_row(); ?>
                                <li><a class="dropdown-item" href="<?php the_sub_field('menu_link'); ?>"><?php the_sub_field('menu_text'); ?></a></li>
                                <?php endwhile; ?>                       
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php the_field('contact_us_link','options');?>">Contact Us</a>
                    </li>
                    <a href="<?php the_field('donate_link','options');?>" class="btn-prime ms-3 w-fit" style=" padding:8px 40px;">Donate</a>
                   
                </ul>
                </div>
            </div>
        </nav>
    </header>

    <script>
        window.addEventListener("scroll", () => {
        const header = document.querySelector("header");
        const scrollY = window.scrollY;
        
        if (scrollY > 60) {
            header.classList.add("stick");
        } else if (scrollY < 40) {
            header.classList.remove("stick");
        }
        });
    </script>
<main>