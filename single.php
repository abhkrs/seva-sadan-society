<?php

/**
 * The template for displaying all single posts
 */
get_header();
?>

<style>
article img {
    width: 100%;
    max-width: 100%;
    object-fit: contain;
}

article b,
article strong {
    color: var(--prime);
}

article h1, article h2, article h3, article h4, article h5, article h6{
    margin-top:clamp(24px, 3vw, 40px);
}

@media only screen and (max-width: 400px){
/* .hero .heroimage {
    object-fit: cover;
    right: -19% !important;
} */
}
</style>

<section class="inner-banner" style="background:unset;">    
    <div class="container">
        <div class="row align-items-center pt-3 pt-lg-5">
            <div class="col-lg-3">            
            <?php
                    if (has_post_thumbnail()) { 
                   
                        $image_url = get_the_post_thumbnail_url($post, 'large');
                        if ($image_url) {
                            echo '<img src="' . esc_url($image_url) . '" alt="' . get_the_title() . '" class="w-100 img-radius animate-this " />';
                        }
                    
                    }  ?>


            </div>
            <div class="col-lg-9 ps-lg-5 d-flex flex-column justify-content-center gap-2 h-100">
                <!-- <?php if ( get_field('white_text') ) : ?>
                    <p class="text-prime fw-normal   fs-1 animate-this pb-0 mb-0"></p>
                <?php endif; ?>                
                -->
                    <!-- <h1 class="text-prime fw-normal animate-this   fs-1"><?php echo esc_html(get_field('white_text')); ?> <span class="fw-bold text-prime"><?php echo esc_html(get_field('orange_text')); ?></span></h1> -->

                    <h1 class="text-prime fw-normal animate-this   fs-1">  <?php the_title(); ?></h1>
                  
                
                    <div class="text text-sec fw-bold animate-this  "><?php echo get_the_date('j F, Y'); ?></div>

                <?php if ( get_field('banner_description') ) : ?>
                <div class="text-black opacity-75  animate-this fs-5">
                    <?php the_field('banner_description') ?>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>
<div class="lotus-overlay2">
<section class="pad position-relative">
    <!-- <img src="<?php echo get_template_directory_uri();?>/images/logo_element.svg" alt=""
        class="img-fluid position-absolute end-0 top-0 z-0"> -->
    <div class="container position-relative z-2">

        <?php if (have_posts()):
                while (have_posts()):
                    the_post();
                ?>
        <article class="bg-white rounded-4 p-4 px-lg-5 animate-this">
      
            <div class="blog-content  animate-this">
                <?php if(get_field('normal_heading')){ ?>
                <h2 class="fs-1 fw-normal mt-3 mb-0 animate-this">
                    <?php echo esc_html(get_field('normal_heading') ?? ''); ?>
                </h2>
                <?php } ?>
                <?php if(get_field('bold_heading')){ ?>
                <h3 class="fs-1 fw-bold mt-1 animate-this">
                    <?php echo esc_html(get_field('bold_heading') ?? ''); ?>
                </h3>
                <?php } ?>
                <div class="blog-body fw-normal mt-lg-4 pt-2 animate-this">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>
        <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
    </div>
</section>
</div>
<?php get_footer(); ?>