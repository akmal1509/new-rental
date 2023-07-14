<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SettingRepository;
use App\Http\Requests\Setting\UpdateSettingRequest;
use App\Http\Requests\Setting\StoreSettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $settingRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
        $this->typeMenu = 'setting';
        $this->slugData = 'setting';
        $this->shareModel = 'Setting';
        $this->title = 'Web Setting';
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
            'data' => $this->settingRepository->all()->first(),
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
            'data' => $this->settingRepository->viewTrashed(),
            'countData' => $this->settingRepository->all()->count(),
            'countTrash' => $this->settingRepository->viewTrashed()->count(),
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
            'data' => new Setting,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Setting\StoreSettingRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StoreSettingRequest $request)
    {
        $this->settingRepository->create($request->all());
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
            'data' => $this->settingRepository->findOrFail($id),
        ]);
    }

    /**
     * Update data
     *
     * @param SettingRequest $request
     * @param Setting $setting
     * @return void
     */
    public function update(UpdateSettingRequest $request, $id)
    {
        // dd($request->all());
        $this->settingRepository->update($id, $request->all());
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
        return $this->settingRepository->delete($id);
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
        return $this->settingRepository->restore($request);
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
        return $this->settingRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->settingRepository->bulk($request);
    }
}
