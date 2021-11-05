<?php

namespace App\Interfaces;

use App\Http\Requests\Api\CreatePlantRequest;
use App\Http\Requests\Api\FindPlantsRequest;

interface PlantInterface
{
    public function getPlants(FindPlantsRequest $request);

    public function storePlant(CreatePlantRequest $request);
}
