<?php

/**
 *Template Name: Financials
 */
get_header();
?>

<style>
.contnetcard {
    /* box-shadow: 0 0 5px 0 #0001; */
    transition: all .3s ease-in-out;
    background: #fff;
    clip-path: polygon(0 0, calc(100% - 20%) 0, 100% 25%, 100% 100%, 0 100%);
    border-radius: 20px;
    padding: 30px;
}

.contnetcard:hover {
    /* box-shadow: 0 0 12px 3px #0003; */
    transform: translateY(-5px);
    transition: all .3s ease-in-out;
}

details{
    background:#fff;
}

details[open] {
    background: var(--prime);
    color: #fff;
}

details[open] * {
    color: #fff;
}
</style>

<?php include('hero.php'); ?>
<section class="pad">
    <div class="container">
        <div class="row">
            <?php while (have_rows('financials_docs')) : the_row(); ?>
            <div class="col-md-6 animate-this py-3">
                <div class="contnetcard">
                    <?php 
                    $image = get_sub_field('thumbnail');
                    if ( is_array($image) && isset($image['url'], $image['alt']) ) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                        class="img-fluid w-100">
                    <?php endif; ?>
                    <h3 class="fs-5 fw-semibold my-4"><?php the_sub_field('name'); ?></h3>
                    <a class="btn-prime d-block w-fit py-1 px-4" href="<?php the_sub_field('download'); ?>">Download</a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php while (have_rows('contact_section')) : the_row(); ?>

<section class="fixedbg" style=" background-image: url('<?php the_sub_field('background_image'); ?>');">
    <div style="background: var(--bg); z-index:1; position:relative;">
        <div style="background:var(--lgr); padding:50px;"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-3 d-flex align-items-end">
                <img src="<?php echo get_template_directory_uri(); ?>/images/phone.webp" alt="phone icon"
                    class="img-fluid" style="margin-top:-100px;">
            </div>
            <div class="col-9 d-flex flex-column justify-content-center ">
                <h2 class="animate-this text-white mb-4 fs-2"><?php the_sub_field('normal_text'); ?> <span
                        class="fw-bold text-white"><?php the_sub_field('bold_text'); ?></span></h2>

                <ul class="text-prime">
                    <?php while (have_rows('pointers')) : the_row(); ?>
                    <li class="animate-this fs-1 fw-bold text-sec">
                        <?php the_sub_field('point_text'); ?>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>

<section class="pad">
    <div class="container">
        <h2 class="fw-normal fs-1">Annual <b class="text-prime">Reports</b> - FCRA Reports</h2>

        <div class="row">
            <?php while (have_rows('annual_reports_-_fcra_reports')) : the_row(); ?>
            <div class="col-md-6 animate-this py-3">
                <div class="shadow bg-white rounded-4 px-5 py-3 text-center">
                    <?php 
                    $image = get_sub_field('image');
                    if ( is_array($image) && isset($image['url'], $image['alt']) ) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                        class="img-fluid w-100 px-lg-5">
                    <?php endif; ?>
                    <h3 class="fs-5 fw-semibold my-3"><?php the_sub_field('heading'); ?></h3>
                    <a class="btn-prime d-block w-fit mx-auto py-1 px-5 mb-2"
                        href="<?php the_sub_field('view_file'); ?>">View</a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>


        <h2 class="fw-normal fs-1 mt-4">Quarterly <b class="text-prime">Reports</b> - FCRA Reports</h2>

        <?php while (have_rows('quarterly_reports_-_fcra_reports')) : the_row(); ?>
            <details class="shadow rounded-4 p-4 animate-this mt-4">
                <summary><?php the_sub_field('title'); ?></summary>
                <div class="d-flex flex-wrap gap-3 justify-content-between p-2 pt-4">
                    <?php while (have_rows('quarter')) : the_row(); ?>
                        <a class="text-white"
                        href="<?php the_sub_field('file'); ?>"><?php the_sub_field('name'); ?></a>
                    <?php endwhile; ?>
                </div>
            </details>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>