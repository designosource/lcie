<?php
    // Template name: Zoekpagina
    $args = array(
        "s" => $s,
        "showposts" => 0,
        "post_type" => "any"
    );
    $allsearch =  new WP_Query( $args );  


?>


<?php get_header(); ?>

    <?php get_template_part( '/template-parts/page', 'header' ); ?>

    <section class="content">
        <div class="wrapper">
                
        <?php get_search_form(); ?>
        <?php if ( !empty($s)): ?>

            <article class="search__results__result">
                <h2 class="search__results__title"><?php pll_e( "Zoeken" ); ?></h2>
                <span class="search__results__count"><?php echo count(get_network_posts($args)); ?> <?php pll_e( "resultaten gevonden voor" ); ?> '<?php echo $s;?>'.</span>
            </article>

        <?php endif; ?>


        <?php if ( !empty($s) && count(get_network_posts($args)) > 0 ) : ?>

                <?php get_template_part( 'content', 'search' ); ?>

                 <?php foreach(get_network_posts($args) as $post): ?>

     
                        <article class="search__results__result">
                            
                            <?php 
                                switch ($post->post_type) {
                                    case 'faq':
                                        $type =  pll_e( "FAQ" );
                                        break;
                                    case 'documentatie':
                                        $type =  pll_e( "Documentatie" );
                                        $date = $post->post_date;
                                        break;
                                    case 'team':
                                        $type =  pll_e( "Teams" );
                                        // $date = get_the_date();
                                        break;
                                    default:
                                        $type =  "";
                                        break;
                                }
                            ?>
                            <?php if(!empty($type)): ?>
                                <p class="search__results__result__type"><?php echo $type; ?></p>
                            <?php endif; ?>

                            <a class="search__results__result__title" href="<?php the_permalink(); ?>"> <?php echo $post->post_title; ?></a>
                            <?php if(!empty($date)): ?>
                                <p><span class="search__results__result__date"><?php echo $date; ?> - </span><?php echo $post->post_content; ?></p>
                            <?php else: ?>
                                <p><?php echo $post->post_content; ?></p>
                            <?php endif; ?>
                            

                        </article>
                 

                 <?php endforeach; ?>

        <?php else : ?>

            <p><?php pll_e( "Geen resultaten geveonden voor deze zoekopdracht" ); ?></p>

        <?php endif; ?>
        </div>
    </section>


<?php get_footer(); ?>