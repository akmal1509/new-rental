<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\StatusLogRepository;
use App\Http\Requests\StatusLog\UpdateStatusLogRequest;
use App\Http\Requests\StatusLog\StoreStatusLogRequest;
use App\Models\CustomLog;
use App\Models\StatusLog;
use Spatie\Activitylog\Models\Activity;

class StatusLogController extends Controller
{

    /**
     * For identity menu dashboard active
     *
     * @var [string]
     */
    private $statusLogRepository;
    protected $typeMenu;
    protected $shareModel;
    protected $slugData;
    protected $title;

    private $shareData;


    public function __construct(StatusLogRepository $statusLogRepository)
    {
        $this->statusLogRepository = $statusLogRepository;
        $this->typeMenu = 'log';
        $this->slugData = 'log';
        $this->shareModel = 'StatusLog';
        $this->title = 'Log Activity';
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
        // $data = CustomLog::withCount('logStatus')->get();
        // $data = CustomLog::with(['logStatus' => function ($e) {
        //     $e->where('userId', auth()->user()->id)
        //         ->where('status', 0);
        // }]);
        // $data = CustomLog::whereHas('userStatus')->count();
        // dd($data);
        // $data = CustomLog::whereHas('userNotif')->count();
        // $data->userLog();
        $data = CustomLog::with(['bookings', 'userStatus'])->paginate(100);
        // dd($data);
        return view('pages.admin.' . $this->slugData . '.index', [
            'data' => $data,
            // 'test' => $data
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
            'data' => $this->statusLogRepository->viewTrashed(),
            'countData' => $this->statusLogRepository->all()->count(),
            'countTrash' => $this->statusLogRepository->viewTrashed()->count(),
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
            'data' => new StatusLog,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StatusLog\StoreStatusLogRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {
        return $this->statusLogRepository->create($request->all());
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
            'data' => $this->statusLogRepository->findOrFail($id),
        ]);
    }

    /**
     * Update data
     *
     * @param StatusLogRequest $request
     * @param StatusLog $statusLog
     * @return void
     */
    public function update(UpdateStatusLogRequest $request, $id)
    {
        // dd($request);
        $this->statusLogRepository->update($id, $request->all());
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
        return $this->statusLogRepository->delete($id);
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
        return $this->statusLogRepository->restore($request);
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
        return $this->statusLogRepository->force($request->id);
    }

    public function bulk(Request $request)
    {
        return $this->statusLogRepository->bulk($request);
    }
}
