<?php get_header(); ?>
<div class="home__top" style="background-color: <?php echo get_option('header_logo'); ?>"> 
	<div class="wrapper">
		<?php echo get_bloginfo( 'name' ); ?>
	</div>
</div>
<div class="container">
	<?php get_sidebar(); ?>

	<div class="content">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam ducimus, tempore fuga impedit molestiae in ipsam recusandae quaerat quibusdam asperiores expedita laborum autem velit fugit dolor numquam eligendi eius officia.</p>
		
		<div class="home__content__intrested">
			<p>Intresse in een samenwerking</p>
		</div>
		
	</div>
</div>
<div class="home__testmonials">
	
	Test

</div>



<?php get_footer(); ?>