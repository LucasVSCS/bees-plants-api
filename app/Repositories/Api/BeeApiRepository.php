<?php

namespace App\Repositories\Api;

use App\Interfaces\BeeInterface;
use App\Models\Bee;
use App\Traits\ResponseAPI;
use Illuminate\Support\Facades\DB;

class BeeApiRepository implements BeeInterface
{
    use ResponseAPI;

    public function getAllBees()
    {
        try {
            $bees = Bee::all();
            return $this->success("All Bees", $bees);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function storeBee($request)
    {
        DB::beginTransaction();

        try {
            $bee = new Bee;
            $bee->name = $request->input('name');
            $bee->scientific_name = $request->input('scientific_name');
            $bee->save();

            DB::commit();

            return $this->success("Bee created", $bee, 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

}
