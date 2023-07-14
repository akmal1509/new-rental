<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PermissionRepository;
use App\Http\Requests\Permission\UpdatePermissionRequest;
use App\Http\Requests\Permission\StorePermissionRequest;
use App\Models\Permission;

class PermissionController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $permissionRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
        $this->typeMenu = 'user';
        $this->slugData = 'user/permission';
        $this->shareModel = 'Permission';
        $this->title = 'Permission';
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
            'data' => $this->permissionRepository->latest(),
            'action' => 'delete'
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
            'data' => new Permission,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Permission\StorePermissionRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StorePermissionRequest $request)
    {
        $this->permissionRepository->create($request->all());
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
            'data' => $this->permissionRepository->findOrFail($id),
        ]);
    }

    /**
     * Update data
     *
     * @param PermissionRequest $request
     * @param Permission $permission
     * @return void
     */
    public function update(UpdatePermissionRequest $request, $id)
    {
        // dd($request);
        $this->permissionRepository->update($id, $request->all());
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
        return $this->permissionRepository->delete($id);
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
        return $this->permissionRepository->restore($request);
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
        return $this->permissionRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->permissionRepository->bulk($request);
    }
}
