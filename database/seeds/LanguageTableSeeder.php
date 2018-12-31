<?php

use Illuminate\Database\Seeder;
use App\Language;
class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create(['language'=>'Español']);
        Language::create(['language'=>'Castellano']);
        Language::create(['language'=>'Chino']);
        Language::create(['language'=>'Portugués']);
        Language::create(['language'=>'Alemán']);
        Language::create(['language'=>'Francés']);
        Language::create(['language'=>'Inglés']);
        Language::create(['language'=>'Japonés']);
        Language::create(['language'=>'Italiano']);
        Language::create(['language'=>'Quechua']);
        Language::create(['language'=>'Aymara']);
        Language::create(['language'=>'Guaraní']);
        Language::create(['language'=>'Ruso']);
        Language::create(['language'=>'Árabe']);
        Language::create(['language'=>'Hindi1']);
    }
}
