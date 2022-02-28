<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    use HasFactory;

    public function status() {
        return $this->morphMany(Status::class, 'statusable');
    }

    public function delivery() {
        return $this->hasOne(Delivery::class);
    }

    public function orderItem() {
        return $this->hasMany(OrderItem::class);
    }

    public function table() {
        return $this->belongsTo(Table::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function payment() { // not sure
        return $this->belongsTo(Payment::class);
    }

}
