<?php
	// Template name: Homepage
?>


<?php get_header(); ?>
	<section class="home__hero">
		<div class="home__hero__overlay"></div>
		<div class="wrapper">
			<div class="home__hero__content">
				<h1 class="home__hero__title">Lcie</h1>
				<p class="home__hero__text">De Leuven Community for Innovation driven Entrepreneurship wil de drempel om te ondernemen drastisch verlagen en de ondernemingszin van studenten, onderzoekers en professoren aanmoedigen.</p>
				<a href="<?php echo site_url(); ?>/aanbod" class="button button--ghost">Bekijk het aanbod</a>
			</div>
		</div>
	</section>

	<section class="home__who">
		<div class="wrapper">
			<h1>Voor wie?</h1>
		</div>
		<div class="grid home__who__grid">
			<div class="home__who__grid__col">
				Lcie voor studenten
			</div>
			<div class="home__who__grid__col">
				Lcie voor docenten
			</div>
			<div class="home__who__grid__col">
				Lcie voor onderzoekers
			</div>
			<div class="home__who__grid__col">
				Lcie voor ondernemers
			</div>
		</div>
	</section>

	<section class="home__teams">
		<div class="wrapper">
			<h1>Teams</h1>
			<a href="<?php echo site_url(); ?>/teams" class="button home__teams__all">Bekijk alle teams</a>
		</div>
		<div class="grid home__teams__grid">
			<?php $query = new WP_Query(array('post_type' => "team")); ?>
			<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
				<?php if(get_field("featured")): ?>
					<a href="<?php the_permalink(); ?>" class="home__teams__grid__col" style="background-image: url(<?php the_field("image"); ?>);">
						<img src="<?php the_field("logo"); ?>" alt="" class="home__teams__grid__col__logo">
						<div class="home__teams__grid__col__overlay" style="background-color: <?php the_field("color"); ?>"></div>
						<h2 class="home__teams__grid__col__text"><?php the_content(); ?></h2>
						<span class="home__teams__grid__col__readmore">lees meer</span>
					</a>
				<?php endif; ?>
			<?php endwhile; endif; ?>
		</div>
		<div class="wrapper">

			<!-- Slider main container -->
			<div class="swiper-container home__teams__grid-small">
			    <div class="swiper-wrapper">

			        		<?php $query = new WP_Query(array('post_type' => "team")); ?>
							<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
								<?php if(!get_field("featured")): ?>
									<div class="swiper-slide home__teams__grid-small__slide">
										<img src="<?php the_field("logo"); ?>" alt="" class="home__teams__grid-small__logo">
									</div>
								<?php endif; ?>
							<?php endwhile; endif; ?>
			      
			    </div>

			    <div class="swiper-button-prev"></div>
			    <div class="swiper-button-next"></div>
			</div>
		</div>
	</section>

	<section class="home__divisions">
		<div class="wrapper">
			<h1>Subdivies</h1>
			<a href="" class="button home__calendar__all">Bekijk alle divisies</a>
		</div>
	
		<div class="grid home__divisions__grid">
			
			<?php foreach(get_sites(array("offset" => 1)) as $site): ?>

				<?php switch_to_blog($site->blog_id); ?>
				<div class="home__divisions__grid__col" style="background-image: url(<?php echo get_option("background_picture"); ?>)">
					<h2 class="home__divisions__grid__col__title"><?php echo $site->blogname; ?></h2>
					<span class="home__divisions__grid__col__description"><?php echo get_option("description"); ?></span>
					<a class="home__divisions__grid__col__readmore" href="<?php echo site_url(); ?>">lees meer</a>
					<div class="home__divisions__grid__col__overlay"></div>
				</div>
						
			<?php restore_current_blog(); endforeach; ?>

		</div>
	</section>

	<section class="home__facts">
		<div class="wrapper">
			<h1>Lcie in cijfers</h1>
		</div>
		<div class="grid home__facts__grid">
			<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>

				<?php if( have_rows('stats') ): while ( have_rows('stats') ) : the_row(); ?>
		     
			    <div class="home__facts__col">
					<span class="home__facts__col__number"><?php the_sub_field('number'); ?></span>
					<span class="home__facts__col__description"><?php the_sub_field('description'); ?></span>
				</div>

				<?php endwhile; endif; ?>
			<?php endwhile; endif; ?>

		</div>
	</section>



	<section class="home__calendar">
		<div class="wrapper">
			<h1>Kalender</h1>
			<a href="" class="button home__calendar__all">Bekijk alle aanstaande events</a>
		</div>
		<div class="grid">
			<div class="home__calendar__side">
				<div>
					<h2 class="home__calendar__side__title">Lcie events bijwonen?</h2>
					<p class="home__calendar__side__text">Lcie organiseert interessante events die je ondernemingszin aanwakkeren.</p>
					<a href="" class="home__calendar__side__more">Meer info</a>
				</div>
			</div>
			<div class="home__calendar__photo"></div>
		</div>
	</section>



<?php get_footer(); ?>