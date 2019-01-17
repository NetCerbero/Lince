<?php

use Illuminate\Database\Seeder;
use App\Setting;
class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
        	'address'=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate, quam ex illum voluptatum provident ea.",
        	'phone'=>'69345219',
        	'email'=>'Loremipsumolor@gmail.com',
        	'about'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere distinctio corporis, tenetur natus alias vel obcaecati inventore est a similique sequi voluptates quia officia rem ea maiores? Ullam repellendus eum dolorem minus magni sit quis molestias in. Rerum ad dolorum velit. Dolor autem, dolore ipsa nihil, sed hic optio sint repellendus? Sunt, id eum dolorum error optio, cumque nihil autem, reiciendis ducimus repellendus esse aperiam deleniti animi culpa sint. Repellat laborum cupiditate nemo, iure, deserunt blanditiis animi vero ex distinctio ipsam minus, et in repudiandae. Obcaecati quod accusamus, dignissimos odit non, ipsum, in aliquid explicabo veniam excepturi nulla quo. At.',
        	'facebook'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, unde?',
        	'instagram'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque quisquam eaque, alias minus facilis quaerat fuga qui fugiat dignissimos ducimus.',
        	'whatsapp'=>'69131148'
        ]);
    }
}
