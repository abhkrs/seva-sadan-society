<?php
/**
 *Template Name: Home
 */
get_header();
?>

<style>
.hero .container,
.hero {
    height: 600px;
}

.hero .graphicimage {
    position: absolute;
    top: 0;
    width: 75vw;
}

.hero .heroimage {
    position: absolute;
    right: 0;
    height: 100%;
    top: 0;
}

.makingdiff .owl-stage-outer {
    overflow: visible;
    padding: 40px 0px;
}

.makingdiff .center {
    scale: 1.1;
    overflow: visible;
}
</style>

<section class="hero">
    <img src="<?php echo get_template_directory_uri(); ?>/images/herographics.png" alt="graphicimage"
        class="img-fluid graphicimage">
    <?php 
    $hero_image = get_field('banner_image');
    if ( is_array($hero_image) && isset($hero_image['url'], $hero_image['alt']) ) : ?>
    <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>"
        class="img-fluid heroimage">
    <?php endif; ?>

    <div class="container">
        <div class="row h-100">
            <div class="col-lg-7 pe-xl-4 d-flex flex-column justify-content-center gap-2 h-100">
                <?php if ( get_field('banner_white_text') ) : ?>
                <h3 class="text-white fs-1 fw-normal animate-this">
                    <?php echo esc_html(get_field('banner_white_text')); ?></h3>
                <?php endif; ?>

                <?php if ( get_field('banner_orange_text') ) : ?>
                <h1 class="text-sec fw-bold animate-this"><?php echo esc_html(get_field('banner_orange_text')); ?></h1>
                <?php endif; ?>

                <?php if ( get_field('banner_description') ) : ?>
                <p class="text-white mt-lg-3 animate-this"><?php echo esc_html(get_field('banner_description')); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php include('zoomSliderHome.php')?>

<section class="pad">
    <div class="container">
        <div class="owl-carousel testimonial animate-this">
            <?php while (have_rows('testimonials', 'options')) : the_row(); ?>
            <div class="testimonialwrap items mb-3">
                <img src="<?php echo get_template_directory_uri();?>/images/quote.webp" alt="quote"
                    class="img-fluid quote">
                <div class="content">
                    <p class="fw-normal"><?php the_sub_field('message'); ?></p>
                    <h4 class="fs-5 fw-bold"><?php the_sub_field('author'); ?></h4>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
<script>
jQuery(document).ready(function($) {
    //    $(".owl-carousel.makingdiff").owlCarousel({
    //     loop: true,
    //     margin: 20,
    //     nav: false,
    //     dots: false,
    //     autoplay: true,
    //     autoplayTimeout: 5000,
    //     autoplayHoverPause: true,
    //     center: true,
    //     items: 3,
    //     stagePadding: 20,
    //     responsive: {
    //         0: {
    //             items: 1,
    //             stagePadding: 20
    //         },
    //         768: {
    //             items: 3,
    //             stagePadding: 60
    //         },
    //         1300: {
    //             items: 5,
    //             stagePadding: 60
    //         }
    //     }
    // });

    // $(".owl-carousel.makingdiff").on('changed.owl.carousel', function(event) {
    //     var current = event.item.index;
    //     $(".owl-item").removeClass("center");
    //     $(".owl-item").eq(current).addClass("center");
    // });

    $(".owl-carousel.testimonial").owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        items: 1,
    });
});
</script>