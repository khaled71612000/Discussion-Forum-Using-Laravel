<?php

use App\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'name' => 'Laravel 8',
            'slug' => str_slug('Laravel 8'),
        ]);
        Channel::create([
            'name' => 'Vue Js',
            'slug' => str_slug('Vue Js'),
        ]);
        Channel::create([
            'name' => 'HTML CSS',
            'slug' => str_slug('HTML CSS'),
        ]);
        Channel::create([
            'name' => 'Node js',
            'slug' => str_slug('Node js'),
        ]);
    }
}
