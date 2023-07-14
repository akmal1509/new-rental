@extends('layouts.front.front')
@section('title', 'Blog')
@section('main')
    <div id="blog-section" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Blog</h3>
                    <div class="row mt-5">
                        <div class="col-lg-8">
                            @foreach ($data as $data)
                                <div class="card-blog-list bg-card-gray">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <a href="{{ url('/blog/single') }}">
                                                <img src="{{ $imageStorage }}/files/breakingnews.jpg"
                                                    class="img-fluid image-blog-list h-lg-100 w-100" alt="">
                                            </a>
                                        </div>
                                        <div class="col-lg-7 pl-lg-0">
                                            <div class="content-blog-list">
                                                <a href="" class="fc-white">
                                                    <p class="title-card-list mb-2">{{ $data['title'] }}</p>
                                                </a>
                                                <p class="mb-4">
                                                    {{ $data['body'] }}
                                                </p>
                                                <a href="" class="btn btn-akm btn-danger">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-lg-3 offset-lg-1 d-none d-lg-block">
                            <div class="categories-blog-list bg-card-gray">
                                <h3 class="mb-4">Categories</h3>
                                @foreach ($categories as $categories)
                                    <p class="categories-blog-list-value">
                                        {{ $categories }}
                                    </p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
