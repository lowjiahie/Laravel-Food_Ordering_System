<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\States;

/**
 * Description of CancelledState
 *
 * @author LOW JIA HIE
 */
class Cancelled extends BookingState {

    public static $name = 'cancelled';

    public function description(): string {
        return "Booking had been canceled";
    }

}
