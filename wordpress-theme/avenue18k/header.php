<?php
/**
 * Avenue 18K — header
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="topbar">
  <div class="container">
    <span>✦ Garantie à vie sur tous nos bijoux</span>
    <span>✦ Livraison offerte dès 150€</span>
    <span>✦ Paiement en 3x sans frais</span>
  </div>
</div>

<header class="site-header">
  <div class="container header-inner">
    <button class="burger" aria-label="Menu"><span></span><span></span><span></span></button>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">AVENUE 18K<small>Or 18 carats en ligne</small></a>

    <nav class="main-nav">
      <?php
      wp_nav_menu( array(
        'theme_location' => 'primary',
        'container'      => false,
        'fallback_cb'    => 'avenue18k_default_menu',
      ) );
      ?>
    </nav>

    <div class="header-icons">
      <a class="icon-btn" href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" title="Mon compte" aria-label="Mon compte">
        <svg viewBox="0 0 24 24"><path d="M20 21a8 8 0 1 0-16 0"/><circle cx="12" cy="7" r="4"/></svg>
      </a>
      <a class="icon-btn" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="Panier" aria-label="Panier">
        <svg viewBox="0 0 24 24"><path d="M6 6h15l-1.5 9h-12z"/><path d="M6 6L4 3H2"/><circle cx="9" cy="20" r="1"/><circle cx="17" cy="20" r="1"/></svg>
        <span class="cart-count"><?php echo function_exists( 'WC' ) ? absint( WC()->cart->get_cart_contents_count() ) : 0; ?></span>
      </a>
    </div>
  </div>

  <nav class="mobile-nav">
    <?php
    wp_nav_menu( array(
      'theme_location' => 'primary',
      'container'      => false,
      'items_wrap'     => '%3$s',
      'fallback_cb'    => 'avenue18k_default_menu',
    ) );
    ?>
  </nav>
</header>

