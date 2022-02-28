<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    
    public function account(){
        return $this->morphOne(Account::class, 'accountable');
    }
    
    public function delivery(){
        return $this->hasMany(Delivery::class);
    }
}
