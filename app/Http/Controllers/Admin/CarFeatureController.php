<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CarFeatureRepository;
use App\Http\Requests\CarFeature\UpdateCarFeatureRequest;
use App\Http\Requests\CarFeature\StoreCarFeatureRequest;
use App\Models\CarFeature;

class CarFeatureController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $carFeatureRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(CarFeatureRepository $carFeatureRepository)
    {
        $this->carFeatureRepository = $carFeatureRepository;
        $this->typeMenu = 'car';
        $this->slugData = 'car/feature';
        $this->shareModel = 'CarFeature';
        $this->title = 'Car Feature';
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
            'data' => $this->carFeatureRepository->latest(),
            'countData' => $this->carFeatureRepository->latest()->count(),
            'countTrash' => $this->carFeatureRepository->viewTrashed()->count(),
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
            'data' => $this->carFeatureRepository->viewTrashed(),
            'countData' => $this->carFeatureRepository->all()->count(),
            'countTrash' => $this->carFeatureRepository->viewTrashed()->count(),
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
            'data' => new CarFeature,
            'type' => $this->carFeatureRepository->type()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CarFeature\StoreCarFeatureRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StoreCarFeatureRequest $request)
    {
        $this->carFeatureRepository->create($request->all());
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
            'data' => $this->carFeatureRepository->findOrFail($id),
            'type' => $this->carFeatureRepository->type()
        ]);
    }

    /**
     * Update data
     *
     * @param CarFeatureRequest $request
     * @param CarFeature $carFeature
     * @return void
     */
    public function update(UpdateCarFeatureRequest $request, $id)
    {
        // dd($request);
        $this->carFeatureRepository->update($id, $request->all());
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
        return $this->carFeatureRepository->delete($id);
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
        return $this->carFeatureRepository->restore($request);
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
        return $this->carFeatureRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->carFeatureRepository->bulk($request);
    }
}
