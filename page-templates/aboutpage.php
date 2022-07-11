<?php
/**
 * Template Name: About Page
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
$intro_cta = get_field('intro_cta', $pageID);

$oet_heading = get_field('oet_heading', $pageID);
$oet_content = get_field('oet_content', $pageID);
$oet_teams = get_field('oet_teams', $pageID);

$our_story_title = get_field('our_story_title', $pageID);
$our_story_heading = get_field('our_story_heading', $pageID);
$our_story_content_block = get_field('our_story_content_block', $pageID);
$our_story_cta = get_field('our_story_cta', $pageID);
$our_story_featured_image = get_field('our_story_featured_image', $pageID);
$our_story_video_link = get_field('our_story_video_link', $pageID);

$counter = get_field('counter', $pageID);
$content_block = get_field('content_block', $pageID);


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

<!-- Start Section Introduction -->
<section class="sec sec-philosophy">
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
                <div class="col-md-4 col-12" data-aos="fade-in" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
                    <img src="<?= $whatweData['what_we_offer_icon']['url']?>" alt="<?= $whatweData['what_we_offer_icon']['alt']?>">
                    <h3><?= $whatweData['what_we_offer_title']?></h3>
                    <p><?= $whatweData['what_we_offer_content']?></p>
                </div>
              <?php endforeach; ?>
            </div>
            <?php if($intro_cta):?>
            <div class="mt-5 text-center">
                <a href="<?= $intro_cta['url']?>" class="btn btn-light"><?= $intro_cta['title'] ?></a>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Start Team Section-->
<section class="section sec-team">
  <div class="container">
      <div class="title text-center"  data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
          <h2><?= $oet_heading ?></h2>
          <p><?= $oet_content ?></p>
      </div>
      <?php if($oet_teams):?>
      <div class="row">
        <?php foreach($oet_teams as $oetteams):?>
          <div class="col-lg-3 col-md-6 col-6" data-aos="fade-in" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
              <div class="box">
                  <div class="img-content">
                      <img src="<?= $oetteams['oet_image']['url']?>" class="img-fluid" alt="<?= $oetteams['oet_image']['alt']?>">
                  </div>
                  <div class="box-content">
                      <h3><?= $oetteams['oet_name']?></h3>
                      <h4><?= $oetteams['oet_designation']?></h4>
                      <p><?= $oetteams['oet_description']?></p>
                      <?php if($oetteams['socical_links']):?>
                      <div class="links">
                        <?php foreach($oetteams['socical_links'] as $oetsocical):?>
                          <a href="<?= $oetsocical['social_link'] ?>"><i class="<?= $oetsocical['social_icon'] ?>"></i></a>
                          <?php endforeach; ?>
                      </div>
                      <?php endif; ?>
                  </div>
              </div>
          </div>
          <?php endforeach; ?>
      </div>
      <?php endif; ?>
  </div>
</section>

<!-- Start Video Seciton -->
<section class="section sec-video sec-story">
  <div class="container">
      <div class="row">
          
          <div class="col-md-6 col-12 right-side" data-aos="fade-right" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
              <h4><?= $our_story_title ?></h4>
              <h2><?= $our_story_heading ?></h2>
              <?php echo $our_story_content_block; ?>
              <?php if($our_story_cta): ?>
                <a href="<?= $our_story_cta['url'] ?>" class="btn btn-light">
                  <?=$our_story_cta['title']?>
                </a>
              <?php endif; ?>
          </div>

          <div class="col-md-6 col-12 left-side" data-aos="fade-left" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
              <a href="<?= $our_story_video_link ?>" class="video-trigger">
                  <img src="<?php echo $our_story_featured_image?>" alt="image">
              </a>
          </div>
      </div>
      <!-- Counter-->
      <?php if($counter):?>
      <div class="row counter">
          <div class="col-md-6 col-12 left-counter" data-aos="fade-right" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
              <?php $i=0; foreach($counter as $count):?>
                <div class="circle cirecle<?=$i+1?>">
                  <h4><span data-count="<?=$count['data_count']?>"></span>k+</h4>
                  <h5><?=$count['counter_title']?> </h5>
                  <p><?=$count['counter_content']?></p>
              </div>
              <?php $i++; endforeach; ?>
             
          </div>
          <div class="col-md-6 col-12 right-counter" data-aos="fade-left" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
             <?php echo $content_block; ?>
          </div>
      </div>
      <?php endif; ?>
  </div>
</section>
<?php get_template_part( 'global-templates/development-partner' ); ?>
<?php
get_footer();
