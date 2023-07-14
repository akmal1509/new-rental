@extends('layouts.front.front')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('title', 'Home')

@section('main')
    @include('pages.home.sectionOne')
    @include('pages.home.sectionTwo')
    @include('pages.home.sectionTree')
    @include('pages.home.sectionFour')
    @include('pages.home.sectionFive')
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
