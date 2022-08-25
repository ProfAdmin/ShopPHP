<?php

namespace Models;

class Product
{
    public int $id;
    public string $name;
    public string $description;
    public string $picture;
    public int $price;
    public int $categoryId;
}