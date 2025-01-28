<?php  get_header(); 
?>

<section class="pad" >
    <div class="container">
        <div class="row">
            <div class="col-12  ">
                <h1 class="text-prime text-star mb-5"><?php the_title(); ?></h1>
                <div class="text">
                <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php  get_footer(); ?>