<?php
/**
 * Template Name: Home Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package beco
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$pageID = get_the_ID();

get_header();
$home_bannres = get_field('home_bannres', $pageID);

$enable__disable = get_field('enable__disable', $pageID);
$home_bannres = get_field('home_bannres', $pageID);

$left_side = get_field('left_side', $pageID);
$two_column_image = get_field('two_column_image', $pageID);
$two_column_video = get_field('two_column_video', $pageID);
$video_background_image = get_field('video_background_image', $pageID);
$right_section_heading = get_field('right_section_heading', $pageID);
$right_section_content = get_field('right_section_content', $pageID);
$right_section_cta = get_field('right_section_cta', $pageID);

// what we offers


$what_we_offers_heading = get_field('what_we_offers_heading', $pageID);
$a_section = get_field('a_section', $pageID);
$whatwe_offer_content = get_field('whatwe_offer_content', $pageID);
$b_section = get_field('b_section', $pageID);


$fotas_heading = get_field('fotas_heading', $pageID);
$fotas_featured_image = get_field('fotas_featured_image', $pageID);
$fotas_form_shortcode = get_field('fotas_form_shortcode', $pageID);

?>
<!-- Start Home Banner -->
<?php if($home_bannres): ?>
<section class="section sec-banner banner-home" >
	<div class="owl-carousel">
		<?php foreach($home_bannres as $banners): 
			$banner_cta = $banners['banner_cta'];
			?>
			<div class="item">
					<div class="container">
							<div class="row">
									<div class="col-md-6 col-12 left-side" >
											<img src="<?= get_stylesheet_directory_uri() ?>/ui/images/favicon.png" alt="icon" class="animate__animated animate__fadeIn">
											<?php if($banners['hero_heading']):?><h2 class="animate__animated animate__fadeInLeftBig"><?= $banners['hero_heading']?> </h2><?php endif; ?>
											<?php if($banners['hero_sub_heading']):?><h1 class="animate__animated animate__fadeInLeftBig"><?= $banners['hero_sub_heading']?></h1><?php endif; ?>
											<?php if($banners['banner_content']):?><p class="animate__animated animate__fadeInLeftBig"><?= $banners['banner_content']?></p><?php endif; ?>
											<?php if($banner_cta):?>
												<div class="links animate__animated animate__fadeInUp">
													<?php foreach($banner_cta as $ctas): 
														$ctaspopup = $ctas['cta_popup']; 
														?>
													<a href="<?php if($ctaspopup==true):?>#<?php else: ?><?= $ctas['hero_cta_link'] ?><?php endif; ?>" class="<?php if($ctaspopup==true):?>btn btn-light<?php else: ?>btn btn-default<?php endif; ?>" <?php if($ctaspopup==true):?>data-bs-toggle="modal" data-bs-target="<?= $ctas['hero_cta_link'] ?>"<?php endif; ?>><?= $ctas['hero_cta_label'] ?></a>
													
													<?php endforeach; ?>
											</div>
											<?php endif; ?>
									</div>
									<div class="col-md-6 col-12 right-side">
											<img src="<?= $banners['background_image']?>" alt="image" class="animate__animated animate__slideInUp">
									</div>
							</div>
					</div>
			</div>
		<?php endforeach; ?>
			
	</div>
</section>
<?php endif; ?>

<section class="section sec-video">
    <div class="container">
		<?php if($enable__disable == true): ?>
			<?php get_template_part( 'global-templates/client-logo' );
 			endif; ?>
 <!-- Start Video Seciton -->
			<div class="sec-video-row row">
            <div class="col-md-6 col-12 left-side" data-aos="fade-right" data-aos-offset="500" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" data-aos-anchor=".sec-offer">
              <?php if($left_side==true):?>  
								<img src="<?= $two_column_image['url']?>" alt="<?= $two_column_image['alt']?>">
								<?php else: ?>
									<a href="<?= $two_column_video ?>" class="video-trigger">
                    <img src="<?= $video_background_image['url']?>" alt="<?= $video_background_image['alt']?>">
                	</a>
								<?php endif; ?>
            </div>
            <div class="col-md-6 col-12 right-side" data-aos="fade-left" data-aos-offset="500" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" data-aos-anchor=".sec-offer">
                <?php if($right_section_heading):?><h2><?= $right_section_heading ?></h2><?php endif; ?>
                <?php echo $right_section_content; ?>
                <?php if($right_section_cta):?><a href="<?= $right_section_cta['url'] ?>" class="btn btn-light"><?= $right_section_cta['title'] ?></a><?php endif; ?>
            </div>
        </div>
		</div>
</section>
<!-- Start Section Offer -->
<section class="section sec-offer">
		<div class="container">
			<?php if($what_we_offers_heading ):?>
				<div class="title" data-aos="fade-in" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" data-aos-anchor=".sec-benefits">
						<h2><?= $what_we_offers_heading  ?></h2>
				</div>
				<?php endif; ?>

				<div class="line" data-aos="fade-in" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" data-aos-anchor=".sec-benefits">
						<img src="<?= get_template_directory_uri(); ?>/ui/images/line.png" alt="line">
				</div>
				<div class="row">
						<div class="col-md-3 col-12 box"  data-aos="fade-in" data-aos-offset="500" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" data-aos-anchor=".sec-benefits">
								<div class="circle bg-blue">
										<?= $a_section['a_section_title'] ?>
								</div>
								<?= $a_section['a_section_content'] ?>
						</div>
						<?php if($whatwe_offer_content):?>
						<div class="col-md-6 col-12 box center-box"  data-aos="fade-in" data-aos-offset="500" data-aos-duration="1000" data-aos-delay="300" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" data-aos-anchor=".sec-benefits">
								<?php echo $whatwe_offer_content; ?>
						</div>
						<?php endif; ?>
						<?php if($b_section):?>
						<div class="col-md-3 col-12 box"  data-aos="fade-in" data-aos-offset="500" data-aos-duration="1000" data-aos-delay="500" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" data-aos-anchor=".sec-benefits">
								<div class="circle bg-orange">
									<?= $b_section['b_section_heading']?>
								</div>
								<?= $b_section['b_section_content']?>
						</div>
						<?php endif; ?>
				</div>
		</div>
</section>
<section class="section sec-benefits">
    <div class="container">
			<?php if($enable__disable == true): ?>
				<?php get_template_part( 'global-templates/benefits' );
				endif; ?>
	</div>
</section>
<!-- Start delivery Form -->
<section class="section sec-delivery-form">
		<div class="top-crical pos-crical"><img src="<?= get_template_directory_uri();?>/ui/images/cirecle1.png" alt="image"></div>
		<div class="bottom-crical pos-crical"><img src="<?= get_template_directory_uri();?>/ui/images/cirecle1.png" alt="image"></div>
		<div class="container">
				<div class="row">
						<div class="col-lg-6 col-12 left-side"  data-aos="fade-right" data-aos-offset="400" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" data-aos-anchor=".sec-interested">
								<?php if($fotas_heading):?><h2><?= $fotas_heading ?></h2><?php endif; ?>
								<?php echo do_shortcode($fotas_form_shortcode )?>
						</div>
						<?php if($fotas_featured_image):?>
						<div class="col-lg-6 col-12 right-side"  data-aos="fade-left" data-aos-offset="400" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" data-aos-anchor=".sec-interested">
								<div class="image-content">
										<img src="<?= $fotas_featured_image['url']?>" class="img-fluid" alt="<?= $fotas_featured_image['alt']?>">
								</div>
						</div>
						<?php endif; ?>
				</div>
		</div>
</section>
<?php get_template_part( 'global-templates/development-partner' ); ?>
<?php
get_footer();
