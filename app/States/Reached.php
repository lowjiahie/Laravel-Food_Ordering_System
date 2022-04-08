<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\States;

/**
 * Description of ReachedState
 *
 * @author LOW JIA HIE
 */
class Reached extends BookingState {
    
    public static $name = 'reached';
    
    public function description() : string{
        return "Hope you enjoyed the food";
    }

}
