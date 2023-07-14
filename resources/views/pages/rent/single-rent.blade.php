@extends('layouts.front.front')
@section('title', $data->name)
@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush
@section('main')
    <section id="sectionSingleRent">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 pr-2">
                    <div class="container-single-rent">
                        <img src="{{ asset($imageStorage . '/' . $data['image']) }}" class="mb-4" alt="">
                        <h1 class="title-single-rent mb-2">{{ $data->name }}</h1>
                        {{-- <p class="mb-2">Avaible location: Miami, Texas</p>
                        <p>Price:</p>
                        <p class="price-single-rent mb-2"><span class="font-weight-bold">$25</span>/day</p> --}}
                        <!-- Button trigger modal -->
                        {{-- <div>
                            <a href="/booking?carId={{ $data['id'] }}" class="btn btn-danger akm-btn mt-4">Book This
                                Car</a>
                        </div> --}}

                        @include('pages.rent.modal-rent')
                        <p class="mt-4 mb-2">Description:</p>
                        <p>
                            @php
                                echo $data['body'];
                            @endphp
                        </p>
                    </div>
                </div>
                <!-- <div class="col-12 col-lg-4">
                        <div class="container-recent-blog">
                            <h3 class="mb-3">Recent Post</h3>
                            @foreach ($recent as $recent)
    <div class="card-recent-blog">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <a href="{{ url('/blog/single') }}">
                                                <img src="{{ asset($imageStorage . '/' . $recent['image']) }}" alt=""
                                                    class="img-fluid"></a>
                                        </div>
                                        <div class="col-8">
                                            <a href="{{ url('/blog/single') }}">
                                                <p class="title-recent-post font-weight-bold">{{ $recent['title'] }}</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
    @endforeach
                        </div>
                    </div> -->
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
