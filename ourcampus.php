<?php

/**
 * Template Name: Our Campus
 */
get_header();
?>

<?php include('hero.php'); ?>
<div class="lotus-overlay2">
<section class="pad position-relative">
    <!-- <img src="<?php echo get_template_directory_uri(); ?>/images/logo_element.svg" alt=""
        class="img-fluid position-absolute end-0 top-0 z-0"> -->
    <div class="container position-relative z-2">
        <div class="row flip-767">
            <div class="col-md-5 pe-md-4 pe-lg-5">
                <?php 
                $cimage = get_field('image');
                $cicon = get_field('clippy_icon');
                include('clipy.php');
                ?>
            </div>
            <div class="d-flex align-items-center col-md-7">
                <div class="ps-xl-4">
                    <?php while (have_rows('heading')) : the_row(); ?>
                    <h2 class="fs-1 fw-normal mb-0 animate-this">
                        <?php the_sub_field('normal_text'); ?>
                    </h2>
                    <h3 class="fs-1 fw-bold mb-3 animate-this">
                        <?php the_sub_field('bold_text'); ?>
                    </h3>
                    <?php endwhile; ?>
                    <p class="animate-this">
                        <?php the_field('description'); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<?php while (have_rows('contact_section')) : the_row(); ?>
<div style="background:var(--lgr); padding:40px;"></div>
<section class="fixedbg">
    <div class="container py-5">
        <h2 class="animate-this text-white fs-1 fw-bold">
            <?php the_sub_field('heading'); ?>
        </h2>
        <?php while (have_rows('paragraph')) : the_row(); ?>
        <p class="text-white my-4">
            <?php the_sub_field('normal_text'); ?> <span class="text-sec">
                <?php the_sub_field('bold_text'); ?>
            </span>
        </p>
        <?php endwhile; ?>
        <p class="animate-this mb-2">
            <img src="<?php echo get_template_directory_uri(); ?>/images/mailicon.svg" alt="email icon"
                class="img-fluid me-2" style="width:27px;">
            <a class="text-sec" href="mailto:<?php the_sub_field('email_id'); ?>">
                <?php the_sub_field('email_id'); ?>
            </a>
        </p>
        <p class="animate-this">
            <img src="<?php echo get_template_directory_uri(); ?>/images/callicon.svg" alt="phone icon"
                class="img-fluid me-2" style="width:27px;">
            <?php while (have_rows('phone_numbers')) : the_row(); ?>
            <a href="tel:+91 <?php the_sub_field('number_dialed'); ?>" class="text-sec">
                <?php the_sub_field('number_shown'); ?>
            </a>
            <?php endwhile; ?>
        </p>
    </div>
</section>
<?php endwhile; ?>
<section class="pad">
    <?php $campno = 1; while (have_rows('campuses')) : the_row(); ?>
    <div class="container text-center <?php echo $campno > 1 ? 'pt-5' : ''; ?>">
        <h2 class="fs-1 fw-bold animate-this">
            <?php the_sub_field('name'); ?>
        </h2>
        <p class="mb-4 animate-this">
            <?php the_sub_field('description'); ?>
        </p>

        <?php 
        $first_image = get_sub_field('images')[0]['image']; 
        ?>
        <button class="clickme<?php echo $campno; ?> p-0">
            <img src="<?php echo esc_url($first_image['url']); ?>" class="img-fluid tab-gallery-width rounded-4 mb-4 animate-this "
                id="campus<?php echo $campno; ?>">
        </button>
        <div class="owl-carousel tab-gallery-slide arrow animate-this campus<?php echo $campno; ?>">
            <?php while (have_rows('images')) : the_row(); ?>
            <div class="items">
                <img src="<?php echo esc_url(get_sub_field('image')['url']); ?>"
                    alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>"
                    class="img-fluid cursor-pointer rounded-4">
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php $campno++; endwhile; ?>
</section>

<?php $campno = 1; while (have_rows('campuses')) : the_row(); ?>
<div class="gallerypopup d-none" id="gallerypopup<?php echo $campno; ?>">
    <?php while (have_rows('images')) : the_row(); ?>
    <a data-caption="<?php the_sub_field('caption'); ?>" data-fancybox="gallery-<?php echo $campno; ?>"
        class="gallery-<?php echo $campno; ?>" href="<?php echo esc_url(get_sub_field('image')['url']); ?>">
        <img src="<?php echo esc_url(get_sub_field('image')['url']); ?>"
            alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>">
    </a>
    <?php endwhile; ?>
</div>
<script>
    jQuery(document).ready(function ($) {
        // Trigger Fancybox when button is clicked
        $(".clickme<?php echo $campno; ?>").click(function () {
            console.log("clicked <?php echo $campno; ?>");
            $(".gallery-<?php echo $campno; ?>").first().click();
        });

        // Initialize Fancybox for this gallery
        Fancybox.bind('[data-fancybox="gallery-<?php echo $campno; ?>"]', {
            Thumbs: {
                autoStart: true,
            },
            Toolbar: {
                display: ["close"],
            },
        });
    });
</script>
<?php $campno++; endwhile; ?>

<?php get_footer(); ?>

<script>
    jQuery(document).ready(function ($) {
        <?php $campno = 1; while (have_rows('campuses')) : the_row(); ?>
        $(".campus<?php echo $campno; ?>").owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: { items: 2 },
                768: { items: 3 },
                992: { items: 5 },
                1280: { items: 7 },
                1400: { items: 8 },
            }
        });

        $(".campus<?php echo $campno; ?> .cursor-pointer").on("click", function () {
            var clickedImageSrc = $(this).attr("src");
            $("#campus<?php echo $campno; ?>").attr("src", clickedImageSrc);
        });
        <?php $campno++; endwhile; ?>
    });
</script>
