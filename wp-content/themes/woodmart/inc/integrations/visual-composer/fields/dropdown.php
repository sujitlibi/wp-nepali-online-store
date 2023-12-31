<?php if ( ! defined( 'WOODMART_THEME_DIR' ) ) {
	exit( 'No direct script access allowed' );}

/**
 * Woodmart dropdown param
 */
if ( ! function_exists( 'woodmart_get_dropdown_param' ) ) {
	function woodmart_get_dropdown_param( $settings, $value ) {
		if ( isset( $settings['callback'] ) && function_exists( $settings['callback'] ) ) {
			$settings['value'] = $settings['callback']();
		}

		$output = '<select name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-input wpb-select ' . esc_attr( $settings['param_name'] ) . ' ' . esc_attr( $settings['type'] ) . '">';
		if ( ! empty( $settings['value'] ) ) {
			foreach ( $settings['value'] as $label => $data ) {
				$style = '';

				if ( isset( $settings['style'][ $data ] ) && strpos( $settings['style'][ $data ], '#' ) !== false ) {
					$color = function_exists( 'wc_light_or_dark' ) ? wc_light_or_dark( $settings['style'][ $data ] ) : '#ffff';
					$style = $settings['style'][ $data ] ? 'background-color:' . $settings['style'][ $data ] . ';color:' . $color . ';' : '';
				}

				$selected = ( $value && $value == $data ) ? ' selected="selected"' : '';

				$output .= '<option style="' . esc_attr( $style ) . '" class="' . esc_attr( $data ) . '" value="' . esc_attr( $data ) . '"' . $selected . '>' . esc_html( $label ) . '</option>';
			}
		}
		$output .= '</select>';

		if ( isset( $settings['callback'] ) && strpos( $settings['callback'], 'html_block' ) && function_exists( 'woodmart_get_html_block_links' ) ) {
			$output .= woodmart_get_html_block_links();
		}

		return $output;
	}
}
