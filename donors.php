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

.page-item {
    /* background: #fff; */
    background-color: var(--sec);
    color: #fff;
    padding: 8px 40px;
    border-radius: 6px;
    position: relative;
    cursor: pointer;
    width: fit-content;
}

 .page-item:hover,
 .page-item.active {
    background-color: var(--sec);
    color: #fff;
}
 .page-item::after {
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
    /* display: none; */
    margin-bottom:40px;
}
.content-tab:last-child {
    margin-bottom:0;
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
	
	strong{
		color:inherit;
	}
</style>
<?php include('hero.php'); ?>
<section class="pad">
    <div class="container">
		<?php while (have_rows('heading')) : the_row(); ?>
		<h2 class="animate-this text-prime fs-1 mb-3 mb-lg-4"><?php the_sub_field('normal_text'); ?> <span
						class="fw-bold text-prime fs-1"><?php the_sub_field('bold_text'); ?></span></h2>
		<?php endwhile; ?>
		<div class="animate-this">
			<?php the_field('description'); ?>
		</div>
        <!-- <div class="pagination-year py-4 animate-this">
            <?php $tab=1; while (have_rows('donors_yearly')) : the_row(); ?>
                <div class="page-item <?php echo $tab === 1 ? 'active':'';?>" data-tab="tab-<?php echo $tab; $tab++; ?>"><?php get_sub_field('year'); ?></div>
            <?php endwhile; ?>
        </div> -->
        <?php $tab=1; while (have_rows('donors_yearly')) : the_row(); ?>
            <div class="content-tab <?php echo $tab === 1 ? 'active':'';?>" id="tab-<?php echo $tab; $tab++; ?>">
				<div class="animate-this">
					<?php the_sub_field('description'); ?>
                    <!-- <div class="page-item">
                    <?php get_sub_field('year'); ?>
                    </div> -->
				</div>
				<?php if( have_rows('donors') ): ?>
					<div class="pt-3 animate-this">
						<details>
							<summary class="fs-5 text-prime fw-bold">View Donors</summary>
								<?php while (have_rows('donors')) : the_row(); ?>
									<div class="mt-4 animate-this">
										<div class="position-relative bg-white rounded-4 overflow-hidden h-100 p-4">
                                            <?php
                                                $file = get_sub_field('pdf'); 
                                                $url = $file['url'];  // PDF ka URL
                                            ?>
											<a class="d-flex align-items-center justify-content-between" href="<?php echo esc_url($url); ?>" target="_blank">
                                                <span>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/pdf.png" alt="" width="35">
                                                    <span class="px-sm-3 mb-0"><?php the_sub_field('name'); ?></span>
                                                </span>
                                                <span class="btn-prime ">View</span>

                                            </a>
                                            

											<!-- <?php
											$type = get_sub_field('donor_type');
											if ($type === 'gold') : ?>
												<img class="badgemark" src="<?php echo get_template_directory_uri(); ?>/images/gold.svg" alt="gold">
											<?php elseif ($type === 'sliver') : ?>
												<img class="badgemark" src="<?php echo get_template_directory_uri(); ?>/images/silver.svg" alt="silver">
											<?php elseif ($type === 'platinum') : ?>
												<img class="badgemark" src="<?php echo get_template_directory_uri(); ?>/images/platinum.svg" alt="platinum">
											<?php endif; ?> -->
										</div>
									</div>
								<?php endwhile; ?>
						</details>
					</div>
				<?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<script>
// document.addEventListener("DOMContentLoaded", function() {
//     const pageItems = document.querySelectorAll(".pagination-year .page-item");
//     const contentTabs = document.querySelectorAll(".content-tab");

//     pageItems.forEach((item) => {
//         item.addEventListener("click", function() {
//             pageItems.forEach((i) => i.classList.remove("active"));
//             contentTabs.forEach((tab) => tab.classList.remove("active"));
//             this.classList.add("active");
//             const tabId = this.getAttribute("data-tab");
//             document.getElementById(tabId).classList.add("active");
//         });
//     });
// });
</script>

<?php get_footer(); ?>
