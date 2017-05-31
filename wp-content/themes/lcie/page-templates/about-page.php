<?php

	// Template name: About-Page

?>


<?php get_header(); ?>

<?php get_template_part( '/template-parts/page', 'header' ); ?>

<section class="page__content">
		<div class="wrapper wrapper_full_text">
		    
		<div class="sidebar-container">

			<nav class="sidebar">

				<ul>
					<li class="offerings__sidebar__active"><?php pll_e( "Over ons" ); ?></li>
					<?php

						$custom_terms = get_terms('groups');

						foreach($custom_terms as $custom_term) {
							$slug = str_replace(' ', '', $custom_term->slug);
							echo '<li><a href="#'.$slug.'">'.$custom_term->name.'</a></li>';
						}
					?>
				</ul>

			</nav>

			<div class="offerings__content">

			
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            the_content();
            endwhile; ?>
            <?php wp_reset_query(); ?>
            <?php endif; ?>
	<div class="about__team">
			<?php

				$custom_terms = get_terms('groups');

				foreach($custom_terms as $custom_term) {
				    wp_reset_query();
				    $args = array('post_type' => 'lcie_team',
				        'tax_query' => array(
				            array(
				                'taxonomy' => 'groups',
				                'field' => 'slug',
				                'terms' => $custom_term->slug,
				            ),
				        ),
				     );

				     $loop = new WP_Query($args);
				     if($loop->have_posts()) {
				     	$slug = str_replace(' ', '', $custom_term->slug);
				        echo '<h1 id="'.$slug.'">'.$custom_term->name.'</h1>';
				        echo '<div class="offerings__team__grid grid">';

				        while($loop->have_posts()) : $loop->the_post(); ?>
			
            			<div class="team-member team-member--large">
							<div class="grid">
								<div class="photo" style="background-image: url(<?php the_field("photo"); ?>)"></div>
								<div class="details">
									<span class="details__name"><?php the_title(); ?></span>
									<span class="details__function"><?php the_field("function"); ?></span>

									<div class="details__contact">
										<a href="mailto:<?php echo antispambot(get_field("email")); ?>" class="details__contact__mail"><?php echo antispambot(get_field("email")); ?></a>
										<div class="details__contact__social">
												<?php
													$twitter = get_field("twitter");
													$linkedin = get_field("linkedin");
												?>
												<?php if(!empty($twitter)): ?>
													<a href="<?php echo $twitter; ?>" class="details__contact__social__icon twitter">Twitter</a>
												<?php endif; ?>
											
												<?php if(!empty($linkedin)): ?>
													<a href="<?php echo $linkedin; ?>" class="details__contact__social__icon linkedin">LinkedIn</a>
												<?php endif; ?>
										</div>
									</div>


								</div>
							</div>
						</div>
				    <?php endwhile;
				     }

				     echo "</div>";
				}

			?>
</div>
		</div>
		</div>

</section>


<?php get_footer(); ?>
