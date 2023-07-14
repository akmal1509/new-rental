<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TestimonialRepository;
use App\Http\Requests\Testimonial\UpdateTestimonialRequest;
use App\Http\Requests\Testimonial\StoreTestimonialRequest;
use App\Models\Testimonial;

class TestimonialController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $testimonialRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(TestimonialRepository $testimonialRepository)
    {
        $this->testimonialRepository = $testimonialRepository;
        $this->typeMenu = 'testimonial';
        $this->slugData = 'testimonial';
        $this->shareModel = 'Testimonial';
        $this->title = 'Testimonial';
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
            'data' => $this->testimonialRepository->latest(),
            'countData' => $this->testimonialRepository->latest()->count(),
            'countTrash' => $this->testimonialRepository->viewTrashed()->count(),
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
            'data' => $this->testimonialRepository->viewTrashed(),
            'countData' => $this->testimonialRepository->all()->count(),
            'countTrash' => $this->testimonialRepository->viewTrashed()->count(),
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
            'data' => new Testimonial,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Testimonial\StoreTestimonialRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StoreTestimonialRequest $request)
    {
        $this->testimonialRepository->create($request->all());
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
            'data' => $this->testimonialRepository->findOrFail($id),
        ]);
    }

    /**
     * Update data
     *
     * @param TestimonialRequest $request
     * @param Testimonial $testimonial
     * @return void
     */
    public function update(UpdateTestimonialRequest $request, $id)
    {
        // dd($request);
        $this->testimonialRepository->update($id, $request->all());
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
        return $this->testimonialRepository->delete($id);
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
        return $this->testimonialRepository->restore($request);
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
        return $this->testimonialRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->testimonialRepository->bulk($request);
    }
}
