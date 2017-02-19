<?php

/* INCLUDE ACF PLUGIN */
include_once('advanced-custom-fields/acf.php');
include_once('acf-repeater/acf-repeater.php');

define( 'ACF_LITE' , true );



/* CUSTOM POST TYPES */

function create_posttypes() {

    register_post_type( 'faq',
        array(
            'labels' => array(
                'name' => __( 'FAQ' ),
                'singular_name' => __( 'FAQ' )
            ),
            'public' => true,
            'has_archive' => true,
        )
    );

    register_post_type( 'documentatie',
        array(
            'labels' => array(
                'name' => __( 'Documentatie' ),
                'singular_name' => __( 'Documentatie' )
            ),
            'public' => true,
            'has_archive' => false,
        )
    );

    register_post_type( 'team',
        array(
            'labels' => array(
                'name' => __( 'Teams' ),
                'singular_name' => __( 'Teams' )
            ),
            'public' => true,
            'has_archive' => false,
        )
    );

}

add_action( 'init', 'create_posttypes' );



/* GOOGLE MAPS API KEY FOR CUSTOM FIELDS */

function my_acf_google_map_api( $api ){

    $api['key'] = 'AIzaSyB63fCe88g51K6K3DUht0ksGtCetjS_WCI';

    return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');



/* CUSTOM FIELDS */

if(function_exists("register_field_group"))
{

    register_field_group(array (
        'id' => 'acf_contact',
        'title' => 'Contact',
        'fields' => array (
            array (
                'key' => 'field_58a8a83ef9aa6',
                'label' => 'Locaties',
                'name' => 'contact_locations',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_58a8a8ef284be',
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
                        'key' => 'field_58a8aa318a579',
                        'label' => 'Adres',
                        'name' => 'address',
                        'type' => 'textarea',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'rows' => '',
                        'formatting' => 'br',
                        ),
                    array (
                        'key' => 'field_58a8a871f9aa8',
                        'label' => 'E-mail',
                        'name' => 'email',
                        'type' => 'email',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        ),
                    ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Nieuwe locatie',
                ),
            ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/contact-page.php',
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
        'id' => 'acf_documentatie',
        'title' => 'Documentatie',
        'fields' => array (
            array (
                'key' => 'field_58a8b7ca78b1e',
                'label' => 'Type',
                'name' => 'type',
                'type' => 'select',
                'required' => 1,
                'choices' => array (
                    'case_studies' => 'Case studies',
                    'videos' => 'Video\'s',
                    'presentaties' => 'Presentaties',
                    'templates' => 'Templates',
                    ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
                ),
            array (
                'key' => 'field_5883c4aa5397b',
                'label' => 'Bestand',
                'name' => 'file',
                'type' => 'file',
                'required' => 1,
                'save_format' => 'url',
                'library' => 'all',
                ),
            ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'documentatie',
                    'order_no' => 0,
                    'group_no' => 0,
                    ),
                ),
            ),
        'options' => array (
            'position' => 'acf_after_title',
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
                'key' => 'field_58a891f4269c1',
                'label' => 'Lcie voor',
                'name' => 'lcie_for',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_58a891ff269c2',
                        'label' => 'Afbeelding',
                        'name' => 'image',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        ),
                    array (
                        'key' => 'field_58a89224269c4',
                        'label' => 'Tekst',
                        'name' => 'text',
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
                        'key' => 'field_58a8920a269c3',
                        'label' => 'Pagina',
                        'name' => 'url',
                        'type' => 'page_link',
                        'required' => 1,
                        'column_width' => '',
                        'post_type' => array (
                            0 => 'page',
                            ),
                        'allow_null' => 0,
                        'multiple' => 0,
                        ),
                    array (
                        'key' => 'field_58a8937b2d4c0',
                        'label' => 'Kleur',
                        'name' => 'color',
                        'type' => 'color_picker',
                        'column_width' => '',
                        'default_value' => '#003E77',
                        ),
                    ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Nieuw',
                ),
            array (
                'key' => 'field_5894e26ea8b42',
                'label' => 'Cijfers',
                'name' => 'numbers',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_5894e279a8b43',
                        'label' => 'Getal',
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
                    ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Nieuwe regel',
                ),
            array (
                'key' => 'field_58a88fb5adc9e',
                'label' => 'Kalender - Foto',
                'name' => 'calendar_photo',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
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
    'id' => 'acf_offerings',
    'title' => 'Offerings',
    'fields' => array (
        array (
            'key' => 'field_588915bfd41fb',
            'label' => 'Infrastructuur - Tekst',
            'name' => 'infrastructure_text',
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
                'value' => 'page-templates/offerings-page.php',
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
    'id' => 'acf_page',
    'title' => 'Page',
    'fields' => array (
        array (
            'key' => 'field_5889203de3ac5',
            'label' => 'Headerafbeelding',
            'name' => 'header_image',
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
                'value' => 'page',
                'order_no' => 0,
                'group_no' => 0,
                ),
            array (
                'param' => 'page',
                'operator' => '!=',
                'value' => '12',
                'order_no' => 1,
                'group_no' => 0,
                ),
            ),
        ),
    'options' => array (
        'position' => 'acf_after_title',
        'layout' => 'no_box',
        'hide_on_screen' => array (
            ),
        ),
    'menu_order' => 0,
    ));
register_field_group(array (
    'id' => 'acf_teams',
    'title' => 'Teams',
    'fields' => array (
         array (
            'key' => 'field_588a6a8eb5fa4',
            'label' => 'Uitgelicht',
            'name' => 'featured',
            'type' => 'true_false',
            ),
        array (
            'key' => 'field_588a6a8eb5fa5',
            'label' => 'Logo',
            'name' => 'logo',
            'type' => 'image',
            'save_format' => 'url',
            ),
        array (
            'key' => 'field_588a6a8eb5fa51',
            'label' => 'Logo - witte versie',
            'name' => 'logo_white',
            'type' => 'image',
            'save_format' => 'url',
            ),
        array (
            'key' => 'field_588a6a8eb5fa6',
            'label' => 'Kleur',
            'name' => 'color',
            'type' => 'color_picker',
            ),
        array (
            'key' => 'field_588a6a8eb5fa7',
            'label' => 'Afbeelding',
            'name' => 'image',
            'type' => 'image',
            'save_format' => 'url',
            ),
        array (
            'key' => 'field_588a6a8eb5fa12',
            'label' => 'Facebook',
            'name' => 'facebook',
            'type' => 'text',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
            ),
        array (
            'key' => 'field_588a6a8eb5fa13',
            'label' => 'Twitter',
            'name' => 'twitter',
            'type' => 'text',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
            ),
        array (
            'key' => 'field_588a6a8eb5fa14',
            'label' => 'Youtube',
            'name' => 'youtube',
            'type' => 'text',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
            ),
        array (
            'key' => 'field_588a6a8eb5fa8',
            'label' => 'LinkedIn',
            'name' => 'linkedin',
            'type' => 'text',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
            ),
        array (
            'key' => 'field_588a6a8eb5fa15',
            'label' => 'Website',
            'name' => 'website',
            'type' => 'text',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
            ),
        ),
    'location' => array (
        array (
            array (
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'team',
                'order_no' => 0,
                'group_no' => 0,
                ),
            ),
        ),
    'options' => array (
        'position' => 'normal',
        'layout' => 'no_box',
        'hide_on_screen' => array (
            0 => 'permalink',
            1 => 'discussion',
            2 => 'comments',
            3 => 'revisions',
            4 => 'slug',
            5 => 'author',
            6 => 'featured_image',
            7 => 'categories',
            8 => 'tags',
            9 => 'send-trackbacks',
            ),
        ),
    'menu_order' => 0,
    ));
}


function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Hoofdnavigatie' ),
      'sub-menu' => __( 'Subnavigatie' ),
      'footer-menu' => __( 'Footer navigatie' )
      )
    );
}


