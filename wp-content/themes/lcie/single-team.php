<?php get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php $postid = get_the_id(); ?>
	<section class="team__top">
		
		<div class="wrapper grid">
			
			<div class="team__top__photo">
				<img src="<?php the_field("image"); ?>" alt="<?php the_title(); ?>" class="team__top__photo__image">
			</div>

			<div class="team__top__allteams">
				
				<?php $query = new WP_Query(array('post_type' => "team", "year" => date("Y"))); ?>
				<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
					
					<?php if($postid == get_the_id()): ?>
						<a href="<?php the_permalink(); ?>" class="team__top__allteams__item team__top__allteams__item--active"><?php the_title(); ?></a>
					<?php else: ?>
						<a href="<?php the_permalink(); ?>" class="team__top__allteams__item"><?php the_title(); ?></a>
					<?php endif; ?>

				<?php endwhile; endif; wp_reset_query();?>

			</div>

		</div>

	</section>

	<section class="team__info">
		
		<div class="wrapper grid">
			
			<div class="team__info__logo">
				<img src="<?php the_field("logo"); ?>" alt="" class="team__info__logo__image">
			</div>

			<div class="team__info__text">
				
				<?php the_content(); ?>

				<div class="team__info__text__social">

					<?php if(get_field("website")): ?>
					<a href="<?php the_field("website"); ?>" class="team__info__text__social__item team__info__text__social__item--website"></a>
					<?php endif; ?>
					<?php if(get_field("facebook")): ?>
					<a href="<?php the_field("facebook"); ?>" class="team__info__text__social__item team__info__text__social__item--facebook"></a>
					<?php endif; ?>
					<?php if(get_field("twitter")): ?>
					<a href="<?php the_field("twitter"); ?>" class="team__info__text__social__item team__info__text__social__item--twitter"></a>
					<?php endif; ?>
					<?php if(get_field("linkedin")): ?>
					<a href="<?php the_field("linkedin"); ?>" class="team__info__text__social__item team__info__text__social__item--linkedin"></a>
					<?php endif; ?>
					<?php if(get_field("youtube")): ?>
					<a href="<?php the_field("youtube"); ?>" class="team__info__text__social__item team__info__text__social__item--youtube"></a>
					<?php endif; ?>
				</div>

			</div>

		</div>

	</section>

	
	<?php if( have_rows('happenings') ): ?>
		<section class="team__happenings">
			
			<div class="wrapper">

				<h1><?php pll_e( "Happenings" ); ?></h1>
				<?php  while ( have_rows('happenings') ) : the_row();?>
					<div class="team__happenings__grid grid">
						
			
							<div class="team__happenings__grid__col team__happenings__grid__col--image" style="background-image: url(<?php the_sub_field("photo"); ?>);">
								<div class="team__happenings__grid__col--image__overlay"></div>
							</div>
							<div class="team__happenings__grid__col">
								<h2 class="team__happenings__grid__col__title"><?php the_sub_field("title"); ?></h2>
								<?php the_sub_field("text"); ?>
							</div>


					</div>
				<?php endwhile; ?>

			</div>

		</section>
	<?php endif; ?>
	
	<style>
		
		.team__happenings__grid__col--image__overlay
		{
			background-color: <?php the_field("color"); ?>;
		}

	</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script>
	
	var active = $(".team__top__allteams__item--active");

	$(".team__top__allteams__item").hover(function(){

		$(".team__top__allteams__item--active").removeClass("team__top__allteams__item--active");
		$(this).addClass("team__top__allteams__item--active");

	}, function(){

		$(this).removeClass("team__top__allteams__item--active");
		active.addClass("team__top__allteams__item--active");

	});

	</script>
	<?php endwhile; endif;?>
<?php get_footer(); ?>