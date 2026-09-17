<?php
/**
 * Avenue 18K — footer
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<footer class="site-footer">
  <div class="container footer-grid">
    <div class="footer-brand">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">AVENUE 18K</a>
      <p>Bijouterie en ligne spécialiste de l'or 18 carats. Des bijoux intemporels, une qualité certifiée, une garantie à vie.</p>
      <div class="footer-social">
        <a href="#" aria-label="Instagram"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1"/></svg></a>
        <a href="#" aria-label="Facebook"><svg viewBox="0 0 24 24"><path d="M15 8h2V5h-2a4 4 0 0 0-4 4v2H9v3h2v6h3v-6h2l1-3h-3V9a1 1 0 0 1 1-1z"/></svg></a>
        <a href="#" aria-label="Pinterest"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M9 17c1-3 2-6 2-8a2 2 0 0 1 4 0c0 1.5-1 3-2 3"/></svg></a>
      </div>
    </div>

    <div>
      <h4>Boutique</h4>
      <ul>
        <?php $shop_url = function_exists( 'wc_get_page_id' ) ? get_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/boutique/' ); ?>
        <li><a href="<?php echo esc_url( $shop_url . '?product_cat=bagues' ); ?>">Bagues</a></li>
        <li><a href="<?php echo esc_url( $shop_url . '?product_cat=colliers' ); ?>">Colliers</a></li>
        <li><a href="<?php echo esc_url( $shop_url . '?product_cat=bracelets' ); ?>">Bracelets</a></li>
        <li><a href="<?php echo esc_url( $shop_url . '?product_cat=boucles-oreilles' ); ?>">Boucles d'oreilles</a></li>
      </ul>
    </div>

    <div>
      <h4>Aide &amp; SAV</h4>
      <ul>
        <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Nous contacter</a></li>
        <li><a href="<?php echo esc_url( home_url( '/contact/#faq' ) ); ?>">Livraison &amp; retours</a></li>
        <li><a href="<?php echo esc_url( home_url( '/contact/#faq' ) ); ?>">Guide des tailles</a></li>
      </ul>
    </div>

    <div>
      <h4>Informations</h4>
      <ul>
        <li><a href="<?php echo esc_url( home_url( '/mentions-legales/' ) ); ?>">Mentions légales</a></li>
        <li><a href="<?php echo esc_url( home_url( '/cgv/' ) ); ?>">CGV</a></li>
        <li><a href="<?php echo esc_url( home_url( '/confidentialite/' ) ); ?>">Confidentialité</a></li>
      </ul>
      <div class="payment-icons">
        <span>CB</span><span>Visa</span><span>Mastercard</span><span>PayPal</span>
      </div>
    </div>
  </div>

  <div class="container footer-bottom">
    <span>© <?php echo esc_html( date( 'Y' ) ); ?> Avenue 18K — Tous droits réservés</span>
    <span>Bijoux en or 18 carats certifiés, fabriqués avec exigence</span>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
