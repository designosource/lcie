<?php get_header(); ?>

	 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<section class="page__top" style="background-image: url(<?php the_field("header_image"); ?>);"> 
			<div class="wrapper">
				<h1 class="page__top__title"><?php the_title(); ?></h1>
			</div>
			<div class="page__top__overlay"></div>
		</section>

		<section class="content">
			
			<div class="wrapper">

				<?php the_content(); ?>

			</div>

		</section>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>