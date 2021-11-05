<?php

namespace App\Repositories\Api;

use App\Interfaces\PlantInterface;
use App\Models\Plant;
use App\Traits\ResponseAPI;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class PlantApiRepository implements PlantInterface
{
    use ResponseAPI;

    public function storePlant($request)
    {
        DB::beginTransaction();

        try {
            $plant = new Plant;
            $plant->name = $request->input('name');
            $plant->scientific_name = $request->input('scientific_name');
            $plant->month = $request->input('month');
            $plant->bee_id = $request->input('bee_id');
            $plant->save();

            DB::commit();

            return $this->success("Plant created", $plant, 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getPlants($request)
    {
        try {
            $args = $request->all();
            $query = $this->makeSelect(Plant::query());
            $query = $this->makeWhere($query, $args);

            $plants = $query->get();

            return $this->success("All Plants", $plants);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    private function makeSelect(Builder $query): Builder
    {
        $query->addSelect('plants.name as plant_name', 'plants.scientific_name as plant_scientific_name', 'plants.month as bloom_month');
        $query->addSelect('bees.name as bee_name');
        $query->join('bees', 'bees.id', '=', 'plants.bee_id');

        return $query;
    }

    private function makeWhere(Builder $query, array $args): Builder
    {
        if (!empty($args)) {
            if (array_key_exists("months", $args)) {
                $months = $args['months'];

                foreach ($months as $month) {
                    $query->orWhere('plants.month', $month);
                }
            }

            if (array_key_exists("bee", $args)) {
                $bee = $args['bee'];
                $query->orWhere('bees.name', 'like', '%' . $bee . '%');
            }

        }

        return $query;
    }

}
