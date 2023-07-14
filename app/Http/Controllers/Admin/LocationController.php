<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\LocationRepository;
use App\Http\Requests\Location\UpdateLocationRequest;
use App\Http\Requests\Location\StoreLocationRequest;
use App\Models\Location;

class LocationController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $locationRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(LocationRepository $locationRepository)
    {
        $this->locationRepository = $locationRepository;
        $this->typeMenu = 'car';
        $this->slugData = 'car/location';
        $this->shareModel = 'Location';
        $this->title = 'location';
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
            'data' => $this->locationRepository->latest(),
            'countData' => $this->locationRepository->latest()->count(),
            'countTrash' => $this->locationRepository->viewTrashed()->count(),
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
            'data' => $this->locationRepository->viewTrashed(),
            'countData' => $this->locationRepository->all()->count(),
            'countTrash' => $this->locationRepository->viewTrashed()->count(),
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
            'data' => new Location,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Location\StoreLocationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StoreLocationRequest $request)
    {
        $this->locationRepository->createWSlug($request->all());
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
            'data' => $this->locationRepository->findOrFail($id),
        ]);
    }

    /**
     * Update data
     *
     * @param LocationRequest $request
     * @param Location $location
     * @return void
     */
    public function update(UpdateLocationRequest $request, $id)
    {
        // dd($request);
        $this->locationRepository->update($id, $request->all());
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
        return $this->locationRepository->delete($id);
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
        return $this->locationRepository->restore($request);
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
        return $this->locationRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->locationRepository->bulk($request);
    }
}
