<?php

namespace App\Repositories;

use App\Models\Car;
use App\Models\CarLisence;
use App\Models\RentCar;

class RentCarRepository extends BaseRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;
    protected $index;
    protected $prefix;

    public function __construct(RentCar $model)
    {
        $this->model = $model;
        $this->index = '6';
        $this->prefix = 'VIP';
    }

    public function option()
    {
        $result = [
            'plat' => CarLisence::all()
        ];
        return $result;
    }

    // public function data(){
    //     $this->model
    // }

    public function create($data)
    {
        $result = $data;
        $detail = $this->model->latest()->first();
        $id = $detail ? $detail->id : '1';
        // dd($id);
        $code =  $this->prefix . '-' . str_pad($id, $this->index, '0', STR_PAD_LEFT);
        // dd($code);
        $result['code'] = $code;

        return $this->model->create($result);
    }

    public function calculate($long, $request)
    {
        $plat = CarLisence::where('id', $request['plat'])->first();
        $carPrice = $plat->carPrice;

        $realprice = ($carPrice) * $long;

        $result = [
            'totalPrice' => $realprice,
            'longDays' => $long,
            'priceDays' => $carPrice
        ];

        return $result;
    }

    public function imageChange($request)
    {
        $plat = CarLisence::where('id', $request['plat'])->first();
        return $plat->cars->image;
        // echo "halo";
        // return;
    }
    // Write something awesome :)
}
