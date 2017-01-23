<?php get_header(); ?>
<section class="home__top" style="background-color: <?php echo get_option('header_logo'); ?>"> 
    <div class="wrapper">
        <?php echo get_bloginfo( 'name' ); ?>
    </div>
</section>
<section class="container projects__container--single">

    <?php get_sidebar(); ?>

    <div class="content projects__content grid">
        <div class="projects__content__text">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                
                <?php the_content(); ?>

                <a href="" class="button projects__content__button">Bekijk de teampagina</a>

            <?php endwhile; endif; ?>
        </div>
        <img src="<?php the_field("logo"); ?>" alt="<?php the_title(); ?>" class="projects__content__logo">
        
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