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

				<?php the_content(); ?>
                <a href="javascript:history.back()" class="button button_back">Terug</a>
			</div>

		</section>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
