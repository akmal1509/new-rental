@extends('layouts.admin.app')

@section('title', 'Edit ' . $share['model'])

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit {{ $share['title'] }}</h1>
            </div>

            <div class="section-body">
                <form method="post" action="/admin/{{ $share['slugData'] }}/{{ $data->id }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('components.admin.forms._form' . $share['model'])
                </form>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    @if ($share['slugData'] !== 'car/feature')
        <script src="{{ asset('js/admin/slugChecker.js') }}"></script>
        <script src="{{ asset('js/admin/removeInvalid.js') }}"></script>
    @endif

    @if ($share['slugData'] == 'cars')
        <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
        <script>
            var cleaveC = new Cleave(".currency", {
                numeral: true,
                numeralThousandsGroupStyle: "thousand",
            });
        </script>
    @endif
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
