<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        \App\Models\User::factory(10)->create();
//        \App\Models\coach::factory(10)->create();
//         \App\Models\course::factory(10)->create();
//         \App\Models\brand::factory(10)->create();
//         \App\Models\supplement::factory(10)->create();
////         \App\Models\video::factory(10)->create();
//         \App\Models\category::factory(10)->create();
//         \App\Models\subscription::factory(10)->create();
//         \App\Models\purchase::factory(100)->create();



        if (!User::where('email','admin@gmail.com')->exists()){
            User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone_number' => '0123456789',
                'password' => Hash::make('123456789'),
                'country' => 'EG',
                'address' => '123 Main St.',
                'age' => 22,
                'gender' => 0, // 0 for male, 1 for female
                'role_as' => 1, // 0 for admin, 1 for coach, 2 for user
                'profile_image' => 'assets/images/1.jpg', // default profile image name
            ]);
        }

        if (!category::where('id',1)->exists()){

        \App\Models\category::factory()->create([
            'id'=>1,
            'name_en'=>'Equipment',
            'name_ar'=>'معدات رياضيه',
            'name_ku'=>'Equipment',
            'description_en'=>'Equipment',
            'description_ar'=>'معدات رياضيه',
            'description_ku'=>'Equipment',
            'cover_image'=>'assets/images/categories/trainigVideos/coverImages/1.jpg',
        ]);
        }
        if (!category::where('id',2)->exists()){
            \App\Models\category::factory()->create([
                'id'=>2,
                'name_en'=>'Accessories',
                'name_ar'=>'Accessories ',
                'name_ku'=>'Supplements',
                'description_en'=>'Accessories',
                'description_ar'=>' Accessories',
                'description_ku'=>'Accessories',
                'cover_image'=>'assets/images/categories/trainigVideos/coverImages/1.jpg',
            ]);
        }

        if (!category::where('id',3)->exists()){
            \App\Models\category::factory()->create([
                'id'=>3,
                'name_en'=>'Sport Wear',
                'name_ar'=>'Sport Wear',
                'name_ku'=>'Sport Wear',
                'description_en'=>'Sport Wear',
                'description_ar'=>'Sport Wear',
                'description_ku'=>'Sport Wear',
                'cover_image'=>'assets/images/categories/trainigVideos/coverImages/1.jpg',
            ]);
        }

        if (!category::where('id',4)->exists()){
            \App\Models\category::factory()->create([
                'id'=>4,
                'name_en'=>'Diet Food',
                'name_ar'=>'Diet Food ',
                'name_ku'=>'Diet Food',
                'description_en'=>'Diet Food',
                'description_ar'=>' Diet Food',
                'description_ku'=>'Diet Food',
                'cover_image'=>'assets/images/categories/trainigVideos/coverImages/1.jpg',
            ]);
        }


        if (!category::where('id',5)->exists()){
            \App\Models\category::factory()->create([
                'id'=>5,
                'name_en'=>'Coaches',
                'name_ar'=>'Coaches',
                'name_ku'=>'Coaches',
                'description_en'=>'Coaches',
                'description_ar'=>' Coaches',
                'description_ku'=>'Coaches',
                'cover_image'=>'assets/images/categories/trainigVideos/coverImages/1.jpg',
            ]);
        }


        if (!category::where('id',6)->exists()){
            \App\Models\category::factory()->create([
                'id'=>6,
                'name_en'=>'Supplements',
                'name_ar'=>'Supplements',
                'name_ku'=>'Supplements',
                'description_en'=>'Supplements',
                'description_ar'=>' Supplements',
                'description_ku'=>'Supplements',
                'cover_image'=>'assets/images/categories/trainigVideos/coverImages/1.jpg',
            ]);
        }

        if (!category::where('id',7)->exists()){
            \App\Models\category::factory()->create([
                'id'=>7,
                'name_en'=>'Gym Discount',
                'name_ar'=>'Gym Discount',
                'name_ku'=>'Gym Discount',
                'description_en'=>'Gym Discount',
                'description_ar'=>' Gym Discount',
                'description_ku'=>'Gym Discount',
                'cover_image'=>'assets/images/categories/trainigVideos/coverImages/1.jpg',
            ]);
        }








    }
}
