<?php
// Template name: Apply-Page
?>


<?php get_header(); ?>

<section class="home__hero">
  <div class="home__hero__overlay"></div>
  <div class="wrapper">
    <div class="home__hero__content">
      <h1 class="home__hero__title">Sluit je aan</h1>
      <p class="home__hero__text">Wil je graag hulp bij het ondernemen? Sluit je dan nu aan!</p>
    </div>
  </div>
</section>

<section class="apply__form">
  <div class="apply__hook__top"></div>
<h2 class="apply__form__title">Lcie intake formulier</h2>
  <?php $query = new WP_Query(array('page_id' => 80)); ?>
  <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

      <?php the_content(); ?>



  <?php endwhile; endif; ?>
    <div class="apply__hook__bottom"></div>
</section>



<?php get_footer(); ?>
