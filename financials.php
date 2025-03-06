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
    clip-path: polygon(0 0, calc(100% - 20%) 0, 100% 24%, 100% 100%, 0 100%);
    border-radius: 20px;
    padding: 30px;
}

.hover {
    transition: all .3s ease-in-out;
    background: #fff;
    box-shadow: 0 0 5px 0 #0001;
}

.contnetcard:hover {
    /* box-shadow: 0 0 12px 3px #0003; */
    transform: translateY(-5px);
    transition: all .3s ease-in-out;
}
.hover:hover {
    box-shadow: 0 0 12px 3px #00000012;
    transform: translateY(-5px);
    transition: all .3s ease-in-out;
}

details {
    background: #fff;
    box-shadow: 0 0 3px 0 #0001;
}

details[open] {
    background: var(--prime);
    color: #fff;
}

details[open] * {
    color: #fff;
}

details summary {
    list-style: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    padding-right: 20px;
    position: relative;
}

details summary::marker,
details summary::-webkit-details-marker {
    display: none;
}

details summary::after {
    content: "";
    width: 20px;
    height: 20px;
    background: url('<?php echo get_template_directory_uri();?>/images/close.svg') no-repeat center;
    background-size: contain;
    transition: transform 0.3s ease;
}

details[open] summary::after {
    background: url('<?php echo get_template_directory_uri();?>/images/open.svg') no-repeat center;
    background-size: contain;
}
</style>

<?php include('hero.php'); ?>
<section class="pad">
    <div class="container">
		<?php while (have_rows('annual_report_heading')) : the_row(); ?>
		<h2 class="animate-this text-prime mb-4"><?php the_sub_field('normal_text'); ?> <span
						class="fw-bold text-prime"><?php the_sub_field('bold_text'); ?></span></h2>
		<?php endwhile; ?>
        <div class="justify-content-center row mt-3 mt-lg-4">
            <?php while (have_rows('annual_reports_-_fcra_reports')) : the_row(); ?>
            <a class="col-sm-6 col-lg-4 col-xl-3 animate-this pb-4"  href="<?php the_sub_field('view_file'); ?>" target="_blank">
                <div class="hover bg-white rounded-5 p-3 text-center">
                    <?php 
                    $image = get_sub_field('image');
                    if ( is_array($image) && isset($image['url'], $image['alt']) ) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                        class="img-fluid w-100 ">
                    <?php endif; ?>
                    <h3 class="fs-5 fw-semibold my-3"><?php the_sub_field('heading'); ?></h3>
                    <span class="btn-prime d-block w-fit mx-auto py-2 px-5 mb-2" >View</span>
                </div>
            </a>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<!-- <section class="pad pt-0">
    <div class="container">
        <div class="row financial-card">
            <?php while (have_rows('financials_docs')) : the_row(); ?>
            <div class="col-md-6 animate-this py-3">
                <a class="contnetcard  d-block" href="<?php the_sub_field('download'); ?>" target="_blank">
                    <?php 
                    $image = get_sub_field('thumbnail');
                    if ( is_array($image) && isset($image['url'], $image['alt']) ) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                        class="img-fluid w-100">
                    <?php endif; ?>
                    <h3 class="fs-5 fw-semibold my-4"><?php the_sub_field('name'); ?></h3>
                    <span class="btn-prime d-block w-fit py-1 px-4" >Download</span>
                </a>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section> -->

<?php while (have_rows('contact_section')) : the_row(); ?>
<section class="fixedbg">
    <div style="background: var(--bg); z-index:1; position:relative;">
        <div style="background:var(--lgr); padding:50px;"></div>
    </div>
    <div class="container pt-xl-3">
        <div class="py-5 d-flex flex-column justify-content-center ">
            <h2 class="animate-this text-white mb-4 pb-xl-2 fs-base"><?php the_sub_field('normal_text'); ?> <span
                    class="fw-bold text-white"><?php the_sub_field('bold_text'); ?></span></h2>

            <ul class="text-prime fs-base">
                <?php while (have_rows('pointers')) : the_row(); ?>
                <li class="animate-this fw-bold text-sec">
                    <?php the_sub_field('point_text'); ?>
                </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</section>
<?php endwhile; ?>

<section class="pad">
    <div class="container">
        <?php while (have_rows('quarterly_report_heading')) : the_row(); ?>
		<h2 class="animate-this text-prime mb-4"><?php the_sub_field('normal_text'); ?> <span
						class="fw-bold text-prime"><?php the_sub_field('bold_text'); ?></span></h2>
		<?php endwhile; ?>

        <?php while (have_rows('quarterly_reports_-_fcra_reports')) : the_row(); ?>
        <details class="rounded-4 p-4 pe-2 animate-this mt-4">
            <summary><?php the_sub_field('title'); ?></summary>
            <div class="d-flex flex-wrap gap-3 justify-content-between pe-4 pt-4">
                <?php while (have_rows('quarter')) : the_row(); ?>
                <a class="text-white" href="<?php the_sub_field('file'); ?>" target="_blank"><?php the_sub_field('name'); ?></a>
                <?php endwhile; ?>
            </div>
        </details>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>

<script>
jQuery(document).ready(function($) {
    $("details summary").click(function(event) {
        event.preventDefault();
        $("details").removeAttr("open");
        $(this).parent("details").attr("open", true);
    });
});
</script>