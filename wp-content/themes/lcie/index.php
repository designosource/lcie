<?php get_header(); ?>

	<section class="home__hero">
		<div class="home__hero__overlay"></div>
		<div class="wrapper">
			<div class="home__hero__content">
				<h1 class="home__hero__title">De Leuven Community for Innovation driven Entrepreneurship wil de drempel om te ondernemen drastisch verlagen en de ondernemingszin van studenten, onderzoekers en professoren aanmoedigen.</h1>
				<span class="home__hero__subtitle">Word lid van de LCIE Community</span>
				<a href="" class="button button--light">Apply</a>
			</div>
		</div>
	</section>

	<section class="home__teams">
		<div class="wrapper">
			<h1>Teams</h1>
		</div>
		<div class="grid home__teams__grid">
			<?php $query = new WP_Query(array('post_type' => "team")); ?>
			<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
				<div class="home__teams__grid__col" style="background-image: url(<?php the_field("image"); ?>);">
					<div class="home__teams__grid__col__overlay" style="background-color: <?php the_field("color"); ?>"></div>
					<h2 class="home__teams__grid__col__title"><?php the_title(); ?></h2>
					<span class="home__teams__grid__col__readmore">lees meer</span>
				</div>
			<?php endwhile; endif; ?>
		</div>
	</section>

	<section class="home__facts">
		<div class="wrapper">
			<div class="grid">
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
		</div>
	</section>

	<section class="home__divisions">
		<div class="wrapper">
			<h1>Subdivies</h1>
		</div>
	
		<div class="grid home__divisions__grid">
			<div class="home__divisions__grid__col">
				<h2 class="home__divisions__grid__col__title">Turbulent</h2>
				<span class="home__divisions__grid__col__readmore">lees meer</span>
			</div>
			<div class="home__divisions__grid__col">
				<h2 class="home__divisions__grid__col__title">Turbulent</h2>
				<span class="home__divisions__grid__col__readmore">lees meer</span>
			</div>
			<div class="home__divisions__grid__col">
				<h2 class="home__divisions__grid__col__title">Turbulent</h2>
				<span class="home__divisions__grid__col__readmore">lees meer</span>
			</div>
		</div>
	</section>

	<?php

		foreach(get_sites() as $site){
			echo 'You are viewing ' . $site->blogname . '<br>';
			echo '<b>COLOR</b> ' . get_blog_option($site->blog_id , 'opties_color') . '<br>';		
		}
		
	?>

<?php get_footer(); ?>