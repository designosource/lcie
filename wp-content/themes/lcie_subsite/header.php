<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<style>
			
	.home__testmonials__slider__hook-up path{
	    fill: red;
	}
		</style>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<header class="header">
			<?php switch_to_blog(1); ?>

			
			<nav class="header__subnavigation">
				<div class="wrapper">
					<ul>
						<?php wp_nav_menu( array( 'theme_location' => 'sub-menu' ) ); ?>

						<ul class="header__subnavigation__languages">
							<li>NL</li>
							<li>EN</li>
						</ul>
						
					</ul>
				</div>
			</nav>

			<div class="wrapper">

				<a href="http://lcie.be"><div class="header__logo"></div></a>
				<div class="header__hamburger"></div>
				<nav class="header__navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
				</nav>
			</div>


			<?php restore_current_blog(); ?>
		</header>