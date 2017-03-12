<?php
	// Template name: Homepage
?>

<?php get_header(); ?>
<section class="home__top" style="background-color: <?php echo get_option('header_logo'); ?>"> 
	<div class="wrapper">
		<?php echo get_bloginfo( 'name' ); ?>
	</div>
</section>
<section class="container home__container">
	<?php get_sidebar(); ?>

	<div class="content">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>

	<?php endwhile; endif; ?>
		
		<div class="home__content__intrested">
			<span style="font-family: 'Roboto', sans-serif;">Intresse in een samenwerking</span>
			<a href="" class="home__content__intrested__button">Contacteer ons</a>
		</div>
		
	</div>
</section>
<section class="home__testmonials">
	
	<div class="wrapper">

		<h1>Ervaringen</h1>
		
		<!-- Slider main container -->
		<div class="home__testmonials__slider swiper-container">


			<svg class="home__testmonials__slider__hook-under hook-under" viewBox="0 0 100 100">
		        <path d="M20,58 L20,0 L0,0 L0,68 L0,78 L78,78 L78,58 L20,58 Z" id="Combined-Shape"></path>
		    </svg>

			<svg class="home__testmonials__slider__hook-up hook-up" viewBox="0 0 100 100">
		        <path d="M20,58 L20,0 L0,0 L0,68 L0,78 L78,78 L78,58 L20,58 Z" id="Combined-Shape" transform="translate(39.000000, 39.000000) rotate(180.000000) translate(-39.000000, -39.000000) "></path>
		    </svg>

		    <div class="swiper-wrapper">

		        <?php if( have_rows('testmonials') ): ?>
				<?php while ( have_rows('testmonials') ): the_row(); ?>	
					<div class="swiper-slide home__testmonials__slider__slide">
			        	<div>
			        		<span class="home__testmonials__slider__slide__title"><?php the_sub_field("name"); ?></span>
			        		<span class="home__testmonials__slider__slide__function"><?php the_sub_field("function"); ?></span>
			        		<div class="home__testmonials__slider__slide__text"><?php the_sub_field("text"); ?></div>
			        	</div>
			        </div>
				<?php endwhile; endif;?>
		    </div>
		
		    <div class="swiper-pagination"></div>
		    
		</div>


	</div>

</section>

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

<section class="home__lcie">
	
	<div class="wrapper">
		
		<h1>Inbedding</h1>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
			<?php the_field("lcie_text"); ?>

		<?php endwhile; endif; ?>

	</div>

</section>

<section class="home__partners">
	
	<div class="wrapper">
		
		<h1>Partners</h1>

		<div class="grid home__partners__grid">

			<?php if( have_rows('partners') ): ?>
			<?php while ( have_rows('partners') ): the_row(); ?>	
				<div style="background-image: url(<?php the_sub_field("logo"); ?>)" class="col home__partners__grid__col"></div>
			<?php endwhile; endif;?>

		</div>

	</div>

</section>

<style>

	h1
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

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
<script>        
  var mySwiper = new Swiper ('.swiper-container', {
    direction: 'horizontal',
    loop: true,
    pagination: '.swiper-pagination',
   	autoplay: 5000,
   	paginationClickable: true
  })        
</script>


<?php get_footer(); ?>