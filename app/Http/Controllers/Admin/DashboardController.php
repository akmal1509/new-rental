<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardController extends Controller
{

    protected $typeMenu;
    protected $slugData;
    private $shareData;

    public function __construct()
    {
        $this->typeMenu = 'dashboard';
        $this->slugData = $this->typeMenu;
        $this->shareData = [
            'typeMenu' => $this->typeMenu,
            'slugData' => $this->slugData
        ];
        view()->share('share', $this->shareData);
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function index()
    {
        $type_menu = 'dashboard';
        return view('pages.admin.dashboard', compact('type_menu'));
    }
}
