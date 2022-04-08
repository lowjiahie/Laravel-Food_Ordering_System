<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Http\Requests\CategoryFormRequest;
use App\Http\Requests\UpdateImageRequest;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
    }

    public function dishIndex() {
        $dishes = DB::table('food')
                ->join('dishes', 'food.foodable_id', '=', 'dishes.id')
                ->where('foodable_type', 'App\Models\Dish')
                ->orderBy('placingNumberInSales', 'asc')
                ->paginate(8);

        $categories = DB::table('categories')->get();

        return view('layouts/Customer/dishMenu', ['dishes' => $dishes, 'categories' => $categories]);
    }

    public function beverageIndex() {
        $beverages = DB::table('food')
                ->join('beverages', 'food.foodable_id', '=', 'beverages.id')
                ->where('foodable_type', 'App\Models\Beverage')
                ->orderBy('placingNumberInSales', 'asc')
                ->paginate(8);

        $categories = DB::table('categories')->get();

        return view('layouts/Customer/beverageMenu', ['beverages' => $beverages, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function foodCreate() {
        $categories = DB::table('categories')->get();
        return view('layouts/Staff/createFood', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDish(StoreUserRequest $request) {

        if ($request->isMethod('post')) {
            $this->validate($request, $request->rules(), $request->messages());
            $data = $request->all();
            $dish_foodName = $data['foodName'];
            $dish_category = $data['category'];
            $dish_description = $data['foodDescription'];
            $dish_price = $data['price'];
            $dish_placingNumberInSales = $data['placingNumberInSales'];
            $dish_quantity = $data['quantity'];
            $dish_image_path = $data['image_path'];
            $foodImageName = $dish_image_path->getClientOriginalName(); // get original name of image
            $dish_image_path->move(public_path('img'), $foodImageName); // move the image to public/images

            $seafoodFree = '';
            $nutFree = '';
            $veganFriendly = '';
            $vegetarianFriendly = '';

            if (isset($request->seafoodfree)) {
                $seafoodFree = 1;
            } else {
                $seafoodFree = 0;
            }
            if (isset($request->nutfree)) {
                $nutFree = 1;
            } else {
                $nutFree = 0;
            }
            if (isset($request->vegetarian)) {
                $veganFriendly = 1;
            } else {
                $veganFriendly = 0;
            }
            if (isset($request->vegan)) {
                $vegetarianFriendly = 1;
            } else {
                $vegetarianFriendly = 0;
            }

            $lastIDDish = DB::table('food')->orderBy('id', 'desc')->first();
            $lastRecordDish = DB::table('dishes')->orderBy('id', 'desc')->first();
            DB::table('food')->insert(
                    array(
                        "id" => (int)($lastIDDish->id)+1,
                        "foodName" => $dish_foodName,
                        "foodDescription" => $dish_description,
                        "category" => $dish_category,
                        "price" => $dish_price,
                        "placingNumberInSales" => $dish_placingNumberInSales,
                        "quantity" => $dish_quantity,
                        "image_path" => $foodImageName,
                        "foodable_type" => 'App\Models\Dish',
                        "foodable_id" => (int) ($lastRecordDish->id) + 1
                    )
            );
            DB::table('dishes')->insert(
                    array(
                        'id' => (int) ($lastRecordDish->id) + 1,
                        'seafoodFree' => $seafoodFree,
                        'nutFree' => $nutFree,
                        'veganFriendly' => $veganFriendly,
                        'vegetarianFriendly' => $vegetarianFriendly
                    )
            );
            return redirect('/createFood');
        }
    }

    public function storeBeverage(StoreUserRequest $request) {

        if ($request->isMethod('post')) {
            $this->validate($request, $request->rules(), $request->messages());
            $data = $request->all();
            $beverage_foodName = $data['foodName'];
            $beverage_category = $data['category'];
            $beverage_description = $data['foodDescription'];
            $beverage_price = $data['price'];
            $beverage_placingNumberInSales = $data['placingNumberInSales'];
            $beverage_quantity = $data['quantity'];
            $beverage_image_path = $data['image_path'];
            $foodImageName = $beverage_image_path->getClientOriginalName(); // get original name of image
            $beverage_image_path->move(public_path('img'), $foodImageName); // move the image to public/images
            $hotDrink = '';
            $coldDrink = '';

            if (isset($request->hotdrink)) {
                $hotDrink = 1;
            } else {
                $hotDrink = 0;
            }
            if (isset($request->colddrink)) {
                $coldDrink = 1;
            } else {
                $coldDrink = 0;
            }

            $lastIDBeverage = DB::table('food')->orderBy('id', 'desc')->first();
            $lastRecordBeverage = DB::table('beverages')->orderBy('id', 'desc')->first();
            DB::table('food')->insert(
                    array(
                        "id" => (int)($lastIDBeverage->id)+1,
                        'foodName' => $beverage_foodName,
                        "foodDescription" => $beverage_description,
                        "category" => $beverage_category,
                        "price" => $beverage_price,
                        "placingNumberInSales" => $beverage_placingNumberInSales,
                        "quantity" => $beverage_quantity,
                        "image_path" => $foodImageName,
                        "foodable_type" => 'App\Models\Beverage',
                        "foodable_id" => (int) ($lastRecordBeverage->id) + 1
                    )
            );
            DB::table('beverages')->insert(
                    array(
                        'id' => (int) ($lastRecordBeverage->id) + 1,
                        'hotDrink' => $hotDrink,
                        'coldDrink' => $coldDrink,
                    )
            );
            return redirect('/createFood');
        }
    }

    public function storeCategory(CategoryFormRequest $request) {

        if ($request->isMethod('post')) {
            $this->validate($request, $request->rules(), $request->messages());
            $data = $request->all();
            $category_Name = $data['categoryName'];

            DB::table('categories')->insert(
                    array(
                        'categoryName' => $category_Name,
                    )
            );

            return redirect('/createFood');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id) {
//        //
//    }

    /**
     * Show list of resources in storage.
     */
    public function dishCreated() {
        $dishes = DB::table('food')->where('foodable_type', 'App\Models\Dish')->paginate(10);
        return view('layouts/Staff/editDish', ['dishes' => $dishes]);
    }

    public function beverageCreated() {
        $beverages = DB::table('food')->where('foodable_type', 'App\Models\Beverage')->paginate(10);
        return view('layouts/Staff/editBeverage', ['beverages' => $beverages]);
    }

    public function categoryCreated() {
        $categories = DB::table('categories')->paginate(10);
        return view('layouts/Staff/editCategory', ['categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function beverageEdit($id) {
        $editBeverage = DB::table('food')
                ->join('beverages', 'food.foodable_id', '=', 'beverages.id')
                ->where('food.id', $id)
                ->get();
        $categories = DB::table('categories')->get();
        return view('layouts/Staff/beverageEditForm', ['editBeverage' => $editBeverage, 'categories' => $categories]);
    }

    public function dishEdit($id) {
        $editDish = DB::table('food')
                ->join('dishes', 'food.foodable_id', '=', 'dishes.id')
                ->where('food.id', $id)
                ->get();
        
        $categories = DB::table('categories')->get();
        return view('layouts/Staff/dishEditForm', ['editDish' => $editDish, 'categories' => $categories]);
    }

    public function categoryEdit($id) {
        $editCategory = DB::table('categories')->where('id', $id)->get();
        return view('layouts/Staff/categoryEditForm', ['editCategory' => $editCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDish(UpdateFormRequest $request, $id) {
        if ($request->isMethod('post')) {
            $this->validate($request, $request->rules(), $request->messages());
            $data = $request->all();
            $dish_foodName = $data['foodName'];
            $dish_category = $data['category'];
            $dish_description = $data['foodDescription'];
            $dish_price = $data['price'];
            $dish_placingNumberInSales = $data['placingNumberInSales'];
            $dish_quantity = $data['quantity'];
            $dish_foodable_id = $data['dish_foodable_id'];
            $seafoodFree = '';
            $nutFree = '';
            $veganFriendly = '';
            $vegetarianFriendly = '';
            
            if (isset($request->dish_seafoodfree)) {
                $seafoodFree = 1;
            } else {
                $seafoodFree = 0;
            }
            if (isset($request->dish_nutfree)) {
                $nutFree = 1;
            } else {
                $nutFree = 0;
            }
            if (isset($request->vegetarianFriendly)) {
                $veganFriendly = 1;
            } else {
                $veganFriendly = 0;
            }
            if (isset($request->veganFriendly)) {
                $vegetarianFriendly = 1;
            } else {
                $vegetarianFriendly = 0;
            }

            $dish_count = DB::table('food')->where('foodName', $dish_foodName)->count();
            if ($dish_count === 0) 
            {
                DB::table('food')
                        ->where('id', $id)
                        ->limit(1)
                        ->update(array(
                            "foodName" => $dish_foodName,
                            "foodDescription" => $dish_description,
                            "category" => $dish_category,
                            "price" => $dish_price,
                            "placingNumberInSales" => $dish_placingNumberInSales,
                            "quantity" => $dish_quantity,
                            "foodable_type" => 'App\Models\Dish',
                            "foodable_id" => (int) $dish_foodable_id
                ));
            } else {
                DB::table('food')
                        ->where('id', $id)
                        ->limit(1)
                        ->update(array(
                            "foodDescription" => $dish_description,
                            "category" => $dish_category,
                            "price" => $dish_price,
                            "placingNumberInSales" => $dish_placingNumberInSales,
                            "quantity" => $dish_quantity,
                            "foodable_type" => 'App\Models\Dish',
                            "foodable_id" => (int) $dish_foodable_id
                ));
            }
            DB::table('dishes')
                    ->where('id', (int) $dish_foodable_id)
                    ->limit(1)
                    ->update(array('id' => (int) $dish_foodable_id,
                        'seafoodFree' => $seafoodFree,
                        'nutFree' => $nutFree,
                        'veganFriendly' => $veganFriendly,
                        'vegetarianFriendly' => $vegetarianFriendly
            ));
            return redirect()->to('dishEditForm/' . $id);
        }
    }

    public function updateBeverage(UpdateFormRequest $request, $id) {

        if ($request->isMethod('post')) {
            $this->validate($request, $request->rules(), $request->messages());
            $data = $request->all();
            $beverage_foodName = $data['foodName'];
            $beverage_category = $data['category'];
            $beverage_description = $data['foodDescription'];
            $beverage_price = $data['price'];
            $beverage_placingNumberInSales = $data['placingNumberInSales'];
            $beverage_quantity = $data['quantity'];
            $beverage_foodable_id = $data['beverage_foodable_id'];

            $beverage_hotdrink = '';
            $beverage_colddrink = '';

            if (isset($request->beverage_hotdrink)) {
                $beverage_hotdrink = 1;
            } else {
                $beverage_hotdrink = 0;
            }
            if (isset($request->beverage_colddrink)) {
                $beverage_colddrink = 1;
            } else {
                $beverage_colddrink = 0;
            }

            $beverages = DB::table('food')->where('foodName', $beverage_foodName)->count();
            if ($beverages === 0) {
                DB::table('food')
                        ->where('id', $id)
                        ->limit(1)
                        ->update(array(
                            "foodName" => $beverage_foodName,
                            "foodDescription" => $beverage_description,
                            "category" => $beverage_category,
                            "price" => $beverage_price,
                            "placingNumberInSales" => $beverage_placingNumberInSales,
                            "quantity" => $beverage_quantity,
                            "foodable_type" => 'App\Models\Beverage',
                            "foodable_id" => (int) $beverage_foodable_id
                ));
            } else if($beverages === 1) {
                DB::table('food')
                        ->where('id', $id)
                        ->limit(1)
                        ->update(array(
                            "foodDescription" => $beverage_description,
                            "category" => $beverage_category,
                            "price" => $beverage_price,
                            "placingNumberInSales" => $beverage_placingNumberInSales,
                            "quantity" => $beverage_quantity,
                            "foodable_type" => 'App\Models\Beverage',
                            "foodable_id" => (int) $beverage_foodable_id
                ));
            }
            DB::table('beverages')
                    ->where('id', (int) $beverage_foodable_id)
                    ->limit(1)
                    ->update(array('id' => (int) $beverage_foodable_id,
                        'hotDrink' => $beverage_hotdrink,
                        'coldDrink' => $beverage_hotdrink
            ));
            return redirect()->to('beverageEditForm/' . $id);
        }
    }

    public function updateCategory(CategoryFormRequest $request, $id) {
        if ($request->isMethod('post')) {
            $this->validate($request, $request->rules(), $request->messages());
            DB::table('categories')
                    ->where('id', $id)
                    ->update(array('categoryName' => $request->categoryName));

            return redirect()->to('categoryEditForm/' . $id);
        }
    }

    public function updateDishImage(UpdateImageRequest $request, $id) {

        if ($request->isMethod('post')) {
            $this->validate($request, $request->rules(), $request->messages());
            $data = $request->all();

            $dish_image_path = $data['image_path'];
            $foodImageName = $dish_image_path->getClientOriginalName();
            $dish_image_path->move(public_path('img'), $foodImageName);

            DB::table('food')
                    ->where('id', $id)
                    ->limit(1)
                    ->update(array(
                        "image_path" => $foodImageName,
            ));

            return redirect()->to('dishEditForm/' . $id);
        }
    }

    public function updateBeverageImage(UpdateImageRequest $request, $id) {

        if ($request->isMethod('post')) {
            $this->validate($request, $request->rules(), $request->messages());
            $data = $request->all();

            $dish_image_path = $data['image_path'];
            $foodImageName = $dish_image_path->getClientOriginalName();
            $dish_image_path->move(public_path('img'), $foodImageName);

            DB::table('food')
                    ->where('id', $id)
                    ->limit(1)
                    ->update(array(
                        "image_path" => $foodImageName,
            ));

            return redirect()->to('beverageEditForm/' . $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dishDestroy($id) {
        try {
            DB::table('food')->join('dishes', 'food.foodable_id', '=', 'dishes.id')->where('food.id', $id)->delete();
            return redirect('/editDish')->with('success', "operation success");
        } catch (Exception $ex) {
            return redirect('/editDish')->with('failed', "operation failed");
        }
    }

    public function beverageDestroy($id) {
        try {
            DB::table('food')->join('beverages', 'food.foodable_id', '=', 'beverages.id')->where('food.id', $id)->delete();
            return redirect('/editBeverage')->with('success', "operation success");
        } catch (Exception $ex) {
            return redirect('/editBeverage')->with('failed', "operation failed");
        }
    }

    public function categoryDestroy($id) {
        try {
            DB::table('categories')->where('categories.id', $id)->delete();
            return redirect('/editCategory')->with('success', "operation success");
        } catch (Exception $ex) {
            return redirect('/editCategory')->with('failed', "operation failed");
        }
    }

    public function xmlRead() {
        $xml = new \DOMDocument;
        $xml->load('xml/handbook.xml');

        $xsl = new \DOMDocument;
        $xsl->load('xsl/handbook.xsl');

        $proc = new \XSLTProcessor;
        $proc->importStylesheet($xsl);

        echo $proc->transformToXml($xml);
    }

}
