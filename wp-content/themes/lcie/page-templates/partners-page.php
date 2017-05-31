<?php
// Template name: Partners-Page
?>


<?php get_header(); ?>

<?php get_template_part( '/template-parts/page', 'header' ); ?>
<section class="page__content">
<div class="wrapper">



		<?php 

		$custom_terms = get_terms('partner_group');

		foreach($custom_terms as $custom_term):

			wp_reset_query();

			$args = array('post_type' => 'partners',
				'tax_query' => array(
					array(
						'taxonomy' => 'partner_group',
						'field' => 'slug',
						'terms' => $custom_term->slug,
						),
					),
				);

			$loop = new WP_Query($args);
			if($loop->have_posts()):
				$slug = str_replace(' ', '', $custom_term->slug);
				echo '<h1 id="'.$slug.'">'.$custom_term->name.'</h1>';
				echo '<section class="partners__grid">';
				while($loop->have_posts()): $loop->the_post();
		?>
					
				<a href="<?php the_field('url'); ?>" alt="" class="partners__grid__item"><img src="<?php the_field('image'); ?>"></a>

		<?php
				endwhile;
				echo '</section>';
			endif; 

		endforeach;

		?>


</div>
</section>

<?php get_footer(); ?>
