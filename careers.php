<?php

/**
 *Template Name: Careers
 */
get_header();
?>

<?php include('hero.php'); ?>
<?php include('topsection.php'); ?>

<?php while (have_rows('contact_section')) : the_row(); ?>
<div class="p-3"></div>
<div style="background:var(--lgr); padding:50px;"></div>
<section class="fixedbg">
    <div class="container py-5">
        <h2 class="animate-this text-white fs-1 fw-bold"><?php the_sub_field('heading'); ?></h2>
        <?php while (have_rows('paragraph')) : the_row(); ?>

        <p class="text-white my-4"><?php the_sub_field('normal_text'); ?> <span
                class="text-sec"><?php the_sub_field('orange_text'); ?></span></p>

        <?php endwhile; ?>
        <p class="animate-thi mb-2"><a class="text-sec"
                href="mailto:<?php the_sub_field('email_id'); ?>"><?php the_sub_field('email_id'); ?></a></p>
        <p class="animate-thi">
            <?php while (have_rows('phone_numbers')) : the_row(); ?>
            <a href="tel:+91 <?php the_sub_field('number_dialed'); ?>" class="text-sec">
                <?php the_sub_field('number_shown'); ?> </a>
            <?php endwhile; ?>
        </p>
    </div>
</section>
<?php endwhile; ?>

<section class="pad">
    <div class="container">
        <?php include('formrow.php');?>
    </div>
</section>
<?php get_footer(); ?>
