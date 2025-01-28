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
</style>

<?php include('hero.php');?>
<section class="blogbg">
    <div class="container py-5">

        <?php if (have_posts()):
                while (have_posts()):
                    the_post();
                ?>
        <article class="bg-white rounded-4 p-4 px-lg-5 ">
            <div class="blog-image pb-4">
                <?php
                    if (has_post_thumbnail()) {
                        $image_url = get_the_post_thumbnail_url($post, 'large');
                        if ($image_url) {
                            echo '<img src="' . esc_url($image_url) . '" alt="' . get_the_title() . '" class="w-100 img-fluid rounded-4 p-1" />';
                        }
                    }
                    ?>
            </div>
            <div class="blog-content px-xl-5">
                <h2 class="fs-1 fw-normal mt-3 mb-0">
                    <?php echo esc_html(get_field('normal_heading') ?? ''); ?>
                </h2>
                <h3 class="fs-1 fw-bold mt-1">
                    <?php echo esc_html(get_field('bold_heading') ?? ''); ?>
                </h3>
                <div class="blog-body fw-normal mt-lg-4 pt-2">
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

<?php get_footer(); ?>