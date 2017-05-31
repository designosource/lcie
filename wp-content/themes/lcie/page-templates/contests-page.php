<?php
// Template name: Contests-Page
?>

<?php get_header(); ?>

<?php get_template_part( '/template-parts/page', 'header' ); ?>

<div class="content wrapper">

  <?php if(have_posts()): while(have_posts()): the_post(); ?>
    <p><?php the_content(); ?></p>
  <?php endwhile; endif; wp_reset_query();?>

  <h2><?php pll_e("Lopende wedstrijden"); ?></h2>
  <?php
    $args = array(
      'post_type'      => 'contests',
      'posts_per_page' => -1,
      'order'          => 'ASC',
      'orderby'        => 'date'
      );
    $query = new WP_Query($args);
  ?>

  <section class="grid contests__grid">
    <?php if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
      <article class="contests__grid__item">
        <img src="<?php the_field('image'); ?>" alt="" class="contests__item__img">
        <h3><?php the_title(); ?></h3>
        <div class="contests__grid__item__content">
          <div>
            <?php the_content(); ?>
            <?php $url = get_field("url"); ?>
      
            <?php if(!empty($url)): ?>
              <a class="button" target="blank" href="<?php the_field("url"); ?>"><?php pll_e("Meer info"); ?></a>
            <?php endif; ?>

          </div>
        </div>

        <a class="contests__grid__item__readmore"><?php pll_e("Lees meer"); ?></a>
        <a class="contests__grid__item__close"><?php pll_e("Sluit"); ?></a>
      </article>
    <?php endwhile; endif; wp_reset_query();?>
  </section>

</div>

<?php get_footer(); ?>