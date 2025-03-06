<style>
    
   



</style>
<section class="pad pb-0 lotus-overlay">
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
    <div class="last-section style2">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7">
                    <h2 class="fs-2 fw-normal mb-0 animate-this animated text-grade"><?php the_field('bottom_title'); ?> </h2>
                    <a class="fs-1 fw-bold mb-0 animate-this animated text-grade text-underline" href="<?php the_field('bottom_link'); ?>"><?php the_field('bottom_link_text'); ?> <img src="<?php echo get_template_directory_uri()?>/images/arrow-right.svg" alt=""></a>
                </div>
            </div>
        </div>
        <img src="<?php the_field('bottom_image'); ?>" alt="" class="right-child">
    </div>
</section>

<script>
jQuery(document).ready(function($) {
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
