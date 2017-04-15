<?php
// Template name: Partners-Page
?>


<?php get_header(); ?>
<section class="home__top" style="background-color: <?php echo get_option('header_logo'); ?>">
    <div class="wrapper">
        <?php echo get_bloginfo( 'name' ); ?>
    </div>
</section>
<section class="page__content">
    <div class="wrapper">
        <h1><?php echo get_the_title(); ?></h1>
    </div>
<div class="wrapper">
  <p><?php echo get_bloginfo( 'name' ); ?> heeft
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

</div>
</section>

<style>

    h1, h2
    {
        color: <?php echo get_option('header_logo'); ?> !important;
    }

    .swiper-pagination-bullet-active
    {
        background-color: <?php echo get_option('header_logo'); ?> !important;
    }

    .swiper-pagination-bullet
    {
        border-color: <?php echo get_option('header_logo'); ?> !important;
    }

    .home__testmonials__slider__hook-up path
    {
        fill: <?php echo get_option('header_logo'); ?>;
    }

    .home__testmonials__slider__hook-under path
    {
        fill: <?php echo get_option('header_logo'); ?>;
    }

    .sidebar ul li a:hover
    {
        color: <?php echo get_option('header_logo'); ?>;
    }

    .home__content__intrested__button
    {
        background-color: <?php echo get_option('header_logo'); ?>;
    }

    .who__content__grid__col__photo
    {
        border-color: <?php echo get_option('header_logo'); ?>;
    }

</style>

<?php get_footer(); ?>
