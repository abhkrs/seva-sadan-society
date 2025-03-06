<?php

/**
 * Template Name: Volunteer
 */
get_header();
?>
<?php include('hero.php'); ?>
<div class="lotus-overlay2">
<section class="pad position-relative">
    <!-- <img src="<?php echo get_template_directory_uri();?>/images/logo_element.svg" alt="" class="img-fluid position-absolute end-0 top-0 z-0"> -->
    <div class="container position-relative z-2">
        <div class="row mb-4 mb-lg-5">
            <div class="col-12 text-center">
                <h2 class="fs-1 fw-normal mb-0 animate-this animated"><?php the_field('main_heading_light'); ?></h2>
                <h3 class="fs-1 fw-bold mb-3 animate-this animated"> <?php the_field('main_heading_bold'); ?></h3>
                <div class="animate-this fs-base animated">
                    <div><?php the_field('main_description'); ?></div>
                    <p class="fs-4 fw-bold"><?php the_field('main_subheading'); ?></p>
                </div>
            </div>
        </div>
        <?php $i=1; while (have_rows('content_sections')) : the_row(); ?>
        <div class="row flip-767  pb-4 pb-md-5">
            <div
                class="col-md-5 pb-4 pb-lg-0 <?php echo $i%2 ===0 ? 'ps-lg-4 ps-xl-5 order-lg-2' : 'pe-lg-4 pe-xl-5'; $i++; ?>">
                <?php 
                    $cimage = get_sub_field('image');
                    $cicon = get_sub_field('icon');
                ?>
                <div class="clipy sticky-img animate-this">
                    <img src="<?php echo esc_url($cimage['url']); ?>"
                        alt="<?php echo esc_attr($cimage['alt']); ?>" class="img-fluid">
                    <?php if($cicon['url']){ ?>
                    <div class="icon">
                        <img src="<?php echo esc_url($cicon['url']); ?>"
                    alt="<?php echo esc_attr($cicon['alt']); ?>" class="">
                    </div>  
                    <?php } ?>
                </div>
            </div>
            <div class="d-flex align-items-center col-md-7">
                <div class="ps-xl-4">
                    <h2 class="fs-1 fw-normal mb-0 animate-this"><?php the_sub_field('normal_heading'); ?></h2>
                    <h3 class="fs-1 fw-bold mb-3 animate-this"><?php the_sub_field('bold_heading'); ?></h3>
                    <div class="animate-this fs-base"><?php the_sub_field('content'); ?></div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php include('formrow.php'); ?>
    </div>
</section>
</div>

<?php get_footer(); ?>