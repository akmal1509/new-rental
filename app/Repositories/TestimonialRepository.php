<?php

namespace App\Repositories;

use App\Models\Testimonial;

class TestimonialRepository extends BaseRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Testimonial $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}
