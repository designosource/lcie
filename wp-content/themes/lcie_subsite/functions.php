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
            <input type="color" name="header_logo" id="header_logo" value="<?php echo get_option('header_logo'); ?>" />
        <?php
    }
    function display_ads_form_element()
    {
        ?>
            <input type="text" name="advertising_code" id="advertising_code" value="<?php echo get_option('advertising_code'); ?>" />
        <?php
    }

    add_action("admin_init", "display_options");


wp_enqueue_script( 'ajax-pagination',  get_stylesheet_directory_uri() . '/js/ajax-pagination.js', array( 'jquery' ), '1.0', true );


 global $post;
 global $wp_query;
 global $color;

    $cat_query = new WP_Query( $args );
wp_localize_script( 'ajax-pagination', 'ajaxpagination', array(
    // 'ajaxurl' => get_template_directory_uri() . '/load-archive.php',
    'ajaxurl' => admin_url('admin-ajax.php'),
    'query_vars' => json_encode( array(
        'post_type'  =>  'project',
        'date_query' => array(
            array(
                'year'  => "2016"
            ),
        )
    ) )
));


add_action( 'wp_ajax_nopriv_ajax_pagination', 'my_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'my_ajax_pagination' );

function my_ajax_pagination() {
    $query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );

    $date = array(
        'date_query' => array(
            array(
                'year'  => $_POST['date']
            ),
        ),
    );

    $vars = array_merge ($query_vars, $date);
    $data = array();
    $posts = new WP_Query( $vars );
    $GLOBALS['wp_query'] = $posts;


    if( ! $posts->have_posts() ) { 
        // get_template_part( 'content', 'none' );
        echo "NOTHING FOUND";
    }
    else {
        while ( $posts->have_posts() ) { 
            $posts->the_post();
            array_push ( $data, array(get_post(), array("color" => get_field('color'), "logo" => get_field('logo'), "photo" => get_field('photo'), "url" => get_permalink())));
        }

        echo json_encode($data);
    }

    die();
}



//add post-formats to post_type 'my_custom_post_type'
add_post_type_support( 'project', 'post-formats' );
