<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CustomLog;
use App\Models\StatusLog;
use App\Repositories\BaseRepository;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Repositories\CarRepository;

class GeneralController extends Controller
{

    private $type;
    protected $model;
    // private $modelName;
    private $repository;

    private $baseRepository;

    public function __construct(Request $request, BaseRepository $baseRepository)
    {
        $this->type = $request->type;
        // $this->carRepository = $carRepository;
        $this->baseRepository = $baseRepository;
        $this->repository =  '\App\Repositories' . '\\' .  $this->type . 'Repository';
        $this->model = '\App\Models' . '\\' . $this->type;
    }

    /**
     * Check Duplicate Slug
     * This action response for change field slug when 'name' or 'title' of data has change
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSlug(Request $request)
    {
        $slug = $request->title;
        $checkSlug = $this->model::whereNotIn('id', [$request->id])->where('slug', $slug)->first();
        $result = SlugService::createSlug($this->model, 'slug', $slug);

        if ($checkSlug) {
            $status = 'Slug is Already';
        } else {
            $status = '';
        }
        return response()->json([
            'slug' => $result,
            'status' => $status
        ]);
    }

    /**
     * Check Duplicate Slug
     * This action for feedback when slug has change
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkSlug(Request $request)
    {
        $slug = $request->title;
        $checkSlug = $this->model::whereNotIn('id', [$request->id])->where('slug', $slug)->first();
        $result = SlugService::createSlug($this->model, 'slug', $slug);

        if ($checkSlug) {
            $status = 'Slug is Already';
        } else {
            $status = '';
        }
        return response()->json([
            'slug' => $result,
            'status' => $status
        ]);
    }

    public function notif(Request $request)
    {
        $data = CustomLog::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.admin.log.log-header', compact('data'))->render();
    }

    public function upNotif(Request $request)
    {
        $data = CustomLog::doesnthave('userNotif')->get();
        foreach ($data as $data) {
            StatusLog::create([
                'logId' => $data->id,
                'userId' => auth()->user()->id,
                'notif' => 1
            ]);
        };
        return;
    }
}
