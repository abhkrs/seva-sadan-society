<section class="pad position-relative overflow-hidden">
    <!-- <img src="<?php echo get_template_directory_uri();?>/images/logo_element.svg" alt="" class="img-fluid position-absolute end-0 top-0 z-0"> -->
    <div class="container position-relative z-2 ">
        <div class="row flip-767">
            <div class="col-md-5 pe-md-4 pe-lg-5">                
            <?php 
                $cimage = get_field('image');
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