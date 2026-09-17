<?php
/**
 * Avenue 18K — gabarit WooCommerce (boutique, produit, panier, commande, compte)
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<?php if ( is_shop() || is_product_category() || is_product_tag() ) : ?>
  <div class="page-banner">
    <div class="container">
      <span class="eyebrow">Collection</span>
      <h1><?php woocommerce_page_title(); ?></h1>
    </div>
  </div>
<?php endif; ?>

<section class="section" style="padding-top:32px">
  <div class="container">
    <?php woocommerce_breadcrumb(); ?>
    <?php woocommerce_content(); ?>
  </div>
</section>

<?php get_footer(); ?>
