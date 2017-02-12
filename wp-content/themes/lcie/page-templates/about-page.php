<?php
// Template name: About-Page
?>


<?php get_header(); ?>

<section class="page__top">
	<div class="wrapper">
		<h1 class="page__top__title">Over Lcie</h1>
		<h2 class="page__top__subtitle">De Leuven Community for Innovation driven Entrepreneurship wil ondernemerschap bevorderen en aanmoedigen onder studenten, onderzoekers, docenten en professoren.</h2>
	</div>
</section>

<section class="about__pagecontent">
		<div class="wrapper">
		    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            the_content();
            endwhile; ?>
            <?php endif; ?>
		</div>
	</section>


<?php get_footer(); ?>
