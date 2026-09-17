<?php
/**
 * Avenue 18K — fonctions du thème
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'AVENUE18K_VERSION', '1.0.0' );

/* ---------------- Setup du thème ---------------- */
function avenue18k_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// WooCommerce
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	register_nav_menus( array(
		'primary' => __( 'Menu principal', 'avenue18k' ),
		'footer'  => __( 'Menu pied de page', 'avenue18k' ),
	) );
}
add_action( 'after_setup_theme', 'avenue18k_setup' );

/* ---------------- Styles et scripts ---------------- */
function avenue18k_scripts() {
	wp_enqueue_style(
		'avenue18k-fonts',
		'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Jost:wght@400;500;600&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'avenue18k-style', get_stylesheet_uri(), array(), AVENUE18K_VERSION );
	wp_enqueue_script( 'avenue18k-main', get_theme_file_uri( '/js/theme.js' ), array(), AVENUE18K_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'avenue18k_scripts' );

/* ---------------- Largeur d'image par défaut WooCommerce (cohérent avec le design) ---------------- */
function avenue18k_woocommerce_image_dimensions() {
	$catalog = array( 'width' => 600, 'height' => 600, 'crop' => 1 );
	$single  = array( 'width' => 800, 'height' => 800, 'crop' => 1 );
	$thumbnail = array( 'width' => 180, 'height' => 180, 'crop' => 1 );

	update_option( 'shop_catalog_image_size', $catalog );
	update_option( 'shop_single_image_size', $single );
	update_option( 'shop_thumbnail_image_size', $thumbnail );
}
add_action( 'after_switch_theme', 'avenue18k_woocommerce_image_dimensions' );

/* ---------------- Nombre de produits par page / par ligne (grille en 4 colonnes) ---------------- */
add_filter( 'loop_shop_columns', function () { return 4; } );
add_filter( 'loop_shop_per_page', function () { return 12; }, 20 );

/* ---------------- Badge "Promo" en français ---------------- */
add_filter( 'woocommerce_sale_flash', function () {
	return '<span class="onsale">Promo</span>';
} );

/* ---------------- Compteur panier dynamique dans le header (AJAX) ---------------- */
function avenue18k_cart_count_fragment( $fragments ) {
	ob_start();
	?>
	<span class="cart-count"><?php echo absint( WC()->cart->get_cart_contents_count() ); ?></span>
	<?php
	$fragments['span.cart-count'] = ob_get_clean();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'avenue18k_cart_count_fragment' );

/* ---------------- Retirer les styles par défaut de WooCommerce (on utilise les nôtres) ---------------- */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/* ---------------- Menu par défaut si aucun menu n'est configuré dans Apparence > Menus ---------------- */
function avenue18k_default_menu() {
	$shop_url = function_exists( 'wc_get_page_id' ) ? get_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/boutique/' );
	$links = array(
		'Bagues'             => $shop_url . '?product_cat=bagues',
		'Colliers'           => $shop_url . '?product_cat=colliers',
		'Bracelets'          => $shop_url . '?product_cat=bracelets',
		"Boucles d'oreilles" => $shop_url . '?product_cat=boucles-oreilles',
		'Toute la boutique'  => $shop_url,
		'Contact'            => home_url( '/contact/' ),
	);
	echo '<ul>';
	foreach ( $links as $label => $url ) {
		echo '<li><a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a></li>';
	}
	echo '</ul>';
}

/* ---------------- Widgets footer (optionnel, non utilisé par défaut dans footer.php) ---------------- */
function avenue18k_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Pied de page', 'avenue18k' ),
		'id'            => 'footer-1',
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'avenue18k_widgets_init' );
