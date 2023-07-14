<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BlogRepository;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Models\Blog;

class BlogController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $blogRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->typeMenu = 'blogs';
        $this->slugData = 'blog';
        $this->shareModel = 'Blog';
        $this->title = 'Blog';
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
            'data' => $this->blogRepository->latest(),
            'countData' => $this->blogRepository->latest()->count(),
            'countTrash' => $this->blogRepository->viewTrashed()->count(),
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
            'data' => $this->blogRepository->viewTrashed(),
            'countData' => $this->blogRepository->all()->count(),
            'countTrash' => $this->blogRepository->viewTrashed()->count(),
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
            'data' => new Blog,
            'option' => $this->blogRepository->option()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Blog\StoreBlogRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StoreBlogRequest $request)
    {
        $this->blogRepository->create($request->all());
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
            'data' => $this->blogRepository->findOrFail($id),
            'option' => $this->blogRepository->option()
        ]);
    }

    /**
     * Update data
     *
     * @param BlogRequest $request
     * @param Blog $blog
     * @return void
     */
    public function update(UpdateBlogRequest $request, $id)
    {
        // dd($request);
        $this->blogRepository->update($id, $request->all());
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
        return $this->blogRepository->delete($id);
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
        return $this->blogRepository->restore($request);
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
        return $this->blogRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->blogRepository->bulk($request);
    }
}
