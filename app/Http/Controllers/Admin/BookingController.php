<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BookingRepository;
use Spatie\Activitylog\Models\Activity;
use App\Http\Requests\Booking\StoreBookingRequest;
use App\Http\Requests\Booking\UpdateBookingRequest;

class BookingController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $bookingRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
        $this->typeMenu = 'booking';
        $this->slugData = 'booking';
        $this->shareModel = 'Booking';
        $this->title = 'Booking';
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
        // $data = Activity::all()->last();
        // dd($data);
        return view('pages.admin.' . $this->slugData . '.index', [
            'type' => 'index',
            'data' => $this->bookingRepository->latest(),
            'countData' => $this->bookingRepository->latest()->count(),
            'countTrash' => $this->bookingRepository->viewTrashed()->count(),
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
            'data' => $this->bookingRepository->viewTrashed(),
            'countData' => $this->bookingRepository->all()->count(),
            'countTrash' => $this->bookingRepository->viewTrashed()->count(),
            'action' => 'forceDelete'
        ]);
    }

    public function show($id)
    {
        return view('pages.admin.' . $this->slugData . '.detail', [
            'data' => $this->bookingRepository->findOrFail($id)
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
            'data' => new Booking,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Booking\StoreBookingRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StoreBookingRequest $request)
    {
        $this->bookingRepository->create($request->all());
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
            'data' => $this->bookingRepository->findOrFail($id),
        ]);
    }

    /**
     * Update data
     *
     * @param BookingRequest $request
     * @param Booking $booking
     * @return void
     */
    public function update(UpdateBookingRequest $request, $id)
    {
        // dd($request);
        $this->bookingRepository->update($id, $request->all());
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
        return $this->bookingRepository->delete($id);
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
        return $this->bookingRepository->restore($request);
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
        return $this->bookingRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->bookingRepository->bulk($request);
    }

    public function info(Request $request)
    {
        $data = $this->bookingRepository->findOrFail($request->id);
        return view('pages.admin.booking.modal', compact('data'))->render();
    }
}
