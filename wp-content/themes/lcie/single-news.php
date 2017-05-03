<?php get_header(); ?>

	 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php $image = get_field("image"); ?>
		<?php if(!empty($image)): ?>
			<section class="page__top" style="background-image: url(<?php the_field("image"); ?>);">
		<?php else: ?>
			<section class="page__top">
		<?php endif; ?>
			<div class="wrapper">
				<h1 class="page__top__title"><?php the_title(); ?></h1>
			</div>
			<div class="page__top__overlay"></div>
		</section>
		
		<section class="page__content">

			<div class="wrapper">
				<a href="<?php pll_e("/nl/nieuws-events/"); ?>" class="back"><?php pll_e("Terug naar overzicht"); ?></a>
				<div class="content">
					<?php the_content(); ?>
				</div>
                <a href="<?php pll_e("/nl/nieuws-events/"); ?>" class="back"><?php pll_e("Terug naar overzicht"); ?></a>
			</div>

		</section>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
