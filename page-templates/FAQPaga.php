<?php
/**
 * Template Name: FAQ Page
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

$questions_block = get_field('questions_block', $pageID);
$questions_cta = get_field('questions_cta', $pageID);

$about_us_block = get_field('about_us_block', $pageID);
$about_us_cta = get_field('about_us_cta', $pageID);

$faqs_title = get_field('faqs_title', $pageID);
$faqs_content_block = get_field('faqs_content_block', $pageID);
$faqs_faqs = get_field('faqs_faqs', $pageID);

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

<!-- Start FAQ Section -->
<section class="section sec-faq">
  <div class="container">
      <div class="row">

          <div class="col-lg-4 col-md-5 left-side">
              <ul class="list-unstyled">
                <?php if($questions_block):?>
                  <li>
                      <div class="content">
                         <?php echo $questions_block; ?>
                         <?php if($questions_cta):?>
                          <a href="<?= $questions_cta['url'] ?>" class="btn btn-light"><?= $questions_cta['title'] ?></a>
                          <?php endif; ?>
                      </div>
                  </li>
                  <?php endif; ?>
                  <?php if($about_us_block):?>
                  <li>
                      <div class="content">
                         <?php echo $about_us_block; ?>
                         <?php if($questions_cta):?>
                          <a href="<?= $about_us_cta['url'] ?>" class="btn btn-light"><?= $about_us_cta['title'] ?></a>
                          <?php endif; ?>
                      </div>
                  </li>
                  <?php endif; ?>
              </ul>
          </div>

          <div class="col-lg-8 col-md-7 col-12 right-side">
              <h2><?= $faqs_title ?></h2>
              <?php echo $faqs_content_block; ?>
              <?php if($faqs_faqs):?>
              <div class="accordion" id="accordionExample">
                <?php $q=0; foreach($faqs_faqs as $faqsData):?>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?=$q+1?>">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$q+1?>" aria-expanded="true" aria-controls="collapse<?=$q+1?>">
                      <?=$q+1?> -  <?= $faqsData['faqs_question'] ?>
                      </button>
                    </h2>
                    <div id="collapse<?=$q+1?>" class="accordion-collapse collapse <?php if($q==0):?>show<?php endif;?>" aria-labelledby="heading<?=$q+1?>" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <?= $faqsData['faqs_answer'] ?>
                      </div>
                    </div>
                  </div>
                <?php $q++; endforeach; ?>
              </div>
              <?php endif; ?>
          </div>
      </div>
  </div>
</section>

<?php
get_footer();
