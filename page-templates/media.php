<?php
/**
 * Template Name: Media Page
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
                    <img src="<?= $header_image['url'] ?>" class="img-fluid" alt="<?= $header_image['alt'] ?>">
                </div>
            </div>
        </div>
    </div>
</section>

<?php 

if( have_rows('media') ):

  // Loop through rows.
  while ( have_rows('media') ) : the_row();

      // Case: Paragraph layout.
      if( get_row_layout() == 'case_study' ):
          $case_study_catitle = get_sub_field('case_study_catitle');
          $number_of_post_show = get_sub_field('number_of_post_show');
          // Do something...
          $caseStudy = get_posts( array( 'post_type'=>'case_study', 'numberposts' => $number_of_post_show) );
          
        ?>

        <!-- Start Case study Section-->
        <section class="section sec-casestudy">
                <div class="container"  >
                    <div class="title text-center" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
                        <h2><?= $case_study_catitle ?></h2>
                    </div>
                    <?php if($caseStudy):?>
                    <div class="slider"  data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
                        <div class="owl-carousel">
                          <?php foreach($caseStudy as $caseData):setup_postdata($caseData);?>
                            <div class="item">
                                <a href="<?php the_permalink($caseData->ID) ?>">
                                    <div class="image-content">
                                    <?php echo get_the_post_thumbnail( $caseData->ID, 'beco-thumb',array('class' => 'img-fluid') ); ?>
                                        <div class="overlay">
                                            <i class="fal fa-plus"></i>
                                            <span><?php _e('Read More', 'beco');?></span>
                                        </div>
                                    </div>
                                    <h3><?= get_the_title($caseData->ID); ?></h3>
                                </a>
                            </div>
                           <?php endforeach; wp_reset_postdata(); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="text-center load-more"  data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
                        <a href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>" class="btn btn-light"><?php _e('Show All', 'beco');?></a>
                    </div>
                </div>
            </section>
        <?php 
      // Case: Download layout.
      elseif( get_row_layout() == 'media_news' ): 
          $media_study_catitle = get_sub_field('media_study_catitle');
          $media_number_of_post_show = get_sub_field('media_number_of_post_show');
          $newsData = get_posts( array( 'post_type'=>'post', 'numberposts' => $number_of_post_show, 'category' => 5, 'offset'=> 0) ); ?>

          <!-- Start News Section-->
          <section class="section sec-news">
                <div class="top-crical pos-crical"><img src="<?= get_template_directory_uri()?>/ui/images/cirecle1.png" alt="image"></div>
                <div class="container">
                    <div class="title text-center"  data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
                        <h2><?= $media_study_catitle ?></h2>
                    </div>
                    <?php if($newsData):?>
                    <div class="slider" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
                        <div class="owl-carousel">
                        <?php foreach($newsData as $postNewsData):setup_postdata($postNewsData);?>
                            <div class="item">
                                <div class="image-content">
                                <?php echo get_the_post_thumbnail( $postNewsData->ID, 'beco-thumb',array('class' => 'img-fluid') ); ?>
                                </div>
                                <div class="content">
                                    <div class="date"><?= get_the_date() ?></div>
                                    <h3><?= get_the_title($postNewsData->ID); ?></h3>
                                    <p><?= get_the_excerpt($postNewsData->ID)?> </p>
                                    <a href="<?php the_permalink($postNewsData->ID) ?>" class="btn btn-light"><?php _e('Read More', 'beco');?></a>
                                </div>
                            </div>
                          <?php endforeach; ?>
                        </div>
                        <div class="text-center load-more"  data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom"> 
                            <a href="<?php echo esc_url( home_url( '/category/news/' ) ); ?>" class="btn btn-light"><?php _e('Show All', 'beco');?></a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </section>

          <?php 

      
      elseif( get_row_layout() == 'media_blogs' ): 
        $blogs_study_catitle = get_sub_field('blogs_study_catitle');
        $blogs_number_of_post_show = get_sub_field('blogs_number_of_post_show');
        $blogData = get_posts( array( 'post_type'=>'post', 'numberposts' => $blogs_number_of_post_show, 'category' => 4, 'offset'=> 0) ); ?>

        <!-- Start News Section-->
        <section class="section sec-news sec-blog">
              <div class="top-crical pos-crical"><img src="<?= get_template_directory_uri()?>/ui/images/cirecle1.png" alt="image"></div>
              <div class="container">
                  <div class="title text-center"  data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
                      <h2><?= $blogs_study_catitle ?></h2>
                  </div>
                  <?php if($blogData):?>
                    <div class="row">
                      
                      <?php foreach($blogData as $postBlogData):setup_postdata($postBlogData);?>
                        <div class="col-lg-4 col-md-6 col-12"  data-aos="fade-in" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
                            <div class="item">
                                <div class="image-content">
                                <?php echo get_the_post_thumbnail( $postBlogData->ID, 'beco-thumb',array('class' => 'img-fluid') ); ?>
                                </div>
                                <div class="content">
                                    <div class="date"><?= get_the_date() ?></div>
                                    <h3><?= get_the_title($postBlogData->ID); ?></h3>
                                    <p><?= get_the_excerpt($postBlogData->ID)?> </p>
                                    <a href="<?= get_the_permalink($postBlogData->ID) ?>" class="btn btn-light"><?php _e('Read More', 'beco');?></a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                     
                        <div class="text-center load-more" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
                        <a href="<?php echo esc_url( home_url( '/category/blogs/' ) ); ?>" class="btn btn-default"><?php _e('Show All', 'beco');?></a>
                       </div>
                  </div>
                  <?php endif; ?>
              </div>
          </section>

        <?php 

    endif;

  // End loop.
  endwhile;

// No value.
else :
  // Do something...
endif;

?>
<?php get_template_part( 'global-templates/development-partner' ); ?>
<?php
get_footer();
