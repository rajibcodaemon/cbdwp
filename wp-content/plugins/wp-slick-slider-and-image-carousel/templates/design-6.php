<?php/** * 'slick-carousel-slider' Design 6 Shortcodes HTML * * @package WP Slick Slider and Image Carousel * @since 1.0.0 */// Exit if accessed directlyif ( !defined( 'ABSPATH' ) ) exit;?><div class="wpsisac-image-slide">  	<?php 	$sliderurl = get_post_meta( get_the_ID(),'wpsisac_slide_link', true );	$slider_img 	= wpsisac_get_post_featured_image( $post->ID, $sliderimage_size, true );	echo ($sliderurl !='' ? '<a href="'.$sliderurl.'">' : ''); ?>		<div class="wpsisac-image-slide-wrap" <?php echo $slider_height_css ; ?>>			<img <?php if($lazyload) { ?>data-lazy="<?php echo esc_url($slider_img); ?>" <?php } ?> src="<?php if(empty($lazyload)) { echo esc_url($slider_img); } ?>" alt="<?php the_title(); ?>" />		</div>	<?php echo ($sliderurl !='' ? '</a>' : ''); ?></div>