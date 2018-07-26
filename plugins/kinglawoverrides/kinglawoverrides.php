<?php
/*
Plugin Name: KingLaw Theme Overrides
Plugin URI: http://technic.com.hk/
Description: KingLaw Theme Overrides for technic.com.hk API
Version: 1.1
Author: Brian Caballero <brian.caballero1204@gmail.com>
Author URI: https://www.linkedin.com/in/briancaballero
License: GPL2
*/


// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
   die( '-1' );
}

if ( ! defined( 'KL_PLUGINDIRURL' ) ) {
    define('KL_PLUGINDIRURL', plugin_dir_url(__FILE__));
}

// assets
function kl_assets() {
    if (function_exists('pll_current_language')) {
        $current_lang = pll_current_language();
        $check_lang = 'zh';
    } else {
        $current_lang = get_locale();
        $check_lang = 'zh_CN';
    }

    if($current_lang != $check_lang) {
        return; // do nothing if not chinese
    }

    wp_register_script('kl-scripts',  KL_PLUGINDIRURL . 'assets/js/kl.js' );
    wp_enqueue_script('kl-scripts');
    $kl_obj = array(
        'central' => '中 環: 2522 6162',
        'mongkok' => '旺 角: 2780 9099',
        'shatin' => '沙 田: 2607 0903',
        'tsuen' => '荃 灣: 2786 3813'
    );
    wp_localize_script( 'kl-scripts', 'kl_obj', $kl_obj );
}
add_action( 'wp_enqueue_scripts', 'kl_assets' );


// filters
add_filter('init', 'translate_header_options');

function translate_header_options() {

    if (function_exists('pll_current_language')) {
        $current_lang = pll_current_language();
        $check_lang = 'zh';
    } else {
        $current_lang = get_locale();
        $check_lang = 'zh_CN';
    }

    if($current_lang != $check_lang) {
        return; // do nothing if not chinese
    }

    global $opt_theme_options;

    $opt_theme_options['top_bar_phone'] = '顧客服務熱線: (852) 2233 4343';
    $opt_theme_options['top_bar_email'] = 'causewaybay@technic.com.hk';
    $opt_theme_options['top_bar_address'] = '銅 鑼 灣: 2233 4388';
    $opt_theme_options['top_bar_time'] = '將 軍 澳: 2702 6616';
}

// admin