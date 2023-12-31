<?php
/**
 * Payment methods map.
 *
 * @package Woodmart
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

if ( ! function_exists( 'woodmart_get_vc_map_checkout_payment_methods' ) ) {
	/**
	 * Payment methods map.
	 */
	function woodmart_get_vc_map_checkout_payment_methods() {
		$title_typography = woodmart_get_typography_map(
			array(
				'key'              => 'title_typography',
				'group'            => esc_html__( 'Style', 'woodmart' ),
				'selector'         => '{{WRAPPER}} .payment_methods li > label',
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			)
		);

		$description_typography = woodmart_get_typography_map(
			array(
				'key'      => 'description_typography',
				'group'    => esc_html__( 'Style', 'woodmart' ),
				'selector' => '{{WRAPPER}} .payment_box',
			)
		);

		return array(
			'base'        => 'woodmart_checkout_payment_methods',
			'name'        => esc_html__( 'Payment methods', 'woodmart' ),
			'category'    => woodmart_get_tab_title_category_for_wpb( esc_html__( 'Checkout', 'woodmart' ), 'checkout_form' ),
			'description' => esc_html__( 'Payment methods and checkout button', 'woodmart' ),
			'icon'        => WOODMART_ASSETS . '/images/vc-icon/ch-icons/ch-payment-methods.svg',
			'params'      => array(
				array(
					'type'       => 'woodmart_css_id',
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'param_name' => 'woodmart_css_id',
				),

				// Payment title.
				array(
					'title'      => esc_html__( 'Payment title', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'woodmart_title_divider',
					'param_name' => 'payment_title_divider',
				),

				$title_typography['font_family'],
				$title_typography['font_size'],
				$title_typography['font_weight'],
				$title_typography['text_transform'],
				$title_typography['font_style'],
				$title_typography['line_height'],

				array(
					'heading'          => esc_html__( 'Color', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_colorpicker',
					'param_name'       => 'title_color',
					'selectors'        => array(
						'{{WRAPPER}} .payment_methods li > label' => array(
							'color: {{VALUE}};',
						),
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				// Payment description.
				array(
					'title'      => esc_html__( 'Payment description', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'woodmart_title_divider',
					'param_name' => 'payment_description_divider',
				),

				$description_typography['font_family'],
				$description_typography['font_size'],
				$description_typography['font_weight'],
				$description_typography['text_transform'],
				$description_typography['font_style'],
				$description_typography['line_height'],

				array(
					'heading'          => esc_html__( 'Color', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_colorpicker',
					'param_name'       => 'payment_description_color',
					'selectors'        => array(
						'{{WRAPPER}} .payment_box' => array(
							'color: {{VALUE}};',
						),
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Background color', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_colorpicker',
					'param_name'       => 'payment_description_background_color',
					'selectors'        => array(
						'{{WRAPPER}} .payment_box' => array(
							'background-color: {{VALUE}};',
						),
						'{{WRAPPER}} .payment_box:before' => array(
							'color: {{VALUE}};',
						),
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				// Terms and conditions.
				array(
					'title'      => esc_html__( 'Terms and conditions', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'woodmart_title_divider',
					'param_name' => 'terms_conditions_divider',
				),

				array(
					'heading'    => esc_html__( 'Background color', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'wd_colorpicker',
					'param_name' => 'terms_conditions_background_color',
					'selectors'  => array(
						'{{WRAPPER}} .woocommerce-terms-and-conditions' => array(
							'background-color: {{VALUE}};',
						),
					),
				),

				// Button.
				array(
					'title'      => esc_html__( 'Button', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'woodmart_title_divider',
					'param_name' => 'general_divider',
				),

				array(
					'heading'    => esc_html__( 'Button position', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'wd_select',
					'param_name' => 'button_alignment',
					'style'      => 'select',
					'selectors'  => array(),
					'devices'    => array(
						'desktop' => array(
							'value' => 'left',
						),
					),
					'value'      => array(
						esc_html__( 'Left', 'woodmart' ) => 'left',
						esc_html__( 'Center', 'woodmart' ) => 'center',
						esc_html__( 'Right', 'woodmart' ) => 'right',
						esc_html__( 'Full width', 'woodmart' ) => 'full-width',
					),
				),

				array(
					'heading'    => esc_html__( 'CSS box', 'woodmart' ),
					'group'      => esc_html__( 'Design Options', 'js_composer' ),
					'type'       => 'css_editor',
					'param_name' => 'css',
				),
				woodmart_get_vc_responsive_spacing_map(),

				// Width option (with dependency Columns option, responsive).
				woodmart_get_responsive_dependency_width_map( 'responsive_tabs' ),
				woodmart_get_responsive_dependency_width_map( 'width_desktop' ),
				woodmart_get_responsive_dependency_width_map( 'custom_width_desktop' ),
				woodmart_get_responsive_dependency_width_map( 'width_tablet' ),
				woodmart_get_responsive_dependency_width_map( 'custom_width_tablet' ),
				woodmart_get_responsive_dependency_width_map( 'width_mobile' ),
				woodmart_get_responsive_dependency_width_map( 'custom_width_mobile' ),
			),
		);
	}
}
