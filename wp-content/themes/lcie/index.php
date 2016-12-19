<?php get_header(); ?>

	<section class="home__hero">
		<div class="home__hero__overlay"></div>
		<div class="wrapper">
			<div class="home__hero__content">
				<h1 class="home__hero__title">Lcie</h1>
				<p class="home__hero__text">De Leuven Community for Innovation driven Entrepreneurship wil de drempel om te ondernemen drastisch verlagen en de ondernemingszin van studenten, onderzoekers en professoren aanmoedigen.</p>
				<a href="" class="button button--ghost">Bekijk het aanbod</a>
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
			<a href="" class="button home__teams__all">Bekijk alle teams</a>
		</div>
		<div class="grid home__teams__grid">
			<?php $query = new WP_Query(array('post_type' => "team")); ?>
			<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
				<div class="home__teams__grid__col" style="background-image: url(<?php the_field("image"); ?>);">
					<div class="home__teams__grid__col__overlay" style="background-color: <?php the_field("color"); ?>"></div>
					<h2 class="home__teams__grid__col__text"><?php the_content(); ?></h2>
					<span class="home__teams__grid__col__readmore">lees meer</span>
				</div>
			<?php endwhile; endif; ?>
		</div>
	</section>

	<section class="home__divisions">
		<div class="wrapper">
			<h1>Subdivies</h1>
			<a href="" class="button home__calendar__all">Bekijk alle divisies</a>
		</div>
	
		<div class="grid home__divisions__grid">
			
			<?php foreach(get_sites(array("offset" => 1)) as $site): ?>
					
				<div class="home__divisions__grid__col">
					<h2 class="home__divisions__grid__col__title"><?php echo $site->blogname; ?></h2>
					<span class="home__divisions__grid__col__readmore">lees meer</span>
				</div>
						
			<?php endforeach; ?>

		</div>
	</section>

	<section class="home__facts">
		<div class="wrapper">
			<h1>Lcie in cijfers</h1>
		</div>
		<div class="grid home__facts__grid">
			<div class="home__facts__col">
				<span class="home__facts__col__number">12</span>
				<span class="home__facts__col__description">bananas</span>
			</div>
			<div class="home__facts__col">
				<span class="home__facts__col__number">12</span>
				<span class="home__facts__col__description">bananas</span>
			</div>
			<div class="home__facts__col">
				<span class="home__facts__col__number">12</span>
				<span class="home__facts__col__description">bananas</span>
			</div>
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