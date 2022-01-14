<?php

namespace App\Modules\Accounts\Repositories;

use App\Http\Repositories\Repository;
use App\Modules\Accounts\Models\Account;

class AccountRepository extends Repository
{
    public function __construct(Account $model)
    {
        parent::__construct($model);
    }

}
