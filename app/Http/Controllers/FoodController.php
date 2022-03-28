<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dishIndex()
    {
        $dishes = DB::table('food')
                ->join('dishes', 'food.foodable_id', '=', 'dishes.id')
                ->where('foodable_type', 'App\Models\Dish')->get();
        return view('layouts/Customer/dishMenu', ['dishes' => $dishes]);
    }
    public function beverageIndex()
    {
        $beverages = DB::table('food')
                ->join('beverages', 'food.foodable_id', '=', 'beverages.id')
                ->where('foodable_type', 'App\Models\Beverage')->get();
        return view('layouts/Customer/beverageMenu', ['beverages' => $beverages]);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dishCreate()
    {
        $dishes = DB::table('food')->where('foodable_type', 'App\Models\Dish')->get();
        return view('layouts/Staff/dishManagement', ['dishes' => $dishes]);
    }
    public function beverageCreate()
    {
        $beverages = DB::table('food')->where('foodable_type', 'App\Models\Beverage')->get();
        return view('layouts/Staff/beverageManagement', ['beverages' => $beverages]);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function beverageEdit($id)
    {
        $editBeverage = DB::table('food')->where('id', $id)->get();
        return view('layouts/Staff/beverageEdit', ['editBeverage' => $editBeverage]);
    }
    public function dishEdit($id)
    {
        $editDish = DB::table('food')->where('id', $id)->get();
        return view('layouts/Staff/dishEdit', ['editDish' => $editDish]);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dishDestroy($id)
    {
        //
    }
}
