<?php

/**
 *Template Name: Our Team
 */
get_header();
?>
<style>
.contnetcard .content{
    min-height:136px;
}

.contnetcard{
    box-shadow: 0 0 5px 0 #0001;
    transition:all .3s ease-in-out;
}
.contnetcard:hover{
    box-shadow: 0 0 12px 3px #0003;
    transform:translateY(-5px);
     transition:all .3s ease-in-out;
}

</style>
<?php include('hero.php'); ?>
<section class="pad">
    <div class="container">
        <?php while (have_rows('managing_committee_heading')) : the_row(); ?>
        <h2 class="fs-1 fw-normal text-center animate-this"> <?php the_sub_field('normal_text'); ?>
            <span class="fw-bold text-prime"> <?php the_sub_field('bold_text'); ?></span>
        </h2>
        <?php endwhile; ?>
        <div class="row justify-content-center mt-4 mt-md-5">
            <?php while (have_rows('managing_committee')) : the_row(); ?>
            <div class="col-lg-4 col-md-6 mb-4 px-2 animate-this">
                <div class="bg-white rounded-4 overflow-hidden m-1 mb-2 contnetcard">
                    <img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('name'); ?>"
                        class="img-fluid w-100">
                    <div class="content p-3 p-sm-4">
                        <h4 class="fs-5 fw-bold"><?php the_sub_field('name'); ?></h4>
                        <p class="fw-normal mb-0"><?php the_sub_field('description'); ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>

        <div style="background: #FFE3C2;" class="p-1 rounded mb-4 mb-lg-5 mt-3 animate-this"></div>

        <?php while (have_rows('patron_member_heading')) : the_row(); ?>
        <h2 class="fs-1 fw-normal text-center animate-this"> <?php the_sub_field('normal_text'); ?>
            <span class="fw-bold text-prime"> <?php the_sub_field('bold_text'); ?></span>
        </h2>
        <?php endwhile; ?>
        <div class="row justify-content-center mt-4 mt-md-5">
            <?php while (have_rows('patron_member')) : the_row(); ?>
            <div class="col-lg-4 col-md-6 mb-4 px-2 animate-this">
                <div class="bg-white rounded-4 overflow-hidden m-1 mb-2 contnetcard">
                    <img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('name'); ?>"
                        class="img-fluid w-100">
                    <div class="content p-3 p-sm-4">
                        <h4 class="fs-5 fw-bold"><?php the_sub_field('name'); ?></h4>
                        <p class="fw-normal mb-0"><?php the_sub_field('description'); ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>

        <div style="background: #FFE3C2;" class="p-1 rounded mb-4 mb-lg-5 mt-3 animate-this"></div>

        <?php while (have_rows('advisory_panel_heading')) : the_row(); ?>
        <h2 class="fs-1 fw-normal text-center animate-this"> <?php the_sub_field('normal_text'); ?>
            <span class="fw-bold text-prime"> <?php the_sub_field('bold_text'); ?></span>
        </h2>
        <?php endwhile; ?>
        <div class="row justify-content-center mt-4 mt-md-5">
            <?php while (have_rows('advisory_panel')) : the_row(); ?>
            <div class="col-lg-4 col-md-6 mb-4 px-2 animate-this">
                <div class="bg-white rounded-4 overflow-hidden m-1 mb-2 contnetcard">
                    <img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('name'); ?>"
                        class="img-fluid w-100">
                    <div class="content p-3 p-sm-4">
                        <h4 class="fs-5 fw-bold"><?php the_sub_field('name'); ?></h4>
                        <p class="fw-normal mb-0"><?php the_sub_field('description'); ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>