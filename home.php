<?php
/**
 *Template Name: Home
 */
get_header();
?>

<style>
.hero .container,
.hero {
    height: 660px;
}

.hero .heroimage {
    position: absolute;
    right: 0;
    height: 100%;
    top: 0;
}

.contnetcard {
    /* box-shadow: 0 0 5px 0 #0001; */
    transition: all .3s ease-in-out;
    background: #fff;
    /* clip-path: polygon(0 0, calc(100% - 90px) 0, 100% 90px, 100% 100%, 0 100%); */
    border-radius: 20px;
    padding: 20px;
}
.contnetcard img {
    /* clip-path: polygon(0 0, calc(100% - 80px) 0, 100% 80px, 100% 100%, 0 100%); */
    border-radius: 20px;
}
</style>

<section class="hero home-banner">
    <img src="<?php echo get_template_directory_uri(); ?>/images/logofl.svg" alt="graphicimage"
        class="img-fluid graphicimage">
    <?php 
    $hero_image = get_field('banner_image');
    if ( is_array($hero_image) && isset($hero_image['url'], $hero_image['alt']) ) : ?>
    <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>"
        class="img-fluid heroimage">
    <?php endif; ?>

    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-sm-10 col-md-11 col-lg-8 col-xl-7  col-xxl-7 pe-xl-4 pb-lg-5 d-flex flex-column justify-content-center gap-2 h-100">
                <?php if ( get_field('banner_white_text') ) : ?>
                <h3 class="text-white fs-1 fw-normal animate-this">
                    <?php echo esc_html(get_field('banner_white_text')); ?></h3>
                <?php endif; ?>

                <?php if ( get_field('banner_orange_text') ) : ?>
                <h1 class="text-sec fw-bold animate-this"><?php echo esc_html(get_field('banner_orange_text')); ?></h1>
                <?php endif; ?>

                <?php if ( get_field('banner_description') ) : ?>
                <p class="text-white mt-lg-3 animate-this"><?php echo esc_html(get_field('banner_description')); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php include('zoomSliderHome.php')?>

<div class="bg-grade py-3 py-lg-5 ">
</div>
<section class="fixedbg pad">
    <div class="container ">
        <?php while (have_rows('impacting_lives')) : the_row(); ?>
        <h2 class="animate-this text-white fs-1 fw-normal text-center"><?php the_sub_field('normal_text'); ?> <span
                class="fw-bold text-white"><?php the_sub_field('bold_text'); ?></span></h2>
        <?php endwhile; ?>
        <div class="row pt-4">
            <?php while (have_rows('impacting_lives__facts')) : the_row(); ?>
            <div class="col-md-6 col-lg-4 pe-lg-3 pe-xl-5 numcont text-center">
                <h3 class="text-sec fw-bold animate-this number counter-font"><?php the_sub_field('number'); ?></h3>
                <p class="animate-this fs-base text-white"><?php the_sub_field('description'); ?>
                </p>
            </div>
            <?php endwhile; ?>
        </div>
        <!-- <hr class="text-white"> -->
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3 gap-md-4 gap-lg-5">
            <p class="text-white fw-light animate-this pe-xl-5"><?php the_field('impacting_lives_description'); ?></p>
			<?php if (!empty(get_field('donate_now_link'))) : ?>
				<div class="text-white animate-this ps-lg-5">
					<a href="<?php the_field('donate_now_link'); ?>" class="btn-prime">Donate&nbsp;Now</a>
				</div>
			<?php endif; ?>

        </div>
    </div>
</section>

