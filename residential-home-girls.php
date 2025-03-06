<?php

/**
 *Template Name: Services
 */
get_header();
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/general.css">
<style>
    .contnetcard {
        transition: all .3s ease-in-out;
        background: #fff;
        border-radius: 20px;
        padding: 30px;
        height: 100%;
        box-shadow: 0 0 5px 0 #0001;
    }

    .contnetcard img {
        aspect-ratio: 16/5;
        object-fit: contain;
        margin: auto;
    }

    .contnetcard:hover {
        transform: translateY(-5px);
        transition: all .3s ease-in-out;
        box-shadow: 0 0 12px 3px #0003;
    }
	
	.all-white> *, .all-white > * *{
		color:#fff;
	}
   
   

  
</style>


<?php include('hero.php'); ?>

<div class="lotus-overlay2">
<section class="pad position-relative">
    <!-- <img src="<?php echo get_template_directory_uri();?>/images/logo_element.svg" alt="" class="img-fluid position-absolute end-0 top-0 z-0"> -->
    <div class="container position-relative z-2">
        <div class="row flip-767">
            <div class="col-md-5 pe-md-4 pe-lg-5">                
            <?php 
                $cimage = get_field('cllipy_image');
                $cicon = get_field('cllipy_icon');
                include('clipy.php');
            ?>
            </div>
            <div class="d-flex align-items-center col-md-7">
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

<?php if( get_field('counter_showhide') ) { ?>
<?php if (get_field('counter_style') === 'Style1') : ?>
<section class="-bg-cover pad pt-0"
    -style="background:url('<?php echo get_template_directory_uri(); ?>/images/counter_bg.webp') top center no-repeat">
    <div class="container ">
        <div class="row justify-content-center ">
            <div class="col-12">
                <div class="text-border">
                    <h2 class="fs-1 fw-bold text-center"> <?php the_field('counter_section_title'); ?></h2>
                </div>                
            </div>
            <div class="col-12 counter-lr-space">                
                <?php if( have_rows('counter') ): ?>
                <ul class="grid-4 mt-4 mt-lg-5 countgrid">
                <?php while( have_rows('counter') ) : the_row(); ?>
                    <li class="text-center">
                        <h3 class="text-prime2 fs-1 number "> <?php the_sub_field('number'); ?></h3>
                        <div class="">
                        <?php the_sub_field('title'); ?>
                        </div>
                    </li>
                    <?php endwhile; ?>    
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<div class="container">
<hr>
</div>
<?php endif; ?>
<?php if (get_field('counter_style') === 'Style2') : ?>
<section class="bg-cover pad pt-0"
    -style="background:url('<?php echo get_template_directory_uri(); ?>/images/counter_bg.webp') top center no-repeat">
    <div class="container ">
        <div class="row justify-content-center ">
            <div class="col-12">
                <div class="text-border ">
                    <h2 class="fs-1 fw-bold text-center "> <?php the_field('counter_style_2_title'); ?> <span><?php the_field('counter_style_2_bold_title'); ?></span></h2>
                    </div>
                </div>
            <div class="col-12 counter-lr-space">                
                <?php if( have_rows('without_counter_style') ): ?>
                <ul class="flex1 mt-4 mt-lg-5">
                <?php while( have_rows('without_counter_style') ) : the_row(); ?>
                    <li class="text-center">
                        <div class="text-prime2 fs-2 fs-2-style2 mb-2 fw-bold"> <?php the_sub_field('title'); ?></div>
                        <div class="">
                        <?php the_sub_field('description'); ?>
                        </div>
                    </li>
                    <?php endwhile; ?>    
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<div class="container">
<hr>
</div>
<?php endif; ?>
<?php } ?>

<?php include('tab-slider.php'); ?>
</div>

<?php if( get_field('apply_showhide') ) { ?>
<div class="bg-grade py-3 py-lg-5 ">
</div>
<section class="bg-cover pad"
    style="background:url('<?php echo get_template_directory_uri(); ?>/images/counter_bg.webp') top center no-repeat">
    <div class="container ">
  
		<h2 class="fs-1 fw-normal mb-0 animate-this mb-4 text-white"><?php the_field('apply_section_title'); ?> <span
																													  class="fw-bold text-white"><?php the_field('apply_section_bold_title'); ?></span></h2>
		<div class="animate-this text-white all-white"><?php the_field('apply_section_description'); ?></div>
		<div class="d-flex align-items-center justify-content-center justify-content-md-end mt-4">
			<?php 
										 $fee_structure = get_field('fee_structure'); 
										 if (!empty($fee_structure)): ?>
			<a href="<?php echo esc_url($fee_structure); ?>" target="_blank" class="btn-prime">Fee Structure</a>
			<?php endif; ?>
		</div>
    </div>
</section>
<?php } ?>


