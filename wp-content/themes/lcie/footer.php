		<footer class="footer">
			<div class="wrapper">
				<div class="grid footer__grid">
					<div class="footer__grid__col">
						<span class="footer__grid__col__title"><?php pll_e( "Links" ); ?></span>
						<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
					</div>
					<div class="footer__grid__col">
						<span class="footer__grid__col__title"><?php pll_e( "Veelgestelde vragen" ); ?></span>
						<ul>

							<?php $query = new WP_Query(array('post_type' => "faq", "show_posts" => 3)); ?>
							<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
									<li><a href="<?php echo pll_home_url(pll_current_language()); ?>/faq"><?php the_title(); ?></a></li>
							<?php endwhile; endif; ?>
						</ul>
					</div>
					<div class="footer__grid__col footer__grid__col--big">
						<a href="#" class="button button--ghost"><?php pll_e( "naar boven" ); ?></a>
					</div>
				</div>
				<div class="grid footer__bottom">
					<div class="footer__bottom__content">
						<span>&copy; Lcie <?php echo date("Y"); ?> | webdesign <a href="http://designosource.be">Designosource</a></span>
					</div>
				</div>
			</div>
		</footer>
		
		</script><script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.0/slick.min.js"></script>
		
		<script src="<?php echo get_template_directory_uri(); ?>/dist/js/script.min.js"></script>
		<?php wp_footer(); ?>
	</body>
</html>
