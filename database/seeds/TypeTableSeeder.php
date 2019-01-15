<?php

use Illuminate\Database\Seeder;
use App\Type;
class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create(['name'=>'Elección única','type'=>'radio']);
        Type::create(['name'=>'Retroalimentación','type'=>'textarea']);
    }
}
