<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ContactRepository;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $contactRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
        $this->typeMenu = ;
        $this->slugData = ;
        $this->shareModel = 'Contact';
        $this->title = ;
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
            'data' => $this->contactRepository->latest(),
            'countData' => $this->contactRepository->latest()->count(),
            'countTrash' => $this->contactRepository->viewTrashed()->count(),
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
            'data' => $this->contactRepository->viewTrashed(),
            'countData' => $this->contactRepository->all()->count(),
            'countTrash' => $this->contactRepository->viewTrashed()->count(),
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
            'data' => new Contact,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Contact\StoreContactRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StoreContactRequest $request)
    {
        $this->contactRepository->create($request->all());
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
            'data' => $this->contactRepository->findOrFail($id),
        ]);
    }

    /**
     * Update data
     *
     * @param ContactRequest $request
     * @param Contact $contact
     * @return void
     */
    public function update(UpdateContactRequest $request, $id)
    {
        // dd($request);
        $this->contactRepository->update($id, $request->all());
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
        return $this->contactRepository->delete($id);
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
        return $this->contactRepository->restore($request);
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
        return $this->contactRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->contactRepository->bulk($request);
    }
}
