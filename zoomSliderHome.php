<style>
.makingdiff .owl-stage-outer {
    overflow: hidden !important;
    position: relative;
    height: auto !important;
    padding: 20px 0;             
    transform: translateZ(0);     
}

.makingdiff .owl-stage {
    display: flex;
    align-items: center;
    transform-style: preserve-3d; 
}

.makingdiff .items {
    width: 350px !important;
    position: relative;
    margin: 0 10px;
    border-radius: 20px;
    overflow: hidden;
    transform-origin: center center; 
    backface-visibility: hidden;    
    perspective: 1000px;            
}

.makingdiff .center .items {
    width: 400px !important;
    z-index: 2;
}

.makingdiff .items .content {
    position: absolute;
    bottom: 0;
    left: 0;
    padding: 30px;
    width: 100%;
    background-image: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0));
    z-index: 1;
}

.makingdiff.owl-carousel {
    position: relative;
    padding-bottom: 30px;
}

.makingdiff.owl-carousel .owl-dots {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    gap: 8px;
    z-index: 5;
    padding: 10px 0;
}

.makingdiff.owl-carousel .owl-dots button {
    background: var(--sec);
    opacity: 0.5;
    height: 10px;
    width: 10px;
    border-radius: 50%;
    transition: opacity 0.3s ease;
}

.makingdiff.owl-carousel .owl-dots button.active {
    opacity: 1;
}

.makingdiff .owl-item {
    transition: transform 0.3s ease-out;
    transform-origin: center center;
}
@media only screen and (max-width:576px) {
    .makingdiff .center .items {
        width: 100% !important;
    }
}
</style>
<section class="pad">
    <div class="container">
        <?php while (have_rows('making_a_difference')) : the_row(); ?>
        <h2 class="fs-1 fw-normal text-center animate-this"> <?php the_sub_field('normal_text'); ?>
            <span class="fw-bold text-prime"> <?php the_sub_field('bold_text'); ?></span>
        </h2>
        <?php endwhile; ?>
        <p class="text-center mx-auto mw-1000 mt-4 pb-0 h2-mb animate-this"><?php the_field('making_a_difference_description'); ?>
        </p>
    </div>

    <div class="owl-carousel makingdiff animate-this">
        <?php while (have_rows('making_a_difference_slider')) : the_row(); ?>
        <div class="items">
            <a class="clipy style2" href="<?php the_sub_field('know_more_page'); ?>">
                <img src="<?php echo esc_url(get_sub_field('image')['url']); ?>"
                    alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>" class="img-fluid w-100">    
                <div class="icon">
                    <img src="<?php echo esc_attr(get_sub_field('icon')['url']); ?>"
                alt="<?php echo esc_attr($cicon['alt']); ?>" class="">
                </div>         
            </a>
            <a class="content" href="<?php the_sub_field('know_more_page'); ?>">
                <h3 class="fs-3 fw-normal text-white"><?php the_sub_field('normal_text'); ?></h3>
                <h4 class="fs-3 fw-bold text-white mb-4"><?php the_sub_field('bold_text'); ?></h4>
                <span  class="btn-prime">Know More</span>
            </a>
        </div>
        <?php endwhile; ?>
    </div>
</section>
<script>
jQuery(document).ready(function($) {
    $(".makingdiff").owlCarousel({
        autoplay: true,
        autoplayTimeout:2000,
        loop: true,
        items:1,
        margin: 5,
        autoWidth: false,
        stagePadding: 0,
        nav: false,
        center: true,
        dots: true,
        responsive:{
        0:{
            margin: 20,
        },
        576:{
           autoWidth: true, 
        }
        
    }

    });
});
</script>