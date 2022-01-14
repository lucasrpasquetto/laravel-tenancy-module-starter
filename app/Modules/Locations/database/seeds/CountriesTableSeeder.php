<?php
namespace App\Modules\Locations\database\seeds;

use App\Modules\Locations\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::firstOrCreate([
            'slug' => 'BR'
        ],[
            'name' => 'Brazil',
        ]);
    }
}
