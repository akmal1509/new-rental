<?php

namespace App\Repositories;

use Carbon;
use App\Models\Car;
use App\Models\Setting;
use App\Models\CarBrand;
use App\Models\Location;
use App\Traits\HasImage;
use App\Models\CarFeature;
use App\Models\CarLisence;
use App\Models\LocationCar;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CarRepository extends BaseRepository
{
    use HasImage;
    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Car $model)
    {
        $this->model = $model;
    }

    public function option()
    {
        $result = [
            'currency' => Setting::pluck('currency')->first(),
            'location' => Location::all(),
        ];

        return $result;
    }

    public function create($data)
    {
        $result = $data;
        $result['name'] = ucfirst($data['name']);
        $result['userId'] = Auth()->user()->id;
        $result['slug'] = SlugService::createSlug($this->model, 'slug', $data['slug']);
        $result['price'] = str_replace(',', '', $data['price']);
        $result['image'] = $this->imageData($data['image']);

        DB::transaction(function () use ($result, $data) {
            $car = $this->model->create($result);

            $car->locations()->attach($data['locationId']);
        });

        return;
    }

    public function paginate($data)
    {
        return $this->model->latest()->paginate($data);
    }

    // public function findBy($iden, $data)
    // {
    //     $detail = $this->model->where($iden, $)
    // }

    public function update($id, array $data)
    {
        $detail = $this->model->findOrFail($id);
        $result = $data;
        // dd($result);
        $result['userId'] = Auth()->user()->id;
        if ($detail->slug !== $data['slug']) {
            $result['slug'] = SlugService::createSlug($this->model, 'slug', $data['slug']);
        }
        $result['price'] = str_replace(',', '', $data['price']);
        $result['image'] = $this->imageData($data['image']);
        $detail->update($result);
        // dd($result['body']);

        // DB::transaction(function () use ($result, $data, $detail) {
        //     $detail->update($result);

        //     $detail->locations()->sync($data['locationId']);
        // });

        return;
    }

    // public function force($id)
    // {
    //     $data = $this->model->onlyTrashed()->where('id', $id)->first();
    //     // $lisence = CarLisence::where('carId', $data->id)->forceDelete();
    //     // $re = CarLisence::where('carId', $data->id)->forceDelete();

    //     $result = $data->forceDelete();
    //     return;
    // }

    public function dummyCar()
    {
        $dataCar = [
            'title' => 'Jaguar K5 the 2022 f-Type',
            'unitCapacity' => '2',
            'unit' => 'Capacity',
            'image' => 'files/gray-car.jpg',
            'body' => "is simply dummy text of the printing and typesetting industry. Lorem
            Ipsum
            has been
            the industry's standard dummy text ever since the 1500s, when an unknown
            printer
            took a galley of type and scrambled it to make a type specimen book. It
            has
            survived
            not only five centuries, but also the leap into electronic typesetting,
            remaining
            essentially unchanged. It was popularised in the 1960s with the release
            of
            Letraset
            sheets containing Lorem Ipsum passages, and more recently with desktop
            publishing
            software like Aldus PageMaker including versions of Lorem Ipsum. "

        ];
        $resultCar = [];
        for ($i = 0; $i < 4; $i++) {
            $resultCar[$i]['title'] = $dataCar['title'];
            $resultCar[$i]['unitCapacity'] = $dataCar['unitCapacity'];
            $resultCar[$i]['unit'] = $dataCar['unit'];
            $resultCar[$i]['image'] = $dataCar['image'];
            $resultCar[$i]['body'] = Str::words($dataCar['body'], 30, ' ...');
            $resultCar[$i]['bodyFull'] = $dataCar['body'];
        };
        return $resultCar;
    }

    public function dummyType()
    {
        $data = [
            'Van', 'Suv', 'Luxury Sedan'
        ];
        return $data;
    }
}
