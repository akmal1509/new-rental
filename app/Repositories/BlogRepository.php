<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BlogRepository extends BaseRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Blog $model)
    {
        $this->model = $model;
    }

    public function option()
    {
        $result = [
            'category' => BlogCategory::all()
        ];

        return $result;
    }

    public function create($data)
    {
        $result = $data;
        $result['userId'] = Auth()->user()->id;
        $result['slug'] = SlugService::createSlug($this->model, 'slug', $data['slug']);
        $result['image'] = $this->imageData($data['image']);


        return $this->model->create($result);
    }

    public function dummy()
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
        software like Aldus PageMaker including versions of Lorem Ipsum. ";
        $data = [
            'title' => 'Lorem Ipsum',
            'body' => Str::words($content, 30, ' ...')
        ];
        $result = [];
        for ($i = 0; $i < 3; $i++) {
            $result[$i]['title'] = $data['title'];
            $result[$i]['body'] = $data['body'];
            $result[$i]['image'] = 'files/breakingnews.jpg';
        };
        return $result;
    }

    public function dummyCategories()
    {
        $data = [
            'News', 'Sport', 'Lifestyle'
        ];
        return $data;
    }

    public function dummyAbout()
    {
        $data = [
            'title' => "About Us",
            'body' => "Welcome to VVIP 69 LUX LIMO, owned by Ary Brata. What started as a humble venture in the transportation industry as a taxi driver has now evolved into a prestigious luxury car hire and limousine service. With 70 top-of-the-line limousine cars, we provide opulent moments on the road. <br><br>

            At VVIP69, we specialize in exceptional Airport & Cruise Transfers and unforgettable experiences for special occasions. Our commitment to excellence has established us as a luxury symbol in Sydney. <br><br>
            
            We treat our customers like royalty, offering tailored flexibility, competitive rates, and experienced chauffeurs. VVIP69 ensures a seamless and enjoyable transportation experience with a decade-long list of satisfied clients. <br><br>
            
            Our team includes bilingual chauffeurs for effective communication and catering to diverse needs. Embark on an unforgettable journey of pure elegance, ultimate comfort, and service that surpasses all expectations with VVIP 69 LUX LIMO. Get ready to experience luxury like never before.
            "
        ];
        return $data;
    }
    // Write something awesome :)
}
