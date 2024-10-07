<?php
class PDGrandStore_Product_Fetcher {
    public static function fetch_products() {
        $products_api = get_option('pdgrandstore_products_api');
        return file_get_contents($products_api);
    }

    public static function fetch_images($product_code) {
        $images_api = str_replace('{code}', $product_code, get_option('pdgrandstore_images_api'));
        return file_get_contents($images_api);
    }
}
?>
