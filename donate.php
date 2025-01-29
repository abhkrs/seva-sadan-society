<?php

/**
 *Template Name: Donate
 */
get_header();
?>
<style>
.input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
    width: 100%;
}

.currency {
    position: absolute;
    left: 15px;
    color: #333333;
    font-size: 16px;
}

input[name='amount'] {
    width: 100%;
    max-width: 320px;
    border: 1px solid var(--sec);
    border-radius: 20px;
    padding: 8px 40px;
    background: transparent;
    outline: none;
    font-size: 16px;
}

.contnetcard {
    /* box-shadow: 0 0 5px 0 #0001; */
    transition: all .3s ease-in-out;
    background: #fff;
    clip-path: polygon(0 0, calc(100% - 18%) 0, 100% 20%, 100% 100%, 0 100%);
    border-radius: 20px;
    padding: 20px;
    padding-bottom: 30px;
}

.contnetcard:hover {
    /* box-shadow: 0 0 12px 3px #0002; */
    transform: translateY(-5px);
    transition: all .3s ease-in-out;
}
</style>
<?php include('hero.php'); ?>
<section class="pad position-relative">
    <img src="<?php echo get_template_directory_uri();?>/images/logo_element.svg" alt=""
        class="img-fluid position-absolute end-0 top-0 z-0">
    <div class="container position-relative z-2">
        <?php while (have_rows('top_heading')) : the_row(); ?>
        <h2 class="fs-1 fw-normal mb-0 animate-this text-center"><?php the_sub_field('normal_text'); ?></h2>
        <h3 class="fs-1 fw-bold mb-5 animate-this text-center"><?php the_sub_field('bold_text'); ?></h3>
        <?php endwhile; ?>
        <div class="row">
            <div class="col-md-6 pe-md-4 pe-lg-5">
                <div class="image animate-this">
                    <img src="<?php echo esc_url(get_field('image')['url']); ?>"
                        alt="<?php echo esc_attr(get_field('image')['alt']); ?>" class="img-fluid">
                </div>
            </div>
            <div class="d-flex align-items-center col-md-6">
                <div class="ps-xl-4">
                    <?php while (have_rows('heading')) : the_row(); ?>
                    <h2 class="fs-1 fw-normal mb-0 animate-this"><?php the_sub_field('normal_text'); ?></h2>
                    <h3 class="fs-1 fw-bold mb-3 animate-this"><?php the_sub_field('bold_text'); ?></h3>
                    <?php endwhile; ?>
                    <p class="animate-this"><?php the_field('description'); ?></p>
                    <p class="animate-this"><?php the_field('enter_amount_text'); ?></p>
                    <div class="input-wrapper animate-this">
                        <span class="currency">Rs.</span>
                        <input type="text" name="amount">
                    </div>
                    <div class="animate-this mt-4">
                        <a href="<?php the_field('donate_now_link'); ?>" target="_blank" class="btn-prime py-2">Donate
                            Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="py-4">
       <!-- If cards section is present -->
    <?php if (get_field('support_a_cause_type') === 'cards') : ?>
    <?php while (have_rows('support_a_cause_cards')) : the_row(); ?>
    <div class="container">
        <h2 class="animate-this fs-1 mb-4">Support a <span class="fw-bold text-prime">Cause
                -</span> <?php the_sub_field('heading'); ?></h2>
        <div class="row">
            <?php while (have_rows('cards')) : the_row(); ?>
            <div class="col-md-6 col-lg-4 col-xl-3 animate-this pb-4">
                <div class="contnetcard h-100">
                    <img src="<?php echo esc_url(get_sub_field('image')['url']); ?>"
                        alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>" class="img-fluid w-100">
                    <h3 class="fs-base text-prime fw-bold mt-3"><?php the_sub_field('name'); ?></h3>
                    <div class="match fs-base"><?php the_sub_field('content'); ?></div>
                    <div class="pt-3">
                        <a href="<?php the_sub_field('add_link'); ?>" class="btn-prime py-2 px-5">Add</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>

    <!-- If contents section is present -->
    <?php if (get_field('support_a_cause_type') === 'content') : ?>
    <div class="container">
        <?php $i=1; while (have_rows('support_a_cause_contents')) : the_row(); ?>
        <div class="row pb-4 pb-md-5">
            <div
                class="col-lg-6 pb-4 pb-lg-0 <?php echo $i%2 === 0 ? 'pe-lg-4 pe-xl-5 ' :'ps-lg-4 ps-xl-5 order-lg-2' ; ?>">
                <div class="image animate-this">
                    <img src="<?php echo esc_url(get_sub_field('image')['url']); ?>"
                        alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>" class="img-fluid w-100">
                </div>
            </div>
            <div class="d-flex align-items-center col-lg-6">
                <div class="<?php echo $i%2 ===1 ? 'pe-xl-4 ' : 'ps-xl-4 '; $i++; ?>">
                    <?php while (have_rows('heading')) : the_row(); ?>
                    <h2 class="fs-1 fw-normal mb-0 animate-this"><?php the_sub_field('normal_text'); ?></h2>
                    <h3 class="fs-1 fw-bold mb-3 animate-this"><?php the_sub_field('bold_text'); ?></h3>
                    <?php endwhile; ?>
                    <p class="animate-this"><?php the_sub_field('description'); ?></p>
                    <div class="animate-this pt-3">
                        <a href="<?php the_field('donate_now_link'); ?>" target="_blank" class="btn-prime py-2">Donate
                            Now</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
