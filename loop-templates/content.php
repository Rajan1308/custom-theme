<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package beco
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<div class="col-lg-4 col-md-6 col-12" id="post-<?php the_ID(); ?>" data-aos="fade-in" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
		<div class="item">
				<div class="image-content">
				<?php echo get_the_post_thumbnail( $post->ID, 'beco-thumb', array('class' => 'img-fluid') ); ?>
				</div>
				<div class="content">
						<div class="date"><?= get_the_date(); ?></div>
						<h3><?php the_title( );?></h3>
						<?php the_excerpt();
							beco_link_pages();
						?>
						<a href="<?php echo esc_url( get_permalink() ) ; ?>" class="btn btn-light">Read More</a>
				</div>
		</div>
</div>
