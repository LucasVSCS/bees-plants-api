<?php

namespace App\Interfaces;

use App\Http\Requests\Api\CreateBeeRequest;

interface BeeInterface
{
    public function getAllBees();

    public function storeBee(CreateBeeRequest $request);
}
