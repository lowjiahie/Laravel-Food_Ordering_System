<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    use HasFactory;

    public function account() {
        return $this->belongsTo(Account::class);
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function reply() {
        return $this->hasMany(Reply::class);
    }

}
