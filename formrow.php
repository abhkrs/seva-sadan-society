<div class="row">
    <div class="col-lg-5 d-flex align-items-center pb-4 pb-lg-0">
        <img src="<?php echo esc_url(get_field('form_section_image')['url']); ?>"
            alt="<?php echo esc_attr(get_field('form_section_image')['alt']); ?>" class="img-fluid animate-this">
    </div>
    <div class="col-lg-7 ps-lg-4">
        <div class="bg-white rounded-4 shadow h-100 ms-xl-2 p-4 animate-this">
            <?php while (have_rows('form_heading')) : the_row(); ?>
            <h2 class="fs-1 fw-normal mb-0 animate-this"><?php the_sub_field('normal_text'); ?></h2>
            <h3 class="fs-1 fw-bold mb-4 animate-this"><?php the_sub_field('bold_text'); ?></h3>
            <?php endwhile; ?>
            <?php $form = get_field('form_shortcode'); echo do_shortcode($form); ?>
        </div>
    </div>
</div>