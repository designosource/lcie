<?php
	// Template name: Aanbod
?>


<?php get_header(); ?>


	<section class="page__top"> 
		<div class="wrapper">
			<h1 class="page__top__title">Aanbod</h1>
			<h2 class="page__top__subtitle">bekijk hieronder ons aanbod</h2>
		</div>
	</section>

	<section class="offerings__container">
		<div class="wrapper">
			<nav class="offerings__sidebar">
		
				<ul>
					<li class="offerings__sidebar__active">Lcie voor</li>
					<li><a href="#subsites">Subsites</a></li>
					<li><a href="#team">Core team</a></li>
					<li><a href="#infrastructure">Infrastructuur</a></li>
				</ul>

			</nav>

			<div class="offerings__content">
				<h1>Lcie voor</h1>
				
				<?php while ( have_posts() ) : the_post(); ?> 
                
                <?php the_content(); ?>

                <?php endwhile; ?>
			</div>
		</div>

	</section>

	<section class="offerings__who" id="who">
		
		<div class="wrapper">
			
			<div class="grid offerings__who__grid">
				
				<div class="offerings__who__grid__col">Studenten</div>
				<div class="offerings__who__grid__col">Docenten</div>
				<div class="offerings__who__grid__col">Onderzoekers</div>
				<div class="offerings__who__grid__col">Ondernemers</div>

			</div>

		</div>

	</section>

	<section class="offerings__subsites" id="subsites">
		<div class="wrapper">
			<h1>Subsites</h1>
			<div class="grid offerings__subsites__grid">
				
					<?php foreach(get_sites(array("offset" => 1)) as $site): ?>

					<?php switch_to_blog($site->blog_id); ?>

					<div class="offerings__subsites__grid__col" style="background-image: url(<?php echo get_option("background_picture"); ?>)">
						
						<span class="offerings__subsites__grid__col__title"><?php echo $site->blogname; ?></span>
						<a href="<?php echo get_site_url($site->blog_id); ?>" class="offerings__subsites__grid__col__more">lees meer</a>
						<div class="offerings__subsites__grid__col__overlay" style="background-color: <?php echo get_option('header_logo'); ?>"></div>
					</div>
							
				<?php restore_current_blog(); endforeach; ?>
			</div>
		</div>
	</section>

	<section class="offerings__team" id="team">
		<div class="wrapper">
		
			<h1>Core team</h1>
			
			<div class="offerings__team__text">
				<?php the_field("team_text"); ?>
			</div>

			<div class="offerings__team__grid grid">
				<?php if( have_rows('team') ): while ( have_rows('team') ) : the_row();?>

					<div class="offerings__team__grid__col">
						<div class="grid">
							<div class="offerings__team__grid__col__photo" style="background-image: url(<?php the_sub_field("photo"); ?>)"></div>
							<div class="offerings__team__grid__col__details">
								<span class="offerings__team__grid__col__details__name"><?php the_sub_field("name"); ?></span>
								<span class="offerings__team__grid__col__details__function"><?php the_sub_field("function"); ?></span>
								
								<div class="offerings__team__grid__col__details__contact">
									<a href="mailto:<?php the_sub_field("email"); ?>" class="offerings__team__grid__col__details__contact__mail"><?php the_sub_field("email"); ?></a>
									<div class="offerings__team__grid__col__details__contact__social">

										<?php if(!empty(get_sub_field("twitter"))): ?>
											<a href="<?php the_sub_field("twitter"); ?>" class="offerings__team__grid__col__details__contact__social__icon offerings__team__grid__col__details__contact__social__icon--twitter"></a>
										<?php endif; ?>
										<?php if(!empty(get_sub_field("linkedin"))): ?>
											<a href="<?php the_sub_field("linkedin"); ?>" class="offerings__team__grid__col__details__contact__social__icon offerings__team__grid__col__details__contact__social__icon--linkedin"></a>
										<?php endif; ?>
									</div>
								</div>
								

							</div>
						</div>
					</div>

				<?php endwhile; endif; ?>
			</div>

		</div>
	</section>

	<section class="offerings__infrastructure" id="infrastructure">
		<div class="wrapper">
			
			<h1>Infrastructuur</h1>

			<div class="offerings__infrastructure__text">

				<?php the_field("infrastructure_text"); ?>
				
			</div>
		</div>

	<div id="map" class="offerings__infrastructure__map acf-map">
	<?php if( have_rows('infrastructure') ): while ( have_rows('infrastructure') ) : the_row(); $location = get_sub_field('place');?>


		<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>



	<?php endwhile; endif; ?>


	</div>

		<div class="wrapper">
			<div class="grid offerings__infrastructure__grid">
				<?php if( have_rows('infrastructure') ): while ( have_rows('infrastructure') ) : the_row(); $location = get_sub_field('place');?>
		
				<div class="offerings__infrastructure__grid__col">
					
					<svg class="offerings__infrastructure__grid__col__hook-under hook-under" viewBox="0 0 100 100"> 
				        <path d="M20,58 L20,0 L0,0 L0,68 L0,78 L78,78 L78,58 L20,58 Z" id="Combined-Shape"></path>
				    </svg>

					<svg class="offerings__infrastructure__grid__col__hook-up hook-up" viewBox="0 0 100 100">
				        <path d="M20,58 L20,0 L0,0 L0,68 L0,78 L78,78 L78,58 L20,58 Z" id="Combined-Shape" transform="translate(39.000000, 39.000000) rotate(180.000000) translate(-39.000000, -39.000000) "></path>
				    </svg>

					<h2 class="offerings__infrastructure__grid__col__title"><?php the_sub_field("name"); ?></h2>
					<p class="offerings__infrastructure__grid__col__description"><?php the_sub_field("description"); ?></p>

					<a href="<?php echo site_url(); ?>/contact" class="offerings__infrastructure__grid__col__plan">Reserveren</a>

				</div>


				<?php endwhile; endif; ?>
			</div>
		</div>
	</section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB63fCe88g51K6K3DUht0ksGtCetjS_WCI&callback=initMap"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/offerings.js"></script>


<?php get_footer(); ?>