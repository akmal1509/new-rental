<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRoleRepository;
use App\Http\Requests\UserRole\UpdateUserRoleRequest;
use App\Http\Requests\UserRole\StoreUserRoleRequest;
use App\Models\UserRole;

class UserRoleController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $userRoleRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(UserRoleRepository $userRoleRepository)
    {
        $this->userRoleRepository = $userRoleRepository;
        $this->typeMenu = 'user';
        $this->slugData = 'user/role/access';
        $this->shareModel = 'UserRole';
        $this->title = 'Role Access';
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
            'data' => $this->userRoleRepository->latest(),
            'action' => 'delete'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return mixed
     */
    public function edit($id)
    {
        dd($id);
        return view('components.admin.forms.edit', [
            'data' => $this->userRoleRepository->findOrFail($id),
        ]);
    }

    /**
     * Update data
     *
     * @param UserRoleRequest $request
     * @param UserRole $userRole
     * @return void
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $this->userRoleRepository->update($id, $request->all());
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
        return $this->userRoleRepository->delete($id);
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
        return $this->userRoleRepository->restore($request);
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
        return $this->userRoleRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->userRoleRepository->bulk($request);
    }
}
