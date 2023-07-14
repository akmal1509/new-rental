@extends('layouts.front.front')
@section('title', 'Rent')
@section('main')
    <section id="sectionRentList">
        <div class="container">
            <h3 class="text-center mb-5">Our Car</h3>
            <div class="row">
                <div class="col-lg-12">
                    @foreach ($data as $car)
                        <div class="rent-list-card bg-card-gray">
                            <div class="row">

                                <div class="col-lg-4">
                                    <a href="{{ url('/rent/') . '/' . $car->slug }}">
                                        <img src="{{ config('app.imageStorage') . '/' . $car->image }} " alt=""
                                            class="img-fluid h-100 img-img-car">
                                    </a>
                                </div>

                                <div class="col-lg-8">
                                    <div class="rent-list-content">
                                        <a href="{{ url('/rent/') . '/' . $car->slug }}">
                                            <p class="title-card-list font-weight-bold mb-2">
                                                {{ $car->name }}
                                            </p>
                                        </a>
                                        <div class="body-card-list">
                                            <p><span class="font-weight-normal">Description</span> :</p>
                                            <p class="">
                                                @php
                                                    echo $car->halfBody;
                                                @endphp
                                            </p>
                                            {{-- <div>
                                                <a href="/booking?carId={{ $car->id }}"
                                                    class="btn btn-danger akm-btn mt-4">Book This Car</a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{ $data->links() }}
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(".js-range-slider").ionRangeSlider({
            skin: "round",
            prefix: "$"
        });
    </script>
@endpush
