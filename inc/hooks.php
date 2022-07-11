<?php
/**
 * Custom hooks
 *
 * @package beco
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'beco_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function beco_site_info() {
		do_action( 'beco_site_info' );
	}
}

add_action( 'beco_site_info', 'beco_add_site_info' );
if ( ! function_exists( 'beco_add_site_info' ) ) {
	/**
	 * Add site info content.
	 */
	function beco_add_site_info() {
		$the_theme = wp_get_theme();

		$site_info = sprintf(
			'<a href="%1$s">%2$s</a><span class="sep"> | </span>%3$s(%4$s)',
			esc_url( __( 'https://wordpress.org/', 'beco' ) ),
			sprintf(
				/* translators: WordPress */
				esc_html__( 'Proudly powered by %s', 'beco' ),
				'WordPress'
			),
			sprintf( // WPCS: XSS ok.
				/* translators: 1: Theme name, 2: Theme author */
				esc_html__( 'Theme: %1$s by %2$s.', 'beco' ),
				$the_theme->get( 'Name' ),
				'<a href="' . esc_url( __( 'https://beco.com', 'beco' ) ) . '">beco.com</a>'
			),
			sprintf( // WPCS: XSS ok.
				/* translators: Theme version */
				esc_html__( 'Version: %1$s', 'beco' ),
				$the_theme->get( 'Version' )
			)
		);

		// Check if customizer site info has value.
		if ( get_theme_mod( 'beco_site_info_override' ) ) {
			$site_info = get_theme_mod( 'beco_site_info_override' );
		}

		echo apply_filters( 'beco_site_info_content', $site_info ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
}
