<?php
/*
Plugin Name: Maid Search
Plugin URI: http://technic.com.hk/
Description: Maid Search engine for technic.com.hk API
Version: 1.5.3
Author: Brian Caballero <brian.caballero1204@gmail.com>
Author URI: https://www.linkedin.com/in/briancaballero
License: GPL2
*/


   // don't load directly
if ( ! defined( 'ABSPATH' ) ) {
   die( '-1' );
}


if ( ! defined( 'MS_PLUGINPATH' ) ) {
   define('MS_PLUGINPATH', dirname(__FILE__));
}

if ( ! defined( 'MS_PLUGINDIRURL' ) ) {
   define('MS_PLUGINDIRURL', plugin_dir_url(__FILE__));
}

require_once(MS_PLUGINPATH . '/includes/admin.php');
require_once(MS_PLUGINPATH . '/includes/searchform.php');