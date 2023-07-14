<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\UserPermission;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use App\Repositories\UserPermissionRepository;
use App\Http\Requests\UserPermission\StoreUserPermissionRequest;
use App\Http\Requests\UserPermission\UpdateUserPermissionRequest;

class UserPermissionController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $userPermissionRepository;
    private $roleRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(UserPermissionRepository $userPermissionRepository, RoleRepository $roleRepository)
    {
        $this->userPermissionRepository = $userPermissionRepository;
        $this->roleRepository = $roleRepository;
        $this->typeMenu = 'user';
        $this->slugData = 'user/permission/access';
        $this->shareModel = 'UserPermission';
        $this->title = 'UserPermission';
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
        // $user = auth()->user();
        // $permissions = $user->getRoleNames();
        // $role = Role::findByName('admin');
        // dd($role->permissions->pluck('name')->toArray());
        return view('pages.admin.' . $this->slugData . '.index', [
            'type' => 'index',
            'permission' => $this->userPermissionRepository->orderBy('asc', 'name'),
            'role' => $this->roleRepository->except(),
            'action' => 'delete'
        ]);
    }


    public function store(Request $request)
    {
        return $this->userPermissionRepository->send($request);
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
            'data' => $this->userPermissionRepository->findOrFail($id),
        ]);
    }

    /**
     * Update data
     *
     * @param UserPermissionRequest $request
     * @param UserPermission $userPermission
     * @return void
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $this->userPermissionRepository->update($id, $request->all());
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
        return $this->userPermissionRepository->delete($id);
    }

    public function permis(Request $request)
    {
        $role = Role::findByName($request->role);
        $access = $role->permissions->pluck('name')->toArray();
        $permission = $this->userPermissionRepository->orderBy('asc', 'name');
        return view('pages.admin.user.permission.access.permission', compact('permission', 'access'))->render();
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
        return $this->userPermissionRepository->restore($request);
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
        return $this->userPermissionRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->userPermissionRepository->bulk($request);
    }
}