<?php if( get_field('enable_logo_slider') ) { ?>
<section class="bg-white pad">
    <div class="container  animate-this">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center fs-1"><?php the_field('logo_slider_main_title'); ?></h2>
                <div class="text text-center max"><?php the_field('logo_slider_description'); ?></div>
                <div class="logo-slide">
                    <div class="owl-carousel logo-row static  ">
                        <?php $i=1; while (have_rows('logos')) : the_row(); ?>
                        <div class="item">
                            <a href="#partner<?php echo $i; $i++?>" >
                                <img src="<?php the_sub_field('images'); ?>">
                            </a>
                        </div>
                       
                        <?php endwhile; ?>
                    </div>            
                </div>
            </div>
        </div>
        
</section>

<style>
.logo-slide {
    /* overflow: hidden;
    white-space: nowrap !important; */
    padding-top: 10px;
    padding-bottom: 10px;
}

.logo-row {
    padding: 10px 0px;
}
.logo-row .owl-stage-outer{
    display:flex;
    justify-content:center;
}
.logo-row .owl-stage-outer .owl-stage{
    display:flex;
}

.logo-row a img {
    object-fit: contain;
    height: 80px !important;
}

.logo-row a {
    /* width: 300px !important; */
    border: 1px solid #CFCBCB;
    padding: 26px;
    border-radius: 14px;
    background: #fff;
    text-align: center;
    display: block;
}

/* .logo-slide:hover .logo-row {
    animation-play-state: paused;
} */


</style>

<?php } ?>

<!-- 
<div class="container tab-styles pad">
<h2 class="fs-1 fw-normal mb-0 animate-this text-center mb-4 animated"> English School fee structure for  <span class="fw-bold">Academic Years</span> 
</h2>
   
    <ul class="nav nav-pills  mb-3  mt-5 " id="pills-tab" role="tablist">
    <?php $i=0; while( have_rows('academic_year_tabs_content') ) : the_row();  $i++;?>
        <li class="nav-item" role="presentation">
            <button class="<?php if($i==1){ echo "active";} ?>" id="pills-home-tab<?php echo $i; ?>" data-bs-toggle="pill" data-bs-target="#pills-home<?php echo $i; ?>" type="button" role="tab" aria-controls="pills-home<?php echo $i; ?>"  aria-selected="<?php echo $i==1? "true":"false"; ?>">
            <?php get_sub_field('tab_title'); ?>
            </button>
        </li>
        <?php endwhile; ?>
    </ul>
    

    <div class="tab-content  mt-5" id="pills-tabContent">
    <?php $i=0; while( have_rows('academic_year_tabs_content') ) : the_row();  $i++;?>
        <div class="tab-pane fade <?php if($i==1){ echo "show active";} ?> " id="pills-home<?php echo $i; ?>" role="tabpanel" aria-labelledby="pills-home-tab<?php echo $i; ?>" tabindex="0">
            <div class="tab-grid-3 scrollbar">           
                <div class="tab-grid ">
                    <div class="text-prime2 fw-semibold">
                     Particulars
                    </div>
                    <?php while( have_rows('tab_content') ) : the_row(); ?>
                        <div class="span <?php if(get_sub_field('is_heading') ) { echo "text-prime2 fw-semibold ";  } ?> <?php if(get_sub_field('total') ) { echo "total";  } ?>"> <?php the_sub_field('particulars'); ?></div>
                    <?php endwhile; ?> 
                </div>                
                <div class="tab-grid">
                    <div class="text-prime2 fw-semibold">
                        New Students:
                    </div>
                    <?php while( have_rows('tab_content') ) : the_row(); ?>
                    <div class="span <?php if(get_sub_field('total') ) { echo "total";  } ?>"> <?php  get_sub_field('new_students'); ?></div>
                    <?php endwhile; ?>
                </div>
                <div class="tab-grid ">
                    <div class="text-prime2 fw-semibold">
                    Existing Students:
                    </div>
                    <?php while( have_rows('tab_content') ) : the_row(); ?>
                    <div class="span <?php if(get_sub_field('total') ) { echo "total";  } ?>"> <?php get_sub_field('existing_students'); ?></div>
                    <?php endwhile; ?>
                </div> 
            </div>
        </div>
        <?php endwhile; ?>
    </div>
   
</div> -->


<?php include('meet-carousal.php'); ?>
<style>
    
   



</style>
<section class="pad  lotus-overlay">
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
    <!-- <div class="last-section style2">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7">
                    <h2 class="fs-2 fw-normal mb-0 animate-this animated text-grade"><?php get_field('bottom_title'); ?> </h2>
                    <a class="fs-1 fw-bold mb-0 animate-this animated text-grade text-underline" href="<?php get_field('bottom_link'); ?>"><?php get_field('bottom_link_text'); ?> <img src="<?php echo get_template_directory_uri()?>/images/arrow-right.svg" alt=""></a>
                </div>
            </div>
        </div>
        <img src="<?php get_field('bottom_image'); ?>" alt="" class="right-child">
    </div> -->
</section>


<script>
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

    $(".logo-row").owlCarousel({
    loop: false,
    margin: 20,  // Margin ko 0 kar dekh sakte hain
    nav: true,
    dots: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 3
        }
    }
});
   
    

});
</script>



<?php get_footer(); ?>


<script>
jQuery(document).ready(function($) {
    $('.tab-grid-3 .tab-grid .span').matchHeight({
        byRow: true,
        property: 'height',
    });
})


jQuery(document).ready(function($) {    
   
    // $('.tab-grid span').matchHeight();

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
        $('.countgrid li').each(function() {
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