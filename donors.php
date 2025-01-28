<?php

/**
 * Template Name: Donors
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
    display: block;
}

.badgemark {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 10;
    height: 30px;
}
</style>
<?php include('hero.php'); ?>
<section class="pad">
    <div class="container">
        <div class="pagination-year pb-4 pb-lg-5">
            <div class="page-item active" data-tab="company-tab">Company Donors</div>
            <div class="page-item" data-tab="individual-tab">Individual Donors</div>
        </div>

        <div class="content-tab active" id="company-tab">
            <?php while (have_rows('company_donors')) : the_row(); ?>
            <div class="row mt-4 animate-this">
                <div class="col-lg-4">
                    <div class="position-relative bg-white rounded-4 overflow-hidden h-100 p-4 d-flex justify-content-center align-items-center">
                        <img src="<?php the_sub_field('image'); ?>"
                        alt="<?php the_sub_field('name'); ?>" class="img-fluid">
                        <?php 
                        $type = get_sub_field('donor_type');
                        if ($type === 'gold') : ?>
                            <img class="badgemark" src="<?php echo get_template_directory_uri(); ?>/images/gold.svg" alt="gold">
                        <?php elseif ($type === 'sliver') : ?>
                            <img class="badgemark" src="<?php echo get_template_directory_uri(); ?>/images/silver.svg" alt="silver">
                        <?php elseif ($type === 'platinum') : ?>
                            <img class="badgemark" src="<?php echo get_template_directory_uri(); ?>/images/platinum.svg" alt="platinum">
                        <?php endif; ?>

                       
                    </div>
                </div>
                <div class="col-lg-8 d-flex flex-column justify-content-center p-4 pe-lg-0">
                    <h3 class="fs-2 fw-normal"><?php the_sub_field('name'); ?></h3>
                    <p class="mb-0"><?php the_sub_field('description'); ?></p>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <div class="content-tab" id="individual-tab">
            <?php while (have_rows('individual_donors')) : the_row(); ?>
            <div class="row mt-4 animate-this">
                <div class="col-lg-4">
                    <div class="position-relative bg-white rounded-4 overflow-hidden h-100 p-4 d-flex justify-content-center align-items-centerd-flex justify-content-center align-items-center">
                        <img src="<?php the_sub_field('image'); ?>"
                        alt="<?php the_sub_field('name'); ?>" class="img-fluid">
                        <?php 
                        $type = get_sub_field('donor_type');
                        if ($type === 'gold') : ?>
                            <img class="badgemark" src="<?php echo get_template_directory_uri(); ?>/images/gold.svg" alt="gold">
                        <?php elseif ($type === 'sliver') : ?>
                            <img class="badgemark" src="<?php echo get_template_directory_uri(); ?>/images/silver.svg" alt="silver">
                        <?php elseif ($type === 'platinum') : ?>
                            <img class="badgemark" src="<?php echo get_template_directory_uri(); ?>/images/platinum.svg" alt="platinum">
                        <?php endif; ?>

                       </div> 
                    </div>
                <div class="col-lg-8 d-flex flex-column justify-content-center p-4 pe-lg-0">
                    <h3 class="fs-2 fw-normal"><?php the_sub_field('name'); ?></h3>
                   <p class="mb-0"><?php the_sub_field('description'); ?></p>
                </div>
            </div>
            <?php endwhile; ?>
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
