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
           $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
             'orderby'        => 'date',
            'order'          => 'DESC'
        );
        $query = new WP_Query($args);

        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();
                $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                $thumbnail_url = $thumbnail ? $thumbnail[0] : '';
            ?>
            <li loading="lazy"> 
                 <a href="<?php the_permalink(); ?>" >
                    <?php if ($thumbnail_url){ ?>
                        <img class="w-100 img-radius" src="<?php echo $thumbnail_url; ?>"
                            alt="<?php the_title_attribute(); ?>" />
                    <?php } ?>

                    <div class="text mt-3 text-sec"> <?php echo get_the_date('j F, Y'); ?></div>                   
                    <div class=" mt-2 mb-3 cont"> <?php the_title(); ?></div>
                    <span class="btn-prime d-block w-fit py-1 px-4">Read More</span>
                    </a>
            </li>
            <?php
            endwhile;
            endif;
            wp_reset_postdata();
            ?>

             </ul>
   
       
    </div>
</section>
</div>
<?php get_footer(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.matchHeight-min.js?ver=1.1"></script>

<script>
    jQuery(document).ready(function($) {
      $('.grid-3 li a .cont').matchHeight();  
    });
</script>