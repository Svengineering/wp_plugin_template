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

//Template Version 1.3

namespace VCPlugin;
defined( 'ABSPATH' ) || exit;

require_once 'PluginInit.php';
register_activation_hook( __DIR__ . '/plugin.php', 'VCPlugin\PluginInit::plugin_activate' );

//starting the plugin
add_action('plugins_loaded', 'VCPlugin\start');


function start(): void {
    PluginInit::start();

}
