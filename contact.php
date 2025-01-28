<?php

/**
 *Template Name: Contact
 */
get_header();
?>
<style>
    .faqs-wrapper .col-lg-6 {
        display: flex;
        flex-direction: column;
        gap: 30px;
        padding: 15px;
    }

    details {
        background: #fff1;
        border-radius: 20px;
        border: 1px solid #fff5;
        padding: 28px;
        height: fit-content;
    }

    details summary {
        list-style: none;
        cursor: pointer;
        position: relative;
        padding-right: 50px;
        font-weight: 600;
        font-size: 16px;
        color: #fff;
    }

    details summary::-webkit-details-marker {
        display: none;
    }

    details summary>img {
        height: 40px;
        width: 40px;
        background: #fff2;
        border-radius: 50%;
        position: absolute;
        right: -15px;
        top: -5px;
        padding: 13px;
        transition: all .3s ease-in-out;
    }

    details[open] summary>img {
        transform: rotate(180deg);
        transition: all .3s ease-in-out;
    }
</style>
<div class="main position-relative">
     <img src="<?php echo site_url(); ?>/wp-content/uploads/2024/12/contact-1.webp" alt="background" class="img-fluid top-0 position-absolute w-100 h-100 object-fit-cover">

    <section class="common-padd inner-banner top-line2 bottom-line2 align-items-end bg-cover"
        style="background:url('<?php the_field('banner_image'); ?>') center no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-12  ">
                    <h1 class="font2">
                        <?php the_title(); ?>
                    </h1>
                    <div class="d-flex breadcrumb mb-0 pb-0">
                        <a href="<?php echo get_site_url(); ?>" class="text-white">Home /</a>
                        <span class="text-white">
                            <?php the_title(); ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>




         <section class="overflow-hidden-x">
            <div class="common-padd ">
                <div class="container position-relative z-3">
                    <div class="row">
                        <div class="col-lg-7 mx-lg-auto text-lg-center">
                            <h2 class="animate-this "><?php the_field('get_in_touch'); ?></h2>
                            <p class="text animate-this"><?php the_field('get_in_touch_description'); ?>
                            </p>
                        </div>
                    </div>
                    <div class="row mt-3 mt-lg-4">
                        <div class="col-12 col-lg-7 mx-lg-auto mb-4 mb-lg-0">
                            <div class="form-style top-line2 bottom-line2">
                                <h3 class="animate-this fs-3"><?php the_field('reach_out_to_our_expert_team'); ?></h3>
                                <p class="pb-3 mt-3 pb-lg-4 opacity-100 animate-this">
                                    <?php the_field('reach_out_text'); ?></p>

                                <?php echo do_shortcode('[contact-form-7 id="ad860ea" title="Contact form"]'); ?>

                            </div>
							<div class="form-style top-line2 bottom-line2 mt-3" style="padding: 20px 20px;">
<!--                                 <a href="mailto:<?php the_field('email'); ?>" class="info-box mb-3 animate-this ">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/mail.png" alt=""
                                        style="max-width:50px">
                                    <div class="content ps-2">
                                        <h5 class="fw-light mb-0">Email</h5>
                                        <p class="fw-light mb-0"><?php the_field('email'); ?></p>
                                    </div>
                                </a> -->
                                <a href="tel:<?php the_field('phone_number'); ?>" class="info-box animate-this ">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/call.png" alt=""
                                        style="max-width:50px">
                                    <div class="content ps-2">
                                        <h5 class="fw-light mb-0">Phone</h5>
                                        <p class="fw-light mb-0"><?php the_field('phone_number'); ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 d-none">
<!--                             <iframe src="<?php the_field('google_map_embed_link'); ?>" width="100%" height="460"
                                style="border:0; filter:grayscale(100%);" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                            <div class="form-style top-line2 bottom-line2 mt-3" style="padding: 20px 20px;">
                                <a href="mailto:<?php the_field('email'); ?>" class="info-box mb-3 animate-this ">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/mail.png" alt=""
                                        style="max-width:50px">
                                    <div class="content ps-2">
                                        <h5 class="fw-light mb-0">Email</h5>
                                        <p class="fw-light mb-0"><?php the_field('email'); ?></p>
                                    </div>
                                </a>
                                <a href="tel:<?php the_field('phone_number'); ?>" class="info-box animate-this ">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/call.png" alt=""
                                        style="max-width:50px">
                                    <div class="content ps-2">
                                        <h5 class="fw-light mb-0">Phone</h5>
                                        <p class="fw-light mb-0"><?php the_field('phone_number'); ?></p>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>

    <section class="top-line">
        <div class="common-padd ">
            <div class="container py-3 pt-lg-4 position-relative z-3">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center animate-this"> <?php the_field('faqs_heading'); ?></h2>
                        <div class="text max3 mx-auto text-center animate-this">
                            <?php the_field('faq_description'); ?>
                        </div>
                        <div class="row pt-lg-5 faqs-wrapper">
                                <div class="col-lg-6">
                                    <?php
                                    if (have_rows('faqs')):
                                        $counter = 1; 
                                        while (have_rows('faqs')): the_row();
                                            if ($counter % 2 != 0): 
                                    ?>
                                                <details class="animate-this">
                                                    <summary>
                                                        <?php the_sub_field('title'); ?>
                                                        <img src="<?php echo get_template_directory_uri() ?>/img/arrow_downward_alt.svg" alt="icon">
                                                    </summary>
                                                    <div class="pt-3" style="font-size:14px;">
                                                        <?php the_sub_field('description'); ?>
                                                    </div>
                                                </details>
                                    <?php
                                            endif;
                                            $counter++;
                                        endwhile;
                                    endif;
                                    ?>
                                </div>
                         
                                <div class="col-lg-6 ">
                                    <?php
                                    if (have_rows('faqs')):
                                        $counter = 1; 
                                        while (have_rows('faqs')): the_row();
                                            if ($counter % 2 == 0):
                                    ?>
                                                <details class="animate-this">
                                                    <summary>
                                                        <?php the_sub_field('title'); ?>
                                                        <img src="<?php echo get_template_directory_uri() ?>/img/arrow_downward_alt.svg" alt="icon">
                                                    </summary>
                                                    <div class="pt-3" style="font-size:14px;">
                                                        <?php the_sub_field('description'); ?>
                                                    </div>
                                                </details>
                                    <?php
                                            endif;
                                            $counter++; 
                                        endwhile;
                                    endif;
                                    ?>
                                </div>
                            </div>
                     

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php get_footer(); ?>