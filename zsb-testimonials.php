<?php

/**
* Plugin Name: ZSB Testimonials
* Plugin URI: https://www.zsoltbogdan.hu/zsb-testimonials
* Description: My plugin's description
* Version: 1.0
* Requires at least: 5.6
* Requires PHP: 7.0
* Author: Zsolt Bogdán
* Author URI: https://www.codigowp.net
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: zsb-testimonials
* Domain Path: /languages
*/
/*
ZSB Testimonials is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

ZSN Testimonials is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with ZSB Testimonials. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( !class_exists( 'ZSB_Testimonials' ) ){

    class ZSB_Testimonials{

        public function __construct() {

            // Define constants used througout the plugin
            $this->define_constants();

        }

         /**
         * Define Constants
         */
        public function define_constants(){
            // Path/URL to root of this plugin, with trailing slash.
            define ( 'ZSB_TESTIMONIALS_PATH', plugin_dir_path( __FILE__ ) );
            define ( 'ZSB_TESTIMONIALS_URL', plugin_dir_url( __FILE__ ) );
            define ( 'ZSB_TESTIMONIALS_VERSION', '1.0.0' );
        }

        /**
         * Activate the plugin
         */
        public static function activate(){
            update_option('rewrite_rules', '' );
        }

        /**
         * Deactivate the plugin
         */
        public static function deactivate(){
            flush_rewrite_rules();
        }

        /**
         * Uninstall the plugin
         */
        public static function uninstall(){

        }

    }
}

if( class_exists( 'ZSB_Testimonials' ) ){
    // Installation and uninstallation hooks
    register_activation_hook( __FILE__, array( 'ZSB_Testimonials', 'activate'));
    register_deactivation_hook( __FILE__, array( 'ZSB_Testimonials', 'deactivate'));
    register_uninstall_hook( __FILE__, array( 'ZSB_Testimonials', 'uninstall' ) );

    $zsb_testimonials = new ZSB_Testimonials();
}