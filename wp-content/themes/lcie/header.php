<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
		<?php if(is_archive()): ?>
			<title>FAQ | Lcie</title>
		<?php else: ?>
			<title><?php the_title(); ?> | Lcie</title>
		<?php endif; ?>
		
	
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

				<a href="http://lcie.be"><div class="header__logo"></div></a>
				<div class="header__hamburger"></div>
				<nav class="header__navigation">
					<ul>
						<li><a href="<?php echo site_url(); ?>">Home</a></li>
						<li><a href="<?php echo site_url(); ?>/aanbod">Aanbod</a></li>
						<li>Cursussen</li>
						<li><a href="<?php echo site_url(); ?>/teams">Teams</a></li>
						<li class="header__navigation__apply-container"><a href="" class="button header__navigation__apply">Sluit je aan</a></li>
					</ul>
				</nav>
			</div>
		</header>