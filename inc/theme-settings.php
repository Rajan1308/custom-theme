<?php
/**
 * Check and setup theme's default settings
 *
 * @package beco
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'beco_setup_theme_default_settings' ) ) {
	/**
	 * Store default theme settings in database.
	 */
	function beco_setup_theme_default_settings() {
		$defaults = beco_get_theme_default_settings();
		$settings = get_theme_mods();
		foreach ( $defaults as $setting_id => $default_value ) {
			// Check if setting is set, if not set it to its default value.
			if ( ! isset( $settings[ $setting_id ] ) ) {
				set_theme_mod( $setting_id, $default_value );
			}
		}
	}
}

if ( ! function_exists( 'beco_get_theme_default_settings' ) ) {
	/**
	 * Retrieve default theme settings.
	 *
	 * @return array
	 */
	function beco_get_theme_default_settings() {
		$defaults = array(
			'beco_posts_index_style' => 'default',   // Latest blog posts style.
			'beco_sidebar_position'  => 'right',     // Sidebar position.
			'beco_container_type'    => 'container', // Container width.
		);

		/**
		 * Filters the default theme settings.
		 *
		 * @param array $defaults Array of default theme settings.
		 */
		return apply_filters( 'beco_theme_default_settings', $defaults );
	}
}


// Rajan Setup

function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
	}
	add_filter('upload_mimes', 'add_file_types_to_uploads');

	add_image_size( 'beco-thumb', 416, 341, true );

if( function_exists('acf_add_options_page') ) {
	// arc General Settings
	$general_settings   = array(
															'page_title' 	=> __( 'Theme Settings', 'ARC' ),
															'menu_title'	=> __( 'Theme Settings', 'ARC' ),
															'menu_slug' 	=> 'general-settings',
															'capability'	=> 'edit_posts',
															'redirect'      => false,
															'icon_url'      => 'dashicons-admin-settings'
													);
	acf_add_options_page( $general_settings );
}

/*
 * Remove wp logo from admin bar
 */
