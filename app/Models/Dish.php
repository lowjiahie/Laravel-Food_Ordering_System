<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Food;

class Dish extends Food {

    use HasFactory;
    private $preparationTime;
    private $seafoodFree;
    private $nutFree;
    private $veganFriendly;
    private $vegetarianFriendly;

    function __construct($preparationTime, $seafoodFree, $nutFree, $veganFriendly, $vegetarianFriendly) {
        parent::__construct($foodName, $foodDescription, $categoryName, $price, $placingNumberInSales, $quantity, $image_path);
        $this->preparationTime = $preparationTime;
        $this->seafoodFree = $seafoodFree;
        $this->nutFree = $nutFree;
        $this->veganFriendly = $veganFriendly;
        $this->vegetarianFriendly = $vegetarianFriendly;
    }

    public function food() {
        return $this->morphOne(Food::class, 'foodable');
    }

    function getPreparationTime() {
        return $this->preparationTime;
    }

    function getSeafoodFree() {
        return $this->seafoodFree;
    }

    function getNutFree() {
        return $this->nutFree;
    }

    function getVeganFriendly() {
        return $this->veganFriendly;
    }

    function getVegetarianFriendly() {
        return $this->vegetarianFriendly;
    }

    function setPreparationTime($preparationTime): void {
        $this->preparationTime = $preparationTime;
    }

    function setSeafoodFree($seafoodFree): void {
        $this->seafoodFree = $seafoodFree;
    }

    function setNutFree($nutFree): void {
        $this->nutFree = $nutFree;
    }

    function setVeganFriendly($veganFriendly): void {
        $this->veganFriendly = $veganFriendly;
    }

    function setVegetarianFriendly($vegetarianFriendly): void {
        $this->vegetarianFriendly = $vegetarianFriendly;
    }
//
    public function addOns() : void  {
        
    }

    public function optionAvailable(): void  {
        
    }

}
