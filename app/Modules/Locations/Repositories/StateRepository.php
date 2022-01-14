<?php
namespace App\Modules\Locations\Repositories;

use App\Http\Repositories\Repository;
use App\Modules\Locations\Models\State;
use Illuminate\Support\Facades\DB;

class StateRepository extends Repository
{
    /**
     * StateRepository constructor.
     * @param State $model
     */
    public function __construct(State $model)
    {
        parent::__construct($model);
    }

    public function select()
    {
        return $this->model->newQuery()
            ->select(DB::raw('concat(cities.name, " - ", states.slug) as name'), 'cities.id as id')
            ->orderBy('states.slug')
            ->pluck('name', 'id');
    }
}
