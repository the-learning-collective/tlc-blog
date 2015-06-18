<?php
/**
 * Plugin Name: Smart Syntax
 * Plugin URI:  http://www.smartpixels.net/products/smart-syntax/
 * Description: Prettify syntax highlighting for jetpack markdown fenced code blocks
 * Version:     1.0.2
 * Author:      Smartpixels
 * Author URI:  http://www.smartpixels.net
 * License:     GPLv2+
 * Text Domain: smart_syntax
 * Domain Path: /languages
 */

/**
 * Copyright (c) 2014 Smartpixels (email : info@smartpixels.net)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

// Useful global constants
define( 'SMART_SYNTAX_VERSION', '1.0.2' );
define( 'SMART_SYNTAX_URL',     plugin_dir_url( __FILE__ ) );
define( 'SMART_SYNTAX_PATH',    dirname( __FILE__ ) . '/' );

/**
 * Default initialization for the plugin:
 * - Registers the default textdomain.
 */
function smart_syntax_init() {
	$locale = apply_filters( 'plugin_locale', get_locale(), 'smart_syntax' );
	load_textdomain( 'smart_syntax', WP_LANG_DIR . '/smart_syntax/smart_syntax-' . $locale . '.mo' );
	load_plugin_textdomain( 'smart_syntax', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	require_once SMART_SYNTAX_PATH . 'includes/functions.php';
	require_once SMART_SYNTAX_PATH . 'includes/admin-menu.php';
}

/**
 * Activate the plugin
 */
function smart_syntax_activate() {
	// First load the init scripts in case any rewrite functionality is being loaded
	smart_syntax_init();

}
register_activation_hook( __FILE__, 'smart_syntax_activate' );

/**
 * Deactivate the plugin
 * Uninstall routines should be in uninstall.php
 */
function smart_syntax_deactivate() {

}
register_deactivation_hook( __FILE__, 'smart_syntax_deactivate' );

// actions
	add_action( 'init', 'smart_syntax_init' );
	add_action('admin_menu','smart_syntax_menu' ); 
	add_action('wp_enqueue_scripts','smart_syntax_prettify_script');

//filters

	add_filter('the_content', 'smart_syntax_prettyprint', 10);
   	add_filter('comment_text', 'smart_syntax_prettyprint', 10);


