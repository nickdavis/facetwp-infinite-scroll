<?php
/*
Plugin Name: FacetWP - Infinite Scroll
Plugin URI: https://github.com/nickdavis/facetwp-infinite-scroll
Description: Adds infinite scroll functionality to FacetWP templates. Requires developer config.
Author: Nick Davis
Version: 1.1.0
Author URI: https://nickdavis.net
*/

namespace NickDavis\FacetWPInfiniteScroll;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheatin&#8217; uh?' );
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\constants' );
/**
 * Sets up the plugin's constants.
 *
 * @since 1.0.0
 *
 * @return void
 */
function constants() {
	$plugin_url = plugin_dir_url( __FILE__ );

	if ( is_ssl() ) {
		$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
	}

	define( 'ND_FACETWP_INFINITE_SCROLL_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
	define( 'ND_FACETWP_INFINITE_SCROLL_URL', $plugin_url );
	define( 'ND_FACETWP_INFINITE_SCROLL_FILE', __FILE__ );
}

add_filter( 'facetwp_facets', __NAMESPACE__ . '\register_load_more_facet' );
/**
 * Register the Load More facet with FacetWP.
 *
 * @param array $facets
 *
 * @return array
 */
function register_load_more_facet( array $facets ): array {
	$facets[] = [
		'label'          => 'Load More',
		'name'           => 'load_more',
		'type'           => 'pager',
		'pager_type'     => 'load_more',
		'load_more_text' => 'Load More',
		'loading_text'   => 'Loading...',
	];

	return $facets;
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_script' );
/**
 * Enqueues the plugin JavaScript.
 *
 * @return void
 */
function enqueue_script(): void {
	$js_path    = '/js/facetwp-infinite-scroll.js';
	$js_uri     = ND_FACETWP_INFINITE_SCROLL_URL . $js_path;
	$js_version = filemtime( ND_FACETWP_INFINITE_SCROLL_DIR . $js_path );

	wp_enqueue_script( 'nd-facetwp-infinite-scroll', $js_uri, [ 'jquery' ], $js_version, true );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_styles' );
/**
 * Enqueues the plugin CSS.
 *
 * @return void
 */
function enqueue_styles(): void {
	$css_path    = '/css/facetwp-infinite-scroll.css';
	$css_uri     = ND_FACETWP_INFINITE_SCROLL_URL . $css_path;
	$css_version = filemtime( ND_FACETWP_INFINITE_SCROLL_DIR . $css_path );

	wp_enqueue_style( 'nd-facetwp-infinite-scroll', $css_uri, [], $css_version );
}
