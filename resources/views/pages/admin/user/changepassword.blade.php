@extends('layouts.admin.app')

@section('title', 'Change Password' . $share['model'])


@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Change Password {{ $share['model'] }}</h1>
            </div>

            <div class="section-body">
                <form method="post" action="/admin/{{ $share['slugData'] }}/{{ $data->id }}/changepassword"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body">
                                    <input type="text" id="type_slug" value="{{ $share['model'] }}" hidden>
                                    <input type="text" id="dataId" name="dataId" value="{{ $data->id }}" hidden>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input id="password" type="password"
                                            class="form-control akm-check @error('password')
                            is-invalid
                        @enderror"
                                            name="password" value="{{ old('password') }}">
                                        @error('password')
                                            <small id="" class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <button class="btn btn-primary w-100">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
