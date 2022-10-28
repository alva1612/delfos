<?php

namespace App\Models;

use App\Models\Product;

class ProductList
{
    static function getList() {
    $products =  [
            $product1 = new Product('1', 'Teclado', 'teclado'),
            $product2 = new  Product('2', 'Mouse', 'mouse'),
            $product2 = new  Product('3', 'Laptop', 'laptop'),
            $product2 = new  Product('4', 'Case', 'case'),
            $product2 = new  Product('5', 'Smart Watch', 'smart-watch'),
            $product2 = new  Product('6', 'Monitor', 'monitor'),
            $product2 = new  Product('7', 'Batería externa', 'bateria-externa'),
            $product2 = new  Product('8', 'Disco Sólido', 'disco-solido'),
            $product2 = new  Product('9', 'Memoria RAM', 'Memoria RAM'),
            $product2 = new  Product('10', 'Router', 'router'),
            $product2 = new  Product('11', 'Parlante', 'parlante'),
            $product2 = new  Product('12', 'Smart Band', 'smart-band'),
            $product2 = new  Product('13', 'Audífonos', 'audifonos'),
            $product2 = new  Product('14', 'Micrófono', 'microfono'),
            $product2 = new  Product('15', 'Table', 'tablet'),
            $product2 = new  Product('16', 'Mousepad', 'mousepad'),
            $product2 = new  Product('17', 'Silla Ergonómica', 'silla-ergonomica'),
            $product2 = new  Product('18', 'Teléfono', 'telefono'),
            $product2 = new  Product('19', 'Cooler', 'cooler'),
            $product2 = new  Product('20', 'Mo', 'motherboard'),
        ];


        return $products;
    }

}
