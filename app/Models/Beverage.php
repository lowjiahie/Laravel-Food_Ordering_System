<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades;
use App\Models\Food;

class Beverage extends Model{

    use HasFactory;

    public function food() {
        return $this->morphOne(Food::class, 'foodable');
    }
    
}
