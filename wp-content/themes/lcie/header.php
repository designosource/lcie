<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/fa.min.css">

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

						<?php wp_nav_menu( array( 'theme_location' => 'sub-menu' ) ); ?>
						<ul class="header__subnavigation__icons">
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
		</header>