<section class="pad">
    <div class="container">
        <?php while (have_rows('latest_at_seva_sadan_society_')) : the_row(); ?>
        <h2 class="animate-this text-center fs-1 fw-normal"><?php the_sub_field('normal_text'); ?> <span
                class="fw-bold text-prime"><?php the_sub_field('bold_text'); ?></span></h2>
        <?php endwhile; ?>
        <p class="text-center animate-this mw-1000 mx-auto pt-2 h2-mb">
            <?php the_field('latest_at_seva_sadan_society_description'); ?></p>
        <div class="owl-carousel blogs dots">
            <?php
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 6,
                'orderby'        => 'date',
                'order'          => 'DESC'
            );
            $query = new WP_Query($args);

            if ($query->have_posts()):
                while ($query->have_posts()):
                    $query->the_post();
            ?>
            <div class="items">
                <a class="contnetcard d-block" href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url(get_field('hero_image')['url']); ?>"
                        alt="<?php echo esc_attr(get_field('hero_image')['alt']); ?>" class="img-fluid w-100 h-100 object-fit-cover" style="aspect-ratio:4/3;">
                    <div class="text mt-3 text-sec"><?php echo get_the_date('j F, Y'); ?></div>
                        <h3 class="fs-5 fw-semibold mt-2 mb-4"><?php the_title(); ?></h3>
                    <span class="btn-prime d-block w-fit py-2 px-4" >Read More</span>
                </a>
            </div>
            <?php endwhile; ?>
            <?php endif; wp_reset_postdata();?>
        </div>
    </div>
</section>
<section class="position-relative z-2">
    <div class="container">
        <?php while (have_rows('our_space')) : the_row(); ?>
        <h2 class="animate-this text-center fs-1 fw-normal"><?php the_sub_field('normal_text'); ?> <span
                class="fw-bold text-prime"><?php the_sub_field('bold_text'); ?></span></h2>
        <?php endwhile; ?>
        <p class="text-center animate-this mw-1000 mx-auto pt-2 h2-mb"><?php the_field('our_space_description'); ?></p>
        <div class="owl-carousel space dots ">
            <?php while (have_rows('our_space_slide')) : the_row(); ?>
                <a href="<?php echo esc_url(get_sub_field('image')['url']); ?>" class="items magnifier"  data-fancybox="gallery" data-caption="<?php echo the_sub_field('title'); ?>">
                    <img src="<?php echo esc_url(get_sub_field('image')['url']); ?>"
                alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>" class="img-fluid w-100 rounded-4">
                </a>
            <?php endwhile; ?>
        </div>
        <p class="text-center h2-mt">
            <a href="<?php the_field('our_space_view_more'); ?>" class="btn-prime px-5 py-2">View More</a>
        </p>
    </div>
</section>
<section class="pad pt-0 pb-0 lotus-overlay position-relative z-1">
    <div class="container">
        <div class="owl-carousel testimonial animate-this">
            <?php while (have_rows('testimonials', 'options')) : the_row(); ?>
            <div class="testimonialwrap items mb-3">
                <img src="<?php echo get_template_directory_uri();?>/images/quote.webp" alt="quote"
                    class="img-fluid quote">
                <div class="content">
                    <p class="fw-normal"><?php the_sub_field('message'); ?></p>
                    <h4 class="fs-5 fw-bold"><?php the_sub_field('author'); ?></h4>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <div class="last-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7">
                    <h2 class="fs-2 fw-normal mb-0 animate-this animated text-grade"><?php the_field('bottom_title'); ?> </h2>
                    <a class="fs-1 fw-bold mb-0 animate-this animated text-grade text-underline" -href="<?php the_field('bottom_link'); ?>"><?php the_field('bottom_link_text'); ?> </a>
                </div>
            </div>
        </div>
        <img src="<?php the_field('bottom_image'); ?>" alt="" class="right-child">
    </div>
</section>


<?php get_footer(); ?>
<script>
jQuery(document).ready(function($) {
    // $(".owl-carousel.testimonial").owlCarousel({
    //     loop: true,
    //     margin: 10,
    //     nav: false,
    //     dots: true,
    //     autoplay: true,
    //     autoplayTimeout: 5000,
    //     autoplayHoverPause: true,
    //     items: 1,
    // });
    $(".owl-carousel.blogs").owlCarousel({
        loop: true,
        margin: 16,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        dotsEach: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 3,
            },
            1200: {
                items: 3,
            }
        }
    });
    $(".owl-carousel.space").owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        dotsEach: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 3,
            },
            1200: {
                items: 3,
            }
        }
    });

    jQuery(document).ready(function($) {
    $(".owl-carousel.testimonial").owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            items: 1,
        });
    });

    $('.blogs h3').matchHeight();

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
        $('.numcont').each(function() {
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
