<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CarBrandRepository;
use App\Http\Requests\CarBrand\UpdateCarBrandRequest;
use App\Http\Requests\CarBrand\StoreCarBrandRequest;
use App\Models\CarBrand;

class CarBrandController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $carBrandRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(CarBrandRepository $carBrandRepository)
    {
        $this->carBrandRepository = $carBrandRepository;
        $this->typeMenu = 'cars';
        $this->slugData = 'car/brand';
        $this->shareModel = 'CarBrand';
        $this->title = 'Brand';
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
            'data' => $this->carBrandRepository->latest(),
            'countData' => $this->carBrandRepository->latest()->count(),
            'countTrash' => $this->carBrandRepository->viewTrashed()->count(),
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
            'data' => $this->carBrandRepository->viewTrashed(),
            'countData' => $this->carBrandRepository->all()->count(),
            'countTrash' => $this->carBrandRepository->viewTrashed()->count(),
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
            'data' => new CarBrand,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CarBrand\StoreCarBrandRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StoreCarBrandRequest $request)
    {
        $this->carBrandRepository->createWSlug($request->all());
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
        return view('components.admin.forms.edit', [
            'data' => $this->carBrandRepository->findOrFail($id),
        ]);
    }

    /**
     * Update data
     *
     * @param CarBrandRequest $request
     * @param CarBrand $carBrand
     * @return void
     */
    public function update(UpdateCarBrandRequest $request, $id)
    {
        // dd($id);
        $this->carBrandRepository->update($id, $request->all());
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
        return $this->carBrandRepository->delete($id);
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
        return $this->carBrandRepository->restore($request);
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
        return $this->carBrandRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->carBrandRepository->bulk($request);
    }
}
