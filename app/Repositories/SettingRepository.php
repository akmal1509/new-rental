<?php

namespace App\Repositories;

use App\Models\Setting;

class SettingRepository extends BaseRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Setting $model)
    {
        $this->model = $model;
    }

    public function update($id, array $data)
    {
        $detail = $this->model->findOrFail($id);
        $this->storeConfiguration('MAIL_FROM_ADDRESS', request('mail.username'));
        $this->storeConfiguration('MAIL_USERNAME', request('mail.username'));
        $this->storeConfiguration('MAIL_PASSWORD', request('mail.password'));
        $this->storeConfiguration('MAIL_HOST', request('mail.host'));
        $this->storeConfiguration('MAIL_PORT', request('mail.port'));
        $this->storeConfiguration('MAIL_ENCRYPTION', request('mail.encrypt'));
        $this->storeConfiguration('MAIL_MAILER', request('mail.mailer'));

        return $detail->update($data);
    }

    // Write something awesome :)
}
