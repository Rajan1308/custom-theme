<?php
/**
 * Single post partial template
 *
 * @package beco
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="media-banner" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
		<?php echo get_the_post_thumbnail( $post->ID, 'large', array('class' => 'img-fluid') ); ?>
	</div>
	<div class="media-name-box" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
		<h1 class="h2">Lorem Ipsum is simply</h1>
		<?php the_title( '<h1 class="h2">', '</h1>' ); ?>
		<div class="share">
				<a href="#"><i class="fas fa-share-alt"></i></a>
		</div>
	</div>
	
	<div class="entry-content">

		<?php
		the_content();
		
		?>

	</div><!-- .entry-content -->

	

</article><!-- #post-## -->
