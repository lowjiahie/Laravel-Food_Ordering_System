<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

    use HasFactory;

    public function account() {
        return $this->morphOne(Account::class, 'accountable');
    }
    
    public function booking(){
        return $this->hasMany(Booking::class);
    }
    
    public function order(){
        return $this->hasMany(Order::class);
    }

}
