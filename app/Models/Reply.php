<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model {

    use HasFactory;

    public function account() {
        return $this->belongsTo(Account::class);
    }

    public function comment() {
        return $this->belongsTo(Comment::class);
    }

}
