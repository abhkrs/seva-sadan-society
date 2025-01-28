<?php

/**
 * Template Name: Volunteer
 */
get_header();
?>
<?php include('hero.php'); ?>

<section class="pad">
    <div class="container">
        <?php $i=1; while (have_rows('content_sections')) : the_row(); ?>
        <div class="row pb-4 pb-md-5">
            <div
                class="col-lg-6 pb-4 pb-lg-0 <?php echo $i%2 ===0 ? 'ps-lg-4 ps-xl-5 order-lg-2' : 'pe-lg-4 pe-xl-5'; $i++; ?>">
                <div class="image animate-this">
                    <img src="<?php echo esc_url(get_sub_field('image')['url']); ?>"
                        alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>" class="img-fluid">
                </div>
            </div>
            <div class="d-flex align-items-center col-lg-6">
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


<?php get_footer(); ?>