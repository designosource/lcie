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
}

add_action( 'init', 'create_posttypes' );

if(function_exists("register_field_group"))
{
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
 register_field_group(array (
            'id' => 'acf_home',
            'title' => 'Home',
            'fields' => array (
                array (
                    'key' => 'field_6094e26ea8b46513145672324',
                    'label' => 'Content blocks',
                    'name' => 'content-blocks',
                    'type' => 'repeater',
                    'sub_fields' => array (
                        array (
                            'key' => 'field_6094e279a8b432312398562324427',
                            'label' => 'Titel',
                            'name' => 'title',
                            'type' => 'text'
                            ),
                        array (
                            'key' => 'field_6094e279a8b46223122424525345567',
                            'label' => 'Content',
                            'name' => 'content',
                            'type' => 'wysiwyg',
                            ),
                        ),
                    'row_min' => '',
                    'row_limit' => '',
                    'layout' => 'table',
                    'button_label' => 'Nieuw blok',
                    ),
              
                ),
            'location' => array (
                array (
                    array (
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-templates/home-page.php',
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
 
    register_field_group(array (
        'id' => 'acf_aanbod',
        'title' => 'Aanbod',
        'fields' => array (
            array (
                'key' => 'field_587fcaf14d21f',
                'label' => 'Waarden',
                'name' => 'values',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/offer-page.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
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
    register_field_group(array (
        'id' => 'acf_homepage',
        'title' => 'Homepage',
        'fields' => array (
            array (
                'key' => 'field_587fc1b6b4e48',
                'label' => 'Ervaringen',
                'name' => 'testmonials',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_587fc1c2b4e49',
                        'label' => 'Naam',
                        'name' => 'name',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_587fc1ceb4e4a',
                        'label' => 'Functie',
                        'name' => 'function',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_587fc1d6b4e4b',
                        'label' => 'Ervaring',
                        'name' => 'text',
                        'type' => 'wysiwyg',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                ),
                'row_min' => 0,
                'row_limit' => 5,
                'layout' => 'row',
                'button_label' => 'Nieuwe ervaring',
            ),
            array (
                'key' => 'field_587f7dfc7166e',
                'label' => 'Cijfers',
                'name' => 'numbers',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_587f7e057166f',
                        'label' => 'Cijfer',
                        'name' => 'number',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_587f7e1471670',
                        'label' => 'Beschrijving',
                        'name' => 'description',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => 0,
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Nieuw cijfer',
            ),
            array (
                'key' => 'field_587fc20e391fe',
                'label' => 'Inbedding',
                'name' => 'lcie_text',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array (
                'key' => 'field_587f7a2eb7cef',
                'label' => 'Partners',
                'name' => 'partners',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_587f7a51b7cf0',
                        'label' => 'Logo',
                        'name' => 'logo',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                ),
                'row_min' => 0,
                'row_limit' => 6,
                'layout' => 'row',
                'button_label' => 'Nieuwe partner',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/home-page.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
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
    register_field_group(array (
        'id' => 'acf_projecten',
        'title' => 'Projecten',
        'fields' => array (
            array (
                'key' => 'field_58810253a8ce6',
                'label' => 'Logo',
                'name' => 'logo',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_5911969fefb41',
                'label' => 'Logo - witte versie',
                'name' => 'logo_white',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_58810260a8ce7',
                'label' => 'Kleur',
                'name' => 'color',
                'type' => 'color_picker',
                'default_value' => '',
            ),
            array (
                'key' => 'field_58810d150a920',
                'label' => 'Foto',
                'name' => 'photo',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'project',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
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
    register_field_group(array (
        'id' => 'acf_standaard-pagina',
        'title' => 'Standaard pagina',
        'fields' => array (
            array (
                'key' => 'field_59119ad99db28',
                'label' => 'Content blocks',
                'name' => 'content_blocks',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_59119af19db29',
                        'label' => 'Titel',
                        'name' => 'title',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_59119af89db2a',
                        'label' => 'Content',
                        'name' => 'content',
                        'type' => 'wysiwyg',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Nieuw blok',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'default',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
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
    register_field_group(array (
        'id' => 'acf_wie-zijn-we',
        'title' => 'Wie zijn we?',
        'fields' => array (
            array (
                'key' => 'field_587fd2ab6cb0d',
                'label' => 'Team',
                'name' => 'team',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_587fd2b66cb0e',
                        'label' => 'Foto',
                        'name' => 'photo',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_587fd2d16cb0f',
                        'label' => 'Naam',
                        'name' => 'name',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_587fd2eb6cb10',
                        'label' => 'E-mail',
                        'name' => 'email',
                        'type' => 'email',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                    ),
                    array (
                        'key' => 'field_587fd56f6cb11',
                        'label' => 'Functie',
                        'name' => 'function',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_587fd68b646b1',
                        'label' => 'LinkedIn (url)',
                        'name' => 'linkedin',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_587fd69b646b2',
                        'label' => 'Twitter (url)',
                        'name' => 'twitter',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => 0,
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Nieuw teamlid',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/who-page.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
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
