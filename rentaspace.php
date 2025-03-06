<?php

/**
 *Template Name: Rent a Space
 */
get_header();
?>

<style>
.imgsec button {
    border-radius: 20px;
	position:sticky !important;
	top:100px;
	overflow:hidden;
}
	
	strong{
		color:inherit;
	}
</style>
<!-- Fancybox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
<!-- Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

<?php include('hero.php'); ?>
<?php include('topsection.php'); ?>
<!-- <section class="pad bg-white">
    <div class="container">
        <?php while (have_rows('why_rent_a_space_heading')) : the_row(); ?>
        <h2 class="fs-1 fw-normal animate-this text-center mb-3 mb-lg-4">
            <?php the_sub_field('normal_text'); ?>
            <span class="fw-bold text-prime"><?php the_sub_field('bold_text'); ?></span>
        </h2>
        <?php endwhile; ?>

        <div class="row pt-4 justify-content-center">
            <?php while (have_rows('why_rent_a_space_items')) : the_row(); ?>
            <div class="col-lg-4 col-md-6 pe-lg-5">
                <img src="<?php echo esc_url(get_sub_field('icon')['url']); ?>"
                            alt="<?php echo esc_attr(get_sub_field('icon')['alt']); ?>"
                            class="img-fluid animate-this" style="max-width:100px;">
                <?php the_sub_field('normal_text'); ?>
                <p class="animate-this pt-2 pt-lg-4"><?php the_sub_field('description'); ?></p>
            </div>
            <?php endwhile; ?>
        </div>
    </div>    

</section> -->


<div class="lotus-overlay2">

<section class="pad">
    <?php $kk = 0;  $i=1; while (have_rows('spaces')) : the_row(); ?>
     

    <?php 
        $first_image = get_sub_field('images_styled')[0]['image']; 
//         $first_image2 = get_sub_field('images_styled')[1]['image']; 
//         $first_image3 = get_sub_field('images_styled')[2]['image']; 
    ?>


    <div class="container container-border mb-lg-4">
        <div class="row mb-5 animate-this">
            <div class="col-md-5 imgsec pe-lg-4 pe-xl-5">
				<button  class="clickme<?php echo $i; ?> p-0">
					<img src="<?php echo esc_url($first_image['url']); ?>"
						alt="<?php echo esc_attr($first_image['alt']); ?>"
						class="img-fluid partnercard p-0">
				</button>
            </div>
            <div class="col-md-7 d-flex flex-column justify-content-center">
                <?php while (have_rows('heading')) : the_row(); ?>
                <h2 class="fs-1 fw-normal animate-this">
                    <?php the_sub_field('normal_text'); ?>
                    <span class="fw-bold text-prime"><?php the_sub_field('bold_text'); ?></span>
                </h2>
                <?php endwhile; ?>
                <div class="animate-this"><?php the_sub_field('description'); ?></div>
                <div class="d-flex gap-3 mt-4 animate-this">
                    <a href="<?php echo site_url(); ?>/contact-us" class="btn-prime py-2 px-5">Rent Now</a>
                    <a class="btn-sec py-1 px-4 clickme<?php echo $i; ?>" >View Gallery</a>
                </div>
            </div>
        </div>
    </div>
    <?php  $i++; $kk++; endwhile; ?> 
</section>
</div>

<?php while (have_rows('contact_section')) : the_row(); ?>
<!-- <div class="p-3"></div> -->
<div style="background:var(--lgr); padding:40px;"></div>
<section class="fixedbg">
    <div class="container py-5">
        <h2 class="animate-this text-white fs-1 fw-bold"><?php the_sub_field('heading'); ?></h2>
        <?php while (have_rows('paragraph')) : the_row(); ?>
        <p class="text-white my-4"><?php the_sub_field('normal_text'); ?> <span
                class="text-sec"><?php the_sub_field('orange_text'); ?></span></p>
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

<?php $campno = 1; while (have_rows('spaces')) : the_row(); ?>
<div class="gallerypopup d-none" id="gallerypopup<?php echo $campno; ?>" >
    <?php while (have_rows('images_styled')) : the_row(); ?>
    <a data-caption="<?php the_sub_field('caption'); ?>" data-fancybox="gallery-<?php echo $campno; ?>" 
       class="gallery-<?php echo $campno; ?>" 
       href="<?php echo esc_url(get_sub_field('image')['url']); ?>">
        <img src="<?php echo esc_url(get_sub_field('image')['url']); ?>" 
             alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>" 
             class="">
    </a>
    <?php endwhile; ?>
</div>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        // Trigger Fancybox when button is clicked
        $(".clickme<?php echo $campno; ?>").click(function () {
            console.log("clicked <?php echo $campno; ?>");
            $(".gallery-<?php echo $campno; ?>").first().click();
        });

        // Initialize Fancybox for this gallery
        Fancybox.bind('[data-fancybox="gallery-<?php echo $campno; ?>"]', {
            Thumbs: {
                autoStart: true, // Automatically show thumbnails
            },
            Toolbar: {
                display: ["close"], // Show only close button
            },
        });
    });
</script>
<?php $campno++; endwhile; ?>






<?php get_footer(); ?>




<script>
    jQuery(document).ready(function ($) {

        $(".owl-carousel.rentitem").owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        dotsEach: true,
        items: 1,
    });


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

<style>
   .container-border {
        border-bottom: 1px solid #00000021;
    }
    .container-border:last-child {
        border-bottom: 0;
    }
</style>