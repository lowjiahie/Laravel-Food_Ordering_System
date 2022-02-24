<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model {

    use HasFactory;

    public function booking() {
        return $this->hasMany(Booking::class);
    }

    public function order() {
        return $this->hasMany(Order::class);
    }

}
