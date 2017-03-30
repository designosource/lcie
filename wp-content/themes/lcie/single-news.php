<?php get_header(); ?>

	 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( '/template-parts/page', 'header' ); ?>

		<section class="page__content">

			<div class="wrapper">

				<?php the_content(); ?>
                <a href="javascript:history.back()" class="button button_back">Terug</a>
			</div>

		</section>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
