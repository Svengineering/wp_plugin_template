<?php

namespace VCPlugin;
defined( 'ABSPATH' ) || exit; //no direct access

//
// class for managing initialization tasks that are usually run every time the plugin is invoked
//
class PluginInit {

	protected static $are_constants_set = false; //flag, constants must not be declared more than once

	protected static $script_manager;

	protected static $model;

	protected static $views;

	protected static $controller;

	const PHP_MIN_VERSION = '8.0';

	public static function start() {

		if(!self::is_compatible()) {
			return;
		}

		//instantiate objects for MVC
		self::include_files();

		self::$model = new Model();

		self::$views = new Views(self::$model);

		self::$controller = new Controller(self::$views, self::$model);

		//define constant, register some stuff
		self::set_constants();
		
		self::$script_manager = new ScriptsManager();

		self::register_hooks();

		self::register_shortcodes();

	}


	protected static function include_files() {
		require_once 'Model.php';
		require_once 'Views.php';
		require_once 'ScriptsManager.php';
		require_once 'Controller.php';

	}
	

	public static function register_hooks() {
		
		//adding frontend css and js
		add_action('wp_enqueue_scripts', [self::$script_manager, 'register_fe_scripts'] );

		//adding backend js and css
		add_action('admin_enqueue_scripts', [self::$script_manager, 'register_admin_scripts']);

		//add plugin settings menu page
		add_action('admin_menu', 'VCPlugin\PluginInit::admin_menu_cb' );

		//register taxonomy & post types
		add_action('init', 'VCPlugin\PluginInit::register_custom_tax_post');

	}


	protected static function set_constants() {
	
		if(self::$are_constants_set) {
			return true;
		}

		//DEV environment, for logging (debug) messages
		define('xxxxxxxx_LOGFILE', './xxxxx/plugin.log');

		//plugin base directory (without trailing slash)
		define('xxxxxxxx_DIR', __DIR__);

		//plugin base url (with trailing slash)
		define('xxxxxxxx_URL', plugin_dir_url(__FILE__));

		self::$are_constants_set = true;

	}


	public static function register_shortcodes() {
		//nothing so far
	}


	public static function admin_menu_cb() {

		//example usage

/* 		add_menu_page( 
			'',  //Seiten-Titel
			'', //Menü-Titel
			'manage_options',  //necessary capability
			'', //page slug or admin url as a link i.e. 'edit-tags.php?taxonomy=proficiency_level'
			[self::$controller, ''],  //callback
			'', //Icon
			10); //position */

/* 			add_options_page( 
				'', //html page title
				'',  //menu title
				'manage_options', 
				'edit-tags.php?taxonomy=proficiency_level' //page slug or admin url as a link i.e. 'edit-tags.php?taxonomy=proficiency_level'
			); */

	}

	//
	//for using: register_taxonomy, register_post_type
	//
	public static function register_custom_tax_post() {
		//register_taxonomy( );
		//register_post_type()
	}

	public static function plugin_activate() {
		global $wpdb;
	
		//example usage
		
/* 		//for DB Delta function
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	
		$table_name = $wpdb->prefix . 'der_tabellenname';
	

		//example table 
		//
		//
		$sql = "CREATE TABLE {$table_name} (
			id INT NOT NULL AUTO_INCREMENT,
			booking_id INT NOT NULL,
			proficiency_level_term_id BIGINT NULL,
			contract_signed TINYINT NOT NULL DEFAULT '0',
			invoice_sent TINYINT NOT NULL DEFAULT '0',
			booking_note VARCHAR(3000) NULL,
			pilot_note VARCHAR(3000) NULL,
			PRIMARY KEY (id),
			UNIQUE KEY (booking_id)
			)
			COLLATE {$wpdb->collate};";

		dbDelta($sql); */
		
	}


	public static function settings_api_init() {

/* 		add_settings_section( 'section-id', 'Title', 'callback', 'page-slug' );

		add_settings_field(
			'id', 
			'Title',  
			[self::$views, 'callback'], 
			'page-slug', 
			'section-id');
		
		register_setting('option_group', 'option_name'); */

	}


    public static function is_compatible() {

		//check required other plugins:
/* 		if ( ! is_plugin_active( 'xxxx-plugin-dir/xxxx-plugin-file.php' ) ) {
			// Stop activation redirect and show error
			add_action( 'admin_notices', 'callback' );
			return false;
		} */

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::PHP_MIN_VERSION, '<' ) ) {
			add_action( 'admin_notices', 'callback' );
			return false;
		}

        return true;

    }

}



