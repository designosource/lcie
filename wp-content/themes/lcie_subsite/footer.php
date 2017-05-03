		<?php switch_to_blog(1); ?>

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
                    <div class="footer__bottom__content">
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
				border-color: <?php echo get_option('header_logo'); ?>;
                color: <?php echo get_option('header_logo'); ?>;
			}

            .button:not(.header__navigation__apply):not(.footer__up):hover
            {
                background-color: <?php echo get_option('header_logo'); ?>;
                color: white;
            }

		</style>
		<?php wp_footer(); ?>
	</body>
</html>