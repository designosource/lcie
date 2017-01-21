<?php
    // Template name: Archief
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

        <?php
            $args = array(
                'offset'           => 0,
                'category'         => '',
                'category_name'    => '',
                'orderby'          => 'ASC',
                'order'            => 'DESC',
                'include'          => '',
                'exclude'          => '',
                'meta_key'         => '',
                'meta_value'       => '',
                'post_type'        => 'post',
                'post_mime_type'   => '',
                'post_parent'      => '',
                'post_status'      => 'publish',
                'suppress_filters' => true 
            );

            $posts_array = get_posts( $args );
            $oldest = date('Y', strtotime($posts_array[0]->post_date));
        ?>


        <form action="">
            <select name="archive_date" class="projects__content__select">
                
                <?php for($i = date("Y"); $i >= $oldest; $i--): ?>

                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                <?php endfor; ?>


            </select>
        </form>


    </div>

    <div class="grid projects__content__grid">
        
        <?php $query = new WP_Query(array('post_type' => "project", 'date_query' => array(array('year'  => date("Y"))))); ?>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


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


    .projects__content__select
    {
        border: 2px solid <?php echo get_option('header_logo'); ?>;
        color: <?php echo get_option('header_logo'); ?>;
    }

</style>
<?php get_footer(); ?>