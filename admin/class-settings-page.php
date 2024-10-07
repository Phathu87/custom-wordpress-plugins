<?php
class PDGrandStore_Settings_Page {

    public function __construct() {
        add_action('admin_menu', array($this, 'add_settings_page'));
    }

    public function add_settings_page() {
        add_submenu_page(
            'pdgrandstore_inventory',
            'Settings',
            'Settings',
            'manage_options',
            'pdgrandstore_inventory_settings',
            array($this, 'settings_page_callback')
        );
    }

    public function settings_page_callback() {
        ?>
        <div class="wrap">
            <h1>PDGrandStore Inventory Plugin Settings</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('pdgrandstore_inventory_group');
                do_settings_sections('pdgrandstore_inventory');
                ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Products API URL</th>
                        <td><input type="text" name="pdgrandstore_products_api" value="<?php echo esc_attr(get_option('pdgrandstore_products_api')); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Images API URL</th>
                        <td><input type="text" name="pdgrandstore_images_api" value="<?php echo esc_attr(get_option('pdgrandstore_images_api')); ?>" /></td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
}
new PDGrandStore_Settings_Page();
?>
