<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PaymentRepository;
use App\Http\Requests\Payment\UpdatePaymentRequest;
use App\Http\Requests\Payment\StorePaymentRequest;
use App\Models\Payment;
use Akaunting\Money\Currency;
use Akaunting\Money\Money;

class PaymentController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $paymentRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
        $this->typeMenu = 'rent';
        $this->slugData = 'rent/payment';
        $this->shareModel = 'Payment';
        $this->title = 'Payment';
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
        // echo Money::USD(500.00, true);
        // dd();
        return view('pages.admin.' . $this->slugData . '.index', [
            'type' => 'index',
            'data' => $this->paymentRepository->latest(),
            'countData' => $this->paymentRepository->latest()->count(),
            'countTrash' => $this->paymentRepository->viewTrashed()->count(),
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
            'data' => $this->paymentRepository->viewTrashed(),
            'countData' => $this->paymentRepository->all()->count(),
            'countTrash' => $this->paymentRepository->viewTrashed()->count(),
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
            'data' => new Payment,
            'option' => $this->paymentRepository->option()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Payment\StorePaymentRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StorePaymentRequest $request)
    {
        $this->paymentRepository->create($request->all());
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
            'data' => $this->paymentRepository->findOrFail($id),
            'option' => $this->paymentRepository->option()
        ]);
    }

    /**
     * Update data
     *
     * @param PaymentRequest $request
     * @param Payment $payment
     * @return void
     */
    public function update(UpdatePaymentRequest $request, $id)
    {
        // dd($request);
        $this->paymentRepository->update($id, $request->all());
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
        return $this->paymentRepository->delete($id);
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
        return $this->paymentRepository->restore($request);
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
        return $this->paymentRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->paymentRepository->bulk($request);
    }
}
