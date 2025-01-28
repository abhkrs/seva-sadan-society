<style>
.makingdiff .owl-stage-outer {
    overflow: hidden;
    height: 640px;
}

.makingdiff .items {
    width: 350px !important;
    position: relative;
    margin-top: 20px;
    border-radius:20px;
    overflow:hidden;
}

.makingdiff .items .content {
    position: absolute;
    bottom: 0;
    left: 0;
    padding: 30px;
    width: 100%;
    background-image: linear-gradient(to top, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0));
}

.makingdiff .center .items {
    width: 400px !important;
    margin-left: 20px;
    margin-right: 20px !important;
    margin-top: 0px;
    border-radius:20px;
    overflow:hidden;
}

.makingdiff.owl-carousel .owl-dots {
    display: flex;
    justify-content: center;
    gap: 8px;
}

.makingdiff.owl-carousel .owl-dots button {
    background: var(--sec);
    opacity: .5;
    height: 10px;
    width: 10px;
    border-radius: 50%;
}

.makingdiff.owl-carousel .owl-dots button.active {
    opacity: 1;
}
</style>
<section class="pad">
    <div class="container">
        <?php while (have_rows('making_a_difference')) : the_row(); ?>
        <h2 class="fs-1 fw-normal text-center animate-this"> <?php the_sub_field('normal_text'); ?>
            <span class="fw-bold text-prime"> <?php the_sub_field('bold_text'); ?></span>
        </h2>
        <?php endwhile; ?>
        <p class="text-center mx-auto mw-1000 mt-4 animate-this"><?php the_field('making_a_difference_description'); ?>
        </p>
    </div>

    <div class="owl-carousel makingdiff animate-this">
        <?php while (have_rows('making_a_difference_slider')) : the_row(); ?>
        <div class="items">
            <img src="<?php echo esc_url(get_sub_field('image')['url']); ?>"
                alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>" class="img-fluid w-100">
            <div class="content">
                <h3 class="fs-3 fw-normal text-white"><?php the_sub_field('normal_text'); ?></h3>
                <h4 class="fs-3 fw-bold text-white mb-4"><?php the_sub_field('bold_text'); ?></h4>
                <a href="<?php the_sub_field('know_more_page'); ?>" class="btn-prime">Know More</a>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</section>
<script>
jQuery(document).ready(function($) {
    $(".makingdiff").owlCarousel({
        autoplay: false,
        loop: true,
        margin: 15,
        autoWidth: true,
        stagePadding: 0,
        nav: false,
        center: true,
        dots: true,
    });
});
</script>