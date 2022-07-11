<?php
/**
 * The template for displaying all single posts
 *
 * @package beco
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$category = get_the_category();
$firstCategory = $category[0]->cat_name;
get_header();
?>
 <!-- Start Home Banner -->
 <section class="section sec-banner banner-title">
		<div class="container h-100">
				<div class="row h-100">
						<div class="left-side" data-aos="fade-right" data-aos-offset="100" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
								<div class="nav-links">
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home  </a>
										<span>/</span>
										<a href="media.html"><?= $firstCategory ?> </a>
										<span>/</span>
										<a href="#"><?= get_the_title($post->ID )?> </a>
								</div>
						</div>
				</div>
		</div>
</section>
<section class="section sec-media-details" id="single-wrapper">

	<div class="container" id="content" tabindex="-1">

		

			<main class="site-main" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'single' );
				}
				?>

			</main><!-- #main -->

		

		

	</div><!-- #content -->

</section><!-- #single-wrapper -->
 <!-- Start Related Articles Section-->
 <section class="section sec-casestudy sec-related">
		<div class="container"  >
				<div class="title text-center" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
						<h2><?php _e('Related Articles', 'beco');?></h2>
				</div>
				<div class="row"  data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
				<?php

							$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
							if( $related ) foreach( $related as $post ) {
							setup_postdata($post); ?>		
							<div class="col-md-4 col-12">
									<div class="item">
										<a href="<?php the_permalink() ?>">
												<div class="image-content">
													<?php echo get_the_post_thumbnail( $post->ID, 'beco-thumb',array('class' => 'img-fluid') ); ?>
														<div class="overlay">
																<i class="fal fa-plus"></i>
																<span><?php _e('Read More', 'beco');?></span>
														</div>
												</div>
												<div class="date"><?= get_the_date() ?></div>
												<h3><?php the_title(); ?></h3>
										</a>
								</div> 
						</div>
						<?php }
							wp_reset_postdata(); ?>
						
				</div>
		</div>
</section>
<?php
get_footer();
