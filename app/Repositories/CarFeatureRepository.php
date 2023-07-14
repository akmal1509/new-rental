<?php

namespace App\Repositories;

use App\Models\CarFeature;
use App\Traits\HasImage;

class CarFeatureRepository extends BaseRepository
{

    use HasImage;
    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(CarFeature $model)
    {
        $this->model = $model;
    }

    public function type()
    {
        $data = [
            'Checkbox',
            'Selectbox',
            'Text'
        ];

        return $data;
    }

    public function create($data)
    {
        $result = $data;
        if ($data['value'] !== null) {
            $value = str_getcsv($data['value'], ',');
            $result['value'] = json_encode($value);
        }
        $result['icon'] = $this->imageData($data['icon']);

        return $this->model->create($result);
    }
}
