<?php if ( ! defined( 'WOODMART_THEME_DIR' ) ) {
	exit( 'No direct script access allowed' );}

/**
 * ------------------------------------------------------------------------------------------------
 *  HTML Block element
 * ------------------------------------------------------------------------------------------------
 */

if ( ! class_exists( 'WOODMART_HB_HTMLBlock' ) ) {
	class WOODMART_HB_HTMLBlock extends WOODMART_HB_Element {

		public function __construct() {
			parent::__construct();
			$this->template_name = 'html-block';
		}

		public function map() {
			$description = esc_html__( 'Choose which HTML block to display in the header', 'woodmart' );

			if ( function_exists( 'woodmart_get_html_block_links' ) ) {
				$description .= woodmart_get_html_block_links();
			}

			$this->args = array(
				'type'            => 'HTMLBlock',
				'title'           => esc_html__( 'HTML Block', 'woodmart' ),
				'text'            => esc_html__( 'Page builder content', 'woodmart' ),
				'icon'            => 'xts-i-html-block',
				'editable'        => true,
				'container'       => false,
				'edit_on_create'  => true,
				'drag_target_for' => array(),
				'drag_source'     => 'content_element',
				'removable'       => true,
				'addable'         => true,
				'params'          => array(
					'block_id' => array(
						'id'          => 'block_id',
						'title'       => esc_html__( 'HTML Block', 'woodmart' ),
						'type'        => 'select',
						'tab'         => esc_html__( 'General', 'woodmart' ),
						'value'       => '',
						'callback'    => 'get_html_block_options',
						'description' => $description,
					),
				),
			);
		}
	}
}
