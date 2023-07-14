<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CarLisenceRepository;
use App\Http\Requests\CarLisence\UpdateCarLisenceRequest;
use App\Http\Requests\CarLisence\StoreCarLisenceRequest;
use App\Models\CarLisence;

class CarLisenceController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $carLisenceRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(CarLisenceRepository $carLisenceRepository)
    {
        $this->carLisenceRepository = $carLisenceRepository;
        $this->typeMenu = 'car';
        $this->slugData = 'car/lisence';
        $this->shareModel = 'CarLisence';
        $this->title = 'Lisence';
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
            'data' => $this->carLisenceRepository->latest(),
            'countData' => $this->carLisenceRepository->latest()->count(),
            'countTrash' => $this->carLisenceRepository->viewTrashed()->count(),
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
            'data' => $this->carLisenceRepository->viewTrashed(),
            'countData' => $this->carLisenceRepository->all()->count(),
            'countTrash' => $this->carLisenceRepository->viewTrashed()->count(),
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
            'data' => new CarLisence,
            'option' => $this->carLisenceRepository->option()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CarLisence\StoreCarLisenceRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StoreCarLisenceRequest $request)
    {
        $this->carLisenceRepository->create($request->all());
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
            'data' => $this->carLisenceRepository->findOrFail($id),
            'option' => $this->carLisenceRepository->option()
        ]);
    }

    /**
     * Update data
     *
     * @param CarLisenceRequest $request
     * @param CarLisence $carLisence
     * @return void
     */
    public function update(UpdateCarLisenceRequest $request, $id)
    {
        // dd($request);
        $this->carLisenceRepository->update($id, $request->all());
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
        return $this->carLisenceRepository->delete($id);
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
        return $this->carLisenceRepository->restore($request);
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
        return $this->carLisenceRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->carLisenceRepository->bulk($request);
    }
}
