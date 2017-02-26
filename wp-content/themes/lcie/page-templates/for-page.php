<?php
// Template name: For-Page
?>


<?php get_header(); ?>
<section class="page__content">
    <section class="for__section">
        <div class="wrapper">
            <h1><?php the_title(); ?></h1>
            <?php
            // TO SHOW THE PAGE CONTENTS
            while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
                <p class="for__section__subtitle"><?php the_content(); ?></p>

                <?php
            endwhile; //resetting the page loop
            wp_reset_query(); //resetting the page query
            ?>
            <p class="for__section__subtitle"><?php get_post(); ?></p>

            <div class="for__bubble__grid">

                <?php if( have_rows('bubbles') ): while ( have_rows('bubbles') ) : the_row(); ?>
                    <a href="<?php the_sub_field("link"); ?>" class="for__bubble__grid__col">
                        <?php the_sub_field("text"); ?>
                    </a>
                <?php endwhile; endif; ?>

            </div>

        </div>
    </section>

    <section class="for__section">
        <div class="wrapper">
            <h1><?php pll_e( "Wat wij aanbieden?" ); ?></h1>

            <div class="for__offer__grid">

                <?php if( have_rows('offer') ): while ( have_rows('offer') ) : the_row(); ?>
                    <div class="for__offer__grid__item">
                        <div class="item__image" style="background-image:url(<?php the_sub_field("image"); ?>);">
                            <h3><?php the_sub_field("image_text"); ?></h3>
                            <div class="item__image__overlay" style="background-color: <?php the_sub_field("image_color"); ?>"></div>
                        </div>
                        <div class="item__detail">
                            <?php the_sub_field("full_text"); ?>
                        </div>
                    </div>

                <?php endwhile; endif; ?>
                
            </div>
        </div>
    </section>
</section>
<?php get_footer(); ?>