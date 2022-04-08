<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStates\HasStates;
use App\States\BookingState;


class Booking extends Model {

    use HasStates;
    
    protected $fillable = ['booking_no','booking_datetime',
        'state','nickname',
        'cus_phoneNum','numPersons',
        'account_id','table_num'];
    
    protected $casts = [
        'state' => BookingState::class,
    ];

    public function table() {
        return $this->belongsTo(Table::class);
    }

    public function account() {
        return $this->belongsTo(Account::class,'account_id');
    }

    
}
