<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package beco
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'beco_container_type' );
?>

<div class="wrapper" id="error-404-wrapper ">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 content-area pt-4 mt-4 pb-4 mb-4" id="primary">

				<main class="site-main" id="main">

					<section class="error-404 not-found pt-2 mt-2 pb-2 mb-2">

						<header class="page-header">

							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'beco' ); ?></h1>

						</header><!-- .page-header -->

						<div class="page-content">

							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'beco' ); ?></p>

						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #error-404-wrapper -->

<?php
get_footer();
