<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model {

    use HasFactory;

    public function status() {
        return $this->morphMany(Status::class, 'statusable');
    }
    
    public function order(){
        return $this->belongsTo(Order::class);
    }
    
    public function food(){
        return $this->belongsTo(Food::class);
    }

}
