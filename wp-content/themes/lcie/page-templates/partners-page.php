<?php
// Template name: Partners-Page
?>


<?php get_header(); ?>

<?php get_template_part( '/template-parts/page', 'header' ); ?>
<section class="page__content">
<div class="wrapper">
  <p><?php the_content(); ?></p>

  <h2><?php pll_e("Powered by"); ?></h2>
  <section class="partners__grid">
 <?php if( have_rows('poweredby') ): ?>

    <?php while ( have_rows('poweredby') ) : the_row(); ?>

      <a href="<?php the_sub_field('url'); ?>"><img src="<?php the_sub_field('image'); ?>" alt="" class="partners__grid__item"></a>

  <?php endwhile; endif; ?>
  </section>

  <h2><?php pll_e("In partnership with"); ?></h2>
  <section class="partners__grid">
   <?php if( have_rows('partnership') ): ?>

      <?php while ( have_rows('partnership') ) : the_row(); ?>

        <a href="<?php the_sub_field('url'); ?>"><img src="<?php the_sub_field('image'); ?>" alt="" class="partners__grid__item"></a>

    <?php endwhile; endif; ?>
  </section>

  <h2><?php pll_e("Sponsored by"); ?></h2>
  <section class="partners__grid">
  <?php if( have_rows('sponsored') ): ?>

    <?php while ( have_rows('sponsored') ) : the_row(); ?>

      <a href="<?php the_sub_field('url'); ?>"><img src="<?php the_sub_field('image'); ?>" alt="" class="partners__grid__item"></a>

  <?php endwhile; endif; ?>
  </section>


</div>
</section>

<?php get_footer(); ?>
