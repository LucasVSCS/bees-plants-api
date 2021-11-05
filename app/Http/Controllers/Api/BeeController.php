<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateBeeRequest;
use App\Interfaces\BeeInterface;

class BeeController extends Controller
{
    protected $beeInterface;

    public function __construct(BeeInterface $beeInterface)
    {
        $this->beeInterface = $beeInterface;
    }

    public function index()
    {
        return $this->beeInterface->getAllBees();
    }

    public function store(CreateBeeRequest $request)
    {
        return $this->beeInterface->storeBee($request);
    }
}
