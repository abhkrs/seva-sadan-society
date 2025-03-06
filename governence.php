<?php

/**
 *Template Name: Governance & Registration
 */
get_header();
?>
<style>
.contnetcard {
    transition: all .3s ease-in-out;
    background: #fff;
    border-radius: 20px;
    padding: 30px;
    height: 100%;
    box-shadow: 0 0 5px 0 #0001;
}

.contnetcard img {
    aspect-ratio: 16/5;
    object-fit: contain;
    margin: auto;
}

.contnetcard:hover {
    transform: translateY(-5px);
    transition: all .3s ease-in-out;
    box-shadow: 0 0 12px 3px #0003;
}

.fs-base.text-white *,
.fs-base.text-white * * {
    color: #fff !important;
}
</style>
<?php include('hero.php'); ?>
<div class="lotus-overlay2">
<section class="pad position-relative">
    <!-- <img src="<?php echo get_template_directory_uri();?>/images/logo_element.svg" alt=""
        class="img-fluid position-absolute end-0 top-0 z-0"> -->
    <div class="container position-relative z-2">
        <div class="row flip-767">
            <div class="col-md-5 pe-md-4 pe-lg-5">
                <div class="image animate-this">
                    <img src="<?php echo esc_url(get_field('image')['url']); ?>"
                        alt="<?php echo esc_attr(get_field('image')['alt']); ?>" class="img-fluid w-100">
                </div>
            </div>
            <div class="d-flex align-items-center col-md-7">
                <div class="ps-xl-4">
                    <?php while (have_rows('section_2_heading')) : the_row(); ?>
                    <h2 class="fs-1 fw-normal animate-this">
                        <?php the_sub_field('normal_text'); ?>
                        <span class="fw-bold text-prime"><?php the_sub_field('bold_text'); ?></span>
                    </h2>
                    <?php endwhile; ?>
                    <div class="animate-this fs-base pt-2"><?php the_field('section_2_content'); ?></div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

<div class="p-3"></div>
<section class="fixedbg py-xl-3">
    <div class="container pt-5 pb-3">
     <?php while (have_rows('governance_&_information_section')) : the_row(); ?>
            <h2 class="animate-this text-white fs-1 fw-normal"><?php the_sub_field('heading_normal'); ?> <span
                class="fw-bold text-white"><?php the_sub_field('heading_bold'); ?></span></h2>
            <?php endwhile; ?>
        <div class="row flip-767 pt-4">
       
            <div class="col-md-7">
                <?php while (have_rows('governance_&_information_section')) : the_row(); ?>
                    <h3 class="fs-1 text-sec fw-bold animate-this"><?php the_sub_field('governing_bodies'); ?></h3>
                    <div class="animate-this fs-base text-white pt-3"><?php the_sub_field('governing_bodies_content'); ?></div>
                <?php endwhile; ?>
            </div>
            <div class="col-md-5 ps-xl-5 ps-lg-4">
                <?php while (have_rows('contact_section')) : the_row(); ?>
                <h2 class="animate-this text-white fs-1 fw-bold"><?php the_sub_field('heading'); ?></h2>
                <?php while (have_rows('paragraph')) : the_row(); ?>
                <p class="text-white animate-this ">
                    <?php the_sub_field('normal_text'); ?>
                    <span class="text-sec"><?php the_sub_field('orange_text'); ?></span>
                </p>
                <?php endwhile; ?>
                <p class="animate-this mb-2">
                    <img src="<?php echo get_template_directory_uri();?>/images/mailicon.svg" alt="email icon"
                        class="img-fluid me-2" style="width:27px;">
                    <a class="text-sec"
                        href="mailto:<?php the_sub_field('email_id'); ?>"><?php the_sub_field('email_id'); ?></a>
                </p>
                <p class="animate-this">
                    <img src="<?php echo get_template_directory_uri();?>/images/callicon.svg" alt="phoone icon"
                        class="img-fluid me-2" style="width:27px;">
                    <?php while (have_rows('phone')) : the_row(); ?>
                    <a href="tel:+91 <?php the_sub_field('number_dialed'); ?>" class="text-sec">
                        <?php the_sub_field('number_shown'); ?> </a>
                    <?php endwhile; ?>
                </p>
                <?php endwhile; ?>               
            </div>
        </div>
    </div>



<!-- xxxxxxxxx -->




    <div class="container pb-5">
        <?php while (have_rows('governance_&_information_section')) : the_row(); ?>
            <h3 class="fs-1 text-sec fw-bold animate-this"><?php the_sub_field('employees'); ?></h3>
            <div class="animate-this fs-base text-white pt-3"><?php the_sub_field('employees_content'); ?></div>
        <?php endwhile; ?>
    </div>
</section>


<?php if( get_field('enabledisable_our_supporters_section') ) { ?>
<section class="pad">
    <div class="container">
        <?php while (have_rows('our_supporters')) : the_row(); ?>
        <h2 class="fs-1 fw-normal animate-this mb-3"><?php the_sub_field('normal_text'); ?> <span
                class="fs-1 fw-bold text-prime"><?php the_sub_field('bold_text'); ?></span></h2>
        <?php endwhile; ?>

        <div class="row justify-content-center">
            <?php while (have_rows('our_supporters_list')) : the_row(); ?>
            <div class="col-md-6 col-lg-4 col-xl-3 animate-this pt-4 p-2">
                <div class="contnetcard">
                    <?php 
                    $image = get_sub_field('icon');
                    if ( is_array($image) && isset($image['url'], $image['alt']) ) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                        class="img-fluid w-100">
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php } ?>


<?php get_footer(); ?>