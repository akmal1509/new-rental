<?php

namespace App\Repositories;

use App\Models\Menu;

class MenuRepository extends BaseRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Menu $model)
    {
        $this->model = $model;
    }

    public function menuSort()
    {
        return $this->model->orderBy('mainMenu', 'ASC')->orderBy('sort', 'ASC')->get();
    }

    // Write something awesome :)
}
