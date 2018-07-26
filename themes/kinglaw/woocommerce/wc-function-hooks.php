<?php

/* Ajax update cart total number */
add_filter( 'woocommerce_add_to_cart_fragments', 'kinglaw_woocommerce_header_add_to_cart_fragment' );
function kinglaw_woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
	<span class="couter_items"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, "kinglaw" ), WC()->cart->cart_contents_count ); ?></span>
	<?php
	
	$fragments['span.couter_items'] = ob_get_clean();
	
	return $fragments;
}

/* Add Images Category */
add_action( 'woocommerce_archive_description', 'kinglaw_woocommerce_category_image', 2 );
function kinglaw_woocommerce_category_image() {
    if ( is_product_category() ){
	    global $wp_query;
	    $cat = $wp_query->get_queried_object();
	    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
	    if ( $image ) {
		    echo '<img class="woo-image-categries" src="' . esc_url($image) . '" alt="" />';
		}
	}
}

/* Ajax update cart item */
add_filter('woocommerce_add_to_cart_fragments', 'kinglaw_woo_mini_cart_item_fragment');
function kinglaw_woo_mini_cart_item_fragment( $fragments ) {
	global $woocommerce;
    ob_start();
    ?>
    <div class="widget_shopping_cart">
        <div class="widget_shopping_cart_content">
            <?php
            	$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
            ?>
            <ul class="cart_list product_list_widget">

			<?php if ( ! WC()->cart->is_empty() ) : ?>

				<?php
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

							$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
							$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
							$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							?>
							<li>
								<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
									esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
									esc_html__( 'Remove this item', 'kinglaw' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
								?>
								<?php if ( ! $_product->is_visible() ) : ?>
									<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
								<?php else : ?>
									<a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
										<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
										<?php echo esc_html($product_name); ?>
									</a>
								<?php endif; ?>	

									<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
							</li>
							<?php
						}
					}
				?>

				<?php else : ?>

					<li class="empty"><?php esc_html_e( 'No products in the cart.', 'kinglaw' ); ?></li>

				<?php endif; ?>

			</ul><!-- end product list -->
			<?php if ( ! WC()->cart->is_empty() ) : ?>

				<p class="total"><strong><?php esc_html_e( 'Subtotal', 'kinglaw' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

				<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

				<p class="buttons">
					<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="button wc-forward"><?php esc_html_e( 'View Cart', 'kinglaw' ); ?></a>
					<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="button checkout wc-forward"><?php esc_html_e( 'Checkout', 'kinglaw' ); ?></a>
				</p>

			<?php endif; ?>
        </div>
    </div>
    <?php
    $fragments['div.widget_shopping_cart'] = ob_get_clean();
    return $fragments;
}

add_action( 'init', 'kinglaw_remove_wc_breadcrumbs' );
function kinglaw_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

add_action( 'init', 'kinglaw_remove_wc_ordering' );
function kinglaw_remove_wc_ordering() {
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0 );
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30, 0 );
}


/*Proceed to Checkout*/

remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 ); 
add_action('woocommerce_proceed_to_checkout', 'kinglaw_custom_checkout_button_text',20);

function kinglaw_custom_checkout_button_text() {
    $checkout_url = wc_get_checkout_url();
  ?>
       <a href="<?php echo esc_url($checkout_url); ?>" class="checkout-button button alt wc-forward"><?php  echo esc_html__( 'Checkout', 'kinglaw' ); ?></a> 
  <?php
} 

?>
