<?php
	// Template name: Aanbod
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
		<h1>Doelstellingen</h1>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<?php the_content(); ?>

		<?php endwhile; endif; ?>

	</div>

</section>

<section class="offer__content">
	
	<div class="wrapper">
		<h1>Waarden</h1>



	    <div class="wrapper offer__content__inner">
	    			<svg class="hook-under" viewBox="0 0 100 100"> 
	        <path d="M20,58 L20,0 L0,0 L0,68 L0,78 L78,78 L78,58 L20,58 Z" id="Combined-Shape"></path>
	    </svg>

		<svg class="hook-up" viewBox="0 0 100 100">
	        <path d="M20,58 L20,0 L0,0 L0,68 L0,78 L78,78 L78,58 L20,58 Z" id="Combined-Shape" transform="translate(39.000000, 39.000000) rotate(180.000000) translate(-39.000000, -39.000000) "></path>
	    </svg>
	    
		    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
				<?php the_field("values"); ?>

			<?php endwhile; endif; ?>
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