<?php

/**
 *Template Name: Impact Revised
 */
get_header();
?>
<style>
    .contnetcard {
    /* box-shadow: 0 0 5px 0 #0001; */
    transition: all .3s ease-in-out;
    background: #fff;
    /* clip-path: polygon(0 0, calc(100% - 18%) 0, 100% 20%, 100% 100%, 0 100%); */
    border-radius: 20px;
    padding: 20px;
    padding-bottom: 30px;
}

.hover{
   padding: 20px;
    padding-bottom: 30px; 
    transition: all .3s ease-in-out;
    text-align:center;
}
.hover:hover,
.contnetcard:hover {
    /* box-shadow: 0 0 12px 3px #0003; */
    transform: translateY(-5px);
    transition: all .3s ease-in-out;
}
</style>
<?php include('hero.php'); ?>
<div class="lotus-overlay2">
<section class="pad position-relative overflow-hidden">
    <!-- <img src="<?php echo get_template_directory_uri();?>/images/logo_element.svg" alt="" class="img-fluid position-absolute end-0 top-0 z-0"> -->
    <div class="container position-relative z-2 ">
		<div class="animate-this text-center pb-3">
			<div class="fs-1 text-prime fw-bold numwrap"><span class="number text-prime"><?php the_field('impact_number'); ?></span>+</div>
			<h3 class="text-sec"><?php the_field('impact_number_text'); ?></h3>
		</div>
        <?php while (have_rows('heading')) : the_row(); ?>
        <h2 class="fs-2 fw-normal animate-this text-center mb-3"><?php the_sub_field('normal_text'); ?>  <span class="fs-1 fw-bold text-prime"><?php the_sub_field('bold_text'); ?></span></h2>
        <?php endwhile; ?>
        <div class="row">
            <?php while (have_rows('icon_points')) : the_row(); ?>
                <div class="col-sm-6 col-lg-4 animate-this">
                    <div class="hover">
                        <?php 
                        $image = get_sub_field('icon');
                        if (is_array($image)) : ?>
                        <div class="d-flex align-items-center justify-content-center bg-sec shadow-lg rounded-circle p-2 mx-auto" style="width:120px; aspect-ratio:1;">
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                            class="img-fluid">
						</div>
                        <?php endif; ?>
                        <h4 class="fw-bold animate-this pt-3"><?php the_sub_field('title'); ?></h4>
                        <p class="mb-0 animate-this"><?php the_sub_field('description'); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
</div>
<section class="fixedbg">
    <div class="container py-5">
        <div class="row justify-content-center py-lg-5 gap-lg-5">
            <?php while (have_rows('key_stats')) : the_row(); ?>
            <div class="col-md-4 col-lg-3">
                <div class="itemwrap animate-this numwrap text-center" >
                    <h2 class=" text-sec fw-bold number counter-font"><?php the_sub_field('number'); ?></h2>
                    <p class="text-white"><?php the_sub_field('description'); ?></p>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<section class="pad">
    <div class="container">
        <?php while (have_rows('our_intangible_impact_heading')) : the_row(); ?>
        <h2 class="fs-1 fw-normal animate-this text-center mb-3"><?php the_sub_field('normal_text'); ?>  <span class="fs-1 fw-bold text-prime"><?php the_sub_field('bold_text'); ?></span></h2>
        <?php endwhile; ?>
         <p class="text-center mw-1000 mx-auto animate-this"><?php the_field('our_intangible_impact_paragraph'); ?></p>

         <div class="row justify-content-center">
            <?php while (have_rows('our_intangible_impact_cards')) : the_row(); ?>
            <div class="col-md-6 col-lg-4 animate-this pt-4">
                <a class="contnetcard d-block" href="<?php the_sub_field('read_more'); ?>">
                    <?php 
                    $image = get_sub_field('thumbnail');
                    if ( is_array($image) && isset($image['url'], $image['alt']) ) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                        class="img-fluid w-100">
                    <?php endif; ?>
                    <h3 class="fs-5 text-prime fw-bold mt-4"><?php the_sub_field('name'); ?></h3>
                    <p class="mb-4"><?php the_sub_field('description'); ?></p>
                    <span class="btn-prime py-2 px-4">Read More</span>
                </a>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<script>
jQuery(document).ready(function($) {
    function animateKeyFactCounter(counterElement) {
        const targetNumber = parseInt($(counterElement).find('.number').contents().filter(function() {
            return this.nodeType === 3;
        }).text());
        const animationDuration = 2000;

        $({
            increment: 0
        }).animate({
            increment: targetNumber
        }, {
            duration: animationDuration,
            step: function(now) {
                const roundedNumber = Math.round(now);
                $(counterElement).find('.number').contents().filter(function() {
                    return this.nodeType === 3;
                }).each(function() {
                    this.nodeValue = roundedNumber;
                });
            }
        });
    }

    const animateKeyFactCounters = () => {
        $('.numwrap').each(function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        animateKeyFactCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            });
            observer.observe(this);
        });
    };

    animateKeyFactCounters();

    $('.contnetcard h3').matchHeight();
    $('.contnetcard p').matchHeight();
});
</script>


<?php get_footer(); ?>