</section>


<?php while (have_rows('contact_section')) : the_row(); ?>
<div style="background:var(--lgr); padding:40px;"></div>
<section class="fixedbg py-xl-3">
    <div class="container py-5">
        <h2 class="animate-this text-white fs-1 fw-bold mb-5"><?php the_sub_field('heading'); ?></h2>
        <p class="animate-this mb-0 text-white"><?php the_sub_field('paragraph'); ?></p>
        <?php while (have_rows('paragraph_line_2')) : the_row(); ?>
        <p class="text-white animate-this mb-2">
            <?php the_sub_field('white_text'); ?>
            <span class="text-sec"><?php the_sub_field('orange_text'); ?></span>
            <?php the_sub_field('white_text_copy'); ?>
        </p>
        <?php endwhile; ?>
        <p class="animate-this">
            <img src="<?php echo get_template_directory_uri();?>/images/mailicon.svg" alt="email icon"
                class="img-fluid me-2" style="width:27px;">
            <a class="text-sec"
                href="mailto:<?php the_sub_field('email_id'); ?>"><?php the_sub_field('email_id'); ?></a>
        </p>
    </div>
</section>
<?php endwhile; ?>

<section class="pad">
    <div class="container">
        <div class="row">
            <div class="col-md-6 pe-md-4 pe-lg-5">
                <div class="image animate-this">
                    <img src="<?php echo esc_url(get_field('bottom_section_image')['url']); ?>"
                        alt="<?php echo esc_attr(get_field('bottom_section_image')['alt']); ?>" class="img-fluid">
                </div>
            </div>
            <div class="d-flex align-items-center col-md-6">
                <div class="ps-xl-4">
                    <?php while (have_rows('bottom_section_heading')) : the_row(); ?>
                    <h2 class="fs-1 fw-normal mb-0 animate-this"><?php the_sub_field('normal_text'); ?></h2>
                    <h3 class="fs-1 fw-bold mb-3 animate-this"><?php the_sub_field('bold_text'); ?></h3>
                    <?php endwhile; ?>
                    <div class="animate-this fs-base"><?php the_field('bottom_section_content'); ?></div>
                    <div class="animate-this mt-4">
                        <a href="<?php the_field('bottom_section_contact_link'); ?>" target="_blank"
                            class="btn-prime py-2">Contact to Donate</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

<script>
jQuery(document).ready(function($) {
    $('.contnetcard h3').matchHeight();
    $('.contnetcard div.fs-base').matchHeight();
});
</script>