<?php
	// Template name: Homepage
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
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>

	<?php endwhile; endif; ?>
		
		<div class="home__content__intrested">
			<span style="font-family: 'Roboto', sans-serif;"><?php pll_e("Interesse in een samenwerking? "); ?></span>
			<a href="<?php pll_e("/nl/contact"); ?>" class="home__content__intrested__button"><?php pll_e("Contacteer ons"); ?></a>
		</div>v
		
	</div>
</section>
	<?php if( have_rows('content-blocks') ): while ( have_rows('content-blocks') ) : the_row(); ?>
			<section class="home__content-block">
				<div class="wrapper">
					<h1><?php the_sub_field("title"); ?></h1>
					<?php the_sub_field("content"); ?>
				</div>
			</section>
		<?php endwhile; endif; ?>

	<?php if( have_rows('testmonials') ): ?>	
<section class="home__testmonials">
	
	<div class="wrapper">

		<h1><?php pll_e("Ervaringen"); ?></h1>
		
		<!-- Slider main container -->
			<svg class="home__testmonials__slider__hook-under hook-under" viewBox="0 0 100 100">
		        <path d="M20,58 L20,0 L0,0 L0,68 L0,78 L78,78 L78,58 L20,58 Z" id="Combined-Shape"></path>
		    </svg>

			<svg class="home__testmonials__slider__hook-up hook-up" viewBox="0 0 100 100">
		        <path d="M20,58 L20,0 L0,0 L0,68 L0,78 L78,78 L78,58 L20,58 Z" id="Combined-Shape" transform="translate(39.000000, 39.000000) rotate(180.000000) translate(-39.000000, -39.000000) "></path>
		    </svg>
		<div class="home__testmonials__slider swiper-container">

		    <div class="slider">

		        
				<?php while ( have_rows('testmonials') ): the_row(); ?>	
					<div class="swiper-slide home__testmonials__slider__slide">
			        	<div>
			        		<span class="home__testmonials__slider__slide__title"><?php the_sub_field("name"); ?></span>
			        		<span class="home__testmonials__slider__slide__function"><?php the_sub_field("function"); ?></span>
			        		<div class="home__testmonials__slider__slide__text"><?php the_sub_field("text"); ?></div>
			        	</div>
			        </div>
				<?php endwhile; ?>
		    </div>
		
		    <div class="swiper-pagination"></div>
		    
		</div>


	</div>

</section>
<?php endif; ?>
<section class="home__facts">
	<div class="home__facts__container" style="background-color: <?php echo get_option('header_logo'); ?>">
		<div class="wrapper">
			<div class="grid home__facts__grid">
				<?php if( have_rows('numbers') ): ?>
				<?php while ( have_rows('numbers') ): the_row(); ?>	
					<div class="home__facts__col">
						<span class="home__facts__col__number"><?php the_sub_field("number"); ?></span>
						<span class="home__facts__col__description"><?php the_sub_field("description"); ?></span>
					</div>
				<?php endwhile; endif;?>
			</div>
		</div>
	</div>
</section>
<?php $text = get_field("lcie_text"); ?>
<?php if(!empty($text)): ?>
<section class="home__lcie">
	
	<div class="wrapper">
		
		<h1><?php pll_e("Inbedding"); ?></h1>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
			<?php the_field("lcie_text"); ?>

		<?php endwhile; endif; ?>

	</div>

</section>
<?php endif; ?>

<style>

	h1
	{
		color: <?php echo get_option('header_logo'); ?> !important;
	}
	
	.slick-active button
	{
		background-color: <?php echo get_option('header_logo'); ?> !important;
	}

	.slick-dots li button
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

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script>        
	$('.slider').slick({
	  dots: true,
	  arrows: false,
	  infinite: true,
	  speed: 300
	});
</script>


<?php get_footer(); ?>