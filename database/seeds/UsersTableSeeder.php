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
        User::create([
            'name'=>'Wolverine', 
            'email'=>'wolverine@gmail.com', 
            'password'=> Hash::make('wolverine') 
        ]);

        User::create([
            'name'=>'Spiderman', 
            'email'=>'spiderman@gmail.com', 
            'password'=> Hash::make('spiderman') 
        ]);

        User::create([
            'name'=>'Deadpool', 
            'email'=>'deadpool@gmail.com', 
            'password'=> Hash::make('deadpool') 
        ]);
    }
}
