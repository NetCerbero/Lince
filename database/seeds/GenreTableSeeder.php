<?php

use Illuminate\Database\Seeder;
use App\Genre;
class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Genre::create(['type'=>1,'name'=>'Aventura']);
    	Genre::create(['type'=>1,'name'=>'Comedia']);
    	Genre::create(['type'=>1,'name'=>'Terror']);
    	Genre::create(['type'=>1,'name'=>'Ciencia ficción']);
    	Genre::create(['type'=>1,'name'=>'Acción']);
    	Genre::create(['type'=>1,'name'=>'Drama']);
    	Genre::create(['type'=>1,'name'=>'Romance']);
    	Genre::create(['type'=>1,'name'=>'Suspenso']);
    	Genre::create(['type'=>1,'name'=>'Histórico']);
    	Genre::create(['type'=>1,'name'=>'Musical']);
    	Genre::create(['type'=>1,'name'=>'Infantil']);
    	Genre::create(['type'=>1,'name'=>'Intriga']);
    	Genre::create(['type'=>1,'name'=>'Bélico']);
    	//Música
    	Genre::create(['type'=>2,'name'=>'Cumbia']);
    	Genre::create(['type'=>2,'name'=>'Electrónica']);
    	Genre::create(['type'=>2,'name'=>'Folklore']);
    	Genre::create(['type'=>2,'name'=>'Hip hop']);
    	Genre::create(['type'=>2,'name'=>'Merengue']);
    	Genre::create(['type'=>2,'name'=>'Jazz']);
    	Genre::create(['type'=>2,'name'=>'Ranchera']);
    	Genre::create(['type'=>2,'name'=>'Reggaeton']);
    	Genre::create(['type'=>2,'name'=>'Rock']);
    	Genre::create(['type'=>2,'name'=>'Rap']);
    	Genre::create(['type'=>2,'name'=>'Salsa']);
    	Genre::create(['type'=>2,'name'=>'Tango']);
    	Genre::create(['type'=>2,'name'=>'Cueca']);
    	Genre::create(['type'=>2,'name'=>'Morenada']);
    	Genre::create(['type'=>2,'name'=>'Tinku']);
    	Genre::create(['type'=>2,'name'=>'Pop']);
    	Genre::create(['type'=>2,'name'=>'Trap']);
    	Genre::create(['type'=>2,'name'=>'Rap']);
    	Genre::create(['type'=>2,'name'=>'Saya']);
    	Genre::create(['type'=>2,'name'=>'Vallenato']);
    }
}

