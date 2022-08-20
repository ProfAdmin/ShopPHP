<?php

namespace models;

class product {

    // get all product from json
    public static function getAll() {
        $db = new db_files();
        return $db->product;
    }

    // get product by Id
    public static function getById ($id) {
        $prodLink = self::getAll();
        $prod = [];
        foreach ($prodLink as $value) {
            if($id == $value->id) {
                $prod['id'] = $value->id;
                $prod['name'] = $value->name;
                $prod['description'] = $value->description;
                $prod['picture'] = $value->picture;
                $prod['price'] = $value->price;
                $prod['category'] = category::getById($value->category);
                break;
            }
        }
        return $prod;
    }

    public function addProduct ($name, $description, $picture, $price, $category) {
        $db = new db_files();
        $id = 0;
        // found next id
        foreach ($db->product as $value) {
            $id = $id <= $value->id ? $value->id : $id;
        }
        $arrayProduct = [
            'id' => ++$id,
            'name' => $name,
            'description' => $description,
            'picture' => $picture,
            'price' => $price,
            'category' => $category,
        ];
        $arrayProduct = (object) $arrayProduct;
        $db->product[] = $arrayProduct;

        return $id;
    }

    public static function getByCategoryId ($categoryId) {
        $prodLink = self::getAll();
        $prod = [];
        foreach ($prodLink as $value) {
            if($categoryId == $value->category) {
                $prod[] = $value;
            }
        }
        return $prod;
    }

    public static function getListProduct($categoryId) {
        $arrayProd = self::getByCategoryId($categoryId);
        $htmllink = '';
        foreach ($arrayProd as $value) {
            $htmllink .= "<a href=\"/product/view?id={$value->id}\" type=\"button\" class=\"btn btn-link\">{$value->name}</a><br>";
        }

        return $htmllink;
    }


}