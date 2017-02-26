<?php

/* INCLUDE ACF PLUGIN */
include_once('advanced-custom-fields/acf.php');
include_once('acf-repeater/acf-repeater.php');

define( 'ACF_LITE' , true );


add_action( 'admin_menu', 'my_remove_menu_pages' );

function my_remove_menu_pages() {
  remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'edit-comments.php' );          //Comments

};


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
            'menu_icon' => "dashicons-lightbulb"
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
            'menu_icon' => "dashicons-book-alt"
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
            'menu_icon' => "dashicons-groups"
            )
        );

    register_post_type( 'lcie_team',
        array(
            'labels' => array(
                'name' => __( 'Lcie team' ),
                'singular_name' => __( 'Lcie team' )
                ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => "dashicons-welcome-learn-more"
            )
        );

    register_post_type( 'news',
        array(
            'labels' => array(
                'name' => __( 'Nieuws' ),
                'singular_name' => __( 'Nieuws' )
                ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => "dashicons-megaphone"
            )
        );

    register_post_type( 'events',
        array(
            'labels' => array(
                'name' => __( 'Events' ),
                'singular_name' => __( 'Events' )
                ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => "dashicons-calendar-alt"
            )
        );

}

add_action( 'init', 'create_posttypes' );







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
                'name' => 'stats',
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
                    array (
                        'key' => 'field_5894e279a8b44',
                        'label' => 'Tekst',
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
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Nieuwe regel',
                ),
             array (
                'key' => 'field_5894e26ea8b4234',
                'label' => 'Ervaringen',
                'name' => 'testmonials',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_5894e279a8b4334',
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
                        'key' => 'field_5894e279a8b4434',
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
                        'key' => 'field_5894e279a8b4534',
                        'label' => 'Tekst',
                        'name' => 'text',
                        'type' => 'wysiwyg',
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
                'button_label' => 'Nieuwe ervaring',
                ),
             array (
                'key' => 'field_58a88fb5adc9e23',
                'label' => 'Kalender - Titel',
                'name' => 'calendar_title',
                'type' => 'text',
                ),
             array (
                'key' => 'field_58a88fb5adc9e24',
                'label' => 'Kalender - Tekst',
                'name' => 'calendar_text',
                'type' => 'text',
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
            array (
            'key' => 'field_5889203de3ac7',
            'label' => 'Subtitel',
            'name' => 'subtitle',
            'type' => 'text',
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
        'key' => 'field_588a6a8eb5fa2',
        'label' => 'Logo',
        'name' => 'logo',
        'type' => 'image',
        'save_format' => 'url',
        ),
       array (
        'key' => 'field_588a6a8eb5fa10',
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

register_field_group(array (
    'id' => 'acf_for',
    'title' => 'For-Page',
    'fields' => array (
        array (
            'key' => 'field_6094e26ea8b42',
            'label' => 'Tekstbalonnen',
            'name' => 'bubbles',
            'type' => 'repeater',
            'sub_fields' => array (
                array (
                    'key' => 'field_6094e279a8b43',
                    'label' => 'Link',
                    'name' => 'link',
                    'type' => 'page_link',
                    'column_width' => '',
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'html',
                    'maxlength' => '',
                    ),
                array (
                    'key' => 'field_6094e279a8b44',
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
                ),
            'row_min' => '',
            'row_limit' => '',
            'layout' => 'table',
            'button_label' => 'Nieuwe regel',
            ),
            array (
            'key' => 'field_6094e26ea8b465',
            'label' => 'Wat wij aanbieden',
            'name' => 'offer',
            'type' => 'repeater',
            'sub_fields' => array (
                array (
                    'key' => 'field_6094e279a8b4323',
                    'label' => 'Afbeelding',
                    'name' => 'image',
                    'type' => 'image',
                    'save_format' => 'url'
                    ),
                array (
                    'key' => 'field_6094e279a8b44243',
                    'label' => 'Tekst - Afbeelding',
                    'name' => 'image_text',
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
                    'key' => 'field_6094e279a8b45233',
                    'label' => 'Kleur - Afbeelding',
                    'name' => 'image_color',
                    'type' => 'color_picker',
                    ),
                array (
                    'key' => 'field_6094e279a8b46223',
                    'label' => 'Tekst',
                    'name' => 'full_text',
                    'type' => 'wysiwyg',
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
                'value' => 'page-templates/for-page.php',
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
        'id' => 'acf_offerings',
        'title' => 'Offerings',
        'fields' => array (

            array (
                'key' => 'field_588915bfd41fb3',
                'label' => 'Team - Tekst',
                'name' => 'team_text',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array (
                'key' => 'field_58865607956cc2',
                'label' => 'Team',
                'name' => 'team',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_51287a66882ce6',
                        'label' => 'Foto',
                        'name' => 'photo',
                        'type' => 'image',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_51287a66882ce7',
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
                        'key' => 'field_51287a66f82ce8',
                        'label' => 'Functie',
                        'name' => 'function',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_51287a66f82ce9',
                        'label' => 'Email',
                        'name' => 'email',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => 0,
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Nieuwe regel',
            ),
            array (
                'key' => 'field_588915bfd41fb',
                'label' => 'Infrastructuur - Tekst',
                'name' => 'infrastructure_text',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array (
                'key' => 'field_58865607956cc',
                'label' => 'Infrastructuur',
                'name' => 'infrastructure',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_5886561f956cd',
                        'label' => 'Plaats',
                        'name' => 'place',
                        'type' => 'google_map',
                        'column_width' => '',
                        'center_lat' => '',
                        'center_lng' => '',
                        'zoom' => '',
                        'height' => '',
                    ),
                    array (
                        'key' => 'field_5887a66882ce7',
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
                        'key' => 'field_5887a66f82ce8',
                        'label' => 'Beschrijving',
                        'name' => 'description',
                        'type' => 'textarea',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'rows' => '',
                        'formatting' => 'br',
                    ),
                ),
                'row_min' => 0,
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
        'id' => 'acf_lcie-team',
        'title' => 'Lcie team',
        'fields' => array (
            array (
                'key' => 'field_58b1f7d78abec',
                'label' => 'Foto',
                'name' => 'photo',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_58b1f7ef8abed',
                'label' => 'Team',
                'name' => 'team',
                'type' => 'checkbox',
                'required' => 1,
                'choices' => array (
                    'core_team' => 'Core team',
                    'bestuursteam' => 'Bestuursteam',
                ),
                'default_value' => '',
                'layout' => 'vertical',
            ),
            array (
                'key' => 'field_58b1fbce8abee',
                'label' => 'Functie',
                'name' => 'function',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_58b1fbd78abef',
                'label' => 'E-mail',
                'name' => 'email',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_58b1fbe08abf0',
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
                'key' => 'field_58b1fbe58abf1',
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
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'lcie_team',
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
                1 => 'the_content',
                2 => 'excerpt',
                3 => 'custom_fields',
                4 => 'discussion',
                5 => 'comments',
                6 => 'revisions',
                7 => 'slug',
                8 => 'author',
                9 => 'format',
                10 => 'featured_image',
                11 => 'categories',
                12 => 'tags',
                13 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));


}

/* GOOGLE MAPS API KEY FOR CUSTOM FIELDS */

function my_acf_google_map_api( $api ){

    $api['key'] = 'AIzaSyB63fCe88g51K6K3DUht0ksGtCetjS_WCI';

    return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

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

