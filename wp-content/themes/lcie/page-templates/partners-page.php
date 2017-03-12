<?php
// Template name: Partners-Page
?>


<?php get_header(); ?>

<?php get_template_part( '/template-parts/page', 'header' ); ?>
<section class="page__content">
<div class="wrapper">
  <p>De Leuven Community for Innovation driven Entrepreneurship (LCIE) heeft
    relaties uitgebouwd met meerdere geassocieerde partners. Deze partners delen
  dezelfde opvatting over de nood aan innovatie, creativiteit en ondernemerschap
  die de maatschappij van vandaag en morgen ten goede moet komen.</p>

  <h2>Powered By</h2>
  <section class="partners__grid">
 <?php if( have_rows('poweredby') ): ?>

    <?php while ( have_rows('poweredby') ) : the_row(); ?>

      <a href="<?php the_sub_field('url'); ?>"><img src="<?php the_sub_field('image'); ?>" alt="" class="partners__grid__item"></a>

  <?php endwhile; endif; ?>
  </section>

  <h2>In partnership with</h2>
  <section class="partners__grid">
   <?php if( have_rows('partnership') ): ?>

      <?php while ( have_rows('partnership') ) : the_row(); ?>

        <a href="<?php the_sub_field('url'); ?>"><img src="<?php the_sub_field('image'); ?>" alt="" class="partners__grid__item"></a>

    <?php endwhile; endif; ?>
  </section>

  <h2>Sponsored by</h2>
  <section class="partners__grid">
  <?php if( have_rows('sponsored') ): ?>

    <?php while ( have_rows('sponsored') ) : the_row(); ?>

      <a href="<?php the_sub_field('url'); ?>"><img src="<?php the_sub_field('image'); ?>" alt="" class="partners__grid__item"></a>

  <?php endwhile; endif; ?>
  </section>

<!--   <h2>IusStart Partners</h2>
  <section class="partners__grid">
  <?php if( have_rows('rep') ): ?>

    <?php while ( have_rows('rep') ) : the_row(); ?>

      <?php the_sub_field('sub_field_name'); ?>

  <?php endwhile; endif; ?>
  </section> -->

</div>
</section>

<?php get_footer(); ?>
