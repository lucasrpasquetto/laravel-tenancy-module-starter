<?php

namespace App\Modules\Locations\Repositories;

use App\Http\Repositories\Repository;
use App\Modules\Locations\Models\City;
use Illuminate\Support\Facades\DB;

class CityRepository extends Repository
{
    /**
     * CityRepository constructor.
     * @param City $model
     */
    public function __construct(City $model)
    {
        parent::__construct($model);
    }

    public function select()
    {
        return $this->model->newQuery()
            ->join('states', 'states.id', 'cities.state_id')
            ->select(DB::raw('concat(cities.name, " / ", states.slug) as name'), 'cities.id as id')
            ->orderBy('states.slug')
            ->orderBy('cities.name')
            ->pluck('name', 'id');
    }

    public function selectSearch($search)
    {
        return $this->model->newQuery()
            ->join('states', 'states.id', 'cities.state_id')
            ->select(DB::raw('concat(cities.name, " / ", states.slug) as text'), 'cities.id as id')
            ->where('cities.name', 'LIKE', '%' . $search . '%')
            ->orderBy('states.slug')
            ->orderBy('cities.name')
            ->get();
    }

    public function selectByState($state, $city)
    {
        return $this->model->newQuery()
            ->join('states', 'states.id', 'cities.state_id')
            ->where('cities.name', $city)
            ->where('states.code', $state)
            ->pluck('cities.id')
            ->first();
    }
}
