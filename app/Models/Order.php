<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    use HasFactory;

    public function orderItem() {
        return $this->hasMany(OrderItem::class);
    }

    public function table() {
        return $this->belongsTo(Table::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

}
