<?php
class PDGrandStore_XML_Parser {
    public static function parse($xml_content) {
        $xml = simplexml_load_string($xml_content);
        $products = array();

        foreach ($xml->product as $product) {
            $products[] = array(
                'sku'         => (string) $product->sku,
                'name'        => (string) $product->name,
                'price'       => (float) $product->price,
                'stock'       => (int) $product->stock,
                'vendor'      => (string) $product->vendor,
                'description' => (string) $product->description,
            );
        }

        return $products;
    }
}
?>
