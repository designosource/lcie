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
									<li><a href="<?php echo site_url(); ?>/faq"><?php the_title(); ?></a></li>
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
                    <div class="footer__bottom__content footer__bottom__contentRight">
											<h4>Lcie Structural Partners</h4>
                        <a href="http://www.leuvenmindgate.be"><img
                                    src="<?php echo get_template_directory_uri(); ?>/images/logo-leuven-mindgate-klein.png"
                                    alt="Logo Leuven Mindgate" class="footer__bottom__kuleuven"></a>
                        <a href="http://www.vlaamsbrabant.be"><img
                                    src="<?php echo get_template_directory_uri(); ?>/images/logo-vlaams-brabant.png"
                                    alt="Logo Leuven Mindgate" class="footer__bottom__kuleuven"></a>
                        <a href="https://www.keuleuven.be"><img
                                    src="<?php echo get_template_directory_uri(); ?>/images/kuleuven.png"
                                    alt="Logo KULeuven" class="footer__bottom__kuleuven"></a>
                    </div>

				</div>
			</div>
		</footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

		<?php if ( is_page_template('page-templates/home-page.php') ): ?>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.0/css/swiper.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.0/js/swiper.min.js"></script>

		  <script>
		  var mySwiper = new Swiper ('.swiper-container.home__teams__grid-small', {
		    direction: 'horizontal',
		    // loop: true,
		    slidesPerView: 5,
		    nextButton: '.home__teams__grid-small .swiper-button-next',
		    prevButton: '.home__teams__grid-small .swiper-button-prev',
		    breakpoints: {
			    768: {
			      slidesPerView: 1
			    },
			    1200: {
			      slidesPerView: 4
			    }
			  }
		  })

		  var mySwiper2 = new Swiper ('.swiper-container.home__testmonials__slider', {
		    direction: 'horizontal',
		    loop: true,
		    pagination: '.swiper-pagination',
		    paginationClickable: true,
		    nextButton: '.home__testmonials__slider .swiper-button-next',
		    prevButton: '.home__testmonials__slider .swiper-button-prev',
		  })

		  </script>

		 <?php endif; ?>
		<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/navigation.js"></script>
		<?php wp_footer(); ?>
	</body>
</html>
