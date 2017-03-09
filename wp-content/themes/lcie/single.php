<?php get_header(); ?>

	 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( '/template-parts/page', 'header' ); ?>

		<section class="page__content">
			
			<div class="wrapper">

				<?php the_content(); ?>

			</div>

		</section>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>