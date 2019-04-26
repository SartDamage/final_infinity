<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */
global $salt_opt;

$shop_sidebar  = salt_sidebar_position( 'shop_sidebar' );
$items_size = ( $shop_sidebar ) ? 'col-md-4 col-sm-6' : 'col-md-3 col-sm-4';

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

/* Get rating values */
$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 === ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 === $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 === $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}
$classes[] = $items_size;
?>



<div <?php post_class( $classes ); ?>>
    <a class="shop-box text-center mb40" href="<?php echo get_the_permalink(); ?>">

		<!-- Image product item -->
        <?php

			do_action( 'woocommerce_before_shop_loop_item_title' );

		?>
        
		<!-- Title product item -->
        <h5><?php the_title(); ?></h5>

		<!-- Price product item -->
		<?php wc_get_template( 'loop/price.php' ); ?>

        <!-- Stars product item -->
        <?php if ( get_option( 'woocommerce_enable_review_rating' ) != 'no' ) { ?>
			<?php if ( $rating_count > 0 ) : ?>
				<div class="stars stars-example-css">
					<div class="css-stars">
					<?php 
						$rating = '';
						for ( $i = 0; $i < 5; $i++ ) { 
							if( $i < $average ) {
								$diff = $average - $i;
								if( $diff > 0 && $diff < 1 ) {
									$star_class = 'half';
								} else {
									$star_class = 'full';
								}
							} else {
								$star_class = 'empty';
							}
							$rating .= '<span class="star ' . esc_attr( $star_class ) . '"></span>';
						}
						echo wp_kses_post( $rating );
					?>
					</div>
				</div>
			<?php endif; ?>
		<?php } ?>
    </a> <!-- end shop-box -->
</div>
