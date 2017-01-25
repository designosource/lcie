<?php
	// Template name: Teams
?>


<?php get_header(); ?>


	<section class="page__top" style="background-image: url(<?php the_field("header_image"); ?>);"> 
		<div class="wrapper">
			<h1 class="page__top__title">Teams</h1>
			<h2 class="page__top__subtitle">bekijk hieronder onze teams</h2>
		</div>
		<div class="page__top__overlay"></div>
	</section>

	<section class="teams__content">
		
		<div class="wrapper">
			
			<h1>Lopende projecten</h1>


			<?php $query = new WP_Query(array('post_type' => "team", "year" => date("Y"))); ?>
			<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="grid teams__content__grid">
				
						<div class="teams__content__grid__col">
							
							<img src="<?php the_field("logo"); ?>" alt="<?php the_title(); ?>" class="teams__content__grid__col__image">

						</div>

						<div class="teams__content__grid__col">
							
							<p><?php the_content(); ?></p>

							<a href="<?php the_permalink(); ?>" class="teams__content__grid__col__more">lees meer</a>

						</div>

					</div>
			<?php endwhile; endif; ?>
			</div>
				</section>
			<section class="teams__pastprojects">
			<div class="wrapper">
			<h1>Afgelopen projecten</h1>
			<?php $query = new WP_Query(array('post_type' => "team")); ?>
			<?php
				$years = array();

				  if( $query->have_posts() ) {
				    while( $query->have_posts() ) {
				      $query->the_post();
				      $year = get_the_date( 'Y' );

				      if($year < date("Y") ){
				      	if ( ! isset( $years[ $year ]  )) $years[ $year ] = array();
				      $years[ $year ][] = array( 'title' => get_the_title(), 'permalink' => get_the_permalink(), 'logo' => get_field("logo") );
				      }
				      
				    }
				}

			?>
			<?php foreach($years as $key=>$year): ?>
				<h2 class="teams__pastprojects__year"><?php echo $key; ?></h2>
				<div class="grid teams__pastprojects__grid">
				<?php foreach($year as  $year2): ?>
					
					

						
							<div class="teams__pastprojects__grid__col">
								<a href="<?php echo $year2["permalink"]; ?>">
									<img src="<?php echo $year2["logo"]; ?>" alt="" class="teams__pastprojects__grid__col__logo">
								</a>
							</div>
						

		
				
				<?php endforeach; ?>
		</div>
			<?php endforeach; ?>

		</div>
</div>
		</section>





<?php get_footer(); ?>