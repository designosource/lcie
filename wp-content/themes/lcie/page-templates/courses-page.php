<?php
// Template name: Courses-Page
?>


<?php get_header(); ?>

<?php get_template_part( '/template-parts/page', 'header' ); ?>
<?php if ( have_posts() ) : ?>
	<?php while (have_posts() ) : the_post(); ?>

<section class="page__content">
	<div class="wrapper wrapper_full_text">
		    
		<div class="sidebar-container">
			<nav class="sidebar">
				<ul>
					<?php if( is_page() && $post->post_parent > 0 ): ?>
						<?php
							$args = array(
								'post_type'      => 'page',
								'posts_per_page' => -1,
								'post_parent'    => wp_get_post_parent_id( get_the_ID() ),
								'order'          => 'ASC',
								'orderby'        => 'menu_order'
							);
						?>
					<?php else: ?>
						<?php
							$args = array(
								'post_type'      => 'page',
								'posts_per_page' => -1,
								'post_parent'    => get_the_ID(),
								'order'          => 'ASC',
								'orderby'        => 'menu_order'
							);
						?>
					<?php endif; ?>
					<?php
					$url = get_permalink();
					$parent = new WP_Query( $args );

					if ( $parent->have_posts() ) : ?>

					<?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
						
						<?php if($url == get_permalink()): ?>
							
							<li><a class="courses__sidebar__active" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

						<?php else: ?>

							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		
						<?php endif; ?>
						

					<?php endwhile; ?>

				<?php endif; wp_reset_query(); ?>
			</ul>
		</nav>
		
		<div class="offerings__content">

			<?php the_field("intro_text"); ?>
			
		</div>
	</div>

		<?php the_content(); ?>
		
	</div>
</section>

<?php endwhile; endif; ?>


<?php get_footer(); ?>
