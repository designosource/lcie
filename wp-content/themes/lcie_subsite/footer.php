		<?php switch_to_blog(1); ?>

		<footer class="footer">
			<div class="wrapper">
				<div class="grid footer__grid">
					<div class="footer__grid__col">
						<span class="footer__grid__col__title">Links</span>
						

						<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>

						
					</div>
					<div class="footer__grid__col footer__grid__col--faq">
						<span class="footer__grid__col__title">Frequently asked questions</span>
						<ul>
							<?php $query = new WP_Query(array('post_type' => "faq", "show_posts" => 3)); ?>
							<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
									<li><a href="<?php echo site_url(); ?>/faq"><?php the_title(); ?></a></li>
							<?php endwhile; endif; ?>
						</ul>
					</div>
					<div class="footer__grid__col footer__grid__col--big">
						<a href="" class="button button--ghost footer__up">naar boven</a>
					</div>
				</div>
				<div class="grid footer__bottom">
					<div class="footer__bottom__content">
						<span>&copy; Lcie <?php echo date("Y"); ?> | webdesign Designosource | Disclaimer | Sitemap</span>
					</div>
					<img src="<?php echo get_template_directory_uri(); ?>/images/kuleuven.png" alt="" class="footer__bottom__kuleuven">
				</div>
			</div>
		</footer>

		<?php restore_current_blog(); ?>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/navigation.js"></script>

		<style>
			
			.hook-up path
			{
				fill: <?php echo get_option('header_logo'); ?>;
			}

			.hook-under path
			{
				fill: <?php echo get_option('header_logo'); ?>;
			}

			.sidebar ul li.current_page_item a
			{
				color: <?php echo get_option('header_logo'); ?>;
			}

			.button:not(.header__navigation__apply):not(.footer__up)
			{
				background-color: <?php echo get_option('header_logo'); ?>;
			}

		</style>
		<?php wp_footer(); ?>
	</body>
</html>