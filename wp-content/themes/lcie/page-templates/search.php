<?php
// Template name: Search-page
?>


<?php get_header(); ?>


    <section class="page__top">
        <div class="wrapper">
            <h1 class="page__top__title">Zoeken</h1>
            <h2 class="page__top__subtitle">Niet gevonden wat je zoekt? Probeer het hier!</h2>
        </div>
    </section>



    <section class="search__form">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <?php get_search_form(); ?>

            </main>
        </div>
    </section>


<?php get_footer(); ?>