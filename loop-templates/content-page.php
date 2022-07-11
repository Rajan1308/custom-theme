<?php
/**
 * Partial template for content in page.php
 *
 * @package beco
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php
		the_content();
		beco_link_pages();
		?>

	</div><!-- .entry-content -->

	<div class="entry-footer">

		<?php beco_edit_post_link(); ?>

	</div><!-- .entry-footer -->

</article><!-- #post-## -->
