<?php

/**
 * Template Name: Contact Us
 */
get_header();
?>
<style>
.pagination-year {
    display: flex;
    gap: 12px;
}

.pagination-year .page-item {
    background: #fff;
    padding: 8px 80px;
    border-radius: 6px;
    position: relative;
    cursor: pointer;
}

.pagination-year .page-item:hover,
.pagination-year .page-item.active {
    background-color: var(--sec);
    color: #fff;
}

.pagination-year .page-item.active::after {
    content: "";
    position: absolute;
    bottom: -12px;
    right: 50%;
    transform: translateX(50%);
    border-top: 14px solid var(--sec);
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    width: 0;
    height: 0;
}

.content-tab {
    display: none;
}

.content-tab.active {
    display: flex;
}
</style>
<?php include('hero.php'); ?>
<section class="pad">
    <div class="container">
        <div class="pagination-year pb-4 pb-lg-5">
            <?php $i=1; while (have_rows('category')) : the_row(); ?>
            <div data-tab="tab-<?php echo $i; ?>" class="page-item <?php echo $i === 1 ? 'active' : ''; $i++; ?>">
                <?php the_sub_field('tab_name'); ?>
            </div>
            <?php endwhile; ?>
        </div>
        <?php $i=1; while (have_rows('category')) : the_row(); ?>
        <div id="tab-<?php echo $i; ?>" class="content-tab row <?php echo $i === 1 ? 'active' : ''; $i++; ?>">
            <div class="col-md-6 pe-md-4 pe-lg-5">
                <img src="<?php echo esc_url(get_sub_field('image')['url']); ?>"
                    alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>" class="img-fluid animate-this">
            </div>
            <div class="d-flex align-items-center col-md-6">
                <div class="ps-xl-4">
                    <?php while (have_rows('heading')) : the_row(); ?>
                    <h2 class="fs-1 fw-normal mb-0 animate-this"><?php the_sub_field('normal_text'); ?></h2>
                    <h3 class="fs-1 fw-bold mb-3 animate-this"><?php the_sub_field('bold_text'); ?></h3>
                    <?php endwhile; ?>
                    <p class="animate-this">
                        <?php while (have_rows('paragraph')) : the_row(); ?><?php the_sub_field('normal_text'); ?>
                        <span class="fw-bold"><?php the_sub_field('bold_text'); ?></span>
                        <?php endwhile; ?>
                    </p>
                    <p class="animate-this mb-1 text-sec">
                        <a href="mailto:<?php the_sub_field('email_id'); ?>"><?php the_sub_field('email_id'); ?></a>
                    </p>
                    <p class="animate-this text-sec">
                        <?php while (have_rows('phone_numbers')) : the_row(); ?>
                        <a
                            href="tel:+91<?php the_sub_field('number_dialed'); ?>"><?php the_sub_field('number_shown'); ?></a>
                        <?php endwhile; ?>
                    </p>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<?php while (have_rows('contact_section_green')) : the_row(); ?>
<div style="background:var(--lgr); padding:50px;"></div>
<section class="fixedbg">
    <div class="container py-5">
        <h2 class="animate-this text-white fs-1 fw-bold"><?php the_sub_field('heading'); ?></h2>
        <p class="text-sec animate-this mt-4"><?php the_sub_field('address'); ?></p>
        <p class="animate-this"><a class="text-sec"
                href="mailto:<?php the_sub_field('email_id'); ?>"><?php the_sub_field('email_id'); ?></a></p>
        <p class="animate-this">
            <?php while (have_rows('phone_numbers')) : the_row(); ?>
            <a href="tel:+91 <?php the_sub_field('number_dialed'); ?>" class="text-sec">
                <?php the_sub_field('number_shown'); ?> </a>
            <?php endwhile; ?>
        </p>
        <p class="text-white animate-this pt-3">
            <a href="<?php the_sub_field('view_location_link'); ?>" class="btn-prime px-4 py-2">View Location</a>
        </p>
    </div>
</section>
<?php endwhile; ?>

<section class="pad">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 pe-lg-4 pb-4 pb-lg-0">
                <div class="bg-white rounded-4 shadow h-100 ms-xl-2 p-4 animate-this">
                    <h2 class="fs-1 fw-bold mb-4 animate-this"><?php the_field('form_heading'); ?></h2>
                    <?php $form = get_field('form_shortcode'); echo do_shortcode($form); ?>
                </div>
            </div>
            <div class="col-lg-5 d-flex align-items-center">
                <div class="ps-lg-4">
                   <h3 class="fs-1 fw-bold mb-4 animate-this"><?php the_field('form_heading'); ?></h3>
                   <div class="fs-base animate-this">
                    <?php the_field('form_description'); ?>
                    <a class="text-sec d-block" style="margin-top:-1rem;" href="mailto:<?php the_field('email_id'); ?>"><?php the_field('email_id'); ?></a>
                   </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const pageItems = document.querySelectorAll(".pagination-year .page-item");
    const contentTabs = document.querySelectorAll(".content-tab");

    pageItems.forEach((item) => {
        item.addEventListener("click", function() {
            pageItems.forEach((i) => i.classList.remove("active"));
            contentTabs.forEach((tab) => tab.classList.remove("active"));
            this.classList.add("active");
            const tabId = this.getAttribute("data-tab");
            document.getElementById(tabId).classList.add("active");
        });
    });
});
</script>

<?php get_footer(); ?>