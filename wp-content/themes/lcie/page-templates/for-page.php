<?php
// Template name: For-Page
?>


<?php get_header(); ?>
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
                <a href="" class="for__bubble__grid__col">
                    Ondernemen?
                </a>
                <a href="" class="for__bubble__grid__col">
                    Ik zoek teamleden!
                </a>
                <a href="" class="for__bubble__grid__col">
                    Ik zoek een team!
                </a>
                <a href="" class="for__bubble__grid__col">
                    Ik wil starten!
                </a>
            </div>
        </div>
    </section>

    <section class="for__section">
        <div class="wrapper">
            <h1>Wat wij aanbieden</h1>

            <div class="for__offer__grid">
                <div class="for__offer__grid__item">
                    <div class="item__image" style="background-image:url();">
                        <h3>Work Space</h3>
                    </div>
                    <div class="item__detail">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste nam repudiandae voluptatem. Animi culpa earum optio reprehenderit rerum sunt veritatis vero voluptates! Minus, modi saepe sequi sit totam unde voluptatum.</p>
                    </div>
                </div>
                <div class="for__offer__grid__item">
                    <div class="item__image">
                        <h3>Work Space</h3>
                    </div>
                    <div class="item__detail">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste nam repudiandae voluptatem. Animi culpa earum optio reprehenderit rerum sunt veritatis vero voluptates! Minus, modi saepe sequi sit totam unde voluptatum.</p>
                    </div>
                </div>
                <div class="for__offer__grid__item">
                    <div class="item__image">
                        <h3>Work Space</h3>
                    </div>
                    <div class="item__detail">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste nam repudiandae voluptatem. Animi culpa earum optio reprehenderit rerum sunt veritatis vero voluptates! Minus, modi saepe sequi sit totam unde voluptatum.</p>
                    </div>
                </div>
                <div class="for__offer__grid__item">
                    <div class="item__image">
                        <h3>Work Space</h3>
                    </div>
                    <div class="item__detail">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste nam repudiandae voluptatem. Animi culpa earum optio reprehenderit rerum sunt veritatis vero voluptates! Minus, modi saepe sequi sit totam unde voluptatum.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>