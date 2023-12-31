<?php
/**
 * Single Product Up-Sells
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$position = woodmart_get_opt( 'upsells_position' );

$related_product_view = woodmart_get_opt( 'related_product_view' );

if ( $upsells && 'hide' !== woodmart_get_opt( 'upsells_position' ) ) : ?>

	<?php if ( 'sidebar' === $position ) : ?>
	<?php woodmart_enqueue_inline_style( 'widget-product-upsells' ); ?>
	<div class="upsells-widget widget sidebar-widget">

		<<?php echo esc_html( woodmart_get_widget_title_tag() ); ?> class="widget-title"><?php echo esc_html__( 'You may also like&hellip;', 'woocommerce' ); ?></<?php echo esc_html( woodmart_get_widget_title_tag() ); ?>>

		<?php woodmart_products_widget_template( $upsells, true ); ?>

	</div>

	<?php else : ?>

	<div class="upsells-carousel">

		<h3 class="title slider-title"><span><?php echo esc_html__( 'You may also like&hellip;', 'woocommerce' ); ?></span></h3>

		<?php
			woodmart_enqueue_product_loop_styles( woodmart_get_opt( 'products_hover' ) );
		if ( $related_product_view == 'slider' ) {
			$slider_args = array(
				'slides_per_view'              => ( woodmart_get_opt( 'related_product_columns' ) ) ? woodmart_get_opt( 'related_product_columns' ) : apply_filters( 'woodmart_cross_sells_products_per_view', 4 ),
				'hide_pagination_control'      => false,
				'img_size'                     => 'woocommerce_thumbnail',
				'products_bordered_grid'       => woodmart_get_opt( 'products_bordered_grid' ),
				'products_bordered_grid_style' => woodmart_get_opt( 'products_bordered_grid_style' ),
				'products_with_background'     => woodmart_get_opt( 'products_with_background' ),
				'products_shadow'              => woodmart_get_opt( 'products_shadow' ),
				'products_color_scheme'        => woodmart_get_opt( 'products_color_scheme' ),
				'custom_sizes'                 => apply_filters( 'woodmart_cross_sells_custom_sizes', false ),
				'product_quantity'             => woodmart_get_opt( 'product_quantity' ),
			);

			woodmart_set_loop_prop( 'products_view', 'carousel' );

			echo woodmart_generate_posts_slider( $slider_args, false, $upsells );
		} elseif ( $related_product_view == 'grid' ) {

			woodmart_set_loop_prop( 'products_columns', woodmart_get_opt( 'related_product_columns' ) );
			woodmart_set_loop_prop( 'products_different_sizes', false );
			woodmart_set_loop_prop( 'products_masonry', false );
			woodmart_set_loop_prop( 'products_view', 'grid' );

			woocommerce_product_loop_start();

			foreach ( $upsells as $upsell ) {
				$post_object = get_post( $upsell->get_id() );

				setup_postdata( $GLOBALS['post'] = $post_object );

				wc_get_template_part( 'content', 'product' );
			}

			woocommerce_product_loop_end();

			woodmart_reset_loop();

			if ( function_exists( 'woocommerce_reset_loop' ) ) {
				woocommerce_reset_loop();
			}
		}

		?>

	</div>

	<?php endif ?>

	<?php
endif;


wp_reset_postdata();
