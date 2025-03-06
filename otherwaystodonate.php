<?php

/**
 * Template Name: Other Ways to Donate
 */
get_header();
?>
<style>
.contnetcard {
    /* box-shadow: 0 0 5px 0 #0001; */
    transition: all .3s ease-in-out;
    background: #fff;
    /* clip-path: polygon(0 0, calc(100% - 60px) 0, 100% 110px, 100% 100%, 0 100%); */
    border-radius: 20px;
    padding: 20px;
    padding-bottom: 30px;
    height: 100%;
}

.contnetcard:hover {
    /* box-shadow: 0 0 12px 3px #0003; */
    transform: translateY(-5px);
    transition: all .3s ease-in-out;
}

</style>
<?php include('hero.php'); ?>
<div class="lotus-overlay2">
<div class="container pt-md-2 pt-lg-3">
    <?php while (have_rows('other_ways_to_donate')) : the_row(); ?>
    <h2 class="fs-1 fw-normal animate-this text-center pt-4 mb-0"><?php the_sub_field('normal_text'); ?>
        <span class="fs-1 fw-bold text-prime"><?php the_sub_field('bold_text'); ?></span>
    </h2>
    <?php endwhile; ?>
</div>
<section class="pad pb-0 position-relative">
    <!-- <img src="<?php echo get_template_directory_uri();?>/images/logo_element.svg" alt="" class="img-fluid position-absolute end-0 top-0 z-0"> -->
    <div class="container position-relative z-2">
        <div class="row flip-767">
            <div class="col-md-5 pe-md-4 pe-lg-5">               
                <?php 
                    $cimage = get_field('image');
                    $cicon = get_field('icon');
                    include('clipy.php');
                ?>
            </div>
            <div class="d-flex align-items-center col-md-6">
                <div class="ps-xl-4">
                    <?php while (have_rows('heading')) : the_row(); ?>
                    <h2 class="fs-1 fw-normal mb-0 animate-this"><?php the_sub_field('normal_text'); ?></h2>
                    <h3 class="fs-1 fw-bold mb-3 animate-this"><?php the_sub_field('bold_text'); ?></h3>
                    <?php endwhile; ?>
                    <p class="animate-this"><?php the_field('description'); ?></p>
                    <p class="animate-this pt-1 mt-4"><a href="<?php the_field('read_more_link'); ?>" class="btn-prime py-2 px-4">Donate Now</a></p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="pad">
    <div class="container">
        <?php while (have_rows('preferences_heading')) : the_row(); ?>
        <h2 class="fs-1 fw-normal mb-0 animate-this"><?php the_sub_field('normal_text'); ?></h2>
        <h3 class="fs-1 fw-bold mb-3 animate-this"><?php the_sub_field('bold_text'); ?></h3>
        <?php endwhile; ?>

        <div class="row">
            <?php while (have_rows('preferences')) : the_row(); ?>
            <div class="col-lg-4 col-xl-3 col-md-6 pb-4 animate-this">
                <div class="contnetcard">
                    <?php 
                    $image = get_sub_field('image');
                    if ( is_array($image) && isset($image['url'], $image['alt']) ) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                        class="img-fluid w-100">
                    <?php endif; ?>
                    <h3 class="fs-5 text-prime fw-bold mt-4 animate-this"><?php the_sub_field('name'); ?></h3>
                    <p class="amount animate-this">Amount in Rs. <?php the_sub_field('amount'); ?></p>
                    <p class="desc animate-this"><?php the_sub_field('description'); ?></p>
                    <div class="animate-this">
						<button data-name="<?php the_sub_field('name'); ?>" data-amount="<?php the_sub_field('amount'); ?>" class="btn-prime addthis">ADD</button>
					</div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
</div>
<?php include('cart.php'); ?>
<?php get_footer(); ?>

<script>
jQuery(document).ready(function($) {
    $('.contnetcard h3').matchHeight();

    $('.contnetcard p.amount').matchHeight();

    $('.contnetcard p.desc').matchHeight();
});
</script>