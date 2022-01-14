<?php

namespace App\Modules\Locations\database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('regions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('regions')->insert(array(
            0 =>
            array(
                'id' => '1',
                'name' => 'Região Norte',
                'slug' => Str::slug('Região Norte'),
                'country_id' => 1,
                'sigla' => 'N'
            ),
            1 =>
            array(
                'id' => '2',
                'name' => 'Região Nordeste',
                'slug' => Str::slug('Região Nordeste'),
                'country_id' => 1,
                'sigla' => 'NE'
            ),
            2 =>
            array(
                'id' => '3',
                'name' => 'Região Sudeste',
                'slug' => Str::slug('Região Sudeste'),
                'country_id' => 1,
                'sigla' => 'SE'
            ),
            3 =>
            array(
                'id' => '4',
                'name' => 'Região Sul',
                'slug' => Str::slug('Região Sul'),
                'country_id' => 1,
                'sigla' => 'S'
            ),
            4 =>
            array(
                'id' => '5',
                'name' => 'Região Centro-Oeste',
                'slug' => Str::slug('Região Centro-Oeste'),
                'country_id' => 1,
                'sigla' => 'CO'
            ),
        ));
    }
}
