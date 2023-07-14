<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CarRepository;
use App\Http\Requests\Car\UpdateCarRequest;
use App\Http\Requests\Car\StoreCarRequest;
use App\Models\Car;

class CarController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $carRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
        $this->typeMenu = 'cars';
        $this->slugData = 'car';
        $this->shareModel = 'Car';
        $this->title = 'Car';
        $this->shareData = [
            'model' => $this->shareModel,
            'typeMenu' => $this->typeMenu,
            'slugData' => $this->slugData,
            'title' => $this->title
        ];
        view()->share('share', $this->shareData);
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('pages.admin.' . $this->slugData . '.index', [
            'type' => 'index',
            'data' => $this->carRepository->all(),
            'countData' => $this->carRepository->latest()->count(),
            'countTrash' => $this->carRepository->viewTrashed()->count(),
            'action' => 'delete'
        ]);
    }

    /**
     * Display a listing of the Trash resource.
     *
     * @return mixed|\Illuminate\Contracts\View\View
     */
    public function trashed()
    {
        return view('pages.admin.' . $this->slugData . '.index', [
            'type' => 'trash',
            'data' => $this->carRepository->viewTrashed(),
            'countData' => $this->carRepository->all()->count(),
            'countTrash' => $this->carRepository->viewTrashed()->count(),
            'action' => 'forceDelete'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        return view('components.admin.forms.create', [
            'data' => new Car,
            'option' => $this->carRepository->option()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Car\StoreCarRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StoreCarRequest $request)
    {
        // dd($request->all());
        $this->carRepository->create($request->all());
        return redirect('/admin/' . $this->slugData)
            ->with('success_message', 'Data was successfully added.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return mixed
     */
    public function edit($id)
    {
        // dd();
        return view('components.admin.forms.edit', [
            'data' => $this->carRepository->findOrFail($id),
            'option' => $this->carRepository->option(),
        ]);
    }

    /**
     * Update data
     *
     * @param CarRequest $request
     * @param Car $car
     * @return void
     */
    public function update(UpdateCarRequest $request, $id)
    {
        // dd($request->all());
        $this->carRepository->update($id, $request->all());
        return redirect('/admin/' . $this->slugData)
            ->with('success_message', 'Data was successfully update.');
    }

    /**
     * Remove Data
     *
     * @param  int $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->carRepository->delete($id);
    }

    /**
     * Restore Data for All Model
     *
     * @param Request $request
     * @param int $request['id']
     * @return array
     */
    public function restore(Request $request)
    {
        return $this->carRepository->restore($request);
    }

    /**
     * Force Delete Data 
     *
     * @param Request $request
     * @param int $request['id']
     * @return array
     */
    public function force(Request $request)
    {
        return $this->carRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->carRepository->bulk($request);
    }
}
