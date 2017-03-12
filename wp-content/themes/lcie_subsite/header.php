<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.0/css/swiper.min.css">
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
		<?php switch_to_blog(1); ?>
		<header class="header">
		
			<nav class="header__subnavigation">
				<div class="wrapper">
					<ul>

						<?php wp_nav_menu( array( 'theme_location' => 'sub-menu' ) ); ?>
						<ul class="header__subnavigation__icons">
							<?php if(pll_current_language() == "nl"): ?>
								<li><a href="<?php echo site_url(); ?>/en/">EN</a></li>
							<?php else: ?>
								<li><a href="<?php echo site_url(); ?>/nl/">NL</a></li>
							<?php endif; ?>
						</ul>

					</ul>
				</div>
			</nav>

			<div class="wrapper">

				<a href="<?php echo site_url(); ?>"><div class="header__logo"></div></a>
				<div class="header__hamburger"></div>
				<nav class="header__navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
				</nav>
			</div>
			<?php restore_current_blog(); ?>
		</header>
