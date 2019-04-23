<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create([
        	'name' => 'Leon',
            'email' => 'zlotnik.leon91@gmail.com',
            'password' => bcrypt('zlotnl91'), 
            'admin' => true
        ]);
    }
}
