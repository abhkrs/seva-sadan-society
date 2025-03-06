<?php
/**
 * Template Name: Blogs
 */
get_header();
?>

<?php include('hero.php'); ?>
<div class="lotus-overlay2">
<section class="pad  position-relative">
    <!-- <img src="<?php echo get_template_directory_uri();?>/images/logo_element.svg" alt="" class="img-fluid position-absolute end-0 top-0 z-0"> -->
    <div class="container position-relative z-2">
        <ul class="grid-3">
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
            <li loading="lazy"> 
                 <a href="<?php the_permalink(); ?>" >
                <?php if ($thumbnail): ?>
                        <?php 
                            $cimage = get_field('blog_thumbnail');
                            $cicon = get_field('blog_thumbnail_icon');
                            include('clipy.php');
                        ?>
                    <?php else: ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/blogdummy.webp'); ?>"
                        alt="Default Post Thumbnail" class="rounded-3  w-100" >
                    <?php endif; ?>
                    <div class="text mt-3 text-sec"> <?php echo get_the_date('j F, Y'); ?></div>
                   
                    <h3 class="fs-5 fw-bold mt-4 mb-3"> <?php the_title(); ?></h3>
                    <span class="btn-prime d-block w-fit py-1 px-4">Read More</span>
                    </a>
            </li>

        <!-- <div class="row h2-pb flip-767">
            <div class="col-12 col-md-4">
                <div class="blog-item h-100">
                    <?php if ($thumbnail): ?>
                        <?php 
                            $cimage = get_field('blog_thumbnail');
                            $cicon = get_field('blog_thumbnail_icon');
                            include('clipy.php');
                        ?>
                    <?php else: ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/blogdummy.webp'); ?>"
                        alt="Default Post Thumbnail" class="img-fluid rounded-3 object-fit-cover w-100" loading="lazy">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-md-8 py-4 d-flex align-items-center ps-lg-5">
                <div class="blog-content px-xl-4">
                    <h2 class="fs-1 fw-normal  mb-1">
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
        </div> -->
        <?php
                endwhile;
                $total_pages = $query->max_num_pages;
                if ($total_pages > 1):
            ?>
             </ul>
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
</div>
<?php get_footer(); ?>