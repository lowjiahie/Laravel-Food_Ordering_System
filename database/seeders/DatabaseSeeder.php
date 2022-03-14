<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
use App\Models\Beverage;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Customer;
use App\Models\Dish;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Booking;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Staff;
use App\Models\Table;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->seedAccountsStaffOrCus();
        $this->seedCategories();
        $this->seedFood();
        $this->seedPosts();
        $this->seedComments();
        $this->seedReplies();
        $this->seedTable();
        $this->seedOrders();
        $this->seedOrderItems();
        $this->seedBookingItems();
    }

    private function seedAccountsStaffOrCus() {
        //Staff
        Staff::create([
            'role' => 'S', //service crew
        ])->save();

        Account::create([//1
            'accountName' => 'LEE WANG SENG',
            'gender' => 'M',
            'accountEmail' => 'leewangseng123@gmail.com',
            'accountAddress' => '888,Jalan LengLong 8/88,Taman Wings,54000,Cheras,Kuala Lumpur',
            'password' => 'leewangseng123',
            'accountable_type' => Staff::class,
            'accountable_id' => 1,
        ])->save();

        Staff::create([
            'role' => 'A', //Admin
        ])->save();

        Account::create([//2
            'accountName' => 'JING SEE YUAN',
            'gender' => 'F',
            'accountEmail' => 'jingseeyuan123@gmail.com',
            'accountAddress' => '777,Jalan LengLong 7/77,Taman Wings,54000,Cheras,Kuala Lumpur',
            'password' => 'jingseeyuan123',
            'accountable_type' => Staff::class,
            'accountable_id' => 2,
        ])->save();

        Staff::create([
            'role' => 'C', //Chief
        ])->save();

        Account::create([//3
            'accountName' => 'QING YEE XUAN',
            'gender' => 'F',
            'accountEmail' => 'qingyeexuan123@gmail.com',
            'accountAddress' => '666,Jalan LengLong 6/66,Taman Wings,54000,Cheras,Kuantan',
            'password' => 'qingyeexuan123',
            'accountable_type' => Staff::class,
            'accountable_id' => 3,
        ])->save();

        //Customer
        Customer::create([
            'DOB' => '2000-12-31',
        ])->save();

        Account::create([//4
            'accountName' => 'HEE FONG SHENG',
            'gender' => 'F',
            'accountEmail' => 'heefongsheng123@gmail.com',
            'accountAddress' => '555,Jalan LengLong 5/55,Taman Wings,54000,Cheras,Pahang',
            'password' => 'heefongsheng123',
            'accountable_type' => Customer::class,
            'accountable_id' => 1,
        ])->save();

        Customer::create([
            'DOB' => '2001-01-06',
        ])->save();

        Account::create([//5
            'accountName' => 'LOW WEI JIA',
            'gender' => 'F',
            'accountEmail' => 'weijialow123@gmail.com',
            'accountAddress' => '100,Jalan LengLong 3/30,Taman Wings,54000,Cheras,Melaka',
            'password' => 'weijialow123',
            'accountable_type' => Customer::class,
            'accountable_id' => 2,
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

        Table::create([
            'table_num' => 50,
            'num_seats' => 2,
        ])->save();
    }

    private function seedOrders() {
        Order::create([
            'note' => 'New year lou shang after lunch',
            'serviceMode' => 'Dine-In',
            'account_id' => 4,
            'table_num' => 20,
            'status' => '',
            'created_at' => '24-2-2022 07:29:36',
            'updated_at' => '24-2-2022 07:29:36',
        ])->save();

        Order::create([
            'note' => 'New year lou shang set',
            'serviceMode' => 'Dine-In',
            'account_id' => 5,
            'table_num' => 30,
            'status' => '',
            'created_at' => '25-2-2022 07:29:36',
            'updated_at' => '25-2-2022 07:29:36',
        ])->save();

        Order::create([
            'note' => 'Cutlery is not needed',
            'serviceMode' => 'Take-Away',
            'account_id' => 4,
            'table_num' => 00,
            'status' => '',
            'created_at' => '26-2-2022 07:29:36',
            'updated_at' => '26-2-2022 07:29:36',
        ])->save();
    }

    private function seedOrderItems() {
        //Order1
        OrderItem::create([
            'qty' => '2',
            'order_id' => '1',
            'food_id' => '1',
            'status' => 'preparing',
            'created_at' => '24-2-2022 07:29:36',
            'updated_at' => '24-2-2022 07:29:36',
        ])->save();
        OrderItem::create([
            'qty' => '1',
            'order_id' => '1',
            'food_id' => '4',
            'status' => 'preparing',
            'created_at' => '24-2-2022 07:29:36',
            'updated_at' => '24-2-2022 07:29:36',
        ])->save();

        //Order2
        OrderItem::create([
            'qty' => '1',
            'order_id' => '2',
            'food_id' => '2',
            'status' => 'served',
            'created_at' => '25-2-2022 07:29:36',
            'updated_at' => '25-2-2022 07:29:36',
        ])->save();

        OrderItem::create([
            'qty' => '1',
            'order_id' => '2',
            'food_id' => '3',
            'status' => 'served',
            'created_at' => '25-2-2022 07:29:36',
            'updated_at' => '25-2-2022 07:29:36',
        ])->save();

        //Order3
        OrderItem::create([
            'qty' => '1',
            'order_id' => '3',
            'food_id' => '2',
            'status' => 'preparing',
            'created_at' => '25-2-2022 07:29:36',
            'updated_at' => '25-2-2022 07:29:36',
        ])->save();

        OrderItem::create([
            'qty' => '1',
            'order_id' => '3',
            'food_id' => '5',
            'status' => 'preparing',
            'created_at' => '25-2-2022 07:29:36',
            'updated_at' => '25-2-2022 07:29:36',
        ])->save();
    }

    private function seedBookingItems() {
        Booking::create([
            'booking_no' => 'B2022031414',
            'booking_date' => '2022-03-14',
            'booking_time' => '13:30:00',
            'booking_state' => 'pending',
            'numPersons' => 2,
            'account_id' => 4,
            'table_num' => 20,
            'created_at' => '14-03-2022 08:30:36',
            'updated_at' => '14-03-2022 08:30:36',
        ])->save();

        Booking::create([
            'booking_no' => 'B2022031525',
            'booking_date' => '2022-03-15',
            'booking_time' => '14:00:00',
            'booking_state' => 'booked',
            'numPersons' => 4,
            'account_id' => 5,
            'table_num' => 40,
            'created_at' => '14-03-2022 10:30:00',
            'updated_at' => '14-03-2022 10:30:00',
        ])->save();

        Booking::create([
            'booking_no' => 'B2022031534',
            'booking_date' => '2022-03-15',
            'booking_time' => '16:00:00',
            'booking_state' => 'canceled',
            'numPersons' => 4,
            'account_id' => 4,
            'table_num' => 40,
            'created_at' => '14-03-2022 10:30:00',
            'updated_at' => '14-03-2022 10:30:00',
        ])->save();
    }

}
