<?php
// Template name: Contact-Page
?>


<?php get_header(); ?>

<section class="home__hero">
  <div class="home__hero__overlay"></div>
  <div class="wrapper">
    <div class="home__hero__content">
      <h1 class="home__hero__title">Contact</h1>
      <p class="home__hero__text">De leden van het LCIE Core Team staan klaar om
        je te helpen met al je vragen gerelateerd aan entrepreneurship of met
        de start van je entrepreneursproject.</p>
    </div>
  </div>
</section>

<section class="contact__form">

  <?php $query = new WP_Query(array('page_id' => 74)); ?>
  <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

      <?php the_content(); ?>



  <?php endwhile; endif; ?>
</section>

<section class="contact__location">
  <div class="contact__location__item">
    <h2 class="contact__location__title">LCIE Hoofdkwartier</h2>
    <p class="contact__location__adress">Waaistraat 6</p>
    <p class="contact__location__adress">3000 Leuven</p>
    <a href="#" class="contact__location__mail">info@lcie.be</a>
  </div>

  <div class="contact__location__item">
    <h2 class="contact__location__title">LCIE Incubator</h2>
    <p class="contact__location__adress">Innovation & Incubation Center</p>
    <p class="contact__location__adress">Kapeldreef 60</p>
    <p class="contact__location__adress">3000 Leuven</p>
  </div>
</section>

<section class="contact__team">
  <div class="contact__team__item">
    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg" alt="" class="contact__team__img">
    <h3 class="contact__team__name">Wim Fyen</h3>
    <p class="contact__team__title">Incubator Manager</p>
    <a href="#" class="contact__team__mail">wim.fyen@lcie.be</a>
  </div>

  <div class="contact__team__item">
    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg" alt="" class="contact__team__img">
    <h3 class="contact__team__name">Wim Fyen</h3>
    <p class="contact__team__title">Incubator Manager</p>
    <a href="#" class="contact__team__mail">wim.fyen@lcie.be</a>
  </div>

  <div class="contact__team__item">
    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg" alt="" class="contact__team__img">
    <h3 class="contact__team__name">Wim Fyen</h3>
    <p class="contact__team__title">Incubator Manager</p>
    <a href="#" class="contact__team__mail">wim.fyen@lcie.be</a>
  </div>
</section>

<?php get_footer(); ?>
