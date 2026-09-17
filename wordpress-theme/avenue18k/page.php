<?php
/**
 * Avenue 18K — page générique (Contact, Mentions légales, CGV, ...)
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<div class="page-banner">
  <div class="container">
    <span class="eyebrow">Avenue 18K</span>
    <h1><?php the_title(); ?></h1>
  </div>
</div>

<section class="section">
  <div class="container" style="max-width:820px">
    <?php
    while ( have_posts() ) :
      the_post();
      the_content();
    endwhile;
    ?>
  </div>
</section>

<?php get_footer(); ?>
