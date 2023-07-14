<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BlogCategoryRepository;
use App\Http\Requests\BlogCategory\UpdateBlogCategoryRequest;
use App\Http\Requests\BlogCategory\StoreBlogCategoryRequest;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $blogCategoryRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(BlogCategoryRepository $blogCategoryRepository)
    {
        $this->blogCategoryRepository = $blogCategoryRepository;
        $this->typeMenu = 'blog';
        $this->slugData = 'blog/category';
        $this->shareModel = 'BlogCategory';
        $this->title = 'Category';
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
            'data' => $this->blogCategoryRepository->latest(),
            'countData' => $this->blogCategoryRepository->latest()->count(),
            'countTrash' => $this->blogCategoryRepository->viewTrashed()->count(),
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
            'data' => $this->blogCategoryRepository->viewTrashed(),
            'countData' => $this->blogCategoryRepository->all()->count(),
            'countTrash' => $this->blogCategoryRepository->viewTrashed()->count(),
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
            'data' => new BlogCategory,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BlogCategory\StoreBlogCategoryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StoreBlogCategoryRequest $request)
    {
        $this->blogCategoryRepository->create($request->all());
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
            'data' => $this->blogCategoryRepository->findOrFail($id),
        ]);
    }

    /**
     * Update data
     *
     * @param BlogCategoryRequest $request
     * @param BlogCategory $blogCategory
     * @return void
     */
    public function update(UpdateBlogCategoryRequest $request, $id)
    {
        // dd($request);
        $this->blogCategoryRepository->update($id, $request->all());
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
        return $this->blogCategoryRepository->delete($id);
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
        return $this->blogCategoryRepository->restore($request);
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
        return $this->blogCategoryRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->blogCategoryRepository->bulk($request);
    }
}
