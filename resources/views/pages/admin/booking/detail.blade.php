@extends('layouts.admin.app')
@section('title', 'Master Data' . $share['title'])

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('main')
    <meta name="method-delete" content="DELETE">
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Master Data {{ $share['title'] }}</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <p>Full Name</p>
                                        <p>Email</p>
                                        <p>Phone</p>
                                        <p>PickUp Date</p>
                                        <p>PickUp Time</p>
                                        <p>Address</p>
                                        <p>Destination</p>
                                        <p>Passanger</p>
                                        <p>Car</p>
                                        <p>Addinational</p>
                                    </div>
                                    <div class="col-lg-8 col-6">
                                        <p>: {{ $data->name }}</p>
                                        <p>: {{ $data->email }}</p>
                                        <p>: {{ $data->phone }}</p>
                                        <p>: {{ $data->pickUpDate }}</p>
                                        <p>: {{ $data->pickUpTime }}</p>
                                        <p>: {{ $data->location }}</p>
                                        <p>: {{ $data->destinatation }}</p>
                                        <p>: {{ $data->passenger }}</p>
                                        <p>: {{ $data->carType ?? '-' }}</p>
                                        <p>: {{ $data->info ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
