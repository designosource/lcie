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
 

      <div class="wrapper offer__content__inner">
            <svg class="hook-under" viewBox="0 0 100 100"> 
          <path d="M20,58 L20,0 L0,0 L0,68 L0,78 L78,78 L78,58 L20,58 Z" id="Combined-Shape"></path>
      </svg>

    <svg class="hook-up" viewBox="0 0 100 100">
          <path d="M20,58 L20,0 L0,0 L0,68 L0,78 L78,78 L78,58 L20,58 Z" id="Combined-Shape" transform="translate(39.000000, 39.000000) rotate(180.000000) translate(-39.000000, -39.000000) "></path>
      </svg>

      
<h2 class="apply__form__title">Lcie intake formulier</h2>
  <?php $query = new WP_Query(array('page_id' => 80)); ?>
  <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

      <?php the_content(); ?>



  <?php endwhile; endif; ?>

</section>



<?php get_footer(); ?>
