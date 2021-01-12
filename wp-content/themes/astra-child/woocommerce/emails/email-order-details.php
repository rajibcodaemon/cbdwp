<?php
/**
 * Order details table shown in emails.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

$text_align = is_rtl() ? 'right' : 'left';

do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text, $email ); ?>

<table style="width: 100%; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;color: #636363;
	    border: 1px solid #e5e5e5;" border="1" cellspacing="0">
		<thead>
			<tr>
				<th class="td" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><h2 style="margin: 0 0 5px; line-height: 100%;font-size: 15px;">Order Number</h2></th>
				<th class="td" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><h2 style="margin: 0 0 5px; line-height: 100%;font-size: 15px;">Order Date</h2></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; padding:0; border: 1px solid #e5e5e5;">
					<?php
						if ( $sent_to_admin ) {
							$before = '<a class="link" href="' . esc_url( $order->get_edit_order_url() ) . '">';
							$after  = '</a>';
						} else {
							$before = '';
							$after  = '';
						}			
					?>
					<b><?php /* translators: %s: Order ID. */
					echo '#'.$order->get_order_number();?></b>
				</td>
				<td style="font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; padding:0; border: 1px solid #e5e5e5;">
					<b><?php /* translators: %s: Order ID. */
					echo wc_format_datetime( $order->get_date_created() );

					//echo wp_kses_post( $before . sprintf( __( '[Order #%s]', 'woocommerce' ) . $after . ' (<time datetime="%s">%s</time>)', $order->get_order_number(), $order->get_date_created()->format( 'c' ), wc_format_datetime( $order->get_date_created() ) ) ); ?></b>
				</td> 
			</tr>
		</tbody>
	</table>
<div style="margin-bottom: 30px; margin-top: 30px;">
	<table class="td" cellspacing="0" cellpadding="6" style="width: 100%; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;" border="1">
		<thead>
			<tr>
				<th class="td" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><h2 style="margin: 0 0 5px; line-height: 100%;font-size: 15px;"><?php esc_html_e( 'Item Code/Description', 'woocommerce' ); ?></h2></th>
				<th class="td" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><h2 style="margin: 0 0 5px; line-height: 100%;font-size: 15px;"><?php esc_html_e( 'Ordered', 'woocommerce' ); ?></h2></th>
				<th class="td" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><h2 style="margin: 0 0 5px; line-height: 100%;font-size: 15px;"><?php esc_html_e( 'Price', 'woocommerce' ); ?></h2></th>
			</tr>
		</thead>
		<tbody>
			<?php
			echo wc_get_email_order_items( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				$order,
				array(
					'show_sku'      => $sent_to_admin,
					'show_image'    => false,
					'image_size'    => array( 32, 32 ),
					'plain_text'    => $plain_text,
					'sent_to_admin' => $sent_to_admin,
				)
			);
			?>
		</tbody>
		<tfoot>
			<?php
			$item_totals = $order->get_order_item_totals();

			if ( $item_totals ) {
				$i = 0;
				foreach ( $item_totals as $total ) {
					$i++;
					?>
					<tr>
						<th class="td" scope="row" colspan="2" style="text-align:<?php echo esc_attr( $text_align ); ?>; <?php echo ( 1 === $i ) ? 'border-top-width: 4px;' : ''; ?>"><?php echo wp_kses_post( $total['label'] ); ?></th>
						<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; <?php echo ( 1 === $i ) ? 'border-top-width: 4px;' : ''; ?>"><?php echo wp_kses_post( $total['value'] ); ?></td>
					</tr>
					<?php
				}
			}
			if ( $order->get_customer_note() ) {
				?>
				<tr>
					<th class="td" scope="row" colspan="2" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Note:', 'woocommerce' ); ?></th>
					<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php echo wp_kses_post( nl2br( wptexturize( $order->get_customer_note() ) ) ); ?></td>
				</tr>
				<?php
			}
			?>
		</tfoot>
	</table>
</div>

<?php do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text, $email ); ?>
