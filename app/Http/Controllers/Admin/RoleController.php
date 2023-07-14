<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Models\Role;

class RoleController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $roleRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->typeMenu = 'user';
        $this->slugData = 'user/role';
        $this->shareModel = 'Role';
        $this->title = 'Role';
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
            'data' => $this->roleRepository->latest(),
            'countData' => $this->roleRepository->latest()->count(),
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
            'data' => new Role,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Role\StoreRoleRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StoreRoleRequest $request)
    {
        $this->roleRepository->create($request->all());
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
            'data' => $this->roleRepository->findOrFail($id),
        ]);
    }

    /**
     * Update data
     *
     * @param RoleRequest $request
     * @param Role $role
     * @return void
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        // dd($request);
        $this->roleRepository->update($id, $request->all());
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
        return $this->roleRepository->delete($id);
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
        return $this->roleRepository->restore($request);
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
        return $this->roleRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->roleRepository->bulk($request);
    }
}
