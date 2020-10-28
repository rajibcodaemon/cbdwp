<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'inner-pages' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

$pro_args = array(
	'post_type' => 'product',
    'posts_per_page' => 10,
    'orderby'        => 'rand',
    'order'          => 'desc',
);

$products = new WP_Query( $pro_args); ?>
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>
</header>
<div class="row">
	<?php
		while ( $products->have_posts() ) : $products->the_post(); global $product;
		$product_url = get_permalink( $product->get_id() ); ?>
	    <div class="col-md-4">
	        <div class="product-thumb">
	            <figure>
	                <a href="<?php echo $product_url; ?>"><?php echo get_the_post_thumbnail($products->post->ID, 'shop_catalog') ?></a>
	            </figure>
	            <h4><a href="<?php echo $product_url; ?>"><?php the_title(); ?></a></h4>
	            <p class="price"><?php echo $product->get_price_html(); ?></p>
	        </div>
	    </div>
    <?php endwhile; ?>
</div>
<?php
do_action( 'woocommerce_after_main_content' );
get_footer( 'shop' );
