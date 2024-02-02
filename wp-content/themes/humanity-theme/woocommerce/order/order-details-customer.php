<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 5.6.0
 */

defined( 'ABSPATH' ) || exit;

$show_shipping = ! wc_ship_to_billing_address_only() && $order->needs_shipping_address();

if ( $show_shipping ) {
	include locate_template( 'partials/orders/customer-details-with-shipping.php' );
	return;
}

?>
<section class="woocommerce-customer-details">
	<h2 class="woocommerce-column__title"><?php /* translators: [front] Donate */ esc_html_e( 'Billing address', 'woocommerce' ); ?></h2>
	<address>
	<?php echo wp_kses_post( $order->get_formatted_billing_address( /* translators: [front] Donate */ esc_html__( 'N/A', 'woocommerce' ) ) ); ?>

	<?php if ( $order->get_billing_phone() ) : ?>
		<p class="woocommerce-customer-details--phone"><?php echo esc_html( $order->get_billing_phone() ); ?></p>
	<?php endif; ?>

	<?php if ( $order->get_billing_email() ) : ?>
		<p class="woocommerce-customer-details--email"><?php echo esc_html( $order->get_billing_email() ); ?></p>
	<?php endif; ?>
	</address>

<?php do_action( 'woocommerce_order_details_after_customer_details', $order ); ?>
</section>
