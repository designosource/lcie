<?php
// Template name: Partners-Page
?>

<?php get_header(); ?>

<section class="home__top" style="background-color: <?php echo get_option('header_logo'); ?>">
	<div class="wrapper">
		<?php echo get_bloginfo( 'name' ); ?>
	</div>
</section>

<section class="container">
	
	<?php get_sidebar(); ?>

	<div class="content">

		<section class="page__content">

			<div class="wrapper">
				<h1><?php echo get_the_title(); ?></h1>
			</div>

			<div class="wrapper">
				<?php the_content(); ?>

				<?php if( have_rows('poweredby') ): ?>
					<h2><?php pll_e("Powered by"); ?></h2>
					<section class="grid partners__grid">
						<?php while ( have_rows('poweredby') ) : the_row(); ?>

							<?php $url = get_sub_field("url"); ?>
							<?php if(!empty($url)): ?>
								<a href="<?php echo $url; ?>" alt="" class="partners__grid__item"><img src="<?php the_sub_field('image'); ?>"></a>
							<?php else: ?>
								<div class="partners__grid__item"><img src="<?php the_sub_field('image'); ?>"></div>
							<?php endif; ?>

						<?php endwhile; ?>
					</section>
				<?php endif; ?>

				<?php if( have_rows('partnership') ): ?>

					<h2><?php pll_e("In partnership with"); ?></h2>
					<section class="grid partners__grid">
						<?php while ( have_rows('partnership') ) : the_row(); ?>

							<?php $url = get_sub_field("url"); ?>
							<?php if(!empty($url)): ?>
								<a href="<?php echo $url; ?>" alt="" class="partners__grid__item"><img src="<?php the_sub_field('image'); ?>"></a>
							<?php else: ?>
								<div class="partners__grid__item"><img src="<?php the_sub_field('image'); ?>"></div>
							<?php endif; ?>

						<?php endwhile; ?>
					</section>
				<?php endif; ?>

				<?php if( have_rows('sponsored') ): ?>

					<h2><?php pll_e("Sponsored by"); ?></h2>
					<section class="grid partners__grid">
						<?php while ( have_rows('sponsored') ) : the_row(); ?>

							<?php $url = get_sub_field("url"); ?>
							<?php if(!empty($url)): ?>
								<a href="<?php echo $url; ?>" alt="" class="partners__grid__item"><img src="<?php the_sub_field('image'); ?>"></a>
							<?php else: ?>
								<div class="partners__grid__item"><img src="<?php the_sub_field('image'); ?>"></div>
							<?php endif; ?>

						<?php endwhile; ?>
					</section>
				<?php endif; ?>

			</div>
		</section>

	</div>
</section>

<style>

	h1, h2
	{
		color: <?php echo get_option('header_logo'); ?> !important;
	}

	.swiper-pagination-bullet-active
	{
		background-color: <?php echo get_option('header_logo'); ?> !important;
	}

	.swiper-pagination-bullet
	{
		border-color: <?php echo get_option('header_logo'); ?> !important;
	}

	.home__testmonials__slider__hook-up path
	{
		fill: <?php echo get_option('header_logo'); ?>;
	}

	.home__testmonials__slider__hook-under path
	{
		fill: <?php echo get_option('header_logo'); ?>;
	}

	.sidebar ul li a:hover
	{
		color: <?php echo get_option('header_logo'); ?>;
	}

	.home__content__intrested__button
	{
		background-color: <?php echo get_option('header_logo'); ?>;
	}

	.who__content__grid__col__photo
	{
		border-color: <?php echo get_option('header_logo'); ?>;
	}

</style>

<?php get_footer(); ?>