<?php
/**
 * Avenue 18K — page d'accueil
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<section class="hero">
  <div class="hero-content">
    <span class="eyebrow">Bijouterie en ligne</span>
    <h1>L'or 18 carats, enfin accessible</h1>
    <p>Des bijoux intemporels en or 18 carats, dessinés avec exigence et proposés à des prix justes. Garantie à vie, livraison assurée offerte.</p>
    <div class="hero-actions">
      <a href="<?php echo esc_url( function_exists( 'wc_get_page_id' ) ? get_permalink( wc_get_page_id( 'shop' ) ) : '#' ); ?>" class="btn btn-gold">Découvrir la collection</a>
      <a href="#pourquoi-18k" class="btn btn-outline">Pourquoi l'or 18K ?</a>
    </div>
  </div>
</section>

<div class="trust-bar">
  <div class="container">
    <div class="trust-item"><svg viewBox="0 0 24 24"><path d="M12 2 3 6v6c0 5 3.8 8.7 9 10 5.2-1.3 9-5 9-10V6z"/><path d="m9 12 2 2 4-4"/></svg> Garantie à vie</div>
    <div class="trust-item"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M8 12h8M12 8v8"/></svg> Or 18K certifié</div>
    <div class="trust-item"><svg viewBox="0 0 24 24"><rect x="1" y="7" width="15" height="11" rx="1"/><path d="M16 10h4l3 3v4h-7z"/><circle cx="6" cy="20" r="1.6"/><circle cx="18" cy="20" r="1.6"/></svg> Livraison offerte dès 150€</div>
    <div class="trust-item"><svg viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="15" rx="2"/><path d="M2 10h20"/></svg> Paiement 3x sans frais</div>
  </div>
</div>

<section class="section">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Nos univers</span>
      <h2>Explorer par catégorie</h2>
      <p>Quatre familles de bijoux en or 18 carats, pensées pour accompagner chaque moment de votre quotidien.</p>
    </div>
    <div class="categories-grid">
      <?php
      $categories = array( 'bagues' => 'Bagues', 'colliers' => 'Colliers', 'bracelets' => 'Bracelets', 'boucles-oreilles' => "Boucles d'oreilles" );
      $shop_url   = function_exists( 'wc_get_page_id' ) ? get_permalink( wc_get_page_id( 'shop' ) ) : '#';
      foreach ( $categories as $slug => $label ) :
        $term = get_term_by( 'slug', $slug, 'product_cat' );
        $link = $term ? get_term_link( $term ) : $shop_url . '?product_cat=' . $slug;
        $thumb_id = $term ? get_term_meta( $term->term_id, 'thumbnail_id', true ) : '';
        $img = $thumb_id ? wp_get_attachment_image_url( $thumb_id, 'medium' ) : '';
        ?>
        <a class="category-card" href="<?php echo esc_url( $link ); ?>">
          <?php if ( $img ) : ?>
            <img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $label ); ?>">
          <?php endif; ?>
          <span><?php echo esc_html( $label ); ?></span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Sélection</span>
      <h2>Nos best-sellers</h2>
      <p>Les pièces plébiscitées par nos clientes et clients, en or 18 carats véritable.</p>
    </div>
    <?php
    if ( function_exists( 'WC' ) ) {
      echo do_shortcode( '[best_selling_products limit="8" columns="4"]' );
    }
    ?>
    <div class="text-center mt-40">
      <a href="<?php echo esc_url( function_exists( 'wc_get_page_id' ) ? get_permalink( wc_get_page_id( 'shop' ) ) : '#' ); ?>" class="btn btn-outline">Voir toute la boutique</a>
    </div>
  </div>
</section>

<section class="section" id="pourquoi-18k">
  <div class="container">
    <div class="why-grid">
      <div class="hero" style="min-height:360px;border-radius:2px;"></div>
      <div>
        <span class="eyebrow">Notre engagement</span>
        <h2>Pourquoi choisir l'or 18 carats ?</h2>
        <p>L'or 18 carats contient 75% d'or pur, allié à d'autres métaux pour une résistance optimale. C'est le juste équilibre entre éclat, solidité et durabilité — le choix des plus grandes maisons de joaillerie.</p>
        <table class="purity-table">
          <thead><tr><th>Titre</th><th>Pureté</th><th>Usage</th></tr></thead>
          <tbody>
            <tr><td>9 carats</td><td>37,5% d'or</td><td>Bijoux fantaisie</td></tr>
            <tr><td>14 carats</td><td>58,5% d'or</td><td>Bijoux courants</td></tr>
            <tr class="highlight"><td>18 carats</td><td>75% d'or</td><td>Bijouterie fine — notre choix</td></tr>
            <tr><td>24 carats</td><td>99,9% d'or</td><td>Or pur, trop malléable</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Avis clients</span>
      <h2>Ils nous font confiance</h2>
    </div>
    <div class="testimonials-grid">
      <div class="testimonial">
        <div class="stars">★★★★★</div>
        <p>« Ma bague est arrivée superbement emballée, exactement comme sur les photos. La qualité de l'or est vraiment au rendez-vous. »</p>
        <div class="author">— Camille R., cliente vérifiée</div>
      </div>
      <div class="testimonial">
        <div class="stars">★★★★★</div>
        <p>« Le service client a été parfait pour ajuster la taille de ma chevalière. Un vrai savoir-faire artisanal. »</p>
        <div class="author">— Yassine B., client vérifié</div>
      </div>
      <div class="testimonial">
        <div class="stars">★★★★★</div>
        <p>« Enfin des bijoux en or véritable à des prix raisonnables. Je recommande vivement Avenue 18K. »</p>
        <div class="author">— Sophie L., cliente vérifiée</div>
      </div>
    </div>
  </div>
</section>

<section class="newsletter section">
  <div class="container">
    <h2>-10% sur votre première commande</h2>
    <p>Inscrivez-vous à notre newsletter et recevez en exclusivité nos nouveautés et offres réservées.</p>
    <form class="newsletter-form js-newsletter-form">
      <input type="email" placeholder="Votre adresse email" required>
      <button type="submit" class="btn btn-gold">S'inscrire</button>
    </form>
    <p class="form-msg"></p>
  </div>
</section>

<?php get_footer(); ?>
