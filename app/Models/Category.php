<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private $categoryName;
    
    public function __construct($categoryName) {
        $this->categoryName = $categoryName;
    }

    public function food(){
        return $this->hasMany(Food::class);
    }
    
    function getCategoryName() {
        return $this->categoryName;
    }

    function setCategoryName($categoryName): void {
        $this->categoryName = $categoryName;
    }
    
}
