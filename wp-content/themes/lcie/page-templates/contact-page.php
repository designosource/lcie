<?php
// Template name: Contact-Page


	$args = array('post_type' => 'lcie_team',
				        'tax_query' => array(
				            array(
				                'taxonomy' => 'groups',
				                'field' => 'slug',
				                'terms' => 'core-team',
				            ),
				        ),
				     );

	$query = new WP_Query($args); 

?>


<?php get_header(); ?>


<?php get_template_part( '/template-parts/page', 'header' ); ?>

<section class="contact__form">
	<div class="wrapper">

		<h2><?php pll_e( "Contactformulier" ); ?></h2>

		<div class="contact__form__feedback contact__form__feedback--error">
			
			<?php pll_e( "Er liep iets mis tijdens het verzenden van het formulier. Probeer het nogmaals aub." ); ?>
		</div>

		<div class="contact__form__feedback contact__form__feedback--pass">
			
			<?php pll_e( "Je bericht werd succesvol verzonden." ); ?>
		</div>

		<form action="">

			<div class="grid contact__form__grid">
				
				<div class="col contact__form__grid__col contact__form__grid__col--small">

					<label for="contact_who"><?php pll_e( "Wie van Lcie wil je contacteren?" ); ?></label>

					<select name="contact_who" class="dropdown">
						
						<option value="info@lcie.be"><?php pll_e( "Core team" ); ?></option>

						<?php foreach(get_sites(array("offset" => 1)) as $site): ?>

							<?php switch_to_blog($site->blog_id); ?>

							<option value="<?php echo antispambot(get_option("email")); ?>"><?php echo $site->blogname; ?></option>
									
						<?php restore_current_blog(); endforeach; ?>

					</select>

					<label for="contact_name"><?php pll_e( "Naam" ); ?></label>
					<input type="text" name="contact_name" class="textfield">

					<label for="contact_type"><?php pll_e( "Type" ); ?></label>
					<select name="contact_type" class="dropdown">

						<?php $frontpage_id = get_option( 'page_on_front' ); ?>

						<?php if( have_rows('lcie_for', $frontpage_id) ): while ( have_rows('lcie_for', $frontpage_id) ) : the_row(); ?>
							<option value="<?php the_sub_field("text"); ?>"><?php the_sub_field("text"); ?></option>
						<?php endwhile; endif; ?>


					</select>

					<label for="contact_email"><?php pll_e( "E-mail" ); ?></label>
					<input type="text" name="contact_email" class="textfield">

				</div>

				<div class="col contact__form__grid__col">

					<label for="contact_message"><?php pll_e( "Bericht" ); ?></label>
					<textarea name="contact_message" class="textarea"></textarea>	

					<input type="hidden" name="action" value="send_contact_form">

					<input type="submit" value="Verzenden" class="button contact__form__submit">	

				</div>

			</div>

		</form>
	</div>
</section>

<section class="contact__location">

	<div class="wrapper">

		<div class="grid contact__location__grid">
			<?php if( have_rows('contact_locations') ): while ( have_rows('contact_locations') ) : the_row(); ?>

				<div class="col contact__location__grid__col">
					<h2 class="contact__location__title"><?php the_sub_field("name"); ?></h2>
					<p class="contact__location__address"><?php the_sub_field("address"); ?></p>
					<?php $email = get_sub_field("email"); ?>
					<?php if(!empty($email)): ?>
						<a href="mailto:<?php echo antispambot(get_sub_field('email')); ?>" class="contact__location__mail"><?php echo antispambot(get_sub_field("email")); ?></a>
					<?php endif; ?>
				</div>

			<?php endwhile; endif; ?>

		</div>

	</div>

</section>

<section class="contact__team">
	<div class="wrapper">
		
		<h2><?php pll_e( "Core team" ); ?></h2>

			<div class="offerings__team__grid grid">
				
			<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();  ?>
						<div class="team-member">
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
				<?php endwhile; endif; ?>



			</div>


	</div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
	
	$(".contact__form form").submit(function(e){
		e.preventDefault();
		$.ajax({
		  method: "POST",
		  url: '<?php echo site_url(); ?>/wp-admin/admin-ajax.php',
		  data:  $('.contact__form form').serialize()
		})
		.success(function(data) {
		    if(!data){
		    	$(".contact__form__feedback").hide();
		    	$(".contact__form__feedback--error").show();
		    }else{
				$(".contact__form__feedback").hide();
		    	$(".contact__form__feedback--pass").show();
		    }
		});

	});

</script>
<?php get_footer(); ?>
