<?php

	// Template name: About-Page

	$core = array();
	$other = array();

	$query = new WP_Query(array('post_type' => "lcie_team"));

	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

		$member = array();
		$member["name"] = get_the_title();
		$member["photo"] = get_field("photo");
		$member["function"] = get_field("function");
		$member["email"] = get_field("email");
		$member["twitter"] = get_field("twitter");
		$member["linkedin"] = get_field("linkedin");

		foreach (get_field("team") as $value):

			if($value == "core_team"){

				array_push($core, $member);

			}else{

				array_push($other, $member);

			}

		endforeach;

	endwhile; endif;

	wp_reset_query();

?>


<?php get_header(); ?>

<?php get_template_part( '/template-parts/page', 'header' ); ?>

<section class="page__content">
		<div class="wrapper wrapper_full_text">
		    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            the_content();
            endwhile; ?>
            <?php wp_reset_query(); ?>
            <?php endif; ?>





			<h1><?php pll_e( "Core team" ); ?></h1>

						<div class="offerings__team__grid grid">

            			<?php foreach ($core as $value): ?>
            						<div class="offerings__team__grid__col">
            							<div class="grid">
            								<div class="offerings__team__grid__col__photo" style="background-image: url(<?php echo $value["photo"]; ?>)"></div>
            								<div class="offerings__team__grid__col__details">
            									<span class="offerings__team__grid__col__details__name"><?php echo $value["name"]; ?></span>
            									<span class="offerings__team__grid__col__details__function"><?php echo $value["function"]; ?></span>

            									<div class="offerings__team__grid__col__details__contact">
            										<a href="mailto:<?php echo $value["email"]; ?>" class="offerings__team__grid__col__details__contact__mail"><?php echo $value["email"]; ?></a>

            									</div>


            								</div>
            							</div>
            						</div>
            				<?php endforeach; ?>

            			</div>

			<h1><?php pll_e( "Bestuursteam" ); ?></h1>

			<div class="offerings__team__grid grid">

			<?php foreach ($other as $value): ?>
						<div class="offerings__team__grid__col">
							<div class="grid">
								<div class="offerings__team__grid__col__photo" style="background-image: url(<?php echo $value["photo"]; ?>)"></div>
								<div class="offerings__team__grid__col__details">
									<span class="offerings__team__grid__col__details__name"><?php echo $value["name"]; ?></span>
									<span class="offerings__team__grid__col__details__function"><?php echo $value["function"]; ?></span>

									<div class="offerings__team__grid__col__details__contact">
										<a href="mailto:<?php echo $value["email"]; ?>" class="offerings__team__grid__col__details__contact__mail"><?php echo $value["email"]; ?></a>

									</div>


								</div>
							</div>
						</div>
				<?php endforeach; ?>

			</div>

		</div>
</section>


<?php get_footer(); ?>
