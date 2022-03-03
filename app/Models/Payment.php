<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    
    public function promotion(){
        return $this->belongsTo(Promotion::class);
    }
    
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
