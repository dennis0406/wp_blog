<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<nav class="woocommerce-MyAccount-navigation">
	<ul>
		<?php 
		$icons = [
			'dashboard'       => '<ion-icon name="planet-outline"></ion-icon>',
			'orders'          => '<ion-icon name="newspaper-outline"></ion-icon>',
			'my-cart'    			=> '<ion-icon name="person-outline"></ion-icon>',
			'downloads'       => '<ion-icon name="download-outline"></ion-icon>',
			'edit-address'    => '<ion-icon name="location-outline"></ion-icon>',
			'payment-methods' => '<ion-icon name="cash-outline"></ion-icon>',
			'edit-account'    => '<ion-icon name="person-outline"></ion-icon>',
			'customer-logout' => '<ion-icon name="log-out-outline"></ion-icon>',
		];
		foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>">
				<?php echo $icons[$endpoint]; ?>
				<span><?php echo esc_html( $label ); ?></span></a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
