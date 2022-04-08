<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model{
    
    use HasFactory;
    
    public function foodable() {
        return $this->morphTo();
    }

    public function orderItem() {
        return $this->hasMany(OrderItem::class);
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

}
