<?php

namespace App\Repositories;

use App\Models\CarLisence;
use App\Models\Payment;
use App\Models\RentCar;

class PaymentRepository extends BaseRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;
    protected $index;
    protected $prefix;

    public function __construct(Payment $model)
    {
        $this->model = $model;
        $this->index = '6';
        $this->prefix = 'PVP';
    }

    public function option()
    {
        $result = [
            'rental' => RentCar::latest()->get()
        ];
        return $result;
    }

    public function create($data)
    {
        $result = $data;
        $detail =  $this->model->orderBy('id', 'desc')->first();
        $id = $detail ? $detail->id : '1';
        // dd($id);
        $code =  $this->prefix . '-' . str_pad($id, $this->index, '0', STR_PAD_LEFT);
        // dd($code);
        $result['code'] = $code;
        return $this->model->create($result);
    }

    // Write something awesome :)
}
