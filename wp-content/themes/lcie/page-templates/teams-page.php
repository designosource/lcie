<?php
	// Template name: Teams
?>
<?php get_header(); ?>

	<?php get_template_part( '/template-parts/page', 'header' ); ?>

	<section class="page__content">

		<div class="wrapper">

			<div class="teams__featured-teams">
				<h1><?php pll_e( "Uitgelichte teams" ); ?></h1>

				<div class="grid teams__content__grid">

				<?php $query = new WP_Query(array('post_type' => "team", "meta_key" => "featured", "meta_value" => true)); ?>
				<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
					
					<a href="<?php the_permalink(); ?>" class="teams__content__grid__col">
	
							<div>
								<img src="<?php the_field("logo"); ?>" alt="<?php the_title(); ?>" class="teams__content__grid__col__image">

							</div>
		
					</a>
				<?php endwhile; endif; wp_reset_query(); ?>
				</div>
			</div>
			
				<h1><?php pll_e( "Alle projecten" ); ?></h1>

				<?php $query_full = new WP_Query(array('post_type' => "team", 'orderby' => 'date', 'posts_per_page' => -1)); ?>
				<?php $year = date("Y"); ?>
				<?php $count = 0; ?>

				<?php if ( $query_full->have_posts() ) : while ( $query_full->have_posts() ) : $query_full->the_post(); ?>
						<?php $date = get_the_date("Y"); ?>
						<?php if(!empty($date)): ?>
							<?php $y = get_the_date("Y"); ?>
						<?php endif; ?>
						
						<?php if($year > $y && $count > 0): ?>
									
							</div>
					
						<?php  endif; ?>
						<?php if($year > $y || $count == 0): ?>
								
							<h2><?php echo $y; ?></h2>
							<div class="grid teams__content__grid">

						<?php endif; ?>

						

							
							<?php $content = get_the_content(); ?>
							<?php if(!empty($content)): ?>
								<div class="teams__content__grid__col">
		                            <a href="<?php the_permalink(); ?>">
		                            	<img src="<?php the_field("logo"); ?>" alt="<?php the_title(); ?>" class="teams__content__grid__col__image">
									</a>
								</div>
							<?php else: ?>
								<div class="teams__content__grid__col">
	 								<div>
		                            	<img src="<?php the_field("logo"); ?>" alt="<?php the_title(); ?>" class="teams__content__grid__col__image">
									</div>
								</div>
							<?php endif; ?>

							
						
				<?php $year = get_the_date("Y"); $count++; endwhile; endif; wp_reset_query(); ?>
				
		</div>
	</section>

<?php get_footer(); ?>