<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
use App\Models\Beverage;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Customer;
use App\Models\Delivery;
use App\Models\DineIn;
use App\Models\Dish;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Post;
use App\Models\Promotion;
use App\Models\Reply;
use App\Models\Staff;
use App\Models\Status;
use App\Models\Table;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();
        $this->seedAccountsStaffOrCus();
        $this->seedCategories();
        $this->seedFood();
        $this->seedPosts();
        $this->seedComments();
        $this->seedReplies();
        $this->seedPromotions();
        $this->seedTable();
        $this->seedOrders();
        $this->seedOrderItems();
        $this->seedPayments();
        $this->seedDineIns();
        $this->seedDeliveries();
        $this->seedStatuses();
    }

    private function seedAccountsStaffOrCus() {
        Staff::create([
            'role' => 'D',
        ])->save();

        Account::create([
            'accountName' => 'LEE WANG SENG',
            'gender' => 'M',
            'accountEmail' => 'leewangseng123@gmail.com',
            'accountAddress' => '888,Jalan LengLong 8/88,Taman Wings,54000,Cheras,Kuala Lumpur',
            'password' => 'leewangseng123',
            'accountable_type' => Staff::class,
            'accountable_id' => 1,
        ])->save();

        Staff::create([
            'role' => 'A',
        ])->save();

        Account::create([
            'accountName' => 'JING SEE YUAN',
            'gender' => 'F',
            'accountEmail' => 'jingseeyuan123@gmail.com',
            'accountAddress' => '777,Jalan LengLong 7/77,Taman Wings,54000,Cheras,Kuala Lumpur',
            'password' => 'jingseeyuan123',
            'accountable_type' => Staff::class,
            'accountable_id' => 2,
        ])->save();

        Staff::create([
            'role' => 'C',
        ])->save();

        Account::create([
            'accountName' => 'QING YEE XUAN',
            'gender' => 'F',
            'accountEmail' => 'qingyeexuan123@gmail.com',
            'accountAddress' => '666,Jalan LengLong 6/66,Taman Wings,54000,Cheras,Kuantan',
            'password' => 'qingyeexuan123',
            'accountable_type' => Staff::class,
            'accountable_id' => 3,
        ])->save();

        Staff::create([
            'role' => 'D',
        ])->save();

        Account::create([
            'accountName' => 'CHANG WEN JIA',
            'gender' => 'M',
            'accountEmail' => 'wenjiachang123@gmail.com',
            'accountAddress' => '777,Jalan LengLong 6/66,Taman Wings,54000,Cheras,Kuala Lumpur',
            'password' => 'wenjiachang123',
            'accountable_type' => Staff::class,
            'accountable_id' => 4,
        ])->save();

        Customer::create([
            'DOB' => '2000-12-31',
        ])->save();

        Account::create([
            'accountName' => 'HEE FONG SHENG',
            'gender' => 'F',
            'accountEmail' => 'heefongsheng123@gmail.com',
            'accountAddress' => '555,Jalan LengLong 5/55,Taman Wings,54000,Cheras,Pahang',
            'password' => 'heefongsheng123',
            'accountable_type' => Customer::class,
            'accountable_id' => 1,
        ])->save();
    }

    private function seedPosts() {
        Post::create([
            'topic' => 'Recommendation',
            'post_desc' => 'It is Malaysia traditional breakfast.',
            'account_id' => '2', //admin
        ])->save();
    }

    private function seedComments() {
        Comment::create([
            'post_id' => '1',
            'comment_desc' => 'I love it!!! Best breakfast ever in my life!!',
            'account_id' => '5', //cus
        ])->save();
    }

    private function seedReplies() {
        Reply::create([
            'comment_id' => '1',
            'reply_desc' => 'Me too',
            'account_id' => '2', //admin
        ])->save();
    }

    private function seedCategories() {

        Category::create([
            'categoryName' => 'Rice',
            'description' => 'Rice options for you to choose from. Eg, Fried Rice, Chicken Rice, Nasi Lemak and more!',
        ])->save();

        Category::create([
            'categoryName' => 'Noodle',
            'description' => 'Noodle options for you to choose from. Eg, Chow Kuey Teow, Curry Noodle, Dry Noodles and more!',
        ])->save();

        Category::create([
            'categoryName' => 'Western Style',
            'description' => 'Eg, Chicken Chop',
        ])->save();

        Category::create([
            'categoryName' => 'Snack',
            'description' => 'Variety of Hainanese Snacks for you. Eg, Kaya Butter Toast, Steamed Bun,  more!',
        ])->save();

        Category::create([
            'categoryName' => 'Dessert',
            'description' => 'Many Hainanese Desserts available here. Eg, Egg Tart, Kuey Odeh, Yi Bua and more!',
        ])->save();

        Category::create([
            'categoryName' => 'Coffee',
            'description' => 'Variety of Asian Coffees. Eg, Kopi O, White Coffee, Cham and more!',
        ])->save();

        Category::create([
            'categoryName' => 'Tea',
            'description' => 'Variety of Teas. Eg, Teh Tarik, Green Tea, Ice Lemon Tea and more!',
        ])->save();

        Category::create([
            'categoryName' => 'Set Meal',
            'description' => 'Available from 13:00 to 15:30',
        ])->save();

        Category::create([
            'categoryName' => 'Vegan',
            'description' => 'Suitable for Vegan',
        ])->save();

        Category::create([
            'categoryName' => 'Vegetarain',
            'description' => 'Suitable for Vegetarian',
        ])->save();
    }

    private function seedFood() {

        Dish::create([
            'preparationTime' => '9 minutes',
            'dairyFree' => true,
            'glutenFree' => false,
            'nutFree' => false,
            'veganFriendly' => false,
            'vegetarianFriendly' => true,
        ])->save();

        Food::create([
            'foodName' => 'Chicken Rice',
            'category' => 'Rice',
            'price' => 10.99,
            'sales' => 1,
            'quantity' => 40,
            'image_path' => 'public/img/ChickenRice.jpg',
            'chefRecommended' => true,
            'foodable_type' => Dish::class,
            'foodable_id' => 1,
        ])->save();

        Dish::create([
            'preparationTime' => '10 minutes',
            'dairyFree' => false,
            'glutenFree' => false,
            'nutFree' => false,
            'veganFriendly' => false,
            'vegetarianFriendly' => false,
        ])->save();

        Food::create([
            'foodName' => 'Char Kuey Teow',
            'category' => 'Noodle',
            'price' => 9.00,
            'sales' => 2,
            'quantity' => 10,
            'image_path' => 'public/img/CharKueyTeow.jpg',
            'chefRecommended' => true,
            'foodable_type' => Dish::class,
            'foodable_id' => 2,
        ])->save();

        Dish::create([
            'preparationTime' => '8 minutes',
            'dairyFree' => true,
            'glutenFree' => false,
            'nutFree' => true,
            'veganFriendly' => true,
            'vegetarianFriendly' => true,
        ])->save();

        Food::create([
            'foodName' => 'Vegan Nasi Lemak',
            'category' => 'Vegan',
            'price' => 15.00,
            'sales' => 5,
            'quantity' => 10,
            'image_path' => 'public/img/VeganNasiLemak.jpg',
            'chefRecommended' => true,
            'foodable_type' => Dish::class,
            'foodable_id' => 3,
        ])->save();

        Beverage::create([
            'size' => 'small and large',
            'ice' => 'Available',
            'caffeine' => true,
        ])->save();

        Food::create([
            'foodName' => 'Kopi O',
            'category' => 'Coffee',
            'price' => 5.00,
            'sales' => 2,
            'quantity' => 50,
            'image_path' => 'public/img/KopiO.jpg',
            'chefRecommended' => false,
            'foodable_type' => Beverage::class,
            'foodable_id' => 1,
        ])->save();

        Beverage::create([
            'size' => 'small and large',
            'ice' => 'Available',
            'caffeine' => true,
        ])->save();

        Food::create([
            'foodName' => 'Teh Tarik',
            'category' => 'Tea',
            'price' => 6.00,
            'sales' => 4,
            'quantity' => 30,
            'image_path' => 'public/img/TehTarik.jpg',
            'chefRecommended' => false,
            'foodable_type' => Beverage::class,
            'foodable_id' => 2,
        ])->save();

        Beverage::create([
            'size' => 'one size',
            'ice' => 'Available',
            'caffeine' => false,
        ])->save();

        Food::create([
            'foodName' => 'Green Tea',
            'category' => 'Tea',
            'price' => 5.50,
            'sales' => 3,
            'quantity' => 90,
            'image_path' => 'public/img/GreenTea.jpg',
            'chefRecommended' => false,
            'foodable_type' => Beverage::class,
            'foodable_id' => 3,
        ])->save();
    }

    private function seedTable() {
        Table::create([
            'table_num' => 10,
            'num_seats' => 4,
        ])->save();

        Table::create([
            'table_num' => 20,
            'num_seats' => 2,
        ])->save();

        Table::create([
            'table_num' => 30,
            'num_seats' => 4,
        ])->save();

        Table::create([
            'table_num' => 40,
            'num_seats' => 4,
        ])->save();
    }

    private function seedPromotions() {
        Promotion::create([
            'promotionCode' => '',
            'description' => '',
            'discount' => 0,
            'redemptionLimit' => 0,
            'created_at' => '23-2-2022 07:29:36',
            'updated_at' => '23-2-2022 07:29:36',
        ])->save();

        Promotion::create([
            'promotionCode' => 'NEW_MEMBER',
            'description' => '10% off for newly registered member.',
            'discount' => 0.1,
            'redemptionLimit' => 100,
            'created_at' => '23-2-2022 07:29:36',
            'updated_at' => '23-2-2022 07:29:36',
        ])->save();

        Promotion::create([
            'promotionCode' => 'PAYDAY',
            'description' => '15% off for your meals on your PayDay !',
            'discount' => 0.15,
            'redemptionLimit' => 80,
            'created_at' => '23-2-2022 07:29:36',
            'updated_at' => '23-2-2022 07:29:36',
        ])->save();

        Promotion::create([
            'promotionCode' => 'CNY_LOUSHANG',
            'description' => 'RM15 off on your Lou Shang Set !',
            'discount' => 15,
            'redemptionLimit' => 50,
            'created_at' => '23-2-2022 07:29:36',
            'updated_at' => '23-2-2022 07:29:36',
        ])->save();

        Promotion::create([
            'promotionCode' => 'CHRISTMAS_EVE',
            'description' => 'RM10 off for your Christmas Eve Dinner !',
            'discount' => 10,
            'redemptionLimit' => 120,
            'created_at' => '23-2-2022 07:29:36',
            'updated_at' => '23-2-2022 07:29:36',
        ])->save();

        Promotion::create([
            'promotionCode' => 'NEWYEAR_EVE',
            'description' => '5% off for your Order on New Year Eve !',
            'discount' => 0.5,
            'redemptionLimit' => 200,
            'created_at' => '23-2-2022 07:29:36',
            'updated_at' => '23-2-2022 07:29:36',
        ])->save();
    }

    private function seedOrders() {
        Order::create([
            'note' => 'New year lou shang after lunch',
            'serviceMode' => 'Dine-In',
            'customer_id' => 1,
            'created_at' => '24-2-2022 07:29:36',
            'updated_at' => '24-2-2022 07:29:36',
        ])->save();

        Order::create([
            'note' => 'New year lou shang set',
            'serviceMode' => 'Delivery',
            'customer_id' => 1,
            'created_at' => '25-2-2022 07:29:36',
            'updated_at' => '25-2-2022 07:29:36',
        ])->save();

        Order::create([
            'note' => 'Cutlery is not needed',
            'serviceMode' => 'Delivery',
            'customer_id' => 1,
            'created_at' => '26-2-2022 07:29:36',
            'updated_at' => '26-2-2022 07:29:36',
        ])->save();
    }

    private function seedPayments() {
        Payment::create([
            'total' => 26.98,
            'amountReceived' => 30.0,
            'change' => 3.02,
            'discount' => 0,
            'status' => 'Success',
            'order_id' => 1,
            'promotion_id' => 1,
            'created_at' => '24-2-2022 07:29:36',
            'updated_at' => '24-2-2022 07:29:36',
        ])->save();

        Payment::create([
            'total' => 24.00,
            'amountReceived' => 50.00,
            'change' => 28.4,
            'discount' => 2.4,
            'status' => 'COD',
            'order_id' => 2,
            'promotion_id' => 2,
            'created_at' => '25-2-2022 07:29:36',
            'updated_at' => '25-2-2022 07:29:36',
        ])->save();

        Payment::create([
            'total' => 15.00,
            'amountReceived' => 13.5,
            'change' => 0,
            'discount' => 1.5,
            'status' => 'COD',
            'order_id' => 3,
            'promotion_id' => 2,
            'created_at' => '25-2-2022 07:29:36',
            'updated_at' => '25-2-2022 07:29:36',
        ])->save();
    }

    private function seedOrderItems() {
        //Order1
        OrderItem::create([
            'qty' => '2',
            'order_id' => '1',
            'food_id' => '1',
            'created_at' => '24-2-2022 07:29:36',
            'updated_at' => '24-2-2022 07:29:36',
        ])->save();
        OrderItem::create([
            'qty' => '1',
            'order_id' => '1',
            'food_id' => '4',
            'created_at' => '24-2-2022 07:29:36',
            'updated_at' => '24-2-2022 07:29:36',
        ])->save();

        //Order2
        OrderItem::create([
            'qty' => '1',
            'order_id' => '2',
            'food_id' => '2',
            'created_at' => '25-2-2022 07:29:36',
            'updated_at' => '25-2-2022 07:29:36',
        ])->save();

        OrderItem::create([
            'qty' => '1',
            'order_id' => '2',
            'food_id' => '3',
            'created_at' => '25-2-2022 07:29:36',
            'updated_at' => '25-2-2022 07:29:36',
        ])->save();

        //Order3
        OrderItem::create([
            'qty' => '1',
            'order_id' => '3',
            'food_id' => '2',
            'created_at' => '25-2-2022 07:29:36',
            'updated_at' => '25-2-2022 07:29:36',
        ])->save();

        OrderItem::create([
            'qty' => '1',
            'order_id' => '3',
            'food_id' => '5',
            'created_at' => '25-2-2022 07:29:36',
            'updated_at' => '25-2-2022 07:29:36',
        ])->save();
    }

    private function seedStatuses() {
        //Start Order1 - DineIn
        Status::create([
            'status_title' => 'Prepring',
            'details' => 'Your food is on preparing',
            'statusable_type' => Order::class,
            'statusable_id' => 1,
            'created_at' => '24-2-2022 07:30:00',
            'updated_at' => '24-2-2022 07:30:00',
        ])->save();

        Status::create([
            'status_title' => 'Cooking',
            'details' => 'Estimate finish serve time will be 30 minit',
            'statusable_type' => Order::class,
            'statusable_id' => 1,
            'created_at' => '24-2-2022 07:33:00',
            'updated_at' => '24-2-2022 07:33:00',
        ])->save();

        Status::create([
            'status_title' => 'Served',
            'details' => 'Food has been served, enjoy your food',
            'statusable_type' => Order::class,
            'statusable_id' => 1,
            'created_at' => '24-2-2022 08:00:00',
            'updated_at' => '24-2-2022 08:00:00',
        ])->save();

        //Order1 - orderItem1 and orderItem2
        //orderItem1
        Status::create([
            'status_title' => 'Preparing',
            'details' => 'Your food is on preparing',
            'statusable_type' => OrderItem::class,
            'statusable_id' => 1,
            'created_at' => '24-2-2022 07:30:00',
            'updated_at' => '24-2-2022 07:30:00',
        ])->save();
        Status::create([
            'status_title' => 'Served',
            'details' => 'Your Food is served',
            'statusable_type' => OrderItem::class,
            'statusable_id' => 2,
            'created_at' => '24-2-2022 07:42:00',
            'updated_at' => '24-2-2022 07:42:00',
        ])->save();

        //orderItem2
        Status::create([
            'status_title' => 'Preparing',
            'details' => 'Your drink is on preparing',
            'statusable_type' => OrderItem::class,
            'statusable_id' => 2,
            'created_at' => '24-2-2022 07:30:00',
            'updated_at' => '24-2-2022 07:30:00',
        ])->save();
        Status::create([
            'status_title' => 'Served',
            'details' => 'Your Food has been served',
            'statusable_type' => OrderItem::class,
            'statusable_id' => 1,
            'created_at' => '24-2-2022 07:40:00',
            'updated_at' => '24-2-2022 07:40:00',
        ])->save();
        //End Order1 - DineIn
        //
        //Start Order2 - Delivery
        Status::create([
            'status_title' => 'Submitted',
            'details' => 'Order is submitted, assigning driver to you...',
            'statusable_type' => Order::class,
            'statusable_id' => 2,
            'created_at' => '25-2-2022 07:30:00',
            'updated_at' => '25-2-2022 07:30:00',
        ])->save();

        Status::create([
            'status_title' => 'Preparing',
            'details' => 'Order has been assign to a driver, order now is perparing',
            'statusable_type' => Order::class,
            'statusable_id' => 2,
            'created_at' => '25-2-2022 07:35:00',
            'updated_at' => '25-2-2022 07:35:00',
        ])->save();

        Status::create([
            'status_title' => 'Cooking',
            'details' => 'Estimate serve time within 30 minit',
            'statusable_type' => Order::class,
            'statusable_id' => 2,
            'created_at' => '25-2-2022 07:36:30',
            'updated_at' => '25-2-2022 07:36:30',
        ])->save();

        Status::create([
            'status_title' => 'Out of Delivery',
            'details' => 'Driver is on the way to you',
            'statusable_type' => Order::class,
            'statusable_id' => 2,
            'created_at' => '25-2-2022 07:50:00',
            'updated_at' => '25-2-2022 07:50:00',
        ])->save();

        Status::create([
            'status_title' => 'Delivered',
            'details' => 'Driver has delivered your food',
            'statusable_type' => Order::class,
            'statusable_id' => 2,
            'created_at' => '25-2-2022 07:58:00',
            'updated_at' => '25-2-2022 07:58:00',
        ])->save();

        //Order2 - orderItem3 and orderItem4
        //orderItem3
        Status::create([
            'status_title' => 'Preparing',
            'details' => 'Your food is on preparing',
            'statusable_type' => OrderItem::class,
            'statusable_id' => 3,
            'created_at' => '25-2-2022 07:32:30',
            'updated_at' => '25-2-2022 07:32:30',
        ])->save();
        Status::create([
            'status_title' => 'Served',
            'details' => 'Your Food is served',
            'statusable_type' => OrderItem::class,
            'statusable_id' => 3,
            'created_at' => '25-2-2022 07:50:00',
            'updated_at' => '25-2-2022 07:50:00',
        ])->save();

        //orderItem4
        Status::create([
            'status_title' => 'Preparing',
            'details' => 'Your drink is on preparing',
            'statusable_type' => OrderItem::class,
            'statusable_id' => 4,
            'created_at' => '25-2-2022 07:32:30',
            'updated_at' => '24-2-2022 07:32:30',
        ])->save();
        Status::create([
            'status_title' => 'Served',
            'details' => 'Your Food has been served',
            'statusable_type' => OrderItem::class,
            'statusable_id' => 4,
            'created_at' => '25-2-2022 07:50:00',
            'updated_at' => '25-2-2022 07:50:00',
        ])->save();
        //End Order2 - Delivery
        //
        //Start Order3 - Delivery
        Status::create([
            'status_title' => 'Submitted',
            'details' => 'Order is submitted, assigning driver to you...',
            'statusable_type' => Order::class,
            'statusable_id' => 2,
            'created_at' => '25-2-2022 07:31:00',
            'updated_at' => '25-2-2022 07:31:00',
        ])->save();

        Status::create([
            'status_title' => 'Preparing',
            'details' => 'Order has been assign to a driver, order now is perparing',
            'statusable_type' => Order::class,
            'statusable_id' => 2,
            'created_at' => '25-2-2022 07:35:00',
            'updated_at' => '25-2-2022 07:35:00',
        ])->save();

        Status::create([
            'status_title' => 'Cooking',
            'details' => 'Estimate serve time within 30 minit',
            'statusable_type' => Order::class,
            'statusable_id' => 3,
            'created_at' => '25-2-2022 07:32:00',
            'updated_at' => '25-2-2022 07:32:00',
        ])->save();

        Status::create([
            'status_title' => 'Out of Delivery',
            'details' => 'Driver is on the way to you',
            'statusable_type' => Order::class,
            'statusable_id' => 3,
            'created_at' => '25-2-2022 07:50:00',
            'updated_at' => '25-2-2022 07:50:00',
        ])->save();

        Status::create([
            'status_title' => 'Delivered',
            'details' => 'Driver has delivered your food',
            'statusable_type' => Order::class,
            'statusable_id' => 3,
            'created_at' => '25-2-2022 07:58:00',
            'updated_at' => '25-2-2022 07:58:00',
        ])->save();

        //Order3 - orderItem5 and orderItem6
        //orderItem5
        Status::create([
            'status_title' => 'Preparing',
            'details' => 'Your food is on preparing',
            'statusable_type' => OrderItem::class,
            'statusable_id' => 5,
            'created_at' => '25-2-2022 07:32:30',
            'updated_at' => '25-2-2022 07:32:30',
        ])->save();

        Status::create([
            'status_title' => 'Served',
            'details' => 'Your Food has been served',
            'statusable_type' => OrderItem::class,
            'statusable_id' => 5,
            'created_at' => '25-2-2022 07:50:00',
            'updated_at' => '25-2-2022 07:50:00',
        ])->save();

        //orderItem6
        Status::create([
            'status_title' => 'Preparing',
            'details' => 'Your drink is on preparing',
            'statusable_type' => OrderItem::class,
            'statusable_id' => 6,
            'created_at' => '25-2-2022 07:32:30',
            'updated_at' => '24-2-2022 07:32:30',
        ])->save();
        Status::create([
            'status_title' => 'Served',
            'details' => 'Your Food has been served',
            'statusable_type' => OrderItem::class,
            'statusable_id' => 6,
            'created_at' => '25-2-2022 07:50:00',
            'updated_at' => '25-2-2022 07:50:00',
        ])->save();
        //End Order2 - Delivery
    }

    private function seedDeliveries() {
        //Order2
        Delivery::create([
            'track_no' => 'D200202251001',
            'address' => '555,Jalan LengLong 5/55,Taman Wings,54000,Cheras,Pahang',
            'staff_id' => '1',
            'order_id' => '2',
            'created_at' => '25-2-2022 07:35:00',
            'updated_at' => '25-2-2022 07:35:00',
        ])->save();
        
        //Order3
        Delivery::create([
            'track_no' => 'D200202251002',
            'address' => '555,Jalan LengLong 5/55,Taman Wings,54000,Cheras,Pahang',
            'staff_id' => '4',
            'order_id' => '3',
            'created_at' => '25-2-2022 07:35:00',
            'updated_at' => '25-2-2022 07:35:00',
        ])->save();
    }

    private function seedDineIns() {
        DineIn::create([
            'order_id' => 1,
            'table_num' => 10,
            'created_at' => '24-2-2022 07:29:36',
            'updated_at' => '24-2-2022 07:29:36',
        ])->save();
    }

}
