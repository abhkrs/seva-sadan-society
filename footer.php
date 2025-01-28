</main>
<footer>
    <div class="container pt-5">
        <div class="footernav">
            <div class="pe-md-3 mt-0">
                <img src="<?php the_field('logo','options'); ?>" alt="Seva Sadan Logo"
                    class="img-fluid animate-this w-50" style="margin-top:-40px;">
                <p class="text-white animate-this"><?php the_field('description_below_logo','options'); ?></p>
            </div>
            <div>
                <h4 class="fw-bold text-white animate-this mb-4">Take Action</h4>
                <?php while (have_rows('take_action','options')) : the_row(); ?>
                <div class="animate-this">
                    <a href="<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_text'); ?></a>
                </div>
                <?php endwhile; ?>
            </div>
            <div>
                <h4 class="fw-bold text-white animate-this mb-4">Donate</h4>
                <?php while (have_rows('donate','options')) : the_row(); ?>
               <div class="animate-this">
                    <a href="<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_text'); ?></a>
                </div>
                <?php endwhile; ?>
            </div>
            <div>
                <h4 class="fw-bold text-white animate-this mb-4">Get to know us</h4>
                <?php while (have_rows('get_to_know_us','options')) : the_row(); ?>
                <div class="animate-this">
                    <a href="<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_text'); ?></a>
                </div>
                <?php endwhile; ?>
            </div>
            <div>
                <h4 class="fw-bold text-white animate-this mb-4">Connect</h4>
                <div class="animate-this text-white mb-3">
                     Call us at: <br>
                    <a href="tel:<?php the_field('phone_number','options'); ?>"><?php the_field('phone_number','options'); ?></a>
                </div>

                <div class="animate-this text-white">
                     Email us at: <br>
                    <a href="tel:<?php the_field('email_id','options'); ?>"><?php the_field('email_id','options'); ?></a>
                </div>
            </div>
        </div>
        <hr class="text-white">
        <div class="row py-3">
            <div class="col-lg-3">
                <p class="text-white fs-6">Copyright 2024. All Rights Reserved.</p>
            </div>
            <div class="col-lg-6">
                <p class="text-center text-white fs-6">
                   
                    <a href="">Terms & Conditions</a> | <a href="">Privacy Policy</a> | <a href="">Refund &
                        Cancellations</a>
                </p>
            </div>
            <div class="col-lg-3">
                <p class="text-white text-end fs-6">Design and Developed by <a href="https://innovins.com"
                        class="text-sec">Innovins</a></p>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

<script>
jQuery(document).ready(function($) {
    $('.dropdowns a[href="javascript:void(0);"]').hover(function() {
        $('.megamenu').addClass('active');
    }, );

    $('header').mouseleave(function() {
        $('.megamenu').removeClass('active');
    });

    $('.dropdowns a').not('[href="javascript:void(0);"]').hover(function() {
        $('.megamenu').removeClass('active');
    });
});


document.addEventListener("DOMContentLoaded", () => {
    const elements = document.querySelectorAll('.animate-this');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
                observer.unobserve(entry
                    .target);
            }
        });
    }, {
        threshold: 0.1
    });
    elements.forEach(element => {
        observer.observe(element);
    });
});
</script>
</body>

</html>