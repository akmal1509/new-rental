@extends('layouts.front.front')
@section('title', 'Blog')
@section('main')
    <div id="sectionSingleBlog">
        <div class="container">
            <h1 class="text-center mb-5">Lorem Ipsum</h3>
                <img src="{{ $imageStorage }}/files/breakingnews.jpg" class="img-fluid object-fit-cover w-100 mb-5"
                    alt="">
                <p>
                    is simply dummy text of the printing and typesetting industry. Lorem
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
                    software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
        </div>
    </div>
@endsection
