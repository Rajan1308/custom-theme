<?php
/**
 * Hero setup
 *
 * @package beco
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$pageID = get_the_ID();
$home_bannres = get_field('home_bannres', $pageID);
?>
<!-- Start Home Banner -->
<?php if($home_bannres): ?>
<section class="section sec-banner banner-home" >
	<div class="owl-carousel" >
		<?php foreach($home_bannres as $banners): 
			$banner_cta = $banners['banner_cta'];
			?>
			<div class="item">
					<div class="container">
							<div class="row">
									<div class="col-md-6 col-12 left-side" >
											<img src="<?php get_stylesheet_directory_uri() ?>/ui/images/favicon.png" alt="icon" class="animate__animated animate__fadeIn">
											<?php if($banners['hero_heading']):?><h2 class="animate__animated animate__fadeInLeftBig"><?= $banners['hero_heading']?> </h2><?php endif; ?>
											<?php if($banners['hero_sub_heading']):?><h1 class="animate__animated animate__fadeInLeftBig"><?= $banners['hero_sub_heading']?></h1><?php endif; ?>
											<?php if($banners['banner_content']):?><p class="animate__animated animate__fadeInLeftBig"><?= $banners['banner_content']?></p><?php endif; ?>
											<?php if($banner_cta):?>
												<div class="links animate__animated animate__fadeInUp">
													<?php foreach($banner_cta as $ctas):?>
													<a href="<?= $ctas['hero_cta_link'] ?>" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#registerModal"><?= $ctas['hero_cta_label'] ?></a>
													<a href="<?= $ctas['hero_cta_link'] ?>" class="btn btn-default"><?= $ctas['hero_cta_label'] ?></a>
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