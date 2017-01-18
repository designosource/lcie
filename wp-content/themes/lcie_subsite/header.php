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
			
			<nav class="header__subnavigation">
				<div class="wrapper">
					<ul>
						<li>Over Lcie</li>
						<li>Nieuws &amp; events</li>
						<li>Contact</li>
						<li>Wedstrijden</li>
						<li>Documentatie</li>
						<ul class="header__subnavigation__languages">
							<li>NL</li>
							<li>EN</li>
						</ul>
						
					</ul>
				</div>
			</nav>

			<div class="wrapper">

				<div class="header__logo"></div>

				<nav class="header__navigation">
					<ul>
						<li>Home</li>
						<li>Aanbod</li>
						<li>Cursussen</li>
						<li>Teams</li>
						<li class="header__navigation__apply-container"><a href="" class="button header__navigation__apply">Sluit je aan</a></li>
					</ul>
				</nav>
			</div>
		</header>