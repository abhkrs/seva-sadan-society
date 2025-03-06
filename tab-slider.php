<style>
    .history .image {
        /* clip-path: polygon(0 0,
            calc(100% - 30%) 0,
            100% 30%,
            100% 100%,
            30% 100%,
            0 calc(100% - 30%));
    border: 2px solid var(--sec); */

        border-radius: 20px;
        overflow: hidden;
        z-index: 1;
    }

    .pagination-year {
        display: flex;
        gap: 8px;
        justify-content: center;
    }

    .pagination-year .page-item {
        background: #fff;
        padding: 8px 14px;
        border-radius: 6px;
        position: relative;
        width:20%;
        flex:20%;
        max-width:20%;
        
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
<?php if(get_field('tab_slider_styles')=="style1"){   ?>
<section class="pad">
    <div class="container  animate-this">
        <h2 class="fs-1 fw-normal mb-0 animate-this text-center mb-4"> <?php the_field('tab_slider_title'); ?> <span class="fw-bold"><?php the_field('tab_slider_bold_title_'); ?></span> 
        </h2>
        <p class="animate-this text-center pb-0 h2-mb"><?php the_field('tab_slider_description'); ?></p>
        </div>
        <div class="pagination-year -grid-4 h2-mb">
        <?php $i=0; if( have_rows('tab_slider') ): ?>
        <?php         
        while (have_rows('tab_slider')) : the_row(); 
        $i++;
        ?>
            <button class="page-item" data-year="tab<?php echo $i ; ?>">
            <?php the_sub_field('tab_title'); ?>
            </button>
            <?php 
        endwhile; ?>
         <?php endif; ?>
    </div>
    
    <?php  $k=0; if( have_rows('tab_slider') ): ?>
    <div class=" container position-relative  animate-this " >
        <div class="owl-carousel history-tab common-nav img-radius">
        <?php        
        while (have_rows('tab_slider')) : the_row(); 
        $k++;
            // $year = get_sub_field('tab_title');
        ?>
        <div class="items" data-year="tab<?php echo $k ; ?>">
            <div class="tab-slider-grid ">
                <div class="d-flex align-items-center cols  pe-md-4 pe-lg-5">
                    <div class="pe-lg-5">
                        <h2 class="fs-1 fw-normal">
                            <?php the_sub_field('title'); ?>
                        </h2>
                        <h3 class="fs-1 fw-bold pb-1">
                            <?php the_sub_field('title_bold'); ?>
                        </h3>
                        <p>
                            <?php the_sub_field('description'); ?>
                        </p>
                    </div>
                </div>
                <div class="cols">                    
                    <?php 
                        $cimage = get_sub_field('tabcllipy_image');
                        $cicon = get_sub_field('tabcllipy_icon');
                        include('clipy.php');
                    ?>
                </div>
            </div>
        </div>
        <?php 
        endwhile; ?>
        </div>
        
    </div>
    <?php endif; ?>

</section>
<?php } ?>

<?php if(get_field('tab_slider_styles')=="style2"){   ?>
<section class="pad ">
    <div class="container  animate-this">
        <h2 class="fs-1 fw-normal mb-0 animate-this text-center mb-4"> <?php the_field('tab_slider_title'); ?> <span class="fw-bold"><?php the_field('tab_slider_bold_title_'); ?></span> 
        </h2>
        <p class="animate-this text-center pb-0 h2-mb"><?php the_field('tab_slider_description'); ?></p>
    </div>
    <?php  $k=0; if( have_rows('tab_slider') ): ?>
    <div class=" container position-relative  animate-this " >
        <div class="row">
        <?php        
        while (have_rows('tab_slider')) : the_row(); 
        $k++;           
        ?>
        <div class="col-12 col-lg-6 ">
            <div class="row <?php if($k % 2 == 0){echo "flex-row-reverse";} ?> grid-row<?php echo $k;  ?>">
                <div class="col-12 col-xl-6 d-flex align-items-center cols ">
                    <div class="round-4-design">
                        <h3 class="fs-3 fw-normal text-prime">
                            <?php the_sub_field('title'); ?>
                            <span class="fw-bold "> <?php the_sub_field('title_bold'); ?></span>
                        </h3>
                        <div class="text">
                            <?php the_sub_field('description'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6 grid-col<?php echo $k;  ?>  <?php if($k % 2 == 0){echo "-pe-lg-5";} else { echo "-ps-lg-5"; } ?>">                    
                    <?php 
                        $cimage = get_sub_field('tabcllipy_image');                   
                    ?>                    
                     <img src="<?php echo esc_url($cimage['url']); ?>"
                     alt="<?php echo esc_attr($cimage['alt']); ?>" class="w-100">
                </div>
            </div>
        </div>
        <?php 
        endwhile; ?>
        </div>
        
    </div>
    <?php endif; ?>

</section>
<?php } ?>

<script>
    jQuery(document).ready(function ($) {
        var owl = $(".history-tab");
        owl.owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: false,
//             autoplayTimeout: 5000,
            autoplayHoverPause: true,
            items: 1,
            onChanged: function (event) {
                var currentIndex = event.item.index;
                var currentSlide = $(".owl-item").eq(currentIndex).find('.items');
                var currentYear = currentSlide.data('year');
                $(".page-item").removeClass("active");
                $(".page-item[data-year='" + currentYear + "']").addClass("active");
            }
        });

        $(".page-item").first().addClass("active");

        $(".page-item").on("click", function () {
            var year = $(this).data("year");
            var targetSlide = $(".items[data-year='" + year + "']");
            owl.trigger("to.owl.carousel", [targetSlide.closest('.owl-item').index(), 300]);
            $(".page-item").removeClass("active");
            $(this).addClass("active");
        });
    });
</script>
