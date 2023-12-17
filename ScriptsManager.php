<?php

namespace VCPlugin;
defined( 'ABSPATH' ) || exit; //no direct access

//
// A class for managing the workflow of registering styles and js scripts.
//
// Some scripts have to be loaded always but others not. Ie. on pages where the plugin hasn't any function.
// This class should help to load scripts conditionally to minify the network traffic.
//
class ScriptsManager {

    public string $ajax_url;

    public function __construct() {

        $this->ajax_url = admin_url('admin-ajax.php');
    }


    //triggered by 'wp_enqueue_scripts' ()
    //
    //register script for WP user pages ( = non admin pages )
    // 
    //should use: 
    //  wp_enqueue_style, wp_register_style, 
    //  wp_enqueue_script, wp_register_script, 
    //  wp_add_inline_script
    //  wp_localize_script
    public function register_user_scripts(): void {
        
/*             wp_register_script(
                'handle',
                'src_url',
                ['dependencies'],
                PLUGIN_VERSION //!! for forcing cache reload
            );

            wp_register_style(
                'handle',
                'src_url'
                ['dependencies'],
                PLUGIN_VERSION //!! force cache reloading
            ); */
    }


    //triggered by 'admin_enqueue_scripts'
    //
    //register script for WP admin pages
    //
    //should use: 
    //  wp_enqueue_style, wp_register_style, 
    //  wp_enqueue_script, wp_register_script, 
    //  wp_add_inline_script
    //  wp_localize_script
    public function register_admin_scripts(string $hook_suffix): void {

         if($hook_suffix == 'toplevel_page_xxxxx') {

/*             wp_register_script(
                'handle',
                'src_url',
                ['dependencies'],
                PLUGIN_VERSION //!! for forcing cache reload
            );

            wp_register_style(
                'handle',
                'src_url'
                ['dependencies'],
                PLUGIN_VERSION //!! force cache reloading
            ); */

    
        }
    }

}




?>