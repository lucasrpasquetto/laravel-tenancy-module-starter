<?php
namespace App\Modules\Accounts\database\seeds;

use Illuminate\Database\Seeder;

class UserDatabaseSeeder extends Seeder
{
    public function run()
    {
      $this->call(AccountTableSeed::class);
    }
}
