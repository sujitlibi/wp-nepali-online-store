<?php
/**
 * Brand information map.
 *
 * @package Woodmart
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

if ( ! function_exists( 'woodmart_get_vc_map_single_product_brand_information' ) ) {
	/**
	 * Brand information map.
	 */
	function woodmart_get_vc_map_single_product_brand_information() {
		return array(
			'base'        => 'woodmart_single_product_brand_information',
			'name'        => esc_html__( 'Product brand information', 'woodmart' ),
			'category'    => woodmart_get_tab_title_category_for_wpb( esc_html__( 'Single product elements', 'woodmart' ), 'single_product' ),
			'description' => esc_html__( 'Brand description content', 'woodmart' ),
			'icon'        => WOODMART_ASSETS . '/images/vc-icon/sp-icons/sp-brand-information.svg',
			'params'      => array(
				array(
					'group'      => esc_html__( 'Design Options', 'js_composer' ),
					'type'       => 'woodmart_css_id',
					'param_name' => 'woodmart_css_id',
				),

				array(
					'heading'    => esc_html__( 'CSS box', 'woodmart' ),
					'group'      => esc_html__( 'Design Options', 'js_composer' ),
					'type'       => 'css_editor',
					'param_name' => 'css',
				),
				woodmart_get_vc_responsive_spacing_map(),
			),
		);
	}
}
