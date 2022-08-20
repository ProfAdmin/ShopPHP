<?php

namespace models;

class category {

    // get all category from json
    public static function getAll() {
        $db = new db_files();
        return $db->category;
    }

    // get values for select
    public static function getForSelect() {
        $select = self::getAll();
        $htmlSelect = '';
        foreach ($select as $value) {
            $htmlSelect .= "<option value=\"{$value->id}\">{$value->name}</option>";
        }
        return $htmlSelect;
    }

    //get list for link
    public static function getForLink() {
        $link = self::getAll();
        $htmllink = '';
        foreach ($link as $value) {
            $htmllink .= "<a href=\"/product/category?id={$value->id}\" type=\"button\" class=\"btn btn-link\">{$value->name}</a>";
        }
        return $htmllink;
    }

    // get category by Id
    public static function getById($id) {
        $catLink = self::getAll();
        $cat = '';
        foreach ($catLink as $value) {
            if($id == $value->id) {
                $cat = $value->name;
            }
        }
        return $cat;
    }

}