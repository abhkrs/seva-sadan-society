<section class="hero">
    <img src="<?php echo get_template_directory_uri(); ?>/images/logofl.svg" alt="graphicimage" class="img-fluid graphicimage">
    
    <?php 
    $hero_image = get_field('hero_image');
    if ( is_array($hero_image) && isset($hero_image['url'], $hero_image['alt']) ) : ?>
        <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>" class="img-fluid heroimage">
    <?php endif; ?>
    
    <div class="container">
        <div class="row h-100">
            <div class="col-lg-7 d-flex flex-column justify-content-center gap-2 h-100">
                <?php if ( get_field('white_text') ) : ?>
                    <h3 class="text-white fs-1 fw-normal animate-this"><?php echo esc_html(get_field('white_text')); ?></h3>
                <?php endif; ?>
                
                <?php if ( get_field('orange_text') ) : ?>
                    <h1 class="text-sec fw-bold animate-this"><?php echo esc_html(get_field('orange_text')); ?></h1>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