function beco_remove_wp_logo() {
	global $wp_admin_bar;

	if( class_exists('acf') ) {
			$wp_help  = get_field( 'arc_options_admin_wp_help', 'option' );
			if( empty( $wp_help ) ) {
					$wp_admin_bar->remove_menu('wp-logo');
			}
	}
}
add_action( 'wp_before_admin_bar_render', 'beco_remove_wp_logo' );
/*
* Custom login logo
*/
function beco_custom_login_logo() {
	if( class_exists('acf') ) {
			$wp_login_logo      = get_field( 'arc_options_admin_login_logo', 'option' );
			$wp_login_w         = get_field( 'arc_options_admin_width', 'option' );
			$wp_login_h         = get_field( 'arc_options_admin_height', 'option' );
			$wp_login_bg        = get_field( 'arc_options_admin_bg', 'option' );
			$wp_login_btn_c     = get_field( 'arc_options_admin_buton_color', 'option' );
			$wp_login_btn_c_h   = get_field( 'arc_options_admin_buton_color_hover', 'option' );
			if( !empty( $wp_login_logo ) ) {
?>
			<style type="text/css">
					.login h1 a {
							background-image: url('<?php echo $wp_login_logo; ?>') !important;
							background-size: <?php echo $wp_login_w.'px'; ?> auto !important;
							height: <?php echo $wp_login_h.'px'; ?> !important;
							width: <?php echo $wp_login_w.'px'; ?> !important;
					}
			</style>
<?php
			}
			if( !empty( $wp_login_bg ) ){
?>
			<style type="text/css">
					body.login{ background: #133759 url("<?php echo $wp_login_bg; ?>") no-repeat center; background-size: cover;}
					body.login form {background: rgba(0, 0, 0, 0.2);padding: 40px;}
	  .login form {margin-top: 20px; margin-left: 0;padding: 26px 24px 34px;font-weight: 400;overflow: hidden;background: #fff;border: 1px solid #c3c4c7;box-shadow: 0 1px 3px rgb(0 0 0 / 4%);}
	  body.login #login form p {margin-bottom: 15px;}
	  body.login #login {width: 460px;}
	  .login #nav a, .login #backtoblog a {color:#fff !important;margin: 24px 0 0 0; font-weight:500}
	  .login label {font-size: 15px;line-height: 1.5;display: inline-block;margin-bottom: 3px;color: #fff;font-weight:500}
	  .login a.privacy-policy-link{color:#000; font-weight:500}
	  body.login div#login form#loginform input[type=password], .login input[type=text]{padding:12px 16px !important}
					body.login div#login form#loginform input#wp-submit {background-color: <?php echo $wp_login_btn_c; ?> !important;}
					body.login div#login form#loginform input#wp-submit:hover {background-color: <?php echo $wp_login_btn_c_h; ?> !important;}
			</style>
<?php
			}
	}
}
add_action( 'login_enqueue_scripts', 'beco_custom_login_logo' );
/*
* Change custom login page url
*/
function beco_loginpage_custom_link() {
	$site_url = esc_url( home_url( '/' ) );
	return $site_url;
}
add_filter( 'login_headerurl', 'beco_loginpage_custom_link' );
/*
* Change title on logo
*/
function beco_change_title_on_logo() {
	$site_title = get_bloginfo( 'name' );
	return $site_title;
}
add_filter( 'login_headertext', 'beco_change_title_on_logo' );
/*
* Change admin your favicon
*/
function beco_admin_favicon() {
	if( class_exists('acf') ) {
			$favicon_url        = get_field( 'arc_options_admin_favicon', 'option' );
			if( !empty( $favicon_url ) ){
					echo '<link rel="icon" type="image/x-icon" href="' . $favicon_url . '" />';
			}
	}
}
add_action('login_head', 'beco_admin_favicon');
add_action('admin_head', 'beco_admin_favicon');
add_action('wp_head', 'beco_admin_favicon'); 

function ad_login_footer() { $ref = wp_get_referer(); if ($ref) : ?>
	<script type="text/javascript">
		jQuery(document).ready(function($){
				jQuery("p#backtoblog a").attr("href", 'https://www.digitalnexa.com/');
				jQuery("p#backtoblog a").empty();
		});
	</script>
	<?php endif; }
	add_action('login_footer', 'ad_login_footer');
	
	function origo_custom_admin_footer() {
		_e( '<span id="footer-thankyou">Designed & developed by <a href="https://www.digitalnexa.com/" style="color:#f47c30">Digital Nexa</a>', 'digitalnexa' );
	}
	add_filter( 'admin_footer_text', 'origo_custom_admin_footer' );

	function add_class_to_href( $classes, $item ) {
    if ( in_array('current_page_item', $item->classes) ) {
        $classes['class'] = 'nav-link active';
    }
    return $classes;
}
add_filter( 'nav_menu_link_attributes', 'add_class_to_href', 10, 2 );

// CPT
// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => 'Case Studies',
		'singular_name'         => 'Case Study',
		'menu_name'             => 'Case Studies',
		'name_admin_bar'        => 'Case Study',
		'archives'              => 'Case Study Archives',
		'attributes'            => 'Case Study Attributes',
		'parent_item_colon'     => 'Parent Case Study:',
		'all_items'             => 'All Case Studies',
		'add_new_item'          => 'Add New Case Study',
		'add_new'               => 'Add New',
		'new_item'              => 'New Case Study',
		'edit_item'             => 'Edit Case Study',
		'update_item'           => 'Update Case Study',
		'view_item'             => 'View Case Study',
		'view_items'            => 'View Case Studies',
		'search_items'          => 'Search Case Study',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into Case Study',
		'uploaded_to_this_item' => 'Uploaded to this Case Study',
		'items_list'            => 'Case Studies list',
		'items_list_navigation' => 'Case Studies list navigation',
		'filter_items_list'     => 'Filter Case Studies list',
	);
	$rewrite = array(
		'slug'                  => 'case-study',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => 'Case Study',
		'description'           => 'Case Study Description',
		'labels'                => $labels,
		'show_in_rest' => true,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		#'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'case_study', $args );

}
add_action( 'init', 'custom_post_type', 0 );

// Changing excerpt more


remove_filter('get_the_excerpt', 'wp_trim_excerpt');

function pnavigation( $wp_query ) {

	$big = 999999999; // need an unlikely integer
	$pages = paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages,
	'prev_next' => TRUE,
	'type'  => 'array',
	'prev_next'   => TRUE,
	'prev_text'    => '<i class="far fa-chevron-double-left"></i>',
	'next_text'    => '<i class="far fa-chevron-double-right"></i>',
	) );
	if( is_array( $pages ) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<ul class="pagination">';
		foreach ( $pages as $page ) {
			$pagignation_val = str_replace('page-numbers', 'page-numbers page-link', $page);
			echo '<li class="page-item">';
			echo $pagignation_val;
			echo '</li>';
		}
		echo '</ul>';
	}
}

add_filter('get_the_archive_title', function ($title) {
	if (is_category()) {
			$title = single_cat_title('', false);
	} elseif (is_tag()) {
			$title = single_tag_title('', false);
	} elseif (is_author()) {
			$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif (is_tax()) { //for custom post types
			$title = sprintf(__('%1$s'), single_term_title('', false));
	} elseif (is_post_type_archive()) {
			$title = post_type_archive_title('', false);
	}
	return $title;
});