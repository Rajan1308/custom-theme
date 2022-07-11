<?php
/**
 * Template Name: Why beco Page
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

$introduction_heading = get_field('introduction_heading', $pageID);
$introduction_content_block = get_field('introduction_content_block', $pageID);
$what_we_offer_heading_title = get_field('what_we_offer_heading_title', $pageID);
$what_we_offer = get_field('what_we_offer', $pageID);

$register_for_free_featured_image = get_field('register_for_free_featured_image', $pageID);
$register_for_free_title = get_field('register_for_free_title', $pageID);
$register_form_form_shortcode = get_field('register_form_form_shortcode', $pageID);

$small_heading = get_field('small_heading', $pageID);
$the_support_heading = get_field('the_support_heading', $pageID);
$the_support_content = get_field('the_support_content', $pageID);
$the_support_featured_image = get_field('the_support_featured_image', $pageID);

$testimonials_title = get_field('testimonials_title', $pageID);
$testimonials_heading = get_field('testimonials_heading', $pageID);
$rep_testimonials = get_field('rep_testimonials', $pageID);


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
                    <img src="<?= $header_image['url']?>" class="img-fluid" alt="<?= $header_image['alt']?>">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Start Section Introduction -->
<section class="section sec-intro">
    <div class="container">
        <div class="title text-center" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
            <h2><?= $introduction_heading  ?></h2>
            <?php echo $introduction_content_block; ?>
        </div>
        <?php if($what_we_offer_heading_title):?><h3 class="text-center" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom"><?= $what_we_offer_heading_title ?></h3><?php endif; ?>
        <?php if($what_we_offer):?>
        <div class="content" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
            <div class="row">
              <?php foreach($what_we_offer as $whatweData):?>
                <div class="col-md-4 col-12">
                    <div class="box">
                        <img src="<?= $whatweData['what_we_offer_icon']['url']?>" alt="<?= $whatweData['what_we_offer_icon']['alt']?>">
                        <h3><?= $whatweData['what_we_offer_title']?></h3>
                        <p><?= $whatweData['what_we_offer_content']?></p>
                    </div>
                </div>
              <?php endforeach; ?>

            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

 <!-- Start Register Form -->
 <section class="section sec-delivery-form sec-register-form">
  <div class="top-crical pos-crical"><img src="<?= get_template_directory_uri()?>/ui/images/cirecle1.png" alt="image"></div>
  <div class="bottom-crical pos-crical"><img src="<?= get_template_directory_uri()?>/ui/images/cirecle1.png" alt="image"></div>
  <div class="container">
      <div class="row row-content"> 
          <div class="col-lg-6 col-12 right-side"  data-aos="fade-right" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
              <div class="image-content">
                  <img src="<?= $register_for_free_featured_image['url'] ?>" class="img-fluid" alt="<?= $register_for_free_featured_image['alt'] ?>">
              </div>
          </div>

          <div class="col-lg-6 col-12 left-side"  data-aos="fade-left" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" >
              <h2><?= $register_for_free_title ?></h2>
              <?php echo do_shortcode( $register_form_form_shortcode )?>
          </div>
          
      </div>
  </div>
</section>


<!-- Start Benefits Section -->
<section class="section sec-benefits sec-benefits-support">
  <div class="container">
      <div class="row row-support">
          <div class="col-md-6 col-12" data-aos="fade-right" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" >
              <h4><?= $small_heading ?></h4>
              <h2><?= $the_support_heading ?></h2>
          </div>
          <div class="col-md-6 col-12" data-aos="fade-left" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" >
              <?= $the_support_content ?>
          </div>
      </div>
      <?php get_template_part( 'global-templates/benefits' );?>
      <?php if( $the_support_featured_image):?>
      <div class="image-content text-center" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" >
          <img src="<?= $the_support_featured_image['url']?>" class="img-fluid" alt="<?= $the_support_featured_image['alt']?>">
      </div>
      <?php endif;?>
  </div>
</section>


<!-- Start TESTIMONIALS Section-->
<section class="section sec-testimonials">
  <div class="container">
      <div class="title text-center" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
          <h4><?= $testimonials_title ?></h4>
          <h2><?= $testimonials_heading ?></h2>
      </div>
      <div class="" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
          <div class="owl-carousel">
          <?php foreach($rep_testimonials as $testi):?>    
          <div class="item">
                  <div class="box">
                      <i class="fas fa-quote-right"></i>
                      <div class="user-info">
                        <?php if($testi['testimonials_icon']):?>
                          <div class="user-img">
                              <img src="<?= $testi['testimonials_icon']['url']?>" alt="<?= $testi['testimonials_icon']['alt']?>">
                          </div>
                          <?php endif; ?>
                          <div class="user-name">
                              <h3><?= $testi['testimonials_name']?></h3>
                              <p><?= $testi['testimonials_desigination']?></p>
                          </div>
                      </div>
                      <div class="dis">
                          <p>
                          <?= $testi['testimonials_content']?>
                          </p>
                      </div>
                  </div>
              </div>
              <?php endforeach; ?>
          </div>
          
      </div>
      
  </div>
</section>
<section class="section sec-partners">
  <div class="container">
  <?php get_template_part( 'global-templates/client-logo' ); ?>
  <?php get_template_part( 'global-templates/our-partners' ); ?>
  </div>
</section>
<?php get_template_part( 'global-templates/development-partner' ); ?>
<?php
get_footer();
