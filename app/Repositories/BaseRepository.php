<?php

namespace App\Repositories;

use App\Models\CarBrand;
use App\Models\CarFeature;
use App\Traits\HasImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BaseRepository
{
    use HasImage;
    /**
     * Fin an item by id
     * @param mixed $id
     * @return Model|null
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * find Or Fail
     * @param $id
     * @return mixed
     */
    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Return all items
     * @return Collection|null
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Return all items from last
     * @return Collection|null
     */
    public function latest()
    {
        return $this->model->latest()->get();
    }

    /**
     * Create an item
     * @param array|mixed $data
     * @return Model|null
     */
    public function create($data)
    {
        $result = $data;
        if (Schema::hasColumn(app(get_class(new $this->model))->getTable(), 'slug') && app(get_class(new $this->model)) !== 'Menu') {
            $result['name'] = ucfirst($data['name']);
            $result['slug'] = SlugService::createSlug($this->model, 'slug',  $data['slug']);
        }
        if (Schema::hasColumn(app(get_class(new $this->model))->getTable(), 'image')) {
            $result['image'] = $this->imageData($data['image']);
        }
        return $this->model->create($result);
    }

    public function orderBy($column, $sort)
    {
        return $this->model->orderBy($column, $sort);
    }

    public function createWSlug($data)
    {
        $result = $data;
        $result['name'] = ucfirst($data['name']);
        $result['slug'] = SlugService::createSlug($this->model, 'slug',  $data['slug']);
        return $this->model->create($result);
    }

    /**
     * Update a item
     * @param int|mixed $id
     * @param array|mixed $data
     * @return bool|mixed
     */
    public function update($id, array $data)
    {
        $detail = $this->model->findOrFail($id);
        if (Schema::hasColumn(app(get_class(new $this->model))->getTable(), 'logo')) {
            $data['logo'] = $this->imageData($data['logo']);
        }
        if (Schema::hasColumn(app(get_class(new $this->model))->getTable(), 'flatLogo')) {
            $data['flatLogo'] = $this->imageData($data['flatLogo']);
        }
        if (Schema::hasColumn(app(get_class(new $this->model))->getTable(), 'image')) {
            $data['image'] = $this->imageData($data['image']);
        }
        return $detail->update($data);
    }

    /**
     * destroy many item with primary key
     * @param int|Model $id
     */
    public function destroy(array $id)
    {
        return $this->model->destroy($id);
    }

    /**
     * delete item
     * @param Model|int $id
     * @return mixed
     */
    public function delete($id)
    {
        $this->model->findOrFail($id)->delete();
        return \Session::flash('success_message', 'Data was successfully delete.');
    }

    public function where($ident, $data)
    {
        return $this->model->where($ident, $data)->first();
    }


    public function findResource($id)
    {
        return $this->model->findOrFail($id);
    }

    public function viewTrashed()
    {
        return $this->model->onlyTrashed()->get();
    }

    public function whereIn($id)
    {
        return $this->model->whereIn('id', $id)->get();
    }

    /**
     * Restore Car data
     *
     * @param array|mixed $request
     * @return mixed
     */
    public function restore($request)
    {
        $data = $this->model->onlyTrashed()->where('id', $request->id)->first();
        if (Schema::hasColumn(app(get_class(new $this->model))->getTable(), 'slug')) {
            $checkName = $this->model->where('name', $data->name)->first();
            if ($checkName) {
                $data->name = $data->name . '-' . +1;
            }
            // $data->name = SlugService::createSlug(get_class(new $this->model), 'name', $data->name);
            $data->slug = SlugService::createSlug(get_class(new $this->model), 'slug', $data->slug);
            $data->save();
        }
        $result = $data->restore();
        return $result;
    }

    /**
     * Force Car Data
     *
     * @param int $id
     * @return mixed
     */
    public function force($id)
    {
        $data = $this->model->onlyTrashed()->where('id', $id)->first();
        $result = $data->forceDelete();
        return;
    }

    /**
     * Bulk Action Car Data
     *
     * @param array|mixed $request
     * @return void
     */
    public function bulk($request)
    {
        $action = $request->action;
        if ($action == 'forceDelete') {
            $data = $this->model->onlyTrashed()->whereIn('id', $request->id)->get();
            foreach ($data as $force) {
                $force->forceDelete();
            }
            $action = 'delete permanent';
        }
        if ($action == 'delete') {
            $data = $this->model->whereIn('id', $request->id)->get();
            foreach ($data as $delete) {
                if (Schema::hasColumn(app(get_class(new $this->model))->getTable(), 'slug')) {
                    $delete['slug'] = SlugService::createSlug($this->model, 'slug', Str::random(8));
                }
                $delete->save();
                $delete->$action();
            };
        }
        return;
    }
}
