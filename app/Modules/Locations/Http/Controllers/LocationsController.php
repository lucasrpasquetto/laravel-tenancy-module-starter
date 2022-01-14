<?php

namespace App\Modules\Locations\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Locations\Repositories\CityRepository;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    protected $cityRepository;

    public function __construct(CityRepository $cityRepository) {
        $this->cityRepository = $cityRepository;
    }

    public function search(Request $request)
    {
        $data = $this->cityRepository->selectSearch($request->get('term'));
        return response()->json($data);
    }
}
