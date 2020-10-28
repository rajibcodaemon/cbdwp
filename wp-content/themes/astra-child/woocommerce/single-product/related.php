<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related products">

		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

		if ( $heading ) :
			?>
			<h2><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>
		<div class="row">
			<?php woocommerce_product_loop_start(); ?>
				<?php foreach ( $related_products as $related_product ) : 
						$post_object = get_post( $related_product->get_id() );
						$product_url = get_permalink( $related_product->get_id() );
						setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
						?>
						<div class="col-md-4">
					        <div class="product-thumb">
					            <figure>
					                <a href="<?php echo $product_url; ?>"><?php echo get_the_post_thumbnail($related_product->post->ID, 'shop_catalog') ?></a>
					            </figure>
					            <h4><a href="<?php echo $product_url; ?>"><?php the_title(); ?></a></h4>
					            <p class="price"><?php echo $related_product->get_price_html(); ?></p>
					        </div>
					    </div>
				<?php endforeach; ?>
			<?php woocommerce_product_loop_end(); ?>
		</div>
	</section>
	<?php
endif;

wp_reset_postdata();
