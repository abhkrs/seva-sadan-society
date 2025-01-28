<?php
get_header();
?>

<section class="hero">
    <img src="<?php echo get_template_directory_uri(); ?>/images/herographics.png" alt="graphicimage" class="img-fluid graphicimage">
    
    <?php 
    $hero_image = get_field('hero_image');
    if ( is_array($hero_image) && isset($hero_image['url'], $hero_image['alt']) ) : ?>
        <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>" class="img-fluid heroimage">
    <?php endif; ?>
    
    <div class="container">
        <div class="row h-100">
            <div class="col-lg-7 d-flex flex-column justify-content-center gap-2 h-100">
                <?php 
                // Dynamic white text for different archive types
                $white_text = '';
                if (is_category()) {
                    $white_text = 'Category';
                } elseif (is_tag()) {
                    $white_text = 'Tag';
                } elseif (is_author()) {
                    $white_text = 'Author';
                } elseif (is_day()) {
                    $white_text = 'Daily';
                } elseif (is_month()) {
                    $white_text = 'Monthly';
                } elseif (is_year()) {
                    $white_text = 'Yearly';
                } else {
                    $white_text = 'Blog';
                }
                ?>
                <h3 class="text-white fs-1 fw-normal"><?php echo esc_html($white_text); ?> Archives</h3>
                
                <?php 
                // Dynamic orange text for archive title
                $orange_text = '';
                if (is_category()) {
                    $orange_text = single_cat_title('', false);
                } elseif (is_tag()) {
                    $orange_text = single_tag_title('', false);
                } elseif (is_author()) {
                    $orange_text = get_the_author_meta('display_name');
                } elseif (is_day()) {
                    $orange_text = get_the_date();
                } elseif (is_month()) {
                    $orange_text = get_the_date('F Y');
                } elseif (is_year()) {
                    $orange_text = get_the_date('Y');
                } else {
                    $orange_text = 'Blog Archives';
                }
                ?>
                <h1 class="text-sec fw-bold"><?php echo esc_html($orange_text); ?></h1>
            </div>
        </div>
    </div>
</section>

<section>
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

        if (is_category()) {
            $args['category_name'] = get_query_var('category_name');
        } elseif (is_tag()) {
            $args['tag'] = get_query_var('tag');
        } elseif (is_author()) {
            $args['author'] = get_queried_object_id();
        }

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
                        <img 
                            src="<?php echo esc_url($thumbnail['url']); ?>" 
                            alt="<?php echo esc_attr($thumbnail['alt']); ?>" 
                            class="img-fluid rounded-3 object-fit-cover w-100"
                            loading="lazy"
                        >
                    <?php else: ?>
                        <img 
                            src="<?php echo esc_url(get_template_directory_uri() . '/img/blogdummy.webp'); ?>" 
                            alt="Default Post Thumbnail"
                            class="img-fluid rounded-3 object-fit-cover w-100"
                            loading="lazy"
                        >
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
                    <a 
                        href="<?php the_permalink(); ?>" 
                        class="btn-prime"
                        aria-label="Read full blog post: <?php the_title_attribute(); ?>"
                    >
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