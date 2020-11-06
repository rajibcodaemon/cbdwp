<?php
/**
 * The header for Astra Child Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="profile" href="https://gmpg.org/xfn/11">
<script src="<?php echo get_stylesheet_directory_uri()?>/assets/js/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<?php wp_head(); ?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
<?php astra_body_top(); ?>
<?php wp_body_open(); ?>
<div 
  <?php
  echo astra_attr(
    'site',
    array(
      'id'    => 'page',
      'class' => 'hfeed site',
    )
  );
  ?>
>
<a class="skip-link screen-reader-text" href="#content"><?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?></a>
  	<?php
  	if(!is_shop() && !is_product()) {
    if ( has_post_thumbnail()) {
      //the_post_thumbnail();
      $url = get_the_post_thumbnail_url( null, $size ); 
    ?>
      <header style="background: url('<?php echo esc_url($url) ?>')no-repeat 0 0;" class="banner-section">
    <?php } else { ?>
    	<header class="inner-header banner-section">
    <?php } } else { ?>
    	<header class="inner-header banner-section">
    <?php } ?>
  		<div class="container">
		    <nav class="navbar navbar-expand-lg navbar-light bg-light">
		      <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
		      $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		      ?>
		      <a class="navbar-brand" href="<?php echo get_home_url();?>">
		        <?php if(!empty($image)) { ?>
		          <?php echo '<img class="img-fluid" src="'.$image[0].'">'; ?>
		        <?php } ?>
		      </a>
		      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
		        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="navbar-toggler-icon"></span>
		      </button>
		      <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                	$count = WC()->cart->cart_contents_count;
	              } 
	              $url = wc_get_cart_url();
	              wp_nav_menu(array(
	                'theme_location' => 'primary',
	                'container' => 'div',
	                'container_class' => 'collapse navbar-collapse', 
	                'container_id'    => 'navbarSupportedContent',
	                'menu_class' => '',
	                'items_wrap' => '<ul class="navbar-nav ml-auto">%3$s <li>
	                    <span class="cart-icon"><a href="'.$url.'">'.$count.'</a>
                    </span>
                  </li></ul>'
	              ));
            ?>
		    </nav>
		</div>
  </header>
  <?php astra_content_before(); ?>
  <div id="content" class="site-content inner-content">
    <div class="container">
    <?php astra_content_top(); ?>


