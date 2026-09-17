<?php
/**
 * Avenue 18K — gabarit par défaut (fallback)
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<section class="section">
  <div class="container">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <article <?php post_class(); ?>>
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <div><?php the_excerpt(); ?></div>
        </article>
      <?php endwhile; ?>
    <?php else : ?>
      <p>Aucun contenu trouvé.</p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
