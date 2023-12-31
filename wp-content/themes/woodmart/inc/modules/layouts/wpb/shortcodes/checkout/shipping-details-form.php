<?php
/**
 * Shipping details shortcode.
 *
 * @package Woodmart
 */

use XTS\Modules\Layouts\Main;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

if ( ! function_exists( 'woodmart_shortcode_checkout_shipping_details_form' ) ) {
	/**
	 * Shipping details shortcode.
	 *
	 * @param array $settings Shortcode attributes.
	 */
	function woodmart_shortcode_checkout_shipping_details_form( $settings ) {
		if ( ! is_object( WC()->cart ) || 0 === WC()->cart->get_cart_contents_count() ) {
			return '';
		}

		$default_settings = array(
			'css'             => '',
			'show_title'      => 'yes',
			'title_alignment' => '',
		);

		$settings = wp_parse_args( $settings, $default_settings );

		$wrapper_classes = apply_filters( 'vc_shortcodes_css_class', '', '', $settings );

		if ( $settings['css'] ) {
			$wrapper_classes .= ' ' . vc_shortcode_custom_css_class( $settings['css'] );
		}

		if ( 'yes' === $settings['show_title'] ) {
			$wrapper_classes .= ' wd-title-show';
		}

		if ( $settings['title_alignment'] ) {
			$wrapper_classes .= ' text-' . $settings['title_alignment'];
		}

		ob_start();

		Main::setup_preview();

		?>
		<div class="wd-shipping-details wd-wpb<?php echo esc_attr( $wrapper_classes ); ?>">
			<?php WC()->checkout()->checkout_form_shipping(); ?>
		</div>
		<?php

		Main::restore_preview();

		return ob_get_clean();
	}
}
