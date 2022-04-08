<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\States;


/**
 * Description of PendingState
 *
 * @author LOW JIA HIE
 */
class Pending extends BookingState {

    public static $name = 'pending';

    public function description(): string {
        return "Waiting for admin to approve your booking";
    }

}
