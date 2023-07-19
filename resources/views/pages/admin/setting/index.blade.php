@extends('layouts.admin.app')
@section('title', 'Master Data' . $share['title'])

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <meta name="method-delete" content="DELETE">
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $share['title'] }}</h1>
            </div>
            {{-- {{ $data->logo }} --}}
            <div class="section-body">
                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-logo-tab" data-toggle="pill"
                                        data-target="#v-pills-logo" type="button" role="tab"
                                        aria-controls="v-pills-logo" aria-selected="true">Logo</button>
                                    <button class="nav-link" id="v-pills-email-tab" data-toggle="pill"
                                        data-target="#v-pills-email" type="button" role="tab"
                                        aria-controls="v-pills-email" aria-selected="false">Email</button>
                                    <button class="nav-link" id="v-pills-social-tab" data-toggle="pill"
                                        data-target="#v-pills-social" type="button" role="tab"
                                        aria-controls="v-pills-social" aria-selected="false">Social Media</button>
                                    <button class="nav-link" id="v-pills-general-tab" data-toggle="pill"
                                        data-target="#v-pills-general" type="button" role="tab"
                                        aria-controls="v-pills-general" aria-selected="false">General</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                        <form action="/admin/setting/{{ $data->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-logo" role="tabpanel"
                                            aria-labelledby="v-pills-logo-tab">
                                            @include('pages.admin.setting.logo')
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-email" role="tabpanel"
                                            aria-labelledby="v-pills-email-tab">
                                            @include('pages.admin.setting.email')
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-social" role="tabpanel"
                                            aria-labelledby="v-pills-social-tab">...</div>
                                        <div class="tab-pane fade" id="v-pills-general" role="tabpanel"
                                            aria-labelledby="v-pills-general-tab">
                                            @include('pages.admin.setting.general')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        const betaU = '{{ asset('assets/admin') }}';
        const betaP = '{{ asset('assets/..') }}';
    </script>
    <script src="{{ asset('vendor/ckfinder/ckfinder.js') }}"></script>
    <script src="{{ asset('js/admin/ckfinder.js') }}"></script>
@endpush
