<?php

namespace VCPlugin;
defined( 'ABSPATH' ) || exit; //no direct access

//
// class for managing initialization tasks that are usually run every time the plugin is invoked
//
class PluginInit {

	protected static bool $are_constants_set = false; //flag, constants must not be declared more than once

	protected static ScriptsManager $script_manager;

	protected static Model $model;

	protected static Views $views;

	protected static Controller $controller;

	const PHP_MIN_VERSION = '7.4';

	public static function start(): void {

		//instantiate objects for MVC
		self::include_files();

		self::$model = new Model();

		self::$views = new Views(self::$model);

		self::$controller = new Controller(self::$views, self::$model);

		//define constant, register some stuff
		self::set_constants();

		if(!self::is_compatible()) {
			return;
		}
		
		self::$script_manager = new ScriptsManager();

		self::register_hooks();

		self::register_shortcodes();

	}


	protected static function include_files(): void {
		require_once 'Model.php';
		require_once 'Views.php';
		require_once 'ScriptsManager.php';
		require_once 'Controller.php';

	}
	

	public static function register_hooks(): void {
		
		//adding frontend css and js
		add_action('wp_enqueue_scripts', [self::$script_manager, 'register_fe_scripts'] );

		//adding backend js and css
		add_action('admin_enqueue_scripts', [self::$script_manager, 'register_admin_scripts']);

		//add plugin settings menu page
		add_action('admin_menu', 'VCPlugin\PluginInit::admin_menu_cb' );

		//register taxonomy & post types
		add_action('init', 'VCPlugin\PluginInit::register_custom_tax_post');

	}


	protected static function set_constants(): void {
	
		if(self::$are_constants_set) {
			return;
		}

		//note: constants also use namespaces but have a fallback to non-namespace constants

		//for logging debug messages/testing
		define('DEVLOG', './xxxxx/plugindev.log');

		//for logging usual messages, i.e. file operations
		define('LOG', './xxxxx/plugin.log');

		//plugin base directory (without trailing slash)
		define('DIR', __DIR__);

		//plugin base url (with trailing slash)
		define('URL', plugin_dir_url(__FILE__));

		//i.e. for naming the plugin in admin notices
		define('NAME', '.....'); //should be the same as in the beginning of plugin.php

		self::$are_constants_set = true;

	}


	public static function register_shortcodes(): void {
		//nothing so far
	}


	public static function admin_menu_cb(): void {

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
	public static function register_custom_tax_post(): void {
		//register_taxonomy( );
		//register_post_type()
	}

	public static function plugin_activate(): void {
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


	public static function settings_api_init(): void {

/* 		add_settings_section( 'section-id', 'Title', 'callback', 'page-slug' );

		add_settings_field(
			'id', 
			'Title',  
			[self::$views, 'callback'], 
			'page-slug', 
			'section-id');
		
		register_setting('option_group', 'option_name'); */

	}


    public static function is_compatible(): bool {

		//check required other plugins:
/* 		if ( ! is_plugin_active( 'xxxx-plugin-dir/xxxx-plugin-file.php' ) ) {
			// Stop activation redirect and show error
			add_action( 'admin_notices', 'callback' );
			return false;
		} */

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::PHP_MIN_VERSION, '<' ) ) {
			add_action( 'admin_notices', [self::$views, 'error_message_wrong_php_version'] );
			return false;
		}

        return true;

    }


}



