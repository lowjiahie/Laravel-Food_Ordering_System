<?php

namespace App\Models;
use Illuminate\Support\Facades;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Food;

class Dish extends Model{

    use HasFactory;

    public function food() {
        return $this->morphOne(Food::class, 'foodable');
    }

}
