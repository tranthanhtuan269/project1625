<?php

use App\User;
use App\Town;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 10; $i < 100; $i++){
        	DB::table('users')->insert([
	            'name' => 'user' . $i,
	            'email' => 'user' . $i .'@test.com',
	            'avatar' => 'avatar.jpg',
	            'address' => 'Số ' . $i,
	            'town_id' => 2,
	            'district_id' => 1,
	            'city_id' => 1,
	            'birth_day' => 6,
	            'birth_month' => 6,
	            'birth_year' => 1996,
	            'request_list' => '',
	            'friend_list' => '',
	            'password' => bcrypt('1235689'),
	        ]);	
        }
    }
}
