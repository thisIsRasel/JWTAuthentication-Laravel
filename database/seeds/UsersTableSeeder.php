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
        User::create(['name'=>'Wolverine', 'email'=>'wolverine@gmail.com', 'password'=>'wolverine']);

        User::create(['name'=>'Spiderman', 'email'=>'spiderman@gmail.com', 'password'=>'spiderman']);

        User::create(['name'=>'Deadpool', 'email'=>'deadpool@gmail.com', 'password'=>'deadpool']);
    }
}
