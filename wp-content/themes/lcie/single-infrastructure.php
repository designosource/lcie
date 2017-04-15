<?php get_header(); ?>

	 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php $location = get_field("place"); ?>	

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
                
			</div>

		</section>

		<section class="infrastructure__contact">

			<div id="map" class="acf-map">
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
			</div>

			<div class="infrastructure__contact__block">
				<h2><?php the_title(); ?></h2>
				<p><?php echo $location["address"]; ?></p>
			</div>

		</section>

	<?php endwhile; endif; ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB63fCe88g51K6K3DUht0ksGtCetjS_WCI"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/infrastructure.js"></script>

<?php get_footer(); ?>
