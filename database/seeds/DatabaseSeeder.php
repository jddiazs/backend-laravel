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
        // $this->call(UserSeeder::class);

      App\User::create([
        'name' => 'Julian Daniel',
        'email' => 'jdiaz@tiqal.com',
        'password' => bcrypt('12345678'),
      ]);

      factory(App\post::class, 24)->create();
    }
}
