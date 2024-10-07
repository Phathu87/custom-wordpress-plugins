<?php
class PDGrandStore_Inventory_Updater {

    // Fetch and update inventory data
    public static function update_inventory() {
        $products_api = get_option('pdgrandstore_products_api');
        $xml = file_get_contents($products_api);

        if ($xml) {
            $products = PDGrandStore_XML_Parser::parse($xml);
            self::update_woocommerce_products($products);
        }
    }

    private static function update_woocommerce_products($products) {
        foreach ($products as $product) {
            // Match product by SKU and Vendor
            $existing_product_id = wc_get_product_id_by_sku($product['sku']);
            
            if ($existing_product_id) {
                // Update stock, price, and other fields
                wp_update_post(array(
                    'ID'           => $existing_product_id,
                    'post_title'   => $product['name'],
                    'post_content' => $product['description'],
                ));

                update_post_meta($existing_product_id, '_price', $product['price']);
                update_post_meta($existing_product_id, '_stock', $product['stock']);
                update_post_meta($existing_product_id, '_vendor', $product['vendor']);
            }
        }
    }
}
?>
