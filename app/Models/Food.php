<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class Food {
    use HasFactory;
    private $foodName;
    private $foodDescription;
    private $category;
    private $price;
    private $placingNumberInSales;
    private $quantity;    
    private $image_path;
    
    function __construct($foodName, $foodDescription, $category, $price, $placingNumberInSales, $quantity, $image_path) {
        $this->foodName = $foodName;
        $this->foodDescription = $foodDescription;
        $this->category = $category;
        $this->price = $price;
        $this->placingNumberInSales = $placingNumberInSales;
        $this->quantity = $quantity;
        $this->image_path = $image_path;
    }
    
    function getCategory() {
        return $this->category;
    }

    function setCategory($category): void {
        $this->category = $category;
    }

        
    public function foodable() {
        return $this->morphTo();
    }

    public function orderItem() {
        return $this->hasMany(OrderItem::class);
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    function getFoodName() {
        return $this->foodName;
    }

    function getFoodDescription() {
        return $this->foodDescription;
    }

    function getPrice() {
        return $this->price;
    }

    function getPlacingNumberInSales() {
        return $this->placingNumberInSales;
    }

    function getQuantity() {
        return $this->quantity;
    }

    function getImage_path() {
        return $this->image_path;
    }

    function setFoodName($foodName): void {
        $this->foodName = $foodName;
    }

    function setFoodDescription($foodDescription): void {
        $this->foodDescription = $foodDescription;
    }

    function setPrice($price): void {
        $this->price = $price;
    }

    function setPlacingNumberInSales($placingNumberInSales): void {
        $this->placingNumberInSales = $placingNumberInSales;
    }

    function setQuantity($quantity): void {
        $this->quantity = $quantity;
    }

    function setImage_path($image_path): void {
        $this->image_path = $image_path;
    }
    
    public abstract function optionAvailable() : void ;
    public abstract function addOns() : void ;
}
