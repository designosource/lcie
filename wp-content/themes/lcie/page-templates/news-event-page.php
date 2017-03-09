<?php
// Template name: Nieuws & events
?>


<?php get_header(); ?>

    <?php get_template_part( '/template-parts/page', 'header' ); ?>

    <!-- nieuws -->
    <section class="home__who">
        <div class="wrapper">
            <h2><?php pll_e("Nieuws"); ?></h2>

            <!-- Nieuws grid -->
            <?php
                        $args = array(
                            'post_type'      => 'news',
                            'posts_per_page' => -1,
                            'order'          => 'ASC',
                            'orderby'        => 'date'
                        );
                $news = new WP_Query($args);

            ?>

            <div class="nieuwsgrid">
                <?php if($news->have_posts()): ?>

                    <?php while($news->have_posts()): $news->the_post(); ?>
                        
                        <a href="<?php the_permalink(); ?>" class="nieuwsgrid-cell">
                            <div>
                                <div class="nieuwsgrid-cell-content">
                                    <span class="nieuws--post-date"><?php the_date(); ?></span>
                                    <h3 class="nieuws--post-title"><?php the_title(); ?></h3>
                                    <div class="nieuws--lees-meer">Lees meer</div>
                                </div>
                            </div>
                        </a>
                
                <?php endwhile; ?>

            <?php else: ?>

                <p style="color: gray;"><?php pll_e("Er is geen nieuws op dit moment."); ?></p>

            <?php endif; wp_reset_query();  ?>

            </div>
        </div>
    </section>


    <!-- lcie events -->
    <section class="home__who">
        <div class="wrapper">
            <h2><?php pll_e("Events"); ?></h2>
           
            <?php

                $events = new WP_Query(array("post_type" => "events", "posts_per_page" => -1));

            ?>

            <!-- Events grid -->
              <div class="nieuwsgrid">
                <?php if($events->have_posts()): ?>

                    <?php while($events->have_posts()): $events->the_post(); ?>
                        
                        <a href="<?php the_permalink(); ?>" class="nieuwsgrid-cell">
                            <div>
                                <div class="nieuwsgrid-cell-content">
                                    <span class="nieuws--post-date"><?php the_date(); ?></span>
                                    <h3 class="nieuws--post-title"><?php the_title(); ?></h3>
                                    <div class="nieuws--lees-meer">Lees meer</div>
                                </div>
                            </div>
                        </a>
                
                <?php endwhile; ?>

            <?php else: ?>

                <p style="color: gray;"><?php pll_e("Er zijn geen events op dit moment."); ?></p>

            <?php endif; wp_reset_query(); ?>


        </div>
    </section>


    <!-- Partner events  -->
    <section class="home__who partner-events">
        <div class="wrapper">
            <h2><?php pll_e("Partner events"); ?></h2>
        </div>
        <div class="wrapper">
            <?php

                $p_events = new WP_Query(array("post_type" => "partner_events", "posts_per_page" => -1));
            ?>

            <!-- Events grid -->

               <div class="grid offerings__infrastructure__grid">
                <?php if($p_events->have_posts()): ?>

                    <?php while($p_events->have_posts()): $p_events->the_post(); ?>
                        
                

           

                <!-- Grid item -->
                <div class="offerings__infrastructure__grid__col">

                    <svg class="offerings__infrastructure__grid__col__hook-under hook-under hook-light"
                         viewBox="0 0 100 100">
                        <path d="M20,58 L20,0 L0,0 L0,68 L0,78 L78,78 L78,58 L20,58 Z" id="Combined-Shape"></path>
                    </svg>

                    <img src="http://www.production.be/uploads/images/BELCHAM.png" alt="Belcham logo"
                         style="width: 150px">

                    <svg class="offerings__infrastructure__grid__col__hook-up hook-up hook-light" viewBox="0 0 100 100">
                        <path d="M20,58 L20,0 L0,0 L0,68 L0,78 L78,78 L78,58 L20,58 Z" id="Combined-Shape"
                              transform="translate(39.000000, 39.000000) rotate(180.000000) translate(-39.000000, -39.000000) "></path>
                    </svg>

                    <a href="http://www.belcham.org/events"><h3>
                            <?php the_title(); ?></h3></a>
                    <div class="offerings__infrastructure__grid__col__description"><?php the_excerpt(); ?></div>

                    <a href="<?php the_field("url"); ?>" class="offerings__infrastructure__grid__col__plan">Bekijk
                        Belcham events</a>

                </div>

                <?php endwhile; ?>

            <?php else: ?>

                <p style="color: gray;"><?php pll_e("Er zijn geen events op dit moment."); ?></p>

            <?php endif; wp_reset_query(); ?>
     
        </div>
    </section>


<?php get_footer(); ?>