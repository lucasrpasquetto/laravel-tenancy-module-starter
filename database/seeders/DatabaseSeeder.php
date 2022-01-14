<?php

namespace Database\Seeders;

use App\Modules\Locations\database\seeds\LocationDatabaseSeeder;
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
        $this->call(LocationDatabaseSeeder::class);
    }
}
