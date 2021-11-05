<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreatePlantRequest;
use App\Http\Requests\Api\FindPlantsRequest;
use App\Interfaces\PlantInterface;

class PlantController extends Controller
{
    protected $plantInterface;

    public function __construct(PlantInterface $plantInterface)
    {
        $this->plantInterface = $plantInterface;
    }

    public function find(FindPlantsRequest $request)
    {
        return $this->plantInterface->getPlants($request);
    }

    public function store(CreatePlantRequest $request)
    {
        return $this->plantInterface->storePlant($request);
    }
}
