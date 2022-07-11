<?php
/**
 * Template Name: What You Get Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package beco
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$pageID = get_the_ID();

get_header();
$header_image = get_field('header_image', $pageID);

$image_with_contnet_featured_image = get_field('image_with_contnet_featured_image', $pageID);
$image_with_contnet_content_block = get_field('image_with_contnet_content_block', $pageID);

$content_with_image_content_block = get_field('content_with_image_content_block', $pageID);
$content_with_image_featured_image = get_field('content_with_image_featured_image', $pageID);

$image_form_featured_image = get_field('image_form_featured_image', $pageID);
$image_form_form_shortcode = get_field('image_form_form_shortcode', $pageID);

$platform_overview_the_tech_title = get_field('platform_overview_the_tech_title', $pageID);
$platform_overview = get_field('platform_overview', $pageID);

$fotas_heading = get_field('fotas_heading', $pageID);
$fotas_featured_image = get_field('fotas_featured_image', $pageID);
$fotas_form_shortcode = get_field('fotas_form_shortcode', $pageID);

$do_you_want_to_show_our_partners_section = get_field('do_you_want_to_show_our_partners_section', $pageID);

$the_tech_title = get_field('the_tech_title', $pageID);
$the_tech_content_block = get_field('the_tech_content_block', $pageID);
$the_tech_featured_content = get_field('the_tech_featured_content', $pageID);

$delivery_services_title = get_field('delivery_services_title', $pageID);
$delivery_services_content_block = get_field('delivery_services_content_block', $pageID);
$delivery_services_featured_info = get_field('delivery_services_featured_info', $pageID);

$products_delivered_section_title = get_field('products_delivered_section_title', $pageID);
$products_delivered_section_content_block = get_field('products_delivered_section_content_block', $pageID);
$products_delivered_section_image = get_field('products_delivered_section_image', $pageID);

$delivered_locationrep = get_field('delivered_locationrep', $pageID);
?>
<!-- Start Home Banner -->
<section class="section sec-banner banner-inner">
    <div class="top-circle circle"><img src="<?= get_template_directory_uri();?>/ui/images/cirecle1.png" alt="image"></div>
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-4 col-md-3 col-12 left-side" data-aos="fade-right" data-aos-offset="100" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
                <h1 class="h2"><?= get_the_title( $pageID )?></h1>
                <div class="nav-links">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Home', 'beco');?>  </a>
                    <span>/</span>
                    <a href="#"><?= get_the_title($pageID)?></a>
                </div>
            </div>
            <div class="col-lg-8 col-md-9 col-12"  data-aos="fade-left" data-aos-offset="100" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
                <div class="image-content">
                    <img src="<?= $header_image ?>" class="img-fluid" alt="banner">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Start Intro -->

<section class="section sec-what-intro">
  <div class="container">
      <div class="row">
        <?php if($image_with_contnet_featured_image):?>
          <div class="col-md-6 col-12 left-side"  data-aos="fade-right" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
              <img src="<?= $image_with_contnet_featured_image['url'] ?>" class="img-fluid" alt="<?= $image_with_contnet_featured_image['alt'] ?>">
          </div>
          <?php endif; if($image_with_contnet_content_block):?>
          <div class="col-md-6 col-12 right-side"  data-aos="fade-left" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
              <?php echo $image_with_contnet_content_block; ?>
          </div>
          <?php endif; ?>
      </div>
  </div>
</section>

 <!-- Start carrier Section -->
 <section class="section sec-what-carrier">
    <div class="container">
        <div class="row">
          <?php if($content_with_image_content_block):?>
            <div class="col-md-6 col-12 left-side"  data-aos="fade-right" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
                <?php echo $content_with_image_content_block; ?>
            </div>
            <?php endif; if($content_with_image_featured_image):?>
            <div class="col-md-6 col-12 right-side"  data-aos="fade-left" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
                <div class="image-content text-center">
                    <img src="<?=$content_with_image_featured_image['url']?>" class="img-fluid" alt="<?=$content_with_image_featured_image['alt']?>">
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Start Register Form -->
<section class="section sec-delivery-form sec-register-form">
  <div class="top-crical pos-crical"><img src="<?= get_template_directory_uri();?>/ui/images/cirecle1.png" alt="image"></div>
  <div class="bottom-crical pos-crical"><img src="<?= get_template_directory_uri();?>/ui/images/cirecle1.png" alt="image"></div>
  <div class="container">
      <div class="row row-content"> 
          <div class="col-lg-6 col-12 right-side"  data-aos="fade-right" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
              <div class="image-content">
                  <img src="<?=$image_form_featured_image['url']?>" class="img-fluid" alt="<?=$image_form_featured_image['alt']?>">
              </div>
          </div>

          <div class="col-lg-6 col-12 left-side"  data-aos="fade-left" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" >
              <h2>Register For <span>Free</span></h2>
              <?php echo do_shortcode( $image_form_form_shortcode ); ?>
          </div>
          
      </div>
  </div>
</section>

<!-- Start Platform Section -->
<section class="section sec-benefits sec-platform">
    <div class="container">
      <?php if($platform_overview_the_tech_title):?>
        <div class="title text-center" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" >
            <h2><?= $platform_overview_the_tech_title ?></h2>
        </div>
        <?php endif; if($platform_overview):?>
        <div class="row">
          <?php foreach($platform_overview as $platformOview):?>
            <div class="col-lg-3 col-md-6 col-12" data-aos="fade-in" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" >
                <div class="box">
                    <?php if($platformOview['platform_overview_icon']):?><img src="<?= $platformOview['platform_overview_icon']['url'] ?>" alt="image"><?php endif; ?>
                    <h3><?= $platformOview['platform_overview_title'] ?></h3>
                    <p><?= $platformOview['platform_overview_content'] ?></p>
                </div>
            </div>
           <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<section class="section sec-delivery-form">
		<div class="top-crical pos-crical"><img src="<?= get_template_directory_uri();?>/ui/images/cirecle1.png" alt="image"></div>
		<div class="bottom-crical pos-crical"><img src="<?= get_template_directory_uri();?>/ui/images/cirecle1.png" alt="image"></div>
		<div class="container">
				<div class="row">
						<div class="col-lg-6 col-12 left-side" data-aos="fade-right" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
								<?php if($fotas_heading):?><h2><?= $fotas_heading ?></h2><?php endif; ?>
								<?php echo do_shortcode($fotas_form_shortcode ); ?>
						</div>
						<?php if($fotas_featured_image):?>
						<div class="col-lg-6 col-12 right-side"  data-aos="fade-left" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
								<div class="image-content">
										<img src="<?= $fotas_featured_image['url']?>" class="img-fluid" alt="<?= $fotas_featured_image['alt']?>">
								</div>
						</div>
						<?php endif; ?>
				</div>
		</div>
</section>

<?php if($do_you_want_to_show_our_partners_section == true): ?>
  <section class="section sec-partners sec-what-partners">
    <div class="container">
      <?php get_template_part( 'global-templates/our-partners' ); ?>
    </div>
</section>
<?php endif; ?>

 <!-- Start The Tech -->
 <section class="section sec-tech">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 left-side"  data-aos="fade-right" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
                <h2><?= $the_tech_title ?></h2>
                <?php echo $the_tech_content_block; ?>
            </div>
            <?php if($the_tech_featured_content):?>
            <div class="col-lg-6 col-12 right-side" data-aos="fade-left" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
                <div class="owl-carousel">
                  <?php foreach($the_tech_featured_content as $ttfc):?>
                    <div class="item">
                        <img src="<?=$ttfc['the_tech_featured_content_image']['url']?>" class="img-fluid" alt="<?=$ttfc['the_tech_featured_content_image']['alt']?>">
                        <h3><?=$ttfc['the_tech_featured_content_title']?> </h3>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Start Secvices Section -->
<section class="section sec-services">
  <div class="container">
      <div class="title text-center" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
          <h2><?= $delivery_services_title ?></h2>
          <?php echo $delivery_services_content_block; ?>
      </div>
      <?php if($delivery_services_featured_info): ?>
      <div class="row" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
          <?php foreach($delivery_services_featured_info as $featured_info):?>
          <div class="col-lg-3 col-md-4 col-6">
              <div class="box">
                <?php if($featured_info['delivery_services_featured_info_icon']):?>
                  <div class="icon">
                      <i class="<?= $featured_info['delivery_services_featured_info_icon'] ?>"></i>
                  </div>
                  <?php endif; ?>
                  <h3><?= $featured_info['delivery_services_featured_info_title'] ?></h3>
                  <p><?= $featured_info['delivery_services_featured_info_content'] ?> </p>
              </div>
          </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
  </div>
</section>

 <!-- Start Delivered Section -->
 <section class="section sec-delivered">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 left-side"  data-aos="fade-right" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
                <h2><?= $products_delivered_section_title ?></h2>
                <?php echo $products_delivered_section_content_block; ?>
            </div>
            <?php if($products_delivered_section_image):?>
            <div class="col-lg-6 col-12 right-side" data-aos="fade-left" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
                <div class="img-content text-center">
                    <img src="<?= $products_delivered_section_image['url'] ?>" class="img-fluid" alt="<?= $products_delivered_section_image['alt'] ?>">
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php if($delivered_locationrep):?>
    <div class="slider" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
        <div class="owl-carousel">
          <?php foreach($delivered_locationrep as $deliveredData):?>
            <div class="item">
                <img src="<?= $deliveredData['delivered_location_image']['url']?>" class="img-fluid" alt="<?= $deliveredData['delivered_location_image']['url']?>">
                <h3><?= $deliveredData['delivered_location_title']?> </h3>
                <?php if($deliveredData['location_link'] && $deliveredData['location_label'] ==''):?>
                <a href="<?= $deliveredData['location_link']?>"><i class="fal fa-map-marker-alt"></i> <?= $deliveredData['location_label']?></a>
                <?php endif;?>
            </div>
          <?php endforeach ?>
        </div>
    </div>
    <?php endif ?>
</section>
<?php get_template_part( 'global-templates/development-partner' ); ?>
<?php
get_footer();
