<?php

namespace Model;

class Product
{
    public int $id;
    public string $name;
    public string $description;
    public string $picture;
    public int $price;
    public int $categoryId;

    public function __construct(
        int $id,
        string $name,
        string $description,
        string $picture,
        int $price,
        int $categoryId
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->picture = $picture;
        $this->price = $price;
        $this->categoryId = $categoryId;
    }
}