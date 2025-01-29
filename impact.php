<?php

/**
 *Template Name: Impact
 */
get_header();
?>
<style>
    .contnetcard {
    /* box-shadow: 0 0 5px 0 #0001; */
    transition: all .3s ease-in-out;
    background: #fff;
    clip-path: polygon(0 0, calc(100% - 18%) 0, 100% 20%, 100% 100%, 0 100%);
    border-radius: 20px;
    padding: 20px;
    padding-bottom: 30px;
}

.contnetcard:hover {
    /* box-shadow: 0 0 12px 3px #0003; */
    transform: translateY(-5px);
    transition: all .3s ease-in-out;
}
</style>
<?php include('hero.php'); ?>
<?php include('topsection.php'); ?>

<section class="bg-prime">
    <div class="container py-5">
        <div class="row justify-content-center py-lg-5 gap-lg-5">
            <?php while (have_rows('key_stats')) : the_row(); ?>
            <div class="col-md-4 col-lg-3">
                <div class="itemwrap animate-this">
                    <h2 class="fs-1 text-sec fw-bold"><?php the_sub_field('number'); ?></h2>
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
                <div class="contnetcard">
                    <?php 
                    $image = get_sub_field('thumbnail');
                    if ( is_array($image) && isset($image['url'], $image['alt']) ) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                        class="img-fluid w-100">
                    <?php endif; ?>
                    <h3 class="fs-5 text-prime fw-bold mt-4"><?php the_sub_field('name'); ?></h3>
                    <p class=""><?php the_sub_field('description'); ?></p>
                    <a href="<?php the_sub_field('description'); ?>" class="btn-prime py-2 px-4">Read More</a>
                </div>
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
        $('.counter .grid-3-item').each(function() {
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
});
</script>



<?php get_footer(); ?>