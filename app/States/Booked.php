<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\States;

/**
 * Description of BookedState
 *
 * @author LOW JIA HIE
 */
class Booked extends BookingState {

    public static $name = 'booked';

    public function description(): string {
        return "Your booking has been success booked, please reach "
        . "the restaurant on the booking time";
    }

}
