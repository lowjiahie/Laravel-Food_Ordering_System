<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Food;

class Beverage extends Food {

    use HasFactory;
    private $hotDrink;
    private $coldDrink;
    private $caffeine;
    
    function __construct(Food $f, $hotDrink, $coldDrink, $caffeine) {
        parent::__construct($f->getFoodName(), $f->getFoodDescription(), $f->getCategory(), $f->getPrice(), $f->getPlacingNumberInSales(), 
                $f->getQuantity(), $f->getImage_path());
        $this->hotDrink = $hotDrink;
        $this->coldDrink = $coldDrink;
        $this->caffeine = $caffeine;
    }

    public function food() {
        return $this->morphOne(Food::class, 'foodable');
    }
    
    function getHotDrink() {
        return $this->hotDrink;
    }

    function getColdDrink() {
        return $this->coldDrink;
    }

    function getCaffeine() {
        return $this->caffeine;
    }
    
    function setHotDrink($hotDrink): void {
        $this->hotDrink = $hotDrink;
    }

    function setColdDrink($coldDrink): void {
        $this->coldDrink = $coldDrink;
    }

    function setCaffeine($caffeine): void {
        $this->caffeine = $caffeine;
    }

    public function addOns() : void  {
        
    }

    public function optionAvailable() : void  {
        
    }

}
