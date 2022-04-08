<?php

namespace App\States;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class BookingState extends State {

    abstract public function description(): string;

    public static function config(): StateConfig {
        return parent::config()
                        ->default(Pending::class)
                        ->allowTransition(Pending::class, Booked::class)
                        ->allowTransition(Pending::class, Cancelled::class)
                        ->allowTransition(Booked::class, Reached::class)
                        ->allowTransition(Booked::class, Cancelled::class)
                ;
    }

}
