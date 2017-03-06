<?php
	// Template name: Teams
?>


<?php get_header(); ?>


	<?php get_template_part( '/template-parts/page', 'header' ); ?>

	<section class="teams__content">

		<div class="wrapper">

			<h1><?php pll_e( "Lopende projecten" ); ?></h1>

			<?php $query = new WP_Query(array('post_type' => "team", "year" => date("Y"))); ?>
			<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="grid teams__content__grid">

						<div class="teams__content__grid__col">

                            <a href="<?php the_permalink(); ?>"><img src="<?php the_field("logo"); ?>"
                                                                     alt="<?php the_title(); ?>"
                                                                     class="teams__content__grid__col__image"></a>

						</div>

						<div class="teams__content__grid__col">

							<p><?php the_field("short_text"); ?></p>

							<a href="<?php the_permalink(); ?>" class="teams__content__grid__col__more"><?php pll_e( "lees meer" ); ?></a>

						</div>

					</div>
			<?php endwhile; endif; ?>
			</div>
				</section>
			<section class="teams__pastprojects">
			<div class="wrapper">
			<a href="" class="teams__pastprojects__expand"><?php pll_e( "Afgelopen projecten" ); ?></a>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
var pastProjectsOpen = false;
	jQuery(document).ready(function(){
			jQuery('.teams__pastprojects__year').hide();
			jQuery('.teams__pastprojects__grid').hide();
			pastProjectsOpen = false;
	});
	jQuery('.teams__pastprojects__expand').click(function(e){
		e.preventDefault();
		if (pastProjectsOpen){
			jQuery('.teams__pastprojects__year').hide();
			jQuery('.teams__pastprojects__grid').hide();
			jQuery(this).removeClass("teams__pastprojects__expand--expanded");
		}
		else {
			jQuery('.teams__pastprojects__year').show();
			jQuery('.teams__pastprojects__grid').show();
			jQuery(this).addClass("teams__pastprojects__expand--expanded");
		}
	});
</script>

<?php get_footer(); ?>
