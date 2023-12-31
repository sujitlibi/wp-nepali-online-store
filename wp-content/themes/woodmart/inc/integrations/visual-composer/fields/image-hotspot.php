<?php if ( ! defined( 'WOODMART_THEME_DIR' ) ) exit( 'No direct script access allowed' );

/**
* Image hotspot field
*/
if ( ! function_exists( 'woodmart_image_hotspot' ) ) {
	function woodmart_image_hotspot( $settings, $value ) {
		$position = explode( '||', $value );
		$left = ( isset( $position[0] ) && $position[0] ) ? $position[0] : '50';
		$top = ( isset( $position[1] ) && $position[1] ) ? $position[1] : '50';

		$output = '<input type="hidden" class="xts-image-hotspot-position wpb_vc_param_value" name="' . esc_attr( $settings['param_name'] ) . '" value="' . esc_attr( $value ) . '">';
		$output .= '<div class="xts-image-hotspot-preview">';
			$output .= '<div class="xts-image-hotspot" style="left: ' . $left . '%; top: ' . $top . '%;"></div>';
			$output .= '<div class="xts-image-hotspot-image"></div>';
			$output .= '<div class="xts-image-hotspot-overlay"></div>';
		$output .= '</div>';
		 
		return $output;
	}

}
