<?php

/**
 *Template Name: Our History
 */
get_header();
?>
<style>
    .history .image img{
    /* clip-path: polygon(0 0,
            calc(100% - 30%) 0,
            100% 30%,
            100% 100%,
            30% 100%,
            0 calc(100% - 30%)); */
    border-radius: 20px;
}
.history .image {
    /* clip-path: polygon(0 0,
            calc(100% - 30%) 0,
            100% 30%,
            100% 100%,
            30% 100%,
            0 calc(100% - 30%)); */
    border-radius: 20px;
    overflow: hidden;
    z-index: 1;
    padding:2px;
    background:var(--sec);
}

.pagination-year {
    display: flex;
    gap: 8px;
    overflow-x:auto;
    padding-bottom:20px;
}

.pagination-year::-webkit-scrollbar{
    /* background:#E5912E50;
    height:5px;
    border-radius:8px;
    cursor:pointer; */
    display:none;
}
/* .pagination-year::-webkit-scrollbar-thumb{
     background:var(--sec);
     border-radius:5px;
     cursor: grab;
} */

.pagination-year .page-item {
    background: #fff;
    padding: 8px 14px;
    border-radius: 6px;
    position: relative;
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

</style>
<?php include('hero.php'); ?>
<div class="lotus-overlay2">
<section class="pad position-relative">
    <!-- <img src="<?php echo get_template_directory_uri();?>/images/logo_element.svg" alt="" class="img-fluid position-absolute end-0 top-0 z-0"> -->
    <div class="container mb-4 py-2 animate-this position-relative z-2">
        <div class="pagination-year justify-content-start">
            <?php $i = 1;
        while (have_rows('history_slider')) : the_row(); 
            $year = get_sub_field('year');
        ?>
            <button class="page-item" data-year="year<?php echo $i; $i++; ?>"><?php echo $year; ?></button>
             <?php 
        endwhile; ?>
        </div>
    </div>
    <div class="owl-carousel history hist-slide container position-relative mb-0 pt-lg-3 animate-this">
        <?php $i = 1;
        while (have_rows('history_slider')) : the_row(); 
            $year = get_sub_field('year');
        ?>
        <div class=" items" data-year="year<?php echo $i; $i++; ?>">
            <div class="row flip-767">
                <div class="col-12 col-md-5">
                    <div class="image">
                        <img src="<?php echo esc_url(get_sub_field('image')['url']); ?>"
                            alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>" class="img-fluid">
                    </div>
                </div>
                <div class="d-flex  col-12 align-items-center col-md-7 ps-md-4 ps-lg-5">
                    <div class="ps-xl-4">
                        <h2 class="fs-1 fw-normal"><?php the_sub_field('heading'); ?></h2>
                        <h3 class="fs-1 fw-bold pb-1"><?php the_sub_field('year'); ?></h3>
                        <p><?php the_sub_field('description'); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        endwhile; ?>
    </div>
</section>
</div>
<?php get_footer(); ?>
<script>
jQuery(document).ready(function($) {
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

    var owl = $(".history");
    owl.owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        items: 1,
        onChanged: function(event) {
            var currentIndex = event.item.index;
            var currentSlide = $(".owl-item").eq(currentIndex).find('.items');
            var currentYear = currentSlide.data('year');
            $(".page-item").removeClass("active");
            $(".page-item[data-year='" + currentYear + "']").addClass("active");
            setTimeout(centerActiveItem, 10);
        }
    });

    $(".page-item").first().addClass("active");
    setTimeout(centerActiveItem, 100);

    $(".page-item").on("click", function() {
        var year = $(this).data("year");
        var slideIndex = $('.owl-item:not(.cloned) .items[data-year="' + year + '"]').parent().index();
        owl.trigger('to.owl.carousel', [slideIndex, 300]);
        $(".page-item").removeClass("active");
        $(this).addClass("active");
        setTimeout(centerActiveItem, 10);
    });

    let resizeTimeout;
    $(window).on('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(centerActiveItem, 100);
    });

    $(window).on('load', centerActiveItem);
});
</script>