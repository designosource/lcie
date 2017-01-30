<?php
$allsearch =  new WP_Query("s=$s&showposts=0");
?>


<?php get_header(); ?>

    <section class="page__top">
        <div class="wrapper">
            <h1 class="page__top__title">Zoeken</h1>
            <h2 class="page__top__subtitle">Niet gevonden wat je zoekt? Probeer het hier!</h2>
        </div>
    </section>


    <section class="search__form search__results">

                <?php get_search_form(); ?>

        <h2 class="search__results__title">Zoekresultaten</h2>
        <span class="search__results__count"><?php echo $allsearch->found_posts; ?> resultaten gevonden voor '<?php echo $s;?>'.</span>
        <hr>


        <?php if ( have_posts() ) : ?>

                <?php get_template_part( 'content', 'search' ); ?>

                <?php foreach ($allsearch->posts as $blogpost): ?>

                    <?php if($blogpost->post_status === "publish"): ?>
                        <article>
                            <!--<span class="search__results__subject"><?php echo ucfirst($blogpost->post_name); ?></span>-->
                            <h3><a href="<?php echo $blogpost->guid; ?>"><?php echo $blogpost->post_title; ?></a></h3>
                            <p><?php echo strtolower(date("d M Y", strtotime($blogpost->post_date))) . ' - ' . substr($blogpost->post_content, 0, 200) . '...'; ?></p>
                            <hr>
                        </article>
                    <?php endif; ?>

                <?php endforeach; ?>

        <?php else : ?>

            <?php get_template_part( 'no-results', 'search' ); ?>

        <?php endif; ?>

    </section>


<?php get_footer(); ?>