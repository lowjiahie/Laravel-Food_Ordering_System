<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model {

    use HasFactory;

    public function order() {
        return $this->hasMany(Order::class);
    }
    
    public function dineIn(){
        return $this->hasMany(DineIn::class);
    }

}
