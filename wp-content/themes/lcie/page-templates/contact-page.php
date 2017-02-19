<?php
// Template name: Contact-Page
?>


<?php get_header(); ?>

<section class="page__top" style="background-image: url(<?php the_field("header_image"); ?>);">
	<div class="wrapper">
		<h1 class="page__top__title">Contact</h1>
		<p class="page__top__subtitle">De leden van het LCIE Core Team staan klaar omje te helpen met al je vragen gerelateerd aan entrepreneurship of met de start van je entrepreneursproject.</p>
	</div>
	<div class="page__top__overlay"></div>
</section>

<section class="contact__form">
	<div class="wrapper">

		<h2>Contactformulier</h2>

		<div class="contact__form__feedback contact__form__feedback--error">
			Er liep iets mis tijdens het verzenden van het formulier. Probeer het nogmaals aub.
		</div>

		<div class="contact__form__feedback contact__form__feedback--pass">
			Je bericht werd succesvol verzonden.
		</div>

		<form action="">

			<div class="grid contact__form__grid">
				
				<div class="col contact__form__grid__col contact__form__grid__col--small">

					<label for="contact_who">Wie van Lcie wil je contacteren?</label>

					<select name="contact_who" class="dropdown">
						
						<option value="info@lcie.be">Core team</option>

						<?php foreach(get_sites(array("offset" => 1)) as $site): ?>

							<?php switch_to_blog($site->blog_id); ?>

							<option value="<?php echo get_option("email"); ?>"><?php echo $site->blogname; ?></option>
									
						<?php restore_current_blog(); endforeach; ?>

					</select>

					<label for="contact_name">Naam</label>
					<input type="text" name="contact_name" class="textfield">

					<label for="contact_type">Type</label>
					<select name="contact_type" class="dropdown">

						<?php $frontpage_id = get_option( 'page_on_front' ); ?>

						<?php if( have_rows('lcie_for', $frontpage_id) ): while ( have_rows('lcie_for', $frontpage_id) ) : the_row(); ?>
							<option value="<?php the_sub_field("text"); ?>"><?php the_sub_field("text"); ?></option>
						<?php endwhile; endif; ?>


					</select>

					<label for="contact_email">E-mail</label>
					<input type="text" name="contact_email" class="textfield">

				</div>

				<div class="col contact__form__grid__col">

					<label for="contact_message">Bericht</label>
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
						<a href="mailto:<?php the_sub_field("email"); ?>" class="contact__location__mail"><?php the_sub_field("email"); ?></a>
					<?php endif; ?>
				</div>

			<?php endwhile; endif; ?>
		</div>

	</div>

</section>

<section class="contact__team">
	<div class="wrapper">
		
		<h2>Core team</h2>

		<div class="grid contact__team__grid">
			
			<div class="col contact__team__grid__col">
				<img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg" alt="" class="contact__team__img">
				<div class="contact__team__details">
					<h3 class="contact__team__name">Wim Fyen</h3>
					<p class="contact__team__title">Incubator Manager</p>
					<a href="#" class="contact__team__mail">wim.fyen@lcie.be</a>
				</div>
			</div>

			<div class="col contact__team__grid__col">
				<img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg" alt="" class="contact__team__img">
				<div class="contact__team__details">
					<h3 class="contact__team__name">Wim Fyen</h3>
					<p class="contact__team__title">Incubator Manager</p>
					<a href="#" class="contact__team__mail">wim.fyen@lcie.be</a>
				</div>
			</div>

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
