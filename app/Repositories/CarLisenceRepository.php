<?php

namespace App\Repositories;

use App\Models\Car;
use App\Models\CarLisence;

class CarLisenceRepository extends BaseRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(CarLisence $model)
    {
        $this->model = $model;
    }

    public function option()
    {
        $result = [
            'car' => Car::all()
        ];
        return $result;
    }

    public function create($data)
    {
        $result = $data;
        $result['plat'] = strtoupper($data['plat']);

        return $this->model->create($result);
    }

    // Write something awesome :)
}
