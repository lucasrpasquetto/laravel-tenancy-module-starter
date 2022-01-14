<?php

namespace App\Modules\Users\Repositories;

use App\Http\Repositories\Repository;
use App\Modules\Users\Models\User;

class UserRepository extends Repository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

}
