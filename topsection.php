<section class="pad position-relative">
    <img src="<?php echo get_template_directory_uri();?>/images/logo_element.svg" alt="" class="img-fluid position-absolute end-0 top-0 z-0">
    <div class="container position-relative z-2">
        <div class="row">
            <div class="col-md-6 pe-md-4 pe-lg-5">
                <div class="image animate-this">
                    <img src="<?php echo esc_url(get_field('image')['url']); ?>"
                        alt="<?php echo esc_attr(get_field('image')['alt']); ?>" class="img-fluid">
                </div>
            </div>
            <div class="d-flex align-items-center col-md-6">
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