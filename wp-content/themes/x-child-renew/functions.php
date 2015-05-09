<?php

// =============================================================================
// FUNCTIONS.PHP
// -----------------------------------------------------------------------------
// Overwrite or add your own custom functions to X in this file.
// =============================================================================

// Add Scripts
if (!is_admin()) add_action("wp_enqueue_scripts", "enqueue_custom_scripts", 11);

function enqueue_custom_scripts() {
        
   $get_template_directory_uri = get_stylesheet_directory_uri();

    wp_deregister_script('globaljs');
    wp_register_script( 'globaljs', $get_template_directory_uri . '/js/global.js', NULL, NULL, true );
    wp_enqueue_script('globaljs');

    if (is_page("home")) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js", false, null);
        wp_enqueue_script('jquery');

        wp_deregister_script('splashjs');
        wp_register_script( 'splashjs', $get_template_directory_uri . '/js/splash.js', array( 'jquery' ), NULL, true );
        wp_enqueue_script( 'splashjs' );
    }

    if (is_home() || is_archive()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js", false, null);
        wp_enqueue_script('jquery');

        wp_deregister_script('initializejs');
        wp_register_script( 'initializejs', $get_template_directory_uri . '/js/initialize.js', array( 'jquery' ), NULL, true );
        wp_enqueue_script( 'initializejs' );

   }     
}

// Create secondary image box
//https://github.com/voceconnect/multi-post-thumbnails/wiki
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
        array(
            'label' => 'Secondary Image',
            'id' => 'secondary-image',
            'post_type' => 'post'
        )
    );
}


//Add global options
//http://digwp.com/2009/09/global-custom-fields-take-two/
/*add_action('admin_menu', 'add_gcf_interface');

function add_gcf_interface() {
    add_options_page('MasGalicia', 'MasGalicia', '8', 'functions', 'editglobalcustomfields');
}

function editglobalcustomfields() {
    ?>
    <div class='wrap'>
        <h2>Configuración de MasGalicia</h2>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options') ?>

            <p><strong>Título Clientes:</strong><br />
                <input type="text" name="clientestitle" size="45" value="<?php echo get_option('clientestitle'); ?>" /></p>

            <p><strong>Descripción Clientes:</strong><br />
                <textarea name="clientesmessage" cols="100%" rows="7"><?php echo get_option('clientesmessage'); ?></textarea></p>

            <p><strong>Título Revistas:</strong><br />
                <input type="text" name="revistastitle" size="45" value="<?php echo get_option('revistastitle'); ?>" /></p>
                
            <p><input type="submit" name="Submit" value="Guardar" /></p>

            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="clientestitle,clientesmessage,revistastitle" />

        </form>
    </div>
<?php
}*/

//Hide custom post type admin menu item
function hide_menu_items() {
    remove_menu_page( 'edit.php?post_type=x-portfolio' );
}
add_action( 'admin_menu', 'hide_menu_items' );

//White label Sollyloquy
add_filter( 'gettext', 'tgm_soliloquy_whitelabel', 10, 3 );
function tgm_soliloquy_whitelabel( $translated_text, $source_text, $domain ) {
    
    // If not in the admin, return the default string.
    if ( ! is_admin() ) {
        return $translated_text;
    }
 
    if ( strpos( $source_text, 'Soliloquy Slider' ) !== false ) {
        return str_replace( 'Soliloquy Slider', 'Slider', $translated_text );
    }
 
    if ( strpos( $source_text, 'Soliloquy Sliders' ) !== false ) {
        return str_replace( 'Soliloquy Sliders', 'Sliders', $translated_text );
    }
 
    if ( strpos( $source_text, 'Soliloquy slider' ) !== false ) {
        return str_replace( 'Soliloquy slider', 'slider', $translated_text );
    }
 
    if ( strpos( $source_text, 'Soliloquy' ) !== false ) {
        return str_replace( 'Soliloquy', 'Slider', $translated_text );
    }
    
    return $translated_text;
    
}

function no_pagination( $query ) {
    if ( ($query->is_home() || $query->is_archive()) && $query->is_main_query() ) {
        $query->set( 'posts_per_page', -1 );
    }
}
add_action( 'pre_get_posts', 'no_pagination' );