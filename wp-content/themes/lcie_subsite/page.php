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

        <?php if( have_rows('content-blocks') ): while ( have_rows('content-blocks') ) : the_row(); ?>
            <section class="home__content-block">
                <div class="wrapper">
                    <h1><?php the_sub_field("title"); ?></h1>
                    <?php the_sub_field("content"); ?>
                </div>
            </section>
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
