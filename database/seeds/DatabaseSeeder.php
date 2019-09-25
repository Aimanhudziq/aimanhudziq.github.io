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
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PolicyTableSeeder::class);
        $this->call(NotAllowedSeeder::class);

        //1.run 'composer dump-autoload'
        //2.run 'php artisan db:seed or db:seed --class=UserTableSeeder' for singular

    }
}
