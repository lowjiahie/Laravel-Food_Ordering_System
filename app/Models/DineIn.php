<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DineIn extends Model {

    use HasFactory;

    public function order() {
        return $this->belongsTo(Order::class);
    }
    public function table() {
        return $this->belongsTo(Table::class);
    }

}
