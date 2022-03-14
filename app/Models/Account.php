<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model {

    use HasFactory;

    public function accountable() {
        return $this->morphTo();
    }

    public function post() {
        return $this->hasMany(Post::class);
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }

    public function reply() {
        return $this->hasMany(Reply::class);
    }

    public function order() {
        return $this->hasMany(Order::class);
    }
    
    public function booking() {
        return $this->hasMany(Booking::class);
    }

}
