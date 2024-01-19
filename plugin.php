<?php

 /**
 * Plugin Name: ....
 * Plugin URI: 
 * Description: ....
 * Version: 1.0
 * Requires at least: 6.3
 * Requires PHP: 7.4
 * Author: 
 * Author URI: 
 */

//Important: version string should match PLUGIN_VERSION constant in PluginInit.php
//Note: after changing the name plugin name here, also adjust the plugin name constant in PluginInit.php.

//Template Version 1.4

namespace VCPlugin;
defined( 'ABSPATH' ) || exit;


require 'vendor/autoload.php';

//plugin base directory (without trailing slash)
define('DIR', __DIR__);

//plugin base url (with trailing slash)
define('URL', plugin_dir_url(__FILE__));


register_activation_hook( __DIR__ . '/plugin.php', 'VCPlugin\PluginInit::plugin_activate' );

//starting the plugin
add_action('plugins_loaded', 'VCPlugin\start');


function start(): void {

    //$start = hrtime(true);
    PluginInit::start();
    //$end = hrtime(true);
    //echo "Start-Routine (ms) : " . ($end - $start) / 1000000;

}
