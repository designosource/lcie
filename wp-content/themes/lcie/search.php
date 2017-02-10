<?php

    $args = array(
        "s" => $s,
        "showposts" => 0,
        "post_type" => "any"
    );
    $allsearch =  new WP_Query( $args );  
?>


<?php get_header(); ?>

    <section class="page__top">
        <div class="wrapper">
            <h1 class="page__top__title">Zoeken</h1>
            <h2 class="page__top__subtitle">Niet gevonden wat je zoekt? Probeer het hier!</h2>
        </div>
    </section>



    <section class="content">
        <div class="wrapper">
                
        <?php get_search_form(); ?>
        <article class="search__results__result">
            <h2 class="search__results__title">Zoekresultaten</h2>
            <span class="search__results__count"><?php echo count(get_network_posts($args)); ?> resultaten gevonden voor '<?php echo $s;?>'.</span>
        </article>


        <?php if ( count(get_network_posts($args)) > 0 ) : ?>

                <?php get_template_part( 'content', 'search' ); ?>

                 <?php foreach(get_network_posts($args) as $post): ?>

     
                        <article class="search__results__result">
                            
                            <?php 
                                switch ($post->post_type) {
                                    case 'faq':
                                        $type =  "FAQ";
                                        break;
                                    case 'documentatie':
                                        $type =  "Documentatie";
                                        $date = $post->post_date;
                                        break;
                                    case 'team':
                                        $type =  "Teams";
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

            <?php get_template_part( 'no-results', 'search' ); ?>

        <?php endif; ?>
        </div>
    </section>


<?php get_footer(); ?>