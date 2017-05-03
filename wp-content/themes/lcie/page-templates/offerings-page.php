<?php
	// Template name: Aanbod

$core = array();
$other = array();

$query = new WP_Query(array('post_type' => "lcie_team", 'tax_query' => array(
				            array(
				                'taxonomy' => 'groups',
				                'field' => 'slug',
				                'terms' => 'core-team',
				            ),
				        )));

if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

$member = array();
$member["name"] = get_the_title();
$member["photo"] = get_field("photo");
$member["function"] = get_field("function");
$member["email"] = get_field("email");
$member["twitter"] = get_field("twitter");
$member["linkedin"] = get_field("linkedin");

array_push($core, $member);



	endwhile; endif;

	wp_reset_query();
	?>


	<?php get_header(); ?>


	<?php get_template_part( '/template-parts/page', 'header' ); ?>

	<section class="offerings__container">
		<div class="wrapper">
			<nav class="offerings__sidebar">

				<ul>
					<li class="offerings__sidebar__active"><?php pll_e( "Lcie voor" ); ?></li>
					<li><a href="#subsites"><?php pll_e( "Subsites" ); ?></a></li>
					<?php if( have_rows('content-blocks') ): while ( have_rows('content-blocks') ) : the_row(); ?>
						<li><a href="#<?php echo strtolower(get_sub_field("title")); ?>"><?php the_sub_field("title"); ?></a></li>

					<?php endwhile; endif; ?>
					<li><a href="#team"><?php pll_e( "Core team" ); ?></a></li>
					<li><a href="#infrastructure"><?php pll_e( "Infrastructuur" ); ?></a></li>
				</ul>

			</nav>

			<div class="offerings__content">
				<h1><?php pll_e( "Lcie voor" ); ?></h1>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php the_content(); ?>

				<?php endwhile; wp_reset_query(); ?>
			</div>
		</div>

	</section>

	<section class="offerings__who" id="who">

		<div class="wrapper">

			<?php $frontpage_id = get_option( 'page_on_front' ); ?>

			<div class="grid offerings__who__grid">

				<?php if( have_rows('lcie_for', $frontpage_id) ): while ( have_rows('lcie_for', $frontpage_id) ) : the_row(); ?>
					<a href="<?php the_sub_field("url"); ?>" class="offerings__who__grid__col"  style="background-image: url(<?php the_sub_field("image"); ?>)">
						<span><?php the_sub_field("text"); ?></span>
						<div class="offerings__who__grid__col__overlay" style="background-color: <?php the_sub_field("color"); ?>"></div>
					</a>
				<?php endwhile; endif; ?>

			</div>

		</div>

	</section>

	<section class="offerings__subsites" id="subsites">
		<div class="wrapper">
			<h1><?php pll_e( "Subsites" ); ?></h1>
			<div class="grid offerings__subsites__grid">

				<?php foreach(get_sites(array("offset" => 1)) as $site): ?>

					<?php switch_to_blog($site->blog_id); ?>

					<a href="<?php echo get_site_url($site->blog_id); ?>" class="offerings__subsites__grid__col" style="background-image: url(<?php echo get_option("background_picture"); ?>)">

						<span class="offerings__subsites__grid__col__title"><?php echo $site->blogname; ?></span>
						<span class="offerings__subsites__grid__col__more"><?php pll_e("Lees meer"); ?></span>
						<div class="offerings__subsites__grid__col__overlay" style="background-color: <?php echo get_option('header_logo'); ?>"></div>
					</a>

					<?php restore_current_blog(); endforeach; ?>
				</div>
			</div>
		</section>

		<?php if( have_rows('content-blocks') ): while ( have_rows('content-blocks') ) : the_row(); ?>
			<section class="offerings__content-block" id="<?php echo strtolower(get_sub_field("title")); ?>">
				<div class="wrapper">
					<h1><?php the_sub_field("title"); ?></h1>
					<?php the_sub_field("content"); ?>
				</div>
			</section>
		<?php endwhile; endif; ?>

		<section class="offerings__team" id="team">
			<div class="wrapper">

				<h1><?php pll_e( "Core team" ); ?></h1>

				<div class="offerings__team__text">
					<?php the_field("team_text"); ?>
				</div>

				<div class="offerings__team__grid grid">

					<?php foreach ($core as $value): ?>
						<div class="team-member">
							<div class="grid">
								<div class="photo" style="background-image: url(<?php echo $value["photo"]; ?>)"></div>
								<div class="details">
									<span class="details__name"><?php echo $value["name"]; ?></span>
									<span class="details__function"><?php echo $value["function"]; ?></span>

									<div class="details__contact">
										<a href="mailto:<?php echo $value["email"]; ?>" class="details__contact__mail"><?php echo $value["email"]; ?></a>
										<div class="details__contact__social">
											
												<?php if(!empty($value["twitter"])): ?>
													<a href="<?php echo $value["twitter"]; ?>" class="details__contact__social__icon twitter">Twitter</a>
												<?php endif; ?>
											
												<?php if(!empty($value["linkedin"])): ?>
													<a href="<?php echo $value["linkedin"]; ?>" class="details__contact__social__icon linkedin">LinkedIn</a>
												<?php endif; ?>
										</div>
									</div>


								</div>
							</div>
						</div>
					<?php endforeach; ?>

				</div>

			</div>
		</section>

		<section class="offerings__infrastructure" id="infrastructure">
			<div class="wrapper">

				<h1><?php pll_e( "Infrastructuur" ); ?></h1>

				<div class="offerings__infrastructure__text">

					<?php the_field("infrastructure_text"); ?>

				</div>
			</div>

			<div id="map" class="offerings__infrastructure__map acf-map">

				<?php $infra_query = new WP_Query(array('post_type' => "infrastructure"));  ?>
				<?php if( $infra_query->have_posts() ): while ( $infra_query->have_posts() ) : $infra_query->the_post(); $location = get_field('place');?>
					
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
						<div class="grid">
							<div class="col marker-col">
								<?php $image = get_field("image"); ?>
								<?php if(!empty($image)): ?>
									<img src="<?php the_field("image"); ?>" class="marker-img" alt="<?php the_title(); ?>">
								<?php endif; ?>
							</div>
							<div class="col marker-col">
								<div>
									<h2 class="marker-title"><?php the_title(); ?></h2>
									<p class="marker-address"><?php echo $location["address"]; ?></p>
								</div>
							</div>
						</div>
					</div>

				<?php endwhile; endif; wp_reset_query(); ?>


			</div>


			<div class="wrapper">
				<div class="grid offerings__infrastructure__grid">
					<?php if( $infra_query->have_posts() ): while ( $infra_query->have_posts() ) : $infra_query->the_post(); $location = get_field('place');?>
						<div class="offerings__infrastructure__grid__col">

							<svg class="offerings__infrastructure__grid__col__hook-under hook-under" viewBox="0 0 100 100">
								<path d="M20,58 L20,0 L0,0 L0,68 L0,78 L78,78 L78,58 L20,58 Z" id="Combined-Shape"></path>
							</svg>

							<svg class="offerings__infrastructure__grid__col__hook-up hook-up" viewBox="0 0 100 100">
								<path d="M20,58 L20,0 L0,0 L0,68 L0,78 L78,78 L78,58 L20,58 Z" id="Combined-Shape" transform="translate(39.000000, 39.000000) rotate(180.000000) translate(-39.000000, -39.000000) "></path>
							</svg>

							<img src="<?php the_field("image"); ?>" class="offerings__infrastructure__grid__col__image" alt="<?php the_title(); ?>">
							<h2 class="offerings__infrastructure__grid__col__title"><?php the_title(); ?></h2>

							<p class="offerings__infrastructure__grid__col__description"><?php echo $location["address"]; ?></p>
							<?php $url = get_field("url"); ?>
							<?php if(!empty($url)): ?>
								<a href="<?php the_field("url"); ?>" class="offerings__infrastructure__grid__col__plan" target="blank"><?php pll_e( "Lees meer" ); ?></a>
							<?php else: ?>
								<a href="<?php the_permalink(); ?>" class="offerings__infrastructure__grid__col__plan"><?php pll_e( "Lees meer" ); ?></a>
							<?php endif; ?>
						</div>


					<?php endwhile; endif; wp_reset_query(); ?>
				</div>
			</div>
		</section>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB63fCe88g51K6K3DUht0ksGtCetjS_WCI"></script>


		<?php get_footer(); ?>
