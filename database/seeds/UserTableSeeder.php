<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	"name" => "Luis Yerko",
        	"lastname" => "Laura Tola",
        	"email" => "luis@gmail.com",
        	"password" => bcrypt('123456'),
        ]);
    }
}
