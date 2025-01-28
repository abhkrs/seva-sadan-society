<?php

/**
 *Template Name: Our History
 */
get_header();
?>
<style>
.history .image {
    clip-path: polygon(0 0,
            calc(100% - 30%) 0,
            100% 30%,
            100% 100%,
            30% 100%,
            0 calc(100% - 30%));
    border-radius: 20px;
    border: 2px solid var(--sec);
    overflow: hidden;
    z-index: 1;
}

.pagination-year {
    display: flex;
    gap: 8px;
}

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
<section class="p-3 p-md-4">
    <div class="container mb-4 py-2 animate-this">
        <div class="pagination-year">
            <?php 
        $years = array();
        while (have_rows('history_slider')) : the_row(); 
            $years[] = get_sub_field('year');
        endwhile; 
        $years = array_unique($years);
        sort($years);
        foreach ($years as $year) : ?>
            <button class="page-item" data-year="<?php echo $year; ?>"><?php echo $year; ?></button>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="owl-carousel history container position-relative pt-lg-3 animate-this">
        <?php 
        while (have_rows('history_slider')) : the_row(); 
            $year = get_sub_field('year');
        ?>
        <div class=" items" data-year="<?php echo $year; ?>">
            <div class="row">
                <div class=" col-md-6">
                    <div class="image">
                        <img src="<?php echo esc_url(get_sub_field('image')['url']); ?>"
                            alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>" class="img-fluid">
                    </div>
                </div>
                <div class="d-flex align-items-center col-md-6 ps-md-4 ps-lg-5">
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
<?php get_footer(); ?>
<script>
jQuery(document).ready(function($) {
    var owl = $(".history");
    owl.owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: true,
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
        }
    });

    $(".page-item").first().addClass("active");

    $(".page-item").on("click", function() {
        var year = $(this).data("year");
        var targetSlide = $(".items[data-year='" + year + "']");
        owl.trigger("to.owl.carousel", [targetSlide.closest('.owl-item').index() + 1, 300]);
        $(".page-item").removeClass("active");
        $(this).addClass("active");
    });
});
</script>