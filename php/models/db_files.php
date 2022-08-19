<?php

namespace models;

class db_files {

    public $category;
    public $product;

    // add product to data
    public function addProduct() {

    }

    // read files when make object
    public function __construct() {
        $this->category = $this->downloadData('categories.json');
        $this->product = $this->downloadData('products.json');
    }

    // save data to files when script stop work
    public function __destruct() {
        $this->saveData('categories.json', $this->category);
        $this->saveData('products.json', $this->product);
    }

    private function downloadData($nameFile) {
        //get all data
        $data = file_get_contents('././' . $nameFile);
        return json_decode($data);
    }

    private function saveData($saveFile, $data) {
        $data = json_encode($data);
        file_put_contents('././' . $saveFile, $data, LOCK_EX);
    }
}