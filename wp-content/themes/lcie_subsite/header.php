<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/css/style.min.css">	
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
	
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<?php if(is_archive()): ?>
			<title>FAQ | Lcie</title>
		<?php else: ?>
			<title><?php the_title(); ?> | <?php echo get_bloginfo("name"); ?></title>
		<?php endif; ?>
		

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php $url = site_url(); ?>
		<?php switch_to_blog(1); ?>
		<header class="header">
			
			<nav class="header__subnavigation">
				<div class="wrapper">
					<ul>
						<?php wp_nav_menu( array( 'theme_location' => 'sub-menu' ) ); ?>

                        <?php  $languages = pll_the_languages(array('raw'=>1)); ?>
                        <ul class="header__subnavigation__icons">
                            <?php
                            foreach ($languages as $value):
                                if(!$value["current_lang"]):
                                    ?>

                                    <li><a href="<?php echo $url; ?>/<?php echo $value["slug"]; ?>"><?php echo $value["slug"]; ?></a></li>

                                    <?php
                                endif; endforeach;
                            ?>
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
		</header>
		<?php restore_current_blog(); ?>
