<?php
// Template name: Nieuws & events
?>


<?php get_header(); ?>

<?php get_template_part( '/template-parts/page', 'header' ); ?>

<!-- nieuws -->
<section class="page__content">
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
                    <?php 
                        $url = get_field("url");
                        if(!empty($url))
                        {
                            $link = $url;
                        }else{
                            $link = get_the_permalink();
                        }
                    ?>

                    <a href="<?php echo $link; ?>" class="nieuwsgrid-cell" style="background-image: url(<?php the_field("image"); ?>);">
                        <div>
                            <div class="nieuwsgrid__overlay"></div>
                            <div class="nieuwsgrid-cell-content">
                                <span class="nieuws--post-date"><?php echo get_the_date('j/m/Y'); ?></span>
                                <h3 class="nieuws--post-title"><?php the_title(); ?></h3>
                                <div class="nieuws--lees-meer"><?php pll_e("Lees meer"); ?></div>
                            </div>
                        </div>
                    </a>

                <?php endwhile; ?>

            <?php else: ?>

                <p style="color: gray;"><?php pll_e("Er is geen nieuws op dit moment."); ?></p>

            <?php endif; wp_reset_query();  ?>

        </div>

        <h2><?php pll_e("Events"); ?></h2>

        <?php

        $events = new WP_Query(array("post_type" => "events", "posts_per_page" => -1));

        ?>

        <!-- Events grid -->
        <div class="nieuwsgrid">
            <?php if($events->have_posts()): ?>

                <?php while($events->have_posts()): $events->the_post(); ?>
                    <?php $date = get_field("date"); ?> 
                    <?php $date_formatted = new DateTime($date); ?>
                    <?php $now = new DateTime(); ?>
                    <?php if($date_formatted >= $now): ?>
                     <a href="<?php the_permalink(); ?>" class="nieuwsgrid-cell" style="background-image: url(<?php the_field("image"); ?>);">
                        <div>
                            <div class="nieuwsgrid__overlay"></div>
                            <div class="nieuwsgrid-cell-content">
                            
                            <?php if(!empty($date)): ?>
                                <?php $date = new DateTime(get_field("date")); ?>
                                <span class="nieuws--post-date"><?php echo $date->format('j/m/Y'); ?></span>
                            <?php endif; ?>
                                <h3 class="nieuws--post-title"><?php the_title(); ?></h3>
                                <div class="nieuws--lees-meer"><?php pll_e("Meer info"); ?></div>
                            </div>
                        </div>
                    </a>
                <?php $count++; endif; ?>
    
                <?php endwhile; ?>
                <?php if($count == 0): ?>
                    <p style="color: gray;"><?php pll_e("Er zijn geen events op dit moment."); ?></p>
                <?php endif; ?>
            <?php else: ?>

                <p style="color: gray;"><?php pll_e("Er zijn geen events op dit moment."); ?></p>

            <?php endif; wp_reset_query(); ?>


        </div>

        <h2><?php pll_e("Afgelopen evenementen"); ?></h2>

        <?php

        $events = new WP_Query(array("post_type" => "events", "posts_per_page" => -1));

        ?>

        <!-- Events grid -->
        <div class="nieuwsgrid">
            <?php if($events->have_posts()): ?>

                <?php while($events->have_posts()): $events->the_post(); ?>
                    <?php $date = get_field("date"); ?> 
                    <?php $date_formatted = new DateTime($date); ?>
                    <?php $now = new DateTime(); ?>
                    <?php if($date_formatted < $now): ?>
                     <a href="<?php the_permalink(); ?>" class="nieuwsgrid-cell" style="background-image: url(<?php the_field("image"); ?>);">
                        <div>
                            <div class="nieuwsgrid__overlay"></div>
                            <div class="nieuwsgrid-cell-content">
                            
                            <?php if(!empty($date)): ?>
                                <?php $date = new DateTime(get_field("date")); ?>
                                <span class="nieuws--post-date"><?php echo $date->format('j/m/Y'); ?></span>
                            <?php endif; ?>
                                <h3 class="nieuws--post-title"><?php the_title(); ?></h3>
                                <div class="nieuws--lees-meer"><?php pll_e("Meer info"); ?></div>
                            </div>
                        </div>
                    </a>
                <?php $count++; endif; ?>
    
                <?php endwhile; ?>
                <?php if($count == 0): ?>
                    <p style="color: gray;"><?php pll_e("Er zijn geen events afgelopen op dit moment."); ?></p>
                <?php endif; ?>
            <?php else: ?>

                <p style="color: gray;"><?php pll_e("Er zijn geen events afgelopen op dit moment."); ?></p>

            <?php endif; wp_reset_query(); ?>


        </div>
    </div>
</section>

<?php get_footer(); ?>