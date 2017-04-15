<?php
 /* INCLUDE ACF PLUGIN */
include_once('advanced-custom-fields/acf.php');
include_once('acf-repeater/acf-repeater.php');

// define( 'ACF_LITE' , true );


/* CUSTOM POST TYPES */

function create_posttypes() {

    register_post_type( 'project',
        array(
            'labels' => array(
                'name' => __( 'Projecten' ),
                'singular_name' => __( 'Project' )
                ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => "dashicons-lightbulb"
            )
        );

        register_field_group(array (
            'id' => 'acf_partners',
            'title' => 'Partners',
            'fields' => array (
                array (
                    'key' => 'field_6094e26ea8b4651314567',
                    'label' => 'Powered by',
                    'name' => 'poweredby',
                    'type' => 'repeater',
                    'sub_fields' => array (
                        array (
                            'key' => 'field_6094e279a8b432312398567',
                            'label' => 'Logo',
                            'name' => 'image',
                            'type' => 'image',
                            'save_format' => 'url'
                            ),
                        array (
                            'key' => 'field_6094e279a8b4622312345567',
                            'label' => 'Url',
                            'name' => 'url',
                            'type' => 'text',
                            ),
                        ),
                    'row_min' => '',
                    'row_limit' => '',
                    'layout' => 'table',
                    'button_label' => 'Nieuwe regel',
                    ),
                array (
                    'key' => 'field_6094e26ea8b465131498',
                    'label' => 'Partnership',
                    'name' => 'partnership',
                    'type' => 'repeater',
                    'sub_fields' => array (
                        array (
                            'key' => 'field_6094e279a8b43231239898',
                            'label' => 'Logo',
                            'name' => 'image',
                            'type' => 'image',
                            'save_format' => 'url'
                            ),
                        array (
                            'key' => 'field_6094e279a8b462231234598',
                            'label' => 'Url',
                            'name' => 'url',
                            'type' => 'text',
                            ),
                        ),
                    'row_min' => '',
                    'row_limit' => '',
                    'layout' => 'table',
                    'button_label' => 'Nieuwe regel',
                    ),
                array (
                    'key' => 'field_6094e26ea8b4651314',
                    'label' => 'Sponsored by',
                    'name' => 'sponsored',
                    'type' => 'repeater',
                    'sub_fields' => array (
                        array (
                            'key' => 'field_6094e279a8b432312398',
                            'label' => 'Logo',
                            'name' => 'image',
                            'type' => 'image',
                            'save_format' => 'url'
                            ),
                        array (
                            'key' => 'field_6094e279a8b4622312345',
                            'label' => 'Url',
                            'name' => 'url',
                            'type' => 'text',
                            ),
                        ),
                    'row_min' => '',
                    'row_limit' => '',
                    'layout' => 'table',
                    'button_label' => 'Nieuwe regel',
                    ),
                ),
            'location' => array (
                array (
                    array (
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-templates/partners-page.php',
                        'order_no' => 0,
                        'group_no' => 0,
                        )
                    ),
                ),
            'options' => array (
                'position' => 'normal',
                'layout' => 'no_box',
                'hide_on_screen' => array (
                    ),
                ),
            'menu_order' => 0,
            ));

}

add_action( 'init', 'create_posttypes' );


    function add_new_menu_items()
    {
        add_menu_page(
            "Site opties",
            "Site opties",
            "manage_options",
            "theme-options",
            "theme_options_page",
            "",
            100
        );

    }

    function theme_options_page()
    {
        ?>
            <div class="wrap">
            <div id="icon-options-general" class="icon32"></div>

            <!-- run the settings_errors() function here. -->
            <?php settings_errors(); ?>
            <h1>Opties</h1>


            <form method="post" action="options.php" enctype="multipart/form-data">
                <?php

                    settings_fields("header_section");

                    do_settings_sections("theme-options");

                    submit_button();

                ?>
            </form>
        </div>
        <?php
    }

    add_action("admin_menu", "add_new_menu_items");

    function display_options()
    {
        add_settings_section("header_section", "Algemene informatie", null , "theme-options");

        add_settings_field("header_logo", "Kleur", "display_logo_form_element", "theme-options", "header_section");
        register_setting("header_section", "header_logo");

        add_settings_field("background_picture", "Afbeelding", "background_form_element", "theme-options", "header_section");
        register_setting("header_section", "background_picture", "handle_file_upload");

        add_settings_field("email", "E-mail", "display_email_form_element", "theme-options", "header_section");
        register_setting("header_section", "email");

        add_settings_field("description", "Beschrijving", "display_description_form_element", "theme-options", "header_section");
        register_setting("header_section", "description");


    }

    function handle_file_upload($option)
    {
      if(!empty($_FILES["background_picture"]["tmp_name"]))
      {
        $urls = wp_handle_upload($_FILES["background_picture"], array('test_form' => FALSE));
        $temp = $urls["url"];
        return $temp;
      }

      return $option;
    }


    function background_form_element()
    {
        ?>
            <input type="file" name="background_picture" id="background_picture" value="<?php echo get_option('background_picture'); ?>" />
            <?php echo get_option("background_picture"); ?>
        <?php
    }

    function display_logo_form_element()
    {
        ?>
            <input type="color" name="header_logo" id="header_logo" value="<?php echo get_option('header_logo'); ?>" />
        <?php
    }

    function display_email_form_element()
    {
        ?>
            <input type="email" name="email" id="email" value="<?php echo get_option('email'); ?>" />
        <?php
    }

    function display_description_form_element()
    {
        ?>
            <textarea name="description" id="description" style="width: 100%; height: 250px;"><?php echo get_option('description'); ?></textarea>
        <?php
    }

    add_action("admin_init", "display_options");




 global $post;
 global $wp_query;
 global $color;

    // $cat_query = new WP_Query( $args );

function my_ajax_pagination() {

    $vars = array(
        'post_type' => "project",
        'date_query' => array(
            array(
                'year'  => $_POST['date']
            ),
        ),
    );

    $data = array();
    $posts = new WP_Query( $vars );
    $GLOBALS['wp_query'] = $posts;


    if( ! $posts->have_posts() ) {
        // get_template_part( 'content', 'none' );
        return false;
    }
    else {
        while ( $posts->have_posts() ) {
            $posts->the_post();
            array_push ( $data, array(get_post(), array("color" => get_field('color'), "logo" => get_field('logo_white'), "photo" => get_field('photo'), "url" => get_permalink())));
        }

        echo json_encode($data);
    }

    die();
}



add_action( 'wp_ajax_nopriv_ajax_pagination', 'my_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'my_ajax_pagination' );




//add post-formats to post_type 'my_custom_post_type'
add_post_type_support( 'project', 'post-formats' );
