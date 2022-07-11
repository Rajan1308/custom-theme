<?php
/**
 * beco enqueue scripts
 *
 * @package beco
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $template_directory_uri;
$template_directory_uri = get_stylesheet_directory_uri();

if ( ! function_exists( 'beco_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function beco_scripts() {
		// Get the theme data.
		global $template_directory_uri;
		wp_enqueue_style( 'beco-styles', $template_directory_uri . '/ui/stylesheet/main.css' );
		wp_enqueue_style( 'custom-styles', $template_directory_uri . '/ui/stylesheet/custom.css' );

		wp_deregister_script( 'jquery' );

		wp_enqueue_script( 'beco-scripts', $template_directory_uri . '/ui/javascript/uicreep-minify.js', array(), '1.0', true );
		if(is_front_page() || is_home() || is_page_template( 'page-templates/aboutpage.php' ) ):
		wp_enqueue_script( 'fancybox-scripts', $template_directory_uri . '/ui/javascript/fancybox.min.js', array(), '1.0', true );
		endif; 
		wp_enqueue_script( 'custom-scripts', $template_directory_uri . '/ui/javascript/custom.js', array(), '1.0', true );
		wp_enqueue_script( 'intlTelInput-scripts', $template_directory_uri . '/ui/javascript/intlTelInput.min.js', array(), '1.0', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}


		wp_localize_script(
			'custom-scripts',
			'app_localized',
			[
				'themepath' => $template_directory_uri,
				'ajaxurl'   => admin_url( 'admin-ajax.php' ),
				'check'     => wp_create_nonce( 'beco-ajax-nonce' ),
				'namespace'	=> 'beco',
			]
		);
	}
} // End of if function_exists( 'beco_scripts' ).

add_action( 'wp_enqueue_scripts', 'beco_scripts' );
