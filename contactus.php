<?php

/**
 * Template Name: Contact Us
 */
get_header();
?>
<style>
.pagination-year {
    display: flex;
    gap: 8px;
    overflow-x: auto;
    padding-bottom: 20px;
    justify-content: flex-start;
}

.pagination-year::-webkit-scrollbar {
    /* background: #E5912E50;
    height: 5px;
    border-radius: 8px;
    cursor: pointer; */
    display:none;
}

/* .pagination-year::-webkit-scrollbar-thumb {
    background: var(--sec);
    border-radius: 5px;
    cursor: grab;
} */

.pagination-year .page-item {
    background: #fff;
    padding: 8px 80px;
    border-radius: 6px;
    position: relative;
    cursor: pointer;
    white-space: nowrap;
}

.pagination-year .page-item:hover,
.pagination-year .page-item.active {
    background-color: var(--sec);
    color: #fff;
}

.pagination-year .page-item.active::after {
    content: "";
    position: absolute;
    bottom: -12px;
    right: 50%;
    transform: translateX(50%);
    border-top: 14px solid var(--sec);
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    width: 0;
    height: 0;
}

.content-tab {
    display: none;
}

.content-tab.active {
    display: flex;
}
iframe {
    border-radius: 20px;
    box-shadow: 0 0 30px 0 #00000024;
}
</style>
<?php include('hero.php'); ?>
<section class="pad lotus-overlay2" id="tab2contact">
    <div class="container position-relative z-2">
        <div class="row justify-content-center">
                <?php $i=1; while (have_rows('category')) : the_row(); ?>
                <?php 
                        $cimage = get_sub_field('image');
                        $cicon = get_sub_field('cllipy_icon');
                        //include('clipy.php');
                ?>

                <div class="col-12 col-lg-4  animate-this border-design">
                    <div class="hover text-center h-100 p-4 img-radius " -style="box-shadow: 0 0 20px 0 #00000030;">
                        <?php if($cicon) { ?>
                        <div class="d-flex align-items-center justify-content-center bg-sec shadow-lg rounded-circle p-2 mx-auto mb-2" style="width:100px; aspect-ratio:1;">
                            <img src="<?php echo esc_url($cicon['url']); ?>"  alt="<?php echo esc_attr($cicon['alt']); ?>" class="img-fluid">
                        </div>
                        <?php } ?>
                        <?php while (have_rows('heading')) : the_row(); ?>
                        <h4 class="fw-bold  pt-2 "><?php the_sub_field('normal_text'); ?> <?php the_sub_field('bold_text'); ?></h4>
                        <?php endwhile; ?>
                        <p class="">
                            <?php while (have_rows('paragraph')) : the_row(); ?><?php the_sub_field('normal_text'); ?>
                            <span class="fw-bold"><?php the_sub_field('bold_text'); ?></span>
                            <?php endwhile; ?>
                        </p>
                        <p class="mb-1 text-sec">
                            <a href="mailto:<?php the_sub_field('email_id'); ?>"><?php the_sub_field('email_id'); ?></a>
                        </p>
                        <p class=" text-sec mb-0 pb-0">
                            <?php while (have_rows('phone_numbers')) : the_row(); ?>
                            <a
                                href="tel:+91<?php the_sub_field('number_dialed'); ?>"><?php the_sub_field('number_shown'); ?></a>
                            <?php endwhile; ?>
                        </p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>