function get_network_posts($args)
{

    $posts = array();

    $original_blog_id = get_current_blog_id(); 

    $bids = get_sites();

    foreach( $bids as $bid )
    {

        switch_to_blog( $bid->blog_id ); 

        $allsearch =  new WP_Query( $args );

        while($allsearch->have_posts()): $allsearch->the_post();

        array_push($posts, get_post());

        endwhile; 

        restore_current_blog();
    }

    return $posts; 

}

add_action( 'init', 'register_my_menus' );



/* CONTACT PAGE - SEND FORM WITH AJAX */

add_action('wp_ajax_send_contact_form','sendForm');
function sendForm(){

    $name = $_POST["contact_name"];
    $email = $_POST["contact_email"];
    $to = $_POST["contact_who"];
    $type = $_POST["contact_type"];
    $message = $_POST["contact_message"];

    if(!empty($name) && !empty($email) && !empty($message)){

        $subject = "Nieuw bericht via lcie.be";

        $message = "
        <html>
        <head>
            <title>Nieuw bericht via lcie.be</title>
        </head>
        <body>
            <p>Naam: ".$name."</p>
            <p>Email: ".$email."</p>
            <p>Type: ".$type."</p>
            <p>Bericht:</p>
            <p>".$message."</p>
        </body>
        </html>
        ";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <'.$email.'>' . "\r\n";

        mail($to,$subject,$message,$headers);

        echo true;

    }else{
        echo false;
    }

    die();

}


/* DOCS PAGE - FILTER DOCS */

add_action('wp_ajax_filterDocumentation','filterDocumentation');
function filterDocumentation(){

    $args = array(

        "post_type" => "documentatie",
        "meta_key" => "type",
        "meta_value" => $_POST["type"]

        );

    $query = new WP_Query($args);

    if($query->have_posts()): 

        while($query->have_posts()): $query->the_post();

    echo '<div class="documentation__article__item"><h2>'.get_the_title().'</h2><p>'.get_the_content().'</p><a href="'.get_field("file") . '">Download</a></div>';


    endwhile; 

    else:

        echo false;

    endif;

    die();

}


