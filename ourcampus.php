<?php

/**
 *Template Name: Our Campus
 */
get_header();
?>

<?php include('hero.php'); ?>
<?php include('topsection.php'); ?>
<?php while (have_rows('contact_section')) : the_row(); ?>
<div style="background:var(--lgr); padding:40px;"></div>
<section class="fixedbg">
    <div class="container py-5">
        <h2 class="animate-this text-white fs-1 fw-bold"><?php the_sub_field('heading'); ?></h2>
        <?php while (have_rows('paragraph')) : the_row(); ?>

        <p class="text-white my-4"><?php the_sub_field('normal_text'); ?> <span
                class="text-sec"><?php the_sub_field('bold_text'); ?></span></p>

        <?php endwhile; ?>
        <p class="animate-this mb-2">
             <img src="<?php echo get_template_directory_uri();?>/images/mailicon.svg" alt="email icon" class="img-fluid me-2" style="width:27px;">
            <a class="text-sec" href="mailto:<?php the_sub_field('email_id'); ?>"><?php the_sub_field('email_id'); ?></a></p>
           <p class="animate-this">
            <img src="<?php echo get_template_directory_uri();?>/images/callicon.svg" alt="phoone icon" class="img-fluid me-2" style="width:27px;">
            <?php while (have_rows('phone_numbers')) : the_row(); ?>
            <a href="tel:+91 <?php the_sub_field('number_dialed'); ?>" class="text-sec">
                <?php the_sub_field('number_shown'); ?> </a>
            <?php endwhile; ?>
        </p>
    </div>
</section>
<?php endwhile; ?>
<section class="pad">
    <?php $campno = 1; while (have_rows('campuses')) : the_row(); ?>
    <div class="container text-center <?php echo $campno > 1 ? 'pt-5' : ''; ?>">
        <h2 class="fs-1 fw-bold animate-this"><?php the_sub_field('name'); ?></h2>
        <p class="mb-4 animate-this"><?php the_sub_field('description'); ?></p>
        <?php 
        $first_image = get_sub_field('images')[0]['image']; 
        ?>
        <img src="<?php echo esc_url($first_image['url']); ?>" class="img-fluid w-100 rounded-4 mb-4 animate-this"
            id="campus<?php echo $campno; ?>">

        <div class="owl-carousel arrow animate-this campus<?php echo $campno; $campno++; ?>">
            <?php while (have_rows('images')) : the_row(); ?>
            <div class="items">
                <img src="<?php echo esc_url(get_sub_field('image')['url']); ?>"
                    alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>"
                    class="img-fluid cursor-pointer rounded-4">
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php endwhile; ?>
</section>


<?php get_footer(); ?>

<script>
jQuery(document).ready(function($) {
    <?php $campno = 1; while (have_rows('campuses')) : the_row(); ?>
    $(".campus<?php echo $campno;?>").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 2,
            },
            768: {
                items: 3,
            },
            992: {
                items: 4,
            },
            1400: {
                items: 5,
            }
        }
    });

    $(".campus<?php echo $campno;?>").on('changed.owl.carousel', function(event) {
        var currentIndex = event.item.index;
        var currentImageSrc = $(event.target)
            .find(".owl-item")
            .eq(currentIndex)
            .find("img")
            .attr("src");
        $("#campus<?php echo $campno;?>").attr("src", currentImageSrc);
    });

    $(".campus<?php echo $campno;?> .cursor-pointer").on("click", function() {
        var clickedImageSrc = $(this).attr("src");
        $("#campus<?php echo $campno; ?>").attr("src", clickedImageSrc);
    });
    <?php $campno++; endwhile; ?>
});
</script>