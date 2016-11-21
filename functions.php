<?php
/**
 * GeneratePress Child Theme functions and definitions
 *
 * All functions are prefixed with gpc_
 *
 * @package GenerateChild
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'GPC_VERSION', '1.0');

/**
 * Hide admin bar.
 */
show_admin_bar( false );

/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'gpc_scripts' );
function gpc_scripts() {
	wp_enqueue_style( 'gpc-base', get_stylesheet_directory_uri() . '/css/base.css', false, GPC_VERSION, 'all');
	wp_enqueue_script( 'gpc-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ), GPC_VERSION, true );
}

/**
 * Add custom capability for GeneratePress meta boxes.
 * Requires GeneratPress addons:
 * @link https://generatepress.com/premium/
 */
// add_filter( 'generate_metabox_capability', 'gpc_custom_metabox_capability', 10 );
function gpc_gp_custom_metabox_capability() {
	return 'view_gp_metaboxes';
}

/**
 * Responsive embedded video.
 */
add_filter( 'embed_oembed_html', 'gpc_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'gpc_embed_html' ); // Jetpack
function gpc_embed_html( $html ) {
	return '<div class="video-container">' . $html . '</div>';
}

/**
 * Initialize ACF Google Maps.
 */
// add_action('acf/init', 'gpc_acf_init');
function gpc_acf_init() {
	acf_update_setting('google_api_key', 'key_goes_here');
}

/**
 * Enable shortcodes in widgets.
 */
add_filter( 'widget_text' , 'do_shortcode' );

/**
 * Enable further custom styles.
 */
require get_stylesheet_directory() . '/inc/styles.php';

/**
 * Include optimizations.
 */
require get_stylesheet_directory() . '/inc/optimizations.php';

/**
 * ACF relationship helpers. Uncomment to use.
 */
// require get_stylesheet_directory() . '/inc/acf-relationships.php';

/**
 * Reset custom post type output. Uncomment to use.
 */
// require get_stylesheet_directory() . '/inc/cpt-output-reset.php';

/**
 * Include new custom post type output. Uncomment to use.
 */
// require get_stylesheet_directory() . '/inc/cpt-output-custom.php';

/**
 * Include shortcodes. Uncomment to use.
 */
// require get_stylesheet_directory() . '/inc/shortcodes.php';
