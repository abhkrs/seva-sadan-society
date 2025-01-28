<?php
get_header();
?>

<main>
	<section>
		<div class="container text-center pt-5" data-aos="fade-right" style="padding-bottom:80px;">
			<div class="fw-bold text-sec" style="font-size:18vw; line-height:110%;">404</div>
			<h1 class="py-4 fs-2">Oops! the page you are looking for does not exist or has moved to new URL!</h1>
			<div class="d-flex justify-content-center flex-wrap mt-3 gap-2">
				<a class="btn-prime px-4" href="javascript:history.back()">Back</a>
				<a class="btn-prime" href="<?php echo home_url(); ?>">Home</a></h3>
			</div>
	</section>
</main>


<?php
get_footer();
?>