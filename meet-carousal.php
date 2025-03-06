<section class="pad pb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="fs-1 fw-normal mb-0 animate-this text-center mb-4"><?php the_field('meet_title'); ?> <span class="fw-bold"><?php the_field('meet_bold_title'); ?></span></h2>
                <p class="animate-this text-center h2-mb max"><?php the_field('meet_description'); ?></p>                        
                <?php if( have_rows('meet_slider') ): ?>
                <div class="owl-carousel meet-carousal animate-this common-dots ">
                <?php while( have_rows('meet_slider') ) : the_row(); ?>

                    <div class="items">
                        <a class="contnetcard d-block" href="<?php the_sub_field('page_link'); ?>">
                            <img src="<?php the_sub_field('image'); ?>" 
                            class="img-fluid quote">
                            <h3 class="fs-5 fw-bold mt-4 match"><?php the_sub_field('title'); ?></h3>
                            <div class="text mb-3 fw-medium match"><?php the_sub_field('description'); ?></div>
                            <span class="btn-prime d-block w-fit py-1 px-4" >Read More</span>
                        </a>               
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<script>
jQuery(document).ready(function($) {
    $(".meet-carousal").owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        items: 1,

        responsive:{
        0:{
            items:1,
        },
        576:{
            items:2,
        },
        992:{
            items:2,
        },
        1279:{
            items:3,
        }
    }
    });

    $('div.match').matchHeight();
    $('h3.match').matchHeight();
    

});
</script>
