<?php
namespace App\Modules\Locations\database\seeds;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('states')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        DB::table('states')->insert(array(
          0 =>
          array(
              'id' => '1',
              'name' => 'Acre',
              'slug' => 'AC',
              'country_id' => 1,
              'code' => 12,
              'region_id' => 1
          ),
          1 =>
          array(
              'id' => '2',
              'name' => 'Alagoas',
              'slug' => 'AL',
              'country_id' => 1,
              'code' => 27,
              'region_id' => 2
          ),
          2 =>
          array(
              'id' => '3',
              'name' => 'Amazonas',
              'slug' => 'AM',
              'country_id' => 1,
              'code' => 13,
              'region_id' => 1
          ),
          3 =>
          array(
              'id' => '4',
              'name' => 'Amapá',
              'slug' => 'AP',
              'country_id' => 1,
              'code' => 16,
              'region_id' => 1
          ),
          4 =>
          array(
              'id' => '5',
              'name' => 'Bahia',
              'slug' => 'BA',
              'country_id' => 1,
              'code' => 29,
              'region_id' => 2
          ),
          5 =>
          array(
              'id' => '6',
              'name' => 'Ceará',
              'slug' => 'CE',
              'country_id' => 1,
              'code' => 23,
              'region_id' => 2
          ),
          6 =>
          array(
              'id' => '7',
              'name' => 'Distrito Federal',
              'slug' => 'DF',
              'country_id' => 1,
              'code' => 53,
              'region_id' => 5
          ),
          7 =>
          array(
              'id' => '8',
              'name' => 'Espírito Santo',
              'slug' => 'ES',
              'country_id' => 1,
              'code' => 32,
              'region_id' => 3
          ),
          8 =>
          array(
              'id' => '9',
              'name' => 'Goiás',
              'slug' => 'GO',
              'country_id' => 1,
              'code' => 52,
              'region_id' => 5
          ),
          9 =>
          array(
              'id' => '10',
              'name' => 'Maranhão',
              'slug' => 'MA',
              'country_id' => 1,
              'code' => 21,
              'region_id' => 2
          ),
          10 =>
          array(
              'id' => '11',
              'name' => 'Minas Gerais',
              'slug' => 'MG',
              'country_id' => 1,
              'code' => 31,
              'region_id' => 3
          ),
          11 =>
          array(
              'id' => '12',
              'name' => 'Mato Grosso do Sul',
              'slug' => 'MS',
              'country_id' => 1,
              'code' => 50,
              'region_id' => 5
          ),
          12 =>
          array(
              'id' => '13',
              'name' => 'Mato Grosso',
              'slug' => 'MT',
              'country_id' => 1,
              'code' => 51,
              'region_id' => 5
          ),
          13 =>
          array(
              'id' => '14',
              'name' => 'Pará',
              'slug' => 'PA',
              'country_id' => 1,
              'code' => 15,
              'region_id' => 1
          ),
          14 =>
          array(
              'id' => '15',
              'name' => 'Paraiba',
              'slug' => 'PB',
              'country_id' => 1,
              'code' => 25,
              'region_id' => 2
          ),
          15 =>
          array(
              'id' => '16',
              'name' => 'Pernambuco',
              'slug' => 'PE',
              'country_id' => 1,
              'code' => 26,
              'region_id' => 2
          ),
          16 =>
          array(
              'id' => '17',
              'name' => 'Piauí',
              'slug' => 'PI',
              'country_id' => 1,
              'code' => 22,
              'region_id' => 2
          ),
          17 =>
          array(
              'id' => '18',
              'name' => 'Paraná',
              'slug' => 'PR',
              'country_id' => 1,
              'code' => 41,
              'region_id' => 4
          ),
          18 =>
          array(
              'id' => '19',
              'name' => 'Rio de Janeiro',
              'slug' => 'RJ',
              'country_id' => 1,
              'code' => 33,
              'region_id' => 3
          ),
          19 =>
          array(
              'id' => '20',
              'name' => 'Rio Grande do Norte',
              'slug' => 'RN',
              'country_id' => 1,
              'code' => 24,
              'region_id' => 2
          ),
          20 =>
          array(
              'id' => '21',
              'name' => 'Rondônia',
              'slug' => 'RO',
              'country_id' => 1,
              'code' => 11,
              'region_id' => 1
          ),
          21 =>
          array(
              'id' => '22',
              'name' => 'Roraima',
              'slug' => 'RR',
              'country_id' => 1,
              'code' => 14,
              'region_id' => 1
          ),
          22 =>
          array(
              'id' => '23',
              'name' => 'Rio Grande do Sul',
              'slug' => 'RS',
              'country_id' => 1,
              'code' => 43,
              'region_id' => 4
          ),
          23 =>
          array(
              'id' => '24',
              'name' => 'Santa Catarina',
              'slug' => 'SC',
              'country_id' => 1,
              'code' => 42,
              'region_id' => 4
          ),
          24 =>
          array(
              'id' => '25',
              'name' => 'Sergipe',
              'slug' => 'SE',
              'country_id' => 1,
              'code' => 28,
              'region_id' => 2
          ),
          25 =>
          array(
              'id' => '26',
              'name' => 'São Paulo',
              'slug' => 'SP',
              'country_id' => 1,
              'code' => 35,
              'region_id' => 3
          ),
          26 =>
          array(
              'id' => '27',
              'name' => 'Tocantins',
              'slug' => 'TO',
              'country_id' => 1,
              'code' => 17,
              'region_id' => 1
          ),
        ));
    }
}
