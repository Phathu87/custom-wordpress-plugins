<?php
// Add menu for the admin dashboard
function pdgrandstore_inventory_menu() {
    add_menu_page(
        'PDGrandStore Inventory Settings',
        'Inventory Settings',
        'manage_options',
        'pdgrandstore_inventory',
        'pdgrandstore_inventory_dashboard',
        'dashicons-products',
        20
    );
}
add_action('admin_menu', 'pdgrandstore_inventory_menu');

// Admin dashboard page
function pdgrandstore_inventory_dashboard() {
    ?>
    <div class="wrap">
        <h1>PDGrandStore Inventory Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('pdgrandstore_inventory_group');
            do_settings_sections('pdgrandstore_inventory');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Register settings
function pdgrandstore_register_settings() {
    register_setting('pdgrandstore_inventory_group', 'pdgrandstore_products_api');
    register_setting('pdgrandstore_inventory_group', 'pdgrandstore_images_api');

    add_settings_section('pdgrandstore_inventory_section', 'API Settings', null, 'pdgrandstore_inventory');

    add_settings_field('pdgrandstore_products_api', 'Products API URL', 'pdgrandstore_products_api_callback', 'pdgrandstore_inventory', 'pdgrandstore_inventory_section');
    add_settings_field('pdgrandstore_images_api', 'Images API URL', 'pdgrandstore_images_api_callback', 'pdgrandstore_inventory', 'pdgrandstore_inventory_section');
}
add_action('admin_init', 'pdgrandstore_register_settings');

function pdgrandstore_products_api_callback() {
    $products_api = get_option('pdgrandstore_products_api');
    echo '<input type="text" name="pdgrandstore_products_api" value="' . esc_attr($products_api) . '" />';
}

function pdgrandstore_images_api_callback() {
    $images_api = get_option('pdgrandstore_images_api');
    echo '<input type="text" name="pdgrandstore_images_api" value="' . esc_attr($images_api) . '" />';
}
?>
