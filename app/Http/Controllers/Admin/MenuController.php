<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Repositories\MenuRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Menu\StoreMenuRequest;
use App\Http\Requests\Menu\UpdateMenuRequest;

class MenuController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $menuRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
        $this->typeMenu = 'setting';
        $this->slugData = 'setting/menu';
        $this->shareModel = 'Menu';
        $this->title = 'Menu';
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
        // $data =  Auth::user()->roles->pluck('name');
        // dd($data);

        return view('pages.admin.' . $this->slugData . '.index', [
            'type' => 'index',
            'data' => $this->menuRepository->menuSort(),
            'countData' => $this->menuRepository->latest()->count(),
            'countTrash' => $this->menuRepository->viewTrashed()->count(),
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
            'data' => $this->menuRepository->viewTrashed(),
            'countData' => $this->menuRepository->all()->count(),
            'countTrash' => $this->menuRepository->viewTrashed()->count(),
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
            'data' => new Menu,
            'menu' => $this->menuRepository->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Menu\StoreMenuRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StoreMenuRequest $request)
    {
        $this->menuRepository->create($request->all());
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
            'data' => $this->menuRepository->findOrFail($id),
            'menu' => $this->menuRepository->all()
        ]);
    }

    /**
     * Update data
     *
     * @param MenuRequest $request
     * @param Menu $menu
     * @return void
     */
    public function update(UpdateMenuRequest $request, $id)
    {
        // dd($request);
        $this->menuRepository->update($id, $request->all());
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
        return $this->menuRepository->delete($id);
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
        return $this->menuRepository->restore($request);
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
        return $this->menuRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->menuRepository->bulk($request);
    }
}
