<?php
	// Template name: Teams
?>


<?php get_header(); ?>


	<?php get_template_part( '/template-parts/page', 'header' ); ?>

	<section class="teams__content">

		<div class="wrapper">

			<div class="teams__featured-teams">
				<div class="grid teams__content__grid">

				<?php $query = new WP_Query(array('post_type' => "team", "meta_key" => "featured", "meta_value" => true)); ?>
				<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="teams__content__grid__col">
						<a href="<?php the_permalink(); ?>"><img src="<?php the_field("logo"); ?>" alt="<?php the_title(); ?>" class="teams__content__grid__col__image"></a>

						<a href="<?php the_permalink(); ?>" class="teams__content__grid__col__more"><?php the_title(); ?></a>
					</div>
					
				<?php endwhile; endif; ?>
				</div>
			</div>
			
				<h1><?php pll_e( "Alle projecten" ); ?></h1>

				<?php $query = new WP_Query(array('post_type' => "team", "orderby" => "date", 'order' => 'DESC')); ?>
				<?php $year = date("Y"); ?>
				<?php $count = 0; ?>
				<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
						<?php if($year > get_the_date("Y") || $count == 0): ?>
								
								<h2><?php echo $year; ?></h2>
								<div class="grid teams__content__grid">

						<?php endif; ?>

						

							<div class="teams__content__grid__col">

							<?php if(!empty(get_the_content())): ?>
	                            <a href="<?php the_permalink(); ?>">
	                            	<img src="<?php the_field("logo"); ?>" alt="<?php the_title(); ?>" class="teams__content__grid__col__image">

									<span class="teams__content__grid__col__more"><?php the_title(); ?></span>
								</a>
							<?php else: ?>
 							
	                            <img src="<?php the_field("logo"); ?>" alt="<?php the_title(); ?>" class="teams__content__grid__col__image">

								<span class="teams__content__grid__col__more"><?php the_title(); ?></span>
								
							<?php endif; ?>

							</div>

							<?php if($year > get_the_date("Y")): ?>
								
								</div>
						<?php $year = get_the_date("Y"); endif; ?>
						
				<?php $count++; endwhile; endif; ?>
				
			</div>
		</section>


<?php get_footer(); ?>
