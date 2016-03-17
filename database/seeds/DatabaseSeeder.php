<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        factory(App\User::class, 5)->create()->each(function($u) {
            for($i = 0; $i < 4; $i++) {
                $u->messages()->save(factory(App\Message::class)->make());
            }
        });
    }
}
