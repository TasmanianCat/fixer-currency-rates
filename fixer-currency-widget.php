<?php
/*
Plugin Name: Fixer Currency Widget
Description: Displays currency rates using Fixer.io API
Version: 1.0.0
*/

if (!defined('ABSPATH')) {
    exit;
}

require_once plugin_dir_path(__FILE__) . 'includes/fixer-api.php';
require_once plugin_dir_path(__FILE__) . 'includes/shortcode.php';
require_once plugin_dir_path(__FILE__) . 'includes/helpers.php';