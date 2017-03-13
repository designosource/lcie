<?php
// Template name: Homepage
?>


<?php get_header(); ?>
    <section class="home__hero">
        <div class="home__hero__overlay"></div>
        <div class="wrapper">
            <div class="home__hero__content">
                <h1 class="home__hero__title">Lcie</h1>
                <p class="home__hero__text"><?php pll_e("De Leuven Community for Innovation driven Entrepreneurship is er voor al jouw vragen rond ondernemingszin, zowel voor studenten, onderzoekers, professoren en alumni van de KU Leuven."); ?></p>
                <a href="<?php echo site_url(); ?>/sluit-je-aan"
                   class="button button--ghost"><?php pll_e("Sluit je aan"); ?></a>
            </div>
        </div>
    </section>

    <section class="home__who">
        <div class="wrapper">
            <h1><?php pll_e("Voor wie?"); ?></h1>
        </div>
        <div class="grid home__who__grid">
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                <?php if (have_rows('lcie_for')): while (have_rows('lcie_for')) : the_row(); ?>

                    <div href="<?php the_sub_field("url"); ?>" class="home__who__grid__col"
                         style="background-image: url(<?php the_sub_field("image"); ?>)">

                        <a href="<?php the_sub_field("url"); ?>">

                            <a style="display: block;padding: 90px 0" href="<?php the_sub_field("url"); ?>">Lcie
                                voor <?php the_sub_field("text"); ?></a>
                            <div class="home__who__grid__col__overlay"
                                 style="background-color: <?php the_sub_field("color"); ?>">
                            </div>

                        </a>


                    </div>

                <?php endwhile; endif; ?>

            <?php endwhile; endif; ?>
        </div>
    </section>

    <section class="home__teams">
        <div class="wrapper">
            <h1><?php pll_e("Teams"); ?></h1>
            <a href="<?php echo site_url(); ?>/teams"
               class="button home__teams__all"><?php pll_e("Bekijk alle teams"); ?></a>
        </div>
        <div class="grid home__teams__grid">
            <?php $query = new WP_Query(array('post_type' => "team")); ?>
            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <?php if (get_field("featured")): ?>
                    <a href="<?php the_permalink(); ?>" class="home__teams__grid__col"
                       style="background-image: url(<?php the_field("image"); ?>);">
                        <img src="<?php the_field("logo_white"); ?>" alt="" class="home__teams__grid__col__logo">
                        <div class="home__teams__grid__col__overlay"
                             style="background-color: <?php the_field("color"); ?>"></div>
                        <h2 class="home__teams__grid__col__text">
                            <div class="wrapper"> <?php the_content(); ?></div>
                        </h2>
                        <span class="home__teams__grid__col__readmore"><?php pll_e("lees meer"); ?></span>
                    </a>
                <?php endif; ?>
            <?php endwhile; endif; ?>
        </div>
        <div class="wrapper">

            <div class="swiper-container home__teams__grid-small">
                <div class="swiper-wrapper">

                    <?php $query = new WP_Query(array('post_type' => "team")); ?>
                    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                        <?php if (!get_field("featured")): ?>
                            <div class="swiper-slide home__teams__grid-small__slide">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php the_field("logo_white"); ?>" alt=""
                                         class="home__teams__grid-small__logo">
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; endif; ?>

                </div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>
    <section class="home__testmonials">
        <div class="wrapper">
            <h1><?php pll_e("Ervaringen"); ?></h1>
            <svg class="hook-under" viewBox="0 0 100 100">
                <path d="M20,58 L20,0 L0,0 L0,68 L0,78 L78,78 L78,58 L20,58 Z" id="Combined-Shape"></path>
            </svg>

            <svg class="hook-up" viewBox="0 0 100 100">
                <path d="M20,58 L20,0 L0,0 L0,68 L0,78 L78,78 L78,58 L20,58 Z" id="Combined-Shape"
                      transform="translate(39.000000, 39.000000) rotate(180.000000) translate(-39.000000, -39.000000) "></path>
            </svg>

            <div class="swiper-container home__testmonials__slider">

                <div class="swiper-wrapper">
                    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                        <?php if (have_rows('testmonials')): while (have_rows('testmonials')) : the_row(); ?>

                            <div class="swiper-slide home__testmonials__slide">
                                <span class="home__testmonials__slide__name"><?php the_sub_field("name"); ?></span>
                                <span class="home__testmonials__slide__function"><?php the_sub_field("function"); ?></span>
                                <div class="home__testmonials__slide__text"><?php the_sub_field("text"); ?></div>
                            </div>

                        <?php endwhile; endif; ?>
                    <?php endwhile; endif; ?>
                </div>

                <div class="swiper-pagination"></div>

            </div>

        </div>
    </section>
    <section class="home__divisions">
        <div class="wrapper">
            <h1><?php pll_e("Community Initiatieven"); ?></h1>
        </div>

        <div class="grid home__divisions__grid">

            <?php foreach (get_sites(array("offset" => 1)) as $site): ?>

                <?php switch_to_blog($site->blog_id); ?>

                <div class="home__divisions__grid__col"
                     style="background-image: url(<?php echo get_option("background_picture"); ?>)">

                    <h2 class="home__divisions__grid__col__title"><?php echo $site->blogname; ?></h2>
                    <span class="home__divisions__grid__col__description"><?php echo get_option("description"); ?></span>
                    <a class="home__divisions__grid__col__readmore"
                       href="<?php echo site_url(); ?>"><?php pll_e("lees meer"); ?></a>
                    <a  href="<?php echo site_url(); ?>" class="home__divisions__grid__col__overlay"
                         style="background-color: <?php echo get_option("header_logo"); ?>"></a>

                </div>

                <?php restore_current_blog(); endforeach; ?>

        </div>
    </section>

    <section class="home__facts">
        <div class="wrapper">
            <h1><?php pll_e("Lcie in cijfers"); ?></h1>
        </div>
        <div class="grid home__facts__grid">
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                <?php if (have_rows('stats')): while (have_rows('stats')) : the_row(); ?>

                    <div class="home__facts__col">
                        <span class="home__facts__col__number"><?php the_sub_field('number'); ?></span>
                        <span class="home__facts__col__description"><?php the_sub_field('description'); ?></span>
                    </div>

                <?php endwhile; endif; ?>
            <?php endwhile; endif; ?>

        </div>
    </section>


    <section class="home__calendar">
        <div class="wrapper">
            <h1><?php pll_e("Kalender"); ?></h1>
            <a href="../nieuws-events" class="button home__calendar__all"><?php pll_e("Bekijk alle events"); ?></a>
        </div>
            <div class="grid">
                <div class="home__calendar__side">
                    <div>
                        <!--<h2 class="home__calendar__side__title"><?php the_field("calendar_title"); ?></h2>
                        <p class="home__calendar__side__text"><?php the_field("calendar_text"); ?></p>
                        <a href="" class="home__calendar__side__more"><?php pll_e("meer info"); ?></a>-->

                        <h2 class="home__calendar__side__title">Lcie events bijwonen</h2>
                        <p class="home__calendar__side__text">Lcie organiseert interessante events die je ondernemingszin aanwakkeren.</p>
                        <a href="../nieuws-events" class="home__calendar__side__more">Meer info</a>
                    </div>
                </div>
                <div class="home__calendar__photo"
                     style="background-image: url(<?php the_field("calendar_photo"); ?>)"></div>
            </div>

    </section>


<?php get_footer(); ?>
