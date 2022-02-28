<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    
    public function order(){
        return $this->belongsTo(Order::class);
    }
    
    public function staff(){
        return $this->belongsTo(Staff::class);
    }
    
    
}