<div style="background:var(--lgr); padding:50px;"></div>
<section class="">
    <div class="container py-5">
        <div class="row">
        <?php while (have_rows('contact_section_green')) : the_row(); ?>
            <div class="col-12 col-lg-6 pe-lg-5">
                <h2 class="animate-this text-prime fs-1 fw-bold"><?php the_sub_field('heading'); ?></h2>
                <p class="text-black animate-this mt-4 d-flex">
                    <img src="<?php echo get_template_directory_uri();?>/images/mapicon.svg" alt="map icon"
                        class="img-fluid me-3" style="width:27px;">
                    <?php the_sub_field('address'); ?>
                </p>
                <p class="animate-this">
                    <img src="<?php echo get_template_directory_uri();?>/images/mailicon.svg" alt="email icon"
                        class="img-fluid me-3" style="width:27px;">
                    <a class="text-black"
                        href="mailto:<?php the_sub_field('email_id'); ?>"><?php the_sub_field('email_id'); ?></a>
                </p>
                <p class="animate-this">
                    <img src="<?php echo get_template_directory_uri();?>/images/callicon.svg" alt="phoone icon"
                        class="img-fluid me-3" style="width:27px;">
                    <?php while (have_rows('phone_numbers')) : the_row(); ?>
                    <a href="tel:+91 <?php the_sub_field('number_dialed'); ?>" class="text-black">
                        <?php the_sub_field('number_shown'); ?> </a>
                    <?php endwhile; ?>
                </p>
                <p class="text-white animate-this pt-3">
                    <a href="<?php the_sub_field('view_location_link'); ?>" target="_blank" class="btn-prime px-4 py-2">View Location</a>
                </p>
            </div>
            <?php endwhile; ?>
            <div class="col-12 col-lg-6">
                <?php the_field('map'); ?>
            </div>
        </div>
        
    </div>
</section>


<section class="pad">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 pe-lg-4 pb-4 pb-lg-0">
                <div class="bg-white rounded-4 shadow h-100 ms-xl-2  form-padd animate-this">
                    <h2 class="fs-1 fw-bold mb-4 animate-this"><?php the_field('form_heading'); ?></h2>
                    <?php $form = get_field('form_shortcode'); echo do_shortcode($form); ?>
                </div>
            </div>
            <div class="col-lg-5 d-flex align-items-center">
                <div class="ps-lg-4">
                    <h3 class="fs-1 fw-bold mb-4 animate-this"><?php the_field('form_heading'); ?></h3>
                    <div class="fs-base animate-this">
                        <?php the_field('form_description'); ?>
                        <a class="text-sec d-block" style="margin-top:-1rem;"
                            href="mailto:<?php the_field('email_id'); ?>"><?php the_field('email_id'); ?></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
jQuery(document).ready(function ($) {
    function centerActiveItem() {
        const container = $('.pagination-year');
        const activeItem = $('.pagination-year .page-item.active');

        if (activeItem.length) {
            const viewportWidth = $(window).width();
            const itemOffset = activeItem.offset().left;
            const itemWidth = activeItem.outerWidth();

            const targetPosition = (viewportWidth / 2) - (itemWidth / 2);
            const scrollNeeded = itemOffset - targetPosition;

            const currentScroll = container.scrollLeft();
            const newScrollPosition = currentScroll + scrollNeeded;

            container.animate({
                scrollLeft: newScrollPosition
            }, 300);
        }
    }

    $('.pagination-year .page-item').on('click', function () {
        $('.pagination-year .page-item').removeClass('active');
        $('.content-tab').removeClass('active');
        $(this).addClass('active');

        const tabId = $(this).data('tab');
        $('#' + tabId).addClass('active');

        setTimeout(centerActiveItem, 10);
    });

    let resizeTimeout;
    $(window).on('resize', function () {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(centerActiveItem, 100);
    });

    $(window).on('load', centerActiveItem);
    setTimeout(centerActiveItem, 100);

    const urlParams = new URLSearchParams(window.location.search);
    const tabParam = urlParams.get('tab');

    if (tabParam) {
        const targetTab = $(`.page-item[data-tab='tab-${tabParam}']`);
        
        $('html, body').animate({
            scrollTop: $('#tab2contact').offset().top - 100
        }, 700);

        if (targetTab.length) {
            targetTab.trigger('click');

        }
    }

    

});

</script>

<?php get_footer(); ?>