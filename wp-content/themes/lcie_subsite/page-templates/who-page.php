<?php
    // Template name: Wie zijn we
?>

<?php get_header(); ?>
<section class="home__top" style="background-color: <?php echo get_option('header_logo'); ?>"> 
    <div class="wrapper">
        <?php echo get_bloginfo( 'name' ); ?>
    </div>
</section>
<section class="container who__container">

    <?php get_sidebar(); ?>

    <div class="content">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
            <?php the_content(); ?>

        <?php endwhile; endif; ?>

    </div>

</section>

<section class="who__content">
    
    <div class="wrapper">
        <h1>Team</h1>

        <div class="grid who__content__grid">
            
            <?php if( have_rows('team') ): ?>
            <?php while ( have_rows('team') ): the_row(); ?>    

                <div class="who__content__grid__col">
                    <div class="grid">
                        <div class="who__content__grid__col__photo" style="background-image: url(<?php the_sub_field("photo"); ?>)"></div>
                        <div class="who__content__grid__col__detail">
                            <span class="who__content__grid__col__detail__name"><?php the_sub_field("name"); ?></span>
                            <span class="who__content__grid__col__detail__email"><a href="mailto:<?php the_sub_field("email"); ?>"><?php the_sub_field("email"); ?></a></span>
                             <span class="who__content__grid__col__detail__function"><?php the_sub_field("function"); ?></span>
                        </div>
                    </div>
                </div>
            <?php endwhile; endif;?>

        </div>
     
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