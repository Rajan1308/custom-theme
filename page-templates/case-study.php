<?php
/**
 * Template Name: Case Study Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package beco
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$pageID = get_the_ID();

get_header();

$args = array( 
	'post_type' => 'case_study', 
	'paged' => $paged,
	'posts_per_page' => 6
);
$the_query = new WP_Query( $args );
?>
<section class="section sec-banner banner-title">
    <div class="container h-100">
        <div class="row h-100">
            <div class="left-side" data-aos="fade-right" data-aos-offset="100" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
                <h1 class="h2"><?= get_the_title( $pageID )?></h1>
                <div class="nav-links">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Home', 'beco');?>  </a>
                    <span>/</span>
                    <a href="#"><?= get_the_title($pageID)?></a>
                </div>
            </div>
        </div>
    </div>
</section>

 <!-- Start Case study Section-->
 <section class="section sec-casestudy">
    <div class="container" >
        <div class="slider" >
            <div class="row">
            <?php if ( $the_query->have_posts($post->ID) ) : ?>
											<?php while ( $the_query->have_posts($post->ID) ) : $the_query->the_post(); ?>
                <div class="col-lg-4 col-md-6 col-12" data-aos="fade-in" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
                    <div class="item">
                        <a href="<?= the_permalink($post->ID); ?>">
                            <div class="image-content">
                                <img src="<?= get_the_post_thumbnail_url($post->ID) ?>" class="img-fluid" alt="image">
                                <div class="overlay">
                                    <i class="fal fa-plus"></i>
                                    <span>Read More</span>
                                </div>
                            </div>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata();?>
                <?php else:  ?>
                  <div class="row row-card">
                  <div class="p-0 col-md-12">
                    <p class="py-4 my-4"><?php _e( 'Sorry, no article matched your criteria.' ); ?></p>
                  </div>
                  </div>
                <?php endif; ?>
               
                
            </div>
        </div>
        
        <nav aria-label="Page navigation"  data-aos="fade-in" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
          <?php echo pnavigation( $the_query ); ?>    
        </nav>
    </div>
</section>


<?php
get_footer();
