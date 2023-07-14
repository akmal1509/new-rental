<?php

namespace App\Repositories;

use App\Models\Permission;

class PermissionRepository extends BaseRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Permission $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        $data['guard_name'] = 'web';
        return $this->model->create($data);
    }

    // Write something awesome :)
}
