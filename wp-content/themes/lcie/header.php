<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<header class="header">
			
			<nav class="header__subnavigation">
				<div class="wrapper">
					<ul>
						<li>Nieuws &amp; events</li>
						<li>Contact</li>
						<li>Over</li>
						<li>Documentatie</li>
						<li>NL / EN</li>
					</ul>
				</div>
			</nav>

			<div class="wrapper">

				<div class="header__logo"></div>

				<nav class="header__navigation">
					<ul>
						<li>Aanbod</li>
						<li>Opleidingen</li>
						<li>Teams</li>
						<li class="header__navigation__apply-container"><a href="" class="button header__navigation__apply">Apply</a></li>
					</ul>
				</nav>
			</div>
		</header>