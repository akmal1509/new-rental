<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function changePassword($data, $id)
    {
        $detail = $this->model->findOrFail($id);
        $result['password'] = bcrypt($data->password);

        return $detail->update($result);
    }

    // Write something awesome :)
}
