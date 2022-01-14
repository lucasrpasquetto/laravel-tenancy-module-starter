<?php
namespace App\Modules\Locations\database\seeds;

use Illuminate\Database\Seeder;

class LocationDatabaseSeeder extends Seeder
{
    public function run()
    {
      $this->call(CountriesTableSeeder::class);
      $this->call(RegionsTableSeeder::class);
      $this->call(StatesTableSeeder::class);
      $this->call(CitiesTableSeeder::class);
    }
}
