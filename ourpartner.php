<?php

/**
 *Template Name: Our Partner
 */
get_header();
?>

<style>
.partnercard {
    clip-path: polygon(0 0, calc(100% - 80px) 0, 100% 80px, 100% 100%, 0 100%);
    border-radius: 20px;
}
</style>

<?php include('hero.php'); ?>
<div class="lotus-overlay2">
<section class="pad position-relative">
    <!-- <img src="<?php echo get_template_directory_uri();?>/images/logo_element.svg" alt="" class="img-fluid position-absolute end-0 top-0 z-0"> -->
    <div class="container position-relative z-2">
        <div class="row flip-767">
            <div class="col-md-5 pe-md-4 pe-lg-5">                
            <?php 
                $cimage = get_field('cllipy_image');
                $cicon = get_field('cllipy_icon');
                include('clipy.php');
            ?>
            </div>
            <div class="d-flex align-items-center col-md-7">
                <div class="ps-xl-4">
                    <?php while (have_rows('heading')) : the_row(); ?>
                    <h2 class="fs-1 fw-normal mb-0 animate-this"><?php the_sub_field('normal_text'); ?></h2>
                    <h3 class="fs-1 fw-bold mb-3 animate-this"><?php the_sub_field('bold_text'); ?></h3>
                    <?php endwhile; ?>
                    <p class="animate-this"><?php the_field('description'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

<?php if( get_field('enable_logo_slider') ) { ?>
<section class="bg-white">
    <div class="container py-3 animate-this">
        <div class="logo-slide">
            <div class="logo-row">
                <?php $i=1; while (have_rows('partners')) : the_row(); ?>
                <a href="#partner<?php echo $i; $i++?>">
                    <img src="<?php the_sub_field('logo'); ?>" alt="<?php the_sub_field('name'); ?>">
                </a>
                <?php endwhile; ?>
            </div>

            <div class="logo-row">
                <?php $i=1; while (have_rows('partners')) : the_row(); ?>
                <a href="#partner<?php echo $i; $i++?>">
                    <img src="<?php the_sub_field('logo'); ?>" alt="<?php the_sub_field('name'); ?>">
                </a>
                <?php endwhile; ?>
            </div>
        </div>
</section>
<style>
.logo-slide {
    overflow: hidden;
    white-space: nowrap !important;
    padding-top: 10px;
    padding-bottom: 10px;
}

.logo-row {
    display: inline-flex;
    animation: scrollLogo infinite linear forwards;
    padding: 10px 0px;
    gap: 16px;
    margin-right: 10px;
}

.logo-row a img {
    object-fit: contain;
    height: 80px !important;
}

.logo-row a {
    width: 300px !important;
    border: 1px solid #CFCBCB;
    padding: 26px;
    border-radius: 14px;
    background: #fff;
    text-align: center;
}

.logo-slide:hover .logo-row {
    animation-play-state: paused;
}

@keyframes scrollLogo {
    from {
        transform: translateX(0);
    }

    to {
        transform: translateX(-100%);
    }
}

.logo-row {
    animation-duration: <?php echo ($i-1)*2000?>ms !important;
}
</style>
<div class="p-3"></div>
<?php } ?>


<?php while (have_rows('contact_section')) : the_row(); ?>
<div style="background:var(--lgr); padding:50px;"></div>
<section class="fixedbg">
    <div class="container">
        <div class="py-5 d-flex flex-column justify-content-center ">
            <p class="animate-this text-white mb-4"><?php the_sub_field('top_line_text'); ?></p>

            <?php while (have_rows('contact_emails')) : the_row(); ?>
            <div class="d-flex animate-this align-items-center flex-wrap pt-3">
                <p class="text-white mb-0"><?php the_sub_field('contact_text'); ?></p>
                <a href="mailto:<?php the_sub_field('email_id'); ?>" class="text-sec fs-base fw-bold ms-3">
                    <?php the_sub_field('email_id'); ?></a>
            </div>
            <?php endwhile; ?>

            <hr class="my-4 text-light">

            <p class="animate-this text-white mb-4"><?php the_sub_field('description'); ?></p>
            <p class="mb-0 animate-this text-white ">Please contact us at</p>
            <a href="mailto:<?php the_sub_field('contact_us_email'); ?>" class="text-sec fs-base fw-bold animate-this">
                <?php the_sub_field('contact_us_email'); ?></a>
        </div>
    </div>
</section>
<?php endwhile; ?>


<section class="pad">
    <div class="container">
        <?php while (have_rows('partner_heading')) : the_row(); ?>
        <h2 class="fs-1 fw-normal animate-this">
            <?php the_sub_field('normal_text'); ?>
            <span class="fw-bold text-prime"><?php the_sub_field('bold_text'); ?></span>
        </h2>
        <?php endwhile; ?>
        <div class="row">
            <?php $i=1; while (have_rows('partners')) : the_row(); ?>
            <div id="partner<?php echo $i; $i++?>" class="col-md-6 p-3 animate-this">
                <div class="partnercard bg-white  shadow-sm h-100">
                    <img src="<?php the_sub_field('logo'); ?>" alt="<?php the_sub_field('name'); ?>"
                        class="img-fluid animate-this">
                    <h3 class="fs-4 fw-bold mt-4 mb-3 animate-this"><?php the_sub_field('name'); ?></h3>
                    <p class="animate-this"><?php the_field('description'); ?></p>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <div class="container pt-4">
        <?php include('formrow.php'); ?>
    </div>
</section>


<?php get_footer(); ?>