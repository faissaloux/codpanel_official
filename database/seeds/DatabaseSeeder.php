<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Admin::class, 10)->create();
        factory(App\User::class, 10)->create();
        factory(App\Products::class, 10)->create();
        factory(App\Provider::class, 10)->create();
        factory(App\Employee::class, 10)->create();
        factory(App\Client::class, 10)->create();
        factory(App\Order::class, 10)->create();
        factory(App\Payment::class, 10)->create();
        factory(App\Cities::class, 10)->create();
        factory(App\Lists::class, 10)->create()->each(function($list){
            $list->items()->saveMany(factory(App\Items::class, rand(1,10))->make());
        });
    }
}


