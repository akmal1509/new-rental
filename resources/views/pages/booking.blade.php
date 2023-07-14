@extends('layouts.front.front')
@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush
@section('main')
    <section id="booking">
        <div class="container">
            <h3 class="mb-2">Booking</h3>
            <p class="mb-5">
                We're dedicated to giving you the best customer service possible and quickly answering
                any price questions you may have. We know your time is valuable, so we make it a priority
                to handle your requests as soon as possible. Typically, we respond within around 30
                minutes during our operating hours from 6 am to 10 pm. We truly appreciate your patience
                and can't wait to help you get all the info you need to plan your amazing limousine service.
            </p>
            <form action="/booking" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Full Name*</label>
                            <input type="text" name="name" class="form-control" placeholder="Full name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email*</label>
                            <input type="email" name="email" class="form-control" placeholder="Your Email Address"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Phone*</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
                        </div>
                        <div class="form-group">
                            <label for="">PickUp Date*</label>
                            <input type="text" name="pickUpDate" class="form-control datepicker"
                                placeholder="PickUp Date" required value="{{ request('pickUp') ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="">PickUp Time*</label>
                            <input type="text" name="pickUpTime" class="form-control timepicker"
                                placeholder="PickUp Time" required value="">
                        </div>
                        <div class="form-group">
                            <label for="">PickUp</label>
                            <input type="text" name="location" class="form-control"
                                value="{{ request('location') ?? '' }}" placeholder="PickUp Address">
                        </div>
                        <div class="form-group">
                            <label for="">Destination</label>
                            <input type="text" name="destination" class="form-control"
                                value="{{ request('location') ?? '' }}" placeholder="Destination Address">
                        </div>
                        <div class="form-group">
                            <label for="">How many will there be?*</label>
                            <input type="text" name="passenger" class="form-control" placeholder="Number Of Passenger"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Which kind of vehicle would you prefer</label>
                            <select name="carName" id="" class="form-control select2">
                                @foreach ($car as $car)
                                    <option value="{{ $car }}" {{ request('type') == $car ? 'selected' : '' }}>
                                        {{ $car }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Additional Information</label>
                            <textarea type="text" name="name" class="form-control contact-text" placeholder="Additional Information"></textarea>
                        </div>
                        <button class="btn bg-danger btn-akm mt-4">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
