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
<div class="lotus-overlay2">
    <section class="pad position-relative">
        <!-- <img src="<?php echo get_template_directory_uri(); ?>/images/logo_element.svg" alt=""
        class="img-fluid position-absolute end-0 top-0 z-0"> -->
        <div class="container position-relative z-2">
            <?php while (have_rows('top_heading')) : the_row(); ?>
                <h2 class="fs-1 fw-normal mb-0 animate-this text-center"><?php the_sub_field('normal_text'); ?></h2>
                <h3 class="fs-1 fw-bold mb-5 animate-this text-center"><?php the_sub_field('bold_text'); ?></h3>
            <?php endwhile; ?>
            <div class="row flip-767">
                <div class="col-md-5  pe-md-4 pe-lg-5 mt-4 mt-md-0">
                    <?php
                    $cimage = get_field('cllipy_image');
                    $cicon = get_field('cllipy_icon');
                    include('clipy.php');
                    ?>
                </div>
                <div class="d-flex align-items-center col-md-7">
                    <div class="ps-xl-4">
                        <?php while (have_rows('heading')) : the_row(); ?>
                            <h2 class="fs-1 fw-normal mb-0 animate-this"><?php the_sub_field('normal_text'); ?></h2>
                            <h3 class="fs-1 fw-bold mb-3 animate-this"><?php the_sub_field('bold_text'); ?></h3>
                        <?php endwhile; ?>
                        <p class="animate-this"><?php the_field('description'); ?></p>
                        <p class="animate-this"><?php the_field('enter_amount_text'); ?></p>
                        <form action="<?php echo site_url() ?>/paymentprovider.php" method="POST" target="_blank">
                            <div class="input-wrapper animate-this">
                                <span class="currency">Rs.</span>
                                <input type="text" name="amount">
                            </div>
                            <div class="animate-this mt-4">
                                <button type="submit" class="btn-prime py-2">Donate Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="pb-4">

        <?php if (have_rows('support_a_cause_contents')): ?>
            <?php $i = 1;
            while (have_rows('support_a_cause_contents')) : the_row(); ?>
                <hr>
                <div class="container">
                    <div class="row py-4 py-md-5 flip-767">
                        <div
                            class="col-md-5 pb-4 pb-lg-0 mt-4 mt-md-0  pe-lg-4 pe-xl-5 ">
                            <?php
                            $cimage = get_sub_field('cllipy_image2');
                            $cicon = get_sub_field('cllipy_icon2');
                            include('clipy.php');
                            ?>
                        </div>
                        <div class="d-flex align-items-center col-md-7">
                            <div class="<?php echo $i % 2 === 1 ? 'pe-xl-4 ' : 'ps-xl-4 ';
                                        $i++; ?>">
                                <?php while (have_rows('heading')) : the_row(); ?>
                                    <h2 class="fs-1 fw-normal mb-0 animate-this"><?php the_sub_field('normal_text'); ?></h2>
                                    <h3 class="fs-1 fw-bold mb-3 animate-this"><?php the_sub_field('bold_text'); ?></h3>
                                <?php endwhile; ?>
                                <p class="animate-this"><?php the_sub_field('description'); ?></p>
                                <div class="animate-this pt-3">
                                    <form action="<?php echo site_url() ?>/paymentprovider.php" method="POST" target="_blank">
                                        <input type="hidden" name="amount" value="<?php the_sub_field('donate_now_link'); ?>">
                                        <button type="submit" class="btn-prime py-2">Donate Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
</div>

<?php while (have_rows('contact_section')) : the_row(); ?>
    <div style="background:var(--lgr); padding:40px;"></div>
    <section class="fixedbg py-xl-3">
        <div class="container py-5">
            <h2 class="animate-this text-white fs-1 fw-bold mb-3 mb-xl-5 "><?php the_sub_field('heading'); ?></h2>
            <p class="animate-this mb-0 text-white"><?php the_sub_field('paragraph'); ?></p>
            <?php while (have_rows('paragraph_line_2')) : the_row(); ?>
                <p class="text-white animate-this mb-2">
                    <?php the_sub_field('white_text'); ?>
                    <span class="text-sec"><?php the_sub_field('orange_text'); ?></span>
                    <?php the_sub_field('white_text_copy'); ?>
                </p>
            <?php endwhile; ?>
            <p class="animate-this">
                <img src="<?php echo get_template_directory_uri(); ?>/images/mailicon.svg" alt="email icon"
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
            <div class="col-md-5 pe-md-4 pe-lg-5">
                <div class="clipy animate-this">
                    <img src="<?php echo esc_url(get_field('bottom_section_image')['url']); ?>"
                        alt="<?php echo esc_attr(get_field('bottom_section_image')['alt']); ?>" class="img-fluid">
                    <div class="icon">
                        <img src="<?php the_field('bottom_section_icon'); ?>"
                            class="">
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center col-md-7">
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

        let amountInput = $('input[name="amount"]');
        let amountHidden = $('.amount-hidden');

        amountInput.on('input', function() {
            let value = $(this).val().replace(/\D/g, '');
        });
    });
</script>