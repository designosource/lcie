<?php
    function add_new_menu_items()
    {
        add_menu_page(
            "Theme Options",
            "Theme Options",
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
            <h1>Theme Options</h1>
            
            <?php
                $active_tab = "header-options";
                if(isset($_GET["tab"]))
                {
                    if($_GET["tab"] == "header-options")
                    {
                        $active_tab = "header-options";
                    }
                    else
                    {
                        $active_tab = "ads-options";
                    }
                }
            ?>
            
            <h2 class="nav-tab-wrapper">
                <a href="?page=theme-options&tab=header-options" class="nav-tab <?php if($active_tab == 'header-options'){echo 'nav-tab-active';} ?> "><?php _e('Header Options', 'sandbox'); ?></a>
                <a href="?page=theme-options&tab=ads-options" class="nav-tab <?php if($active_tab == 'ads-options'){echo 'nav-tab-active';} ?>"><?php _e('Advertising Options', 'sandbox'); ?></a>
            </h2>

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
        add_settings_section("header_section", "Header Options", "display_header_options_content", "theme-options");

        if(isset($_GET["tab"]))
        {
            if($_GET["tab"] == "header-options")
            {
                add_settings_field("header_logo", "Logo Url", "display_logo_form_element", "theme-options", "header_section");
                register_setting("header_section", "header_logo");

                add_settings_field("background_picture", "Picture File Upload", "background_form_element", "theme-options", "header_section");
                register_setting("header_section", "background_picture", "handle_file_upload");
            }
            else
            {
                add_settings_field("advertising_code", "Ads Code", "display_ads_form_element", "theme-options", "header_section");      
                register_setting("header_section", "advertising_code");
            }
        }
        else
        {
            add_settings_field("header_logo", "Logo Url", "display_logo_form_element", "theme-options", "header_section");
            register_setting("header_section", "header_logo");
            
            add_settings_field("background_picture", "Picture File Upload", "background_form_element", "theme-options", "header_section");
            register_setting("header_section", "background_picture", "handle_file_upload");
        }
        
    }

    function handle_file_upload($options)
    {
        if(!empty($_FILES["background_picture"]["tmp_name"]))
        {
            $urls = wp_handle_upload($_FILES["background_picture"], array('test_form' => FALSE));
            $temp = $urls["url"];
            return $temp;   
        }

        return get_option("background_picture");
    }


    function display_header_options_content(){echo "The header of the theme";}
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
            <input type="text" name="header_logo" id="header_logo" value="<?php echo get_option('header_logo'); ?>" />
        <?php
    }
    function display_ads_form_element()
    {
        ?>
            <input type="text" name="advertising_code" id="advertising_code" value="<?php echo get_option('advertising_code'); ?>" />
        <?php
    }

    add_action("admin_init", "display_options");





    function my_acf_google_map_api( $api ){
    
    $api['key'] = 'AIzaSyB63fCe88g51K6K3DUht0ksGtCetjS_WCI';
    
    return $api;
    
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');






if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_documentatie',
        'title' => 'Documentatie',
        'fields' => array (
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
                'key' => 'field_58498748bd17d',
                'label' => 'Statistieken',
                'name' => 'stats',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_58498760bd17e',
                        'label' => 'Nummer',
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
                        'key' => 'field_58498774bd17f',
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
                'row_limit' => 4,
                'layout' => 'table',
                'button_label' => 'Nieuw',
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
                'key' => 'field_588915d9d41fc',
                'label' => 'Team - tekst',
                'name' => 'team_text',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array (
                'key' => 'field_5887a9aa70418',
                'label' => 'Team',
                'name' => 'team',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_5887aa7848d12',
                        'label' => 'Foto',
                        'name' => 'photo',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_5887aa4170419',
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
                        'key' => 'field_5887aa467041a',
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
                        'key' => 'field_5887aa4e7041b',
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
                        'key' => 'field_5887aa597041c',
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
                    array (
                        'key' => 'field_5887aa617041d',
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
                ),
                'row_min' => 0,
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Nieuw teamlid',
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
                'key' => 'field_58496dc4d6732',
                'label' => 'Uitgelicht',
                'name' => 'featured',
                'type' => 'true_false',
                'message' => '',
                'default_value' => 0,
            ),
            array (
                'key' => 'field_58496b2941068',
                'label' => 'Afbeelding',
                'name' => 'image',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_58496b3b41069',
                'label' => 'Logo',
                'name' => 'logo',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_58496c9d4ec39',
                'label' => 'Kleur',
                'name' => 'color',
                'type' => 'color_picker',
                'default_value' => '',
            ),
            array (
                'key' => 'field_588a663ea3686',
                'label' => 'Happenings',
                'name' => 'happenings',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_588a6652a3687',
                        'label' => 'Foto',
                        'name' => 'photo',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_588a665ca3688',
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
                        'key' => 'field_588a6664a3689',
                        'label' => 'Tekst',
                        'name' => 'text',
                        'type' => 'wysiwyg',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                ),
                'row_min' => 0,
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Nieuwe happening',
            ),
            array (
                'key' => 'field_588a6a5fb5fa0',
                'label' => 'Korte beschrijving',
                'name' => 'short_text',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array (
                'key' => 'field_588a6a76b5fa1',
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
            array (
                'key' => 'field_588a6a7db5fa2',
                'label' => 'Facevook',
                'name' => 'facevook',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_588a6a84b5fa3',
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
                'key' => 'field_588a6a88b5fa4',
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
                'key' => 'field_588a6a8eb5fa5',
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

// print_r(get_sites());
//     foreach(get_sites() as $site){

//         if (strpos($site->domain, $args["s"]) !== false){

//             array_push($posts, new"post_title" => $site->domain, "post_content" => ""));

//         }

//     }

    return $posts; 

    

}

add_action( 'init', 'register_my_menus' );

