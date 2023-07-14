<?php

namespace App\Repositories;

use App\Models\Booking;

class BookingRepository extends BaseRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Booking $model)
    {
        $this->model = $model;
    }

    public function create($request)
    {
        $data = $request;
        $data['pickUpTime'] = date("H:i", strtotime($request['pickUpTime']));
        // activity()->byAnonymous()->performedOn($this->model)
        //     ->log('New Customer has Booking');
        return $this->model->create($data);
    }

    // Write something awesome :)
}
