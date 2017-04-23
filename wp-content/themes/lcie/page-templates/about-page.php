<?php

// Template name: About-Page

$core = array();
$other = array();

$query = new WP_Query(array('post_type' => "lcie_team"));

if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

    $member = array();
    $member["name"] = get_the_title();
    $member["photo"] = get_field("photo");
    $member["function"] = get_field("function");
    $member["email"] = get_field("email");
    $member["twitter"] = get_field("twitter");
    $member["linkedin"] = get_field("linkedin");

    foreach (get_field("team") as $value):

        if ($value == "core_team") {

            array_push($core, $member);

        } else {

            array_push($other, $member);

        }

    endforeach;

endwhile; endif;

wp_reset_query();

?>


<?php get_header(); ?>

<?php get_template_part('/template-parts/page', 'header'); ?>

<section class="page__content">
    <div class="wrapper wrapper_full_text">

        <div class="about__container">

            <nav class="offerings__sidebar">

                <ul>
                    <li class="offerings__sidebar__active"><?php pll_e("Over ons"); ?></li>
                    <?php

                    $custom_terms = get_terms('groups');

                    foreach ($custom_terms as $custom_term) {
                        echo '<li><a href="#' . $custom_term->slug . '">' . $custom_term->name . '</a></li>';
                    }
                    ?>
                </ul>

            </nav>

            <div class="offerings__content">


                <?php if (have_posts()) : while (have_posts()) : the_post();
                    the_content();
                endwhile; ?>
                    <?php wp_reset_query(); ?>
                <?php endif; ?>

                <?php

                $custom_terms = get_terms('groups');

                foreach ($custom_terms as $custom_term) {
                    wp_reset_query();
                    $args = array('post_type' => 'lcie_team',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'groups',
                                'field' => 'slug',
                                'terms' => $custom_term->slug,
                            ),
                        ),
                    );

                    $loop = new WP_Query($args);
                    if ($loop->have_posts()) {
                        echo '<h1 id="' . $custom_term->slug . '">' . $custom_term->name . '</h1>';
                        echo '<div class="offerings__team__grid grid">';

                        while ($loop->have_posts()) : $loop->the_post(); ?>
                            <div class="offerings__team__grid__col">
                                <div class="grid">
                                    <div class="offerings__team__grid__col__photo"
                                         style="background-image: url(<?php the_field("photo"); ?>)"></div>
                                    <div class="offerings__team__grid__col__details">
                                        <span class="offerings__team__grid__col__details__name"><?php the_title(); ?></span>
                                        <span class="offerings__team__grid__col__details__function"><?php the_field("function"); ?></span>

                                        <div class="offerings__team__grid__col__details__contact">
                                            <a href="mailto:<?php echo antispambot(get_field("email")); ?>" class="offerings__team__grid__col__details__contact__mail"><?php the_field("email"); ?></a><br/>
                                            <?php if(!empty(get_field('linkedin'))): ?>
                                                <a class="offerings__team__grid__col__details__contact__social__icon--linkedin" href="<?php the_field('linkedin'); ?>"></a>
                                            <?php endif; ?>
                                            <?php if(!empty(get_field('twitter'))): ?>
                                                <a class="offerings__team__grid__col__details__contact__social__icon--twitter" href="<?php the_field('twitter'); ?>"></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                    }

                    echo "</div>";
                }

                ?>
            </div>
        </div>

</section>


<?php get_footer(); ?>
