<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ServiceFrontRepository;
use App\Http\Requests\ServiceFront\UpdateServiceFrontRequest;
use App\Http\Requests\ServiceFront\StoreServiceFrontRequest;
use App\Models\ServiceFront;

class ServiceFrontController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $serviceFrontRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(ServiceFrontRepository $serviceFrontRepository)
    {
        $this->serviceFrontRepository = $serviceFrontRepository;
        $this->typeMenu = 'setting';
        $this->slugData = 'setting/service';
        $this->shareModel = 'ServiceFront';
        $this->title = 'Service';
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
            'data' => $this->serviceFrontRepository->latest(),
            'countData' => $this->serviceFrontRepository->latest()->count(),
            'countTrash' => $this->serviceFrontRepository->viewTrashed()->count(),
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
            'data' => $this->serviceFrontRepository->viewTrashed(),
            'countData' => $this->serviceFrontRepository->all()->count(),
            'countTrash' => $this->serviceFrontRepository->viewTrashed()->count(),
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
            'data' => new ServiceFront,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ServiceFront\StoreServiceFrontRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StoreServiceFrontRequest $request)
    {
        $this->serviceFrontRepository->create($request->all());
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
            'data' => $this->serviceFrontRepository->findOrFail($id),
        ]);
    }

    /**
     * Update data
     *
     * @param ServiceFrontRequest $request
     * @param ServiceFront $serviceFront
     * @return void
     */
    public function update(UpdateServiceFrontRequest $request, $id)
    {
        // dd($request);
        $this->serviceFrontRepository->update($id, $request->all());
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
        return $this->serviceFrontRepository->delete($id);
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
        return $this->serviceFrontRepository->restore($request);
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
        return $this->serviceFrontRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->serviceFrontRepository->bulk($request);
    }
}
