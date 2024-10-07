<?php
/*
Plugin Name: PDGrandStore Inventory Plugin
Plugin URI: https://phathusdesign.com
Description: A plugin to manage inventory and products efficiently by fetching data from supplier XML and integrating with WooCommerce.
Version: 1.0.0
Author: Phathus Designs
Author URI: https://phathusdesign.com
Contributors: Phathutshedzo Rakhunwana
Contributor URI: https://github.com/Phathu87/Plugins-WordPress
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include admin and core functionalities
include_once plugin_dir_path(__FILE__) . 'admin/class-settings-page.php'; // Updated to include settings page
include_once plugin_dir_path(__FILE__) . 'admin/admin-dashboard.php';
include_once plugin_dir_path(__FILE__) . 'includes/class-inventory-updater.php';
include_once plugin_dir_path(__FILE__) . 'includes/class-product-fetcher.php';
include_once plugin_dir_path(__FILE__) . 'includes/class-xml-parser.php';

// Enqueue admin styles
function pdgrandstore_enqueue_admin_styles() {
    wp_enqueue_style('pdgrandstore-admin-style', plugin_dir_url(__FILE__) . 'admin/style.css');
}
add_action('admin_enqueue_scripts', 'pdgrandstore_enqueue_admin_styles');

// Activation hook
function pdgrandstore_activate_plugin() {
    // Create default settings and any necessary setup during activation
    // Example: add_option('pdgrandstore_settings', array('products_api' => '', 'images_api' => ''));
}
register_activation_hook(__FILE__, 'pdgrandstore_activate_plugin');

// Deactivation hook
function pdgrandstore_deactivate_plugin() {
    // Cleanup settings or schedules on deactivation
    // Example: delete_option('pdgrandstore_settings');
}
register_deactivation_hook(__FILE__, 'pdgrandstore_deactivate_plugin');
?>
