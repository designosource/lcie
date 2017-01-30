<?php get_header(); ?>

	<section class="page__top"> 
		<div class="wrapper">
			<h1 class="page__top__title">FAQ</h1>
			<h2 class="page__top__subtitle">Vaakgestelde vragen</h2>
		</div>
		<div class="page__top__overlay"></div>
	</section>

	<section class="faq__content">
		
		<div class="wrapper">
			
			<?php

				$cats = get_categories(); 

				foreach ($cats as $cat) {

					$cat_id= $cat->term_id;

					echo "<h1>".$cat->name."</h1>";
			
					query_posts("cat=$cat_id&post_type=faq");?>
					<div class='faq__content__category'>
						<svg class="faq__content__category__hook-under hook-under" viewBox="0 0 100 100"> 
					        <path d="M20,58 L20,0 L0,0 L0,68 L0,78 L78,78 L78,58 L20,58 Z" id="Combined-Shape"></path>
					    </svg>

						<svg class="faq__content__category__hook-up hook-up" viewBox="0 0 100 100">
					        <path d="M20,58 L20,0 L0,0 L0,68 L0,78 L78,78 L78,58 L20,58 Z" id="Combined-Shape" transform="translate(39.000000, 39.000000) rotate(180.000000) translate(-39.000000, -39.000000) "></path>
					    </svg>

						<?php  if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="faq__content__item">
								<h2 class="faq__content__item__title"><?php the_title(); ?></h2>
								<div class="faq__content__item__answer"><?php the_content(); ?></div>
							</div>
						<?php endwhile; endif; ?>
					</div>
				<?php } ?>

		</div>

	</section>


<?php get_footer(); ?>