<?php
// Template name: Documentation-Page
?>


<?php get_header(); ?>

<section class="home__hero">
  <div class="home__hero__overlay"></div>
  <div class="wrapper">
    <div class="home__hero__content">
      <h1 class="home__hero__title">Documentatie</h1>
      <p class="home__hero__text">Hier kan je heel wat nuttige documentatie over ondernemen raadplegen.</p>
    </div>
  </div>
</section>

<div class="documentation__nav">
  <a href="#" class="documentation__nav__item documentation__nav__item__active">Case Studies</a>
  <a href="#" class="documentation__nav__item">Video's</a>
  <a href="#" class="documentation__nav__item">Presentaties</a>
  <a href="#" class="documentation__nav__item">Templates</a>
</div>

<div class="documentation__article__grid">

        <?php $query = new WP_Query(array('post_type' => "documentatie")); ?>
        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
         
          <div class="documentation__article__item">
            <h2><?php the_title(); ?></h2>
            <p><?php the_content(); ?></p>
            <a href="<?php the_field("file"); ?>">Download</a>
          </div>
            
        <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
