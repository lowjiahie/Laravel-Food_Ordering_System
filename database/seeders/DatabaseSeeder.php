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
//        $this->seedPromotions();
        $this->seedTable();
        $this->seedOrders();
        $this->seedOrderItems();
//        $this->seedPayments();
//        $this->seedDineIns();
//        $this->seedDeliveries();
//        $this->seedStatuses();
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
            'table_num' => 00,
            'num_seats' => 0,
        ])->save();
        
        Table::create([
            'table_num' => 10,
            'num_seats' => 8,
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

    private function seedOrders() {
        Order::create([
            'note' => 'New year lou shang after lunch',
            'serviceMode' => 'Dine-In',
            'customer_id' => 1,
            'table_num'=>20,
            'created_at' => '24-2-2022 07:29:36',
            'updated_at' => '24-2-2022 07:29:36',
        ])->save();

        Order::create([
            'note' => 'New year lou shang set',
            'serviceMode' => 'Dine-In',
            'customer_id' => 1,
            'table_num'=>30,
            'created_at' => '25-2-2022 07:29:36',
            'updated_at' => '25-2-2022 07:29:36',
        ])->save();

        Order::create([
            'note' => 'Cutlery is not needed',
            'serviceMode' => 'Dine-In',
            'customer_id' => 1,
            'table_num'=>10,
            'created_at' => '26-2-2022 07:29:36',
            'updated_at' => '26-2-2022 07:29:36',
        ])->save();
    }

}
