<?php
    // Template name: Projecten
?>

<?php get_header(); ?>
<section class="home__top" style="background-color: <?php echo get_option('header_logo'); ?>"> 
    <div class="wrapper">
        <?php echo get_bloginfo( 'name' ); ?>
    </div>
</section>
<section class="container projects__container">

    <?php get_sidebar(); ?>

    <div class="content">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
            <?php the_content(); ?>

        <?php endwhile; endif; ?>

    </div>

</section>

<section class="projects__content">
    
    <div class="wrapper">
        <h1>Onze huidge projecten</h1>
    </div>

    <div class="grid projects__content__grid">
        
        <?php $query = new WP_Query(array('post_type' => "project")); ?>
        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
         
            <div class="projects__content__grid__col" style="background-image: url(<?php the_field("photo"); ?>);">
                <div class="projects__content__grid__col__overlay" style="background-color: <?php the_field("color"); ?>"></div>
                <img src="<?php the_field("logo"); ?>" alt="<?php the_title(); ?>" class="projects__content__grid__col__logo">
                <span class="projects__content__grid__col__title"><?php the_title(); ?></span>
                <a href="<?php the_permalink(); ?>" class="projects__content__grid__col__more">lees meer</a>
            </div>
            
        <?php endwhile; endif; ?>

    </div>

</section>

<style>

    h1
    {
        color: <?php echo get_option('header_logo'); ?> !important;
    }
    
    .swiper-pagination-bullet-active
    {
        background-color: <?php echo get_option('header_logo'); ?> !important;
    }

    .swiper-pagination-bullet
    {
        border-color: <?php echo get_option('header_logo'); ?> !important;
    }

    .home__testmonials__slider__hook-up path
    {
        fill: <?php echo get_option('header_logo'); ?>;
    }

    .home__testmonials__slider__hook-under path
    {
        fill: <?php echo get_option('header_logo'); ?>;
    }

    .sidebar ul li a:hover
    {
        color: <?php echo get_option('header_logo'); ?>;
    }

    .home__content__intrested__button
    {
        background-color: <?php echo get_option('header_logo'); ?>;
    }

    .who__content__grid__col__photo
    {
        border-color: <?php echo get_option('header_logo'); ?>;
    }

</style>
<?php get_footer(); ?>