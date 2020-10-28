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
$args = array(
    'post_type' => 'product',
    'paged' => $paged,
    'posts_per_page' => 10
);
$products = new WP_Query( $args);
?>
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>

<?php if(!empty($products)) {?>
	<div class="woocommerce columns-3">
	<ul classs="products columns-3">
	 	<?php while ( $products->have_posts() ) : $products->the_post(); global $product; ?>
			<?php $product_url = get_permalink( $product->get_id() ); ?>
	 		<li <?php wc_product_class( '', $product ); ?>>
	      		<a href="<?php echo $product_url; ?>" class="product">
			      	<div class="image-box">
				  		<?php echo get_the_post_thumbnail($products->post->ID, 'shop_catalog') ?>
				  	</div>
			      	<div class="detail-box text-center">
			      		<p class="price"><?php echo $product->get_price_html(); ?></p>
			      		<p class="info"><?php the_title(); ?></p>
			      	</div>
	      		</a>
	    	</li>
	    <?php endwhile; ?>
	</ul>
	</div>
<?php } ?>
<?php
get_footer( 'shop' );




