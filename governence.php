<?php

/**
 *Template Name: Governance & Registration
 */
get_header();
?>
<style>
    .contnetcard {
    transition: all .3s ease-in-out;
    background: #fff;
    border-radius: 20px;
    padding: 30px;
    height:100%;
    box-shadow: 0 0 5px 0 #0001;
}

.contnetcard img{
    aspect-ratio:16/5;
    object-fit:contain;
    margin:auto;
}

.contnetcard:hover {
    transform: translateY(-5px);
    transition: all .3s ease-in-out;
        box-shadow: 0 0 12px 3px #0003;
}
</style>
<?php include('hero.php'); ?>
<section class="pad">
    <div class="container">
        <div class="row">
            <div class="col-md-6 pe-md-4 pe-lg-5">
                <div class="image animate-this">
                    <img src="<?php echo esc_url(get_field('image')['url']); ?>"
                        alt="<?php echo esc_attr(get_field('image')['alt']); ?>" class="img-fluid">
                </div>
            </div>
            <div class="d-flex align-items-center col-md-6">
                <div class="ps-xl-4">
                    <?php while (have_rows('heading')) : the_row(); ?>
                    <h2 class="fs-1 fw-normal mb-0 animate-this"><?php the_sub_field('normal_text'); ?></h2>
                    <h3 class="fs-1 fw-bold mb-3 animate-this"><?php the_sub_field('bold_text'); ?></h3>
                    <?php endwhile; ?>
                    <p class="animate-this"><?php the_field('description'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

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
        <?php while (have_rows('our_supporters')) : the_row(); ?>
        <h2 class="fs-1 fw-normal animate-this mb-3"><?php the_sub_field('normal_text'); ?>  <span class="fs-1 fw-bold text-prime"><?php the_sub_field('bold_text'); ?></span></h2>
        <?php endwhile; ?>

         <div class="row justify-content-center">
            <?php while (have_rows('our_supporters_list')) : the_row(); ?>
            <div class="col-md-6 col-lg-4 col-xl-3 animate-this pt-4 p-2">
                <div class="contnetcard">
                    <?php 
                    $image = get_sub_field('icon');
                    if ( is_array($image) && isset($image['url'], $image['alt']) ) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                        class="img-fluid w-100">
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>