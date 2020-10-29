<?php
/**
 * Email Header
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-header.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates/Emails
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
		<title><?php echo get_bloginfo( 'name', 'display' ); ?></title>
	</head>
	<body <?php echo is_rtl() ? 'rightmargin' : 'leftmargin'; ?>="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
		
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" style="max-width: 700px;width: 100%;margin: 0 auto;padding: 0;background-color: #005d86;">
				<thead>
        <tr>
          <th style="padding: 15px 0">
            <a href="<?php echo get_home_url();?>"
              ><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" style="margin-bottom: 20px;" alt="madre terra logo"/>
        	  </a>
            <nav>
                <ul style="text-align: center; margin: 0; padding: 0;">
                    <li style="display: inline-block; list-style: none;"><a href="<?php echo get_home_url();?>/shop" style="display: block; padding: 0 15px; text-decoration: none; font-weight: normal; font-size: 14px; color: #fff;">All Products</a></li>
                    <li style="display: inline-block; list-style: none;"><a href="<?php echo get_home_url();?>/about-us" style="display: block; padding: 0 15px; text-decoration: none; font-weight: normal; font-size: 14px; color: #fff;">About Us</a></li>
                    <li style="display: inline-block; list-style: none;"><a href="<?php echo get_home_url();?>/contact-us" style="display: block; padding: 0 15px; text-decoration: none; font-weight: normal; font-size: 14px; color: #fff;">Contact Us</a></li>
                </ul>
            </nav>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="padding: 0 30px">
            <table style="width: 100%; background-color: white; padding: 20px">
              <tr>
                <td>