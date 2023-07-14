<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RentCarRepository;
use App\Http\Requests\RentCar\UpdateRentCarRequest;
use App\Http\Requests\RentCar\StoreRentCarRequest;
use App\Models\RentCar;
use Carbon\Carbon;

class RentCarController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $rentCarRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(RentCarRepository $rentCarRepository)
    {
        $this->rentCarRepository = $rentCarRepository;
        $this->typeMenu = 'rent';
        $this->slugData = 'rent';
        $this->shareModel = 'RentCar';
        $this->title = 'Rental';
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
            'data' => $this->rentCarRepository->latest(),
            'countData' => $this->rentCarRepository->latest()->count(),
            'countTrash' => $this->rentCarRepository->viewTrashed()->count(),
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
            'data' => $this->rentCarRepository->viewTrashed(),
            'countData' => $this->rentCarRepository->all()->count(),
            'countTrash' => $this->rentCarRepository->viewTrashed()->count(),
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
        // $start = '2023-06-30';
        // $end = '2023-07-5';
        // $from = Carbon::createFromFormat('Y-m-d', $start);
        // $to = Carbon::createFromFormat('Y-m-d', $end);

        // dd($to->diffInDays($from));
        return view('components.admin.forms.create', [
            'data' => new RentCar,
            'option' => $this->rentCarRepository->option()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RentCar\StoreRentCarRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StoreRentCarRequest $request)
    {
        // dd($request->all());
        $this->rentCarRepository->create($request->all());
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
            'data' => $this->rentCarRepository->findOrFail($id),
            'option' => $this->rentCarRepository->option()
        ]);
    }

    /**
     * Update data
     *
     * @param RentCarRequest $request
     * @param RentCar $rentCar
     * @return void
     */
    public function update(UpdateRentCarRequest $request, $id)
    {
        // dd($request);
        $this->rentCarRepository->update($id, $request->all());
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
        return $this->rentCarRepository->delete($id);
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
        return $this->rentCarRepository->restore($request);
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
        return $this->rentCarRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->rentCarRepository->bulk($request);
    }

    public function calculate(Request $request)
    {
        $start = $request['from'];
        $end = $request['to'];
        $from = Carbon::createFromFormat('Y-m-d', $start);
        $to = Carbon::createFromFormat('Y-m-d', $end);

        $long = $to->diffInDays($from);

        $data = $this->rentCarRepository->calculate($long, $request);

        return $data;
    }

    public function imageChange(Request $request)
    {
        $data = $this->rentCarRepository->imageChange($request);
        return $data;
    }

    public function info(Request $request)
    {
        $data = $this->rentCarRepository->findOrFail($request->id);
        return view('pages.admin.rent.modal', compact('data'))->render();
    }
}
