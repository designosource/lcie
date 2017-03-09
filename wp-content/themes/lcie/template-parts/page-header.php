<?php $image = get_field("header_image"); ?>
<?php if(!empty($image)): ?>
	<section class="page__top" style="background-image: url(<?php the_field("header_image"); ?>);">
<?php else: ?>
	<section class="page__top">
<?php endif; ?>
	<div class="wrapper">
		<h1 class="page__top__title"><?php the_title(); ?></h1>
		<?php $subtitle = get_field("subtitle"); ?>
		<?php if(!empty($subtitle)): ?>
			<h2 class="page__top__subtitle"><?php the_field("subtitle"); ?></h2>
		<?php endif; ?>
	</div>
	<div class="page__top__overlay"></div>
</section>