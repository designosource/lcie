<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/fa.min.css">

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title><?php the_title(); ?> | Lcie</title>
	
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
                        <li><a href="<?php echo site_url(); ?>/search"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        <!--<li><i class="fa fa-facebook" aria-hidden="true"></i></li>
                        <li><i class="fa fa-twitter" aria-hidden="true"></i></li>-->
                        <li>EN</li>
                        <!--<ul class="header__subnavigation__languages">
                            <li>NL</li>
                            <li>EN</li>
                        </ul>-->

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