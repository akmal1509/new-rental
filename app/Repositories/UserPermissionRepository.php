<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Models\UserPermission;
use Spatie\Permission\Models\Role;

class UserPermissionRepository extends BaseRepository
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

    public function send($request)
    {
        $role = Role::findByName($request['role']);
        $role->syncPermissions($request['permis']);
        return;
    }

    // Write something awesome :)
}
