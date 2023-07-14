<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ServiceFront;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Repositories\BlogRepository;
use App\Repositories\BookingRepository;
use App\Repositories\CarRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    protected $setting;
    protected $carRepository;
    protected $blogRepository;
    protected $bookingRepository;

    public function __construct(CarRepository $carRepository, BlogRepository $blogRepository, BookingRepository $bookingRepository)
    {
        $this->setting = Setting::all()->first();
        $this->carRepository = $carRepository;
        $this->blogRepository = $blogRepository;
        $this->bookingRepository = $bookingRepository;
        $general = [
            'setting' => $this->setting
        ];
        view()->share('general', $general);
    }

    public function index()
    {
        // dd(Testimonial::all());
        $resultCar = $this->carRepository->dummyCar();
        return view('pages.home.home', [
            'dataCar' => $resultCar,
            'type' => $this->carRepository->dummyType(),
            'car' => $this->carRepository->all(),
            'testimonial' => Testimonial::all()
        ]);
    }


    public function blog()
    {
        $content = "is simply dummy text of the printing and typesetting industry. Lorem
        Ipsum
        has been
        the industry's standard dummy text ever since the 1500s, when an unknown
        printer
        took a galley of type and scrambled it to make a type specimen book. It
        has
        survived
        not only five centuries, but also the leap into electronic typesetting,
        remaining
        essentially unchanged. It was popularised in the 1960s with the release
        of
        Letraset
        sheets containing Lorem Ipsum passages, and more recently with desktop
        publishing
        software like Aldus PageMaker including versions of Lorem Ipsum.";
        $data = [
            'title' => 'Lorem Ipsum',
            'body' => Str::words($content, 30, ' ...')
        ];
        $result = [];
        for ($i = 0; $i < 7; $i++) {
            $result[$i]['title'] = $data['title'];
            $result[$i]['body'] = $data['body'];
        };
        // dd($result);
        return view('pages.blog.blog', [
            'data' => $result,
            'categories' => $this->blogRepository->dummyCategories()
        ]);
    }

    public function singleBlog()
    {
        return view('pages.blog.single-blog', [
            'data' => ''
        ]);
    }

    public function aboutUs()
    {
        return view('pages.about.about', [
            'data' => $this->blogRepository->dummyAbout()
        ]);
    }

    public function services()
    {
        return view('pages.service.service', [
            'data' => ServiceFront::all()
        ]);
    }

    public function contact()
    {
        return view('pages.contact', [
            'data' => ''
        ]);
    }
    public function booking()
    {
        return view('pages.booking', [
            'car' => $this->carRepository->dummyType()
        ]);
    }

    public function bookingStore(Request $request)
    {
        $this->bookingRepository->create($request->all());
        return redirect('/booking')->with('success_message', 'Your data has been send, please wait our time will contact you soon.');
    }

    public function sendContact(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'info' => $request->message
        ];
        // return $data;
        Mail::send('pages.emailContact', $data, function ($message) use ($data) {
            $message->to(config('app.email'));
        });
    }

    public function rent()
    {
        return view('pages.rent.rent-list', [
            'data' => $this->carRepository->orderBy('id', 'asc')->paginate(5),
            // 'location' => $this->carRepository->dummyLocation()
        ]);
    }

    public function singleRent($slug)
    {
        // dd($this->blogRepository->dummy()[1]);
        return view('pages.rent.single-rent', [
            'data' => $this->carRepository->where('slug', $slug),
            'recent' => $this->blogRepository->latest(),
            // 'location' => $this->carRepository->dummyLocation()
        ]);
    }
}
