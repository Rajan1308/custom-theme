<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package beco
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'beco_container_type' );
?>
<section class="section sec-banner banner-title">
	<div class="container h-100">
			<div class="row h-100">
					<div class="left-side" data-aos="fade-right" data-aos-offset="100" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
							<h1 class="h2"><?php echo the_archive_title( '<h1 class="page-title">', '</h1>' ); ?></h1>
							<div class="nav-links">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Home', 'beco');?>  </a>
									<span>/</span>
									<a href="<?php echo esc_url( home_url( '/media/' ) ); ?>"><?php _e('Media', 'beco'); ?></a>
							</div>
					</div>
			</div>
	</div>
</section>

<section class="section sec-news sec-news-bg">
	<div class="container" >
		<div class="slider" >
			<div class="row">
				<?php
				if ( have_posts() ) {
					?>
					
					<?php
					// Start the loop.
					while ( have_posts() ) {
						the_post();

						/*
						* Include the Post-Format-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Format name) and that will be used instead.
						*/
						get_template_part( 'loop-templates/content', get_post_format() );
					}
				} else {
					get_template_part( 'loop-templates/content', 'none' );
				}
				?>
				<?php
				// Display the pagination component.
				beco_pagination();
				// Do the right sidebar check.
				?>
			</div><!-- .row -->
		</div><!-- #content -->
	</div><!-- #container -->
</section>

<?php
get_footer();
