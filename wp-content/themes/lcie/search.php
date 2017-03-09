<?php
    if(!empty($s)): 
        $args = array(  
            "s" => $s,
            "showposts" => 0,
            "post_type" => "any"
        );
        $allsearch =  new WP_Query( $args );  
    endif; 
?>


<?php get_header(); ?>

    <section class="page__top">
        <div class="wrapper">
            <h1 class="page__top__title"><?php pll_e( "Zoeken" ); ?></h1>
            <h2 class="page__top__subtitle"><?php pll_e( "Niet gevonden wat u zocht?" ); ?></h2>
        </div>
    </section>



    <section class="content">
        <div class="wrapper">
                
        <?php get_search_form(); ?>
        <article class="search__results__result">
            <h2 class="search__results__title"><?php pll_e( "Zoekresultaten" ); ?></h2>
            <span class="search__results__count"><?php echo count(get_network_posts($args)); ?> <?php pll_e( "resultaten gevonden voor" ); ?> '<?php echo $s;?>'.</span>
        </article>


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
                                <p><span class="search__results__result__date"><?php echo $date; ?> - </span><?php $more_text = ''; if(strlen($post_content) > 250){ $more_text = '...'; } echo substr($post->post_content, 0, 250) . $more_text; ?></p>
                            <?php else: ?>
                                <p><?php if(strlen($post->post_content) >250 ){ $more_text = '...'; }else{ $more_text = '';} echo substr($post->post_content, 0 , 250) . $more_text; ?></p>
                            <?php endif; ?>
                            

                        </article>
                 

                 <?php endforeach; ?>

        <?php else : ?>

            <?php get_template_part( 'no-results', 'search' ); ?>

        <?php endif; ?>
        </div>
    </section>


<?php get_footer(); ?>