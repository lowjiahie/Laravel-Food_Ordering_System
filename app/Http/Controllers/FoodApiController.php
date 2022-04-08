<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FoodApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexDish() {
        $dishes = DB::table('food')
                ->join('dishes', 'food.foodable_id', '=', 'dishes.id')
                ->where('foodable_type', 'App\Models\Dish')
                ->get();
        return $this->returnJSONresponse($dishes);
    }
    
    public function indexBeverage(){
        $beverages = DB::table('food')
                ->join('beverages', 'food.foodable_id', '=', 'beverages.id')
                ->where('foodable_type', 'App\Models\Beverage')
                ->get();
        return $this->returnJSONresponse($beverages);
    }

    public function returnJSONresponse($params)
    {
        if($params == "[]"){
            return response()->json([
                'success'   => true,
                'message'   => 'Record(s) Retrieval Fail',
                'data'      => "Foods not found"
            ]);
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Record(s) Retrieval Success',
            'data'      => $params
        ]);
    }
}
