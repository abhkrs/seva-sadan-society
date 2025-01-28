<?php
/**
 * Template Name: Blogs
 */
get_header();
?>

<?php include('hero.php'); ?>

<section class>
    <div class="container py-4">
        <?php
            $posts_per_page = get_option('posts_per_page') ?: 6;
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => $posts_per_page,
                'paged'          => $paged,
                'orderby'        => 'date',
                'order'          => 'DESC'
            );

            $query = new WP_Query($args);

            if ($query->have_posts()):
                while ($query->have_posts()):
                    $query->the_post();
                    $thumbnail = get_field('blog_thumbnail');
            ?>
        <div class="row py-3">
            <div class="col-lg-5">
                <div class="blog-item h-100">
                    <?php if ($thumbnail): ?>
                    <img src="<?php echo esc_url($thumbnail['url']); ?>"
                        alt="<?php echo esc_attr($thumbnail['alt']); ?>"
                        class="img-fluid rounded-3 object-fit-cover w-100" loading="lazy">
                    <?php else: ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/blogdummy.webp'); ?>"
                        alt="Default Post Thumbnail" class="img-fluid rounded-3 object-fit-cover w-100" loading="lazy">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-7 py-4 d-flex align-items-center ps-lg-5">
                <div class="blog-content px-xl-4">
                    <h2 class="fs-1 fw-normal mt-3 mb-1">
                        <?php echo esc_html(get_field('normal_heading') ?? ''); ?>
                    </h2>
                    <h3 class="fs-1 fw-bold">
                        <?php echo esc_html(get_field('bold_heading') ?? ''); ?>
                    </h3>
                    <p class="blog-description fw-normal my-4">
                        <?php echo esc_html(wp_trim_words(get_the_content(), 62)); ?>
                    </p>
                    <a href="<?php the_permalink(); ?>" class="btn-prime"
                        aria-label="Read full blog post: <?php the_title_attribute(); ?>">
                        Read Full Blog
                    </a>
                </div>
            </div>
        </div>
        <?php
                endwhile;
                $total_pages = $query->max_num_pages;
                if ($total_pages > 1):
            ?>
        <div class="pagination">
            <?php 
                    echo paginate_links(array(
                        'total'     => $total_pages,
                        'current'   => $paged,
                        'prev_text' => '&laquo;',
                        'next_text' => '&raquo;'
                    )); 
                    ?>
        </div>
        <?php 
                endif;

                else:
                    echo '<p>No blog found.</p>';
                endif;
                wp_reset_postdata();
            ?>
    </div>
</section>

<?php get_footer(); ?>