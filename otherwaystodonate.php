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
    clip-path: polygon(0 0, calc(100% - 18%) 0, 100% 20%, 100% 100%, 0 100%);
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
<div class="container pt-md-2 pt-lg-3">
    <?php while (have_rows('other_ways_to_donate')) : the_row(); ?>
    <h2 class="fs-1 fw-normal animate-this text-center pt-4 mb-0"><?php the_sub_field('normal_text'); ?>
        <span class="fs-1 fw-bold text-prime"><?php the_sub_field('bold_text'); ?></span>
    </h2>
    <?php endwhile; ?>
</div>
<?php include('topsection.php'); ?>

<section class="pad">
    <div class="container">
        <?php while (have_rows('preferences_heading')) : the_row(); ?>
        <h2 class="fs-1 fw-normal mb-0 animate-this"><?php the_sub_field('normal_text'); ?></h2>
        <h3 class="fs-1 fw-bold mb-3 animate-this"><?php the_sub_field('bold_text'); ?></h3>
        <?php endwhile; ?>

        <div class="row">
            <?php while (have_rows('preferences')) : the_row(); ?>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="contnetcard">
                    <?php 
                    $image = get_sub_field('image');
                    if ( is_array($image) && isset($image['url'], $image['alt']) ) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                        class="img-fluid w-100">
                    <?php endif; ?>
                    <h3 class="fs-5 text-prime fw-bold mt-4"><?php the_sub_field('name'); ?></h3>
                    <p class="amount">Amount in Rs. <?php the_sub_field('amount'); ?></p>
                    <p class="desc"><?php the_sub_field('description'); ?></p>
                    <a href="#" class="btn-prime py-2 px-5 d-block w-fit">ADD</a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>

<script>
jQuery(document).ready(function($) {
    $('.contnetcard h3').matchHeight();

    $('.contnetcard p.amount').matchHeight();

    $('.contnetcard p.desc').matchHeight();
});
</script>