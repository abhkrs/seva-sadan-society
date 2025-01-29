<?php

/**
 *Template Name: Rent a Space
 */
get_header();
?>

<style>
.partnercard {
    clip-path: polygon(0 0,
            calc(100% - 25%) 0,
            100% 25%,
            100% 100%,
            25% 100%,
            0 calc(100% - 25%));
    border-radius: 20px;
}
</style>

<?php include('hero.php'); ?>
<?php include('topsection.php'); ?>


<?php while (have_rows('contact_section')) : the_row(); ?>
<div class="p-3"></div>
<div style="background:var(--lgr); padding:50px;"></div>
<section class="fixedbg">
    <div class="container py-5">
        <h2 class="animate-this text-white fs-1 fw-bold"><?php the_sub_field('heading'); ?></h2>
        <?php while (have_rows('paragraph')) : the_row(); ?>

        <p class="text-white my-4"><?php the_sub_field('normal_text'); ?> <span
                class="text-sec"><?php the_sub_field('orange_text'); ?></span></p>

        <?php endwhile; ?>
        <p class="animate-thi mb-2"><a class="text-sec"
                href="mailto:<?php the_sub_field('email_id'); ?>"><?php the_sub_field('email_id'); ?></a></p>
        <p class="animate-thi">
            <?php while (have_rows('phone_numbers')) : the_row(); ?>
            <a href="tel:+91 <?php the_sub_field('number_dialed'); ?>" class="text-sec">
                <?php the_sub_field('number_shown'); ?> </a>
            <?php endwhile; ?>
        </p>
    </div>
</section>
<?php endwhile; ?>


<section class="pad">
    <?php $i=1; while (have_rows('spaces')) : the_row(); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 imgsec <?php echo $i%2 ===0 ? 'ps-lg-4 ps-xl-5 order-lg-2' : 'pe-lg-4 pe-xl-5'; $i++; ?>">
                <img src="<?php echo esc_url(get_sub_field('image_1')['url']); ?>"
                    alt="<?php echo esc_attr(get_sub_field('image_1')['alt']); ?>"
                    class="img-fluid animate-this partnercard">
                <div class="row pt-3">
                    <div class="col-6 px-2">
                        <img src="<?php echo esc_url(get_sub_field('image_1')['url']); ?>"
                            alt="<?php echo esc_attr(get_sub_field('image_1')['alt']); ?>"
                            class="img-fluid animate-this rounded-3 cursor-pointer">
                    </div>
                    <div class="col-6 px-2">
                        <img src="<?php echo esc_url(get_sub_field('image_2')['url']); ?>"
                            alt="<?php echo esc_attr(get_sub_field('image_2')['alt']); ?>"
                            class="img-fluid animate-this rounded-3 cursor-pointer">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <?php while (have_rows('heading')) : the_row(); ?>
                <h2 class="fs-1 fw-normal animate-this">
                    <?php the_sub_field('normal_text'); ?>
                    <span class="fw-bold text-prime"><?php the_sub_field('bold_text'); ?></span>
                </h2>
                <?php endwhile; ?>
                <p class="animate-this"><?php the_sub_field('description'); ?></p>
                <h3 class="fs-5 fw-bold animate-this">Amenities:</h3>
                <ul class="ps-3 fs-base">
                    <?php while (have_rows('amenities')) : the_row(); ?>
                    <li class="animate-this"><?php the_sub_field('amenity'); ?></li>
                    <?php endwhile; ?>
                </ul>
                <div class="d-flex gap-3 my-3 animate-this">
                    <a href="<?php the_sub_field('rent_now_link'); ?>" class="btn-prime py-2 px-5">Rent Now</a>
                    <a href="<?php the_sub_field('rent_now_link'); ?>" class="btn-sec py-1 px-4 ">View Gallery</a>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</section>


<?php get_footer(); ?>

<script>
    jQuery(document).ready(function ($) {
    $(".cursor-pointer").click(function () {
        let newSrc = $(this).attr("src");
        let newAlt = $(this).attr("alt");
        $(this).closest(".imgsec").find(".partnercard").attr({
            "src": newSrc,
            "alt": newAlt
        });
    });
});
</script>