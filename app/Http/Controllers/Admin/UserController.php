<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;

class UserController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $userRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->typeMenu = 'user';
        $this->slugData = 'user';
        $this->shareModel = 'User';
        $this->title = 'User';
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
            'data' => $this->userRepository->latest(),
            'countData' => $this->userRepository->latest()->count(),
            'countTrash' => $this->userRepository->viewTrashed()->count(),
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
            'data' => $this->userRepository->viewTrashed(),
            'countData' => $this->userRepository->all()->count(),
            'countTrash' => $this->userRepository->viewTrashed()->count(),
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
            'type' => 'create',
            'data' => new User,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\User\StoreUserRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StoreUserRequest $request)
    {
        $this->userRepository->create($request->all());
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
            'type' => 'edit',
            'data' => $this->userRepository->findOrFail($id),
        ]);
    }

    /**
     * Update data
     *
     * @param UserRequest $request
     * @param User $user
     * @return void
     */
    public function update(UpdateUserRequest $request, $id)
    {
        // dd($request);
        $this->userRepository->update($id, $request->all());
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
        return $this->userRepository->delete($id);
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
        return $this->userRepository->restore($request);
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
        return $this->userRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->userRepository->bulk($request);
    }

    public function changePassword($id)
    {
        return view('pages.admin.user.changepassword', [
            'data' => $this->userRepository->findOrFail($id)
        ]);
    }

    public function updatePassword(Request $request, $id)
    {
        $this->userRepository->changePassword($request, $id);
        return redirect('/admin/' . $this->slugData)
            ->with('success_message', 'Data was successfully update.');;
    }
}
