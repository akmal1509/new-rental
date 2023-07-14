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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="/admin/setting/{{ $data->id }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="featured-image-input">Logo</label>
                                            <div
                                                class="logo-image-input-container form-control 
                                            @error('image') is-invalid @enderror">
                                                <img id="logo-preview"
                                                    class="w-100 h-100 featured-image-preview {{ $data->logo ? 'd-block' : 'd-none' }}"
                                                    {{ $data->logo ? 'src=' . asset($imageStorage . '/' . $data->logo) . '' : '' }}
                                                    alt="">
                                            </div>
                                            <input type="text" id="logo-image-input" name="logo"
                                                class="d-none akm-check"
                                                onchange="previewImage2('logo-image-input','logo-preview')"
                                                value="{{ old('logo') ?? $data->logo }}" />
                                            @error('logo')
                                                <small id="" class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                            <button type="button"
                                                onclick="selectFinder2('logo-image-input','logo-preview')"
                                                class="btn btn-primary  mt-4">Choose</button>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="featured-image-input">Flat Logo</label>
                                            <div
                                                class="logo-image-input-container form-control 
                                            @error('image') is-invalid @enderror">
                                                <img id="flat-preview"
                                                    class="w-100 h-100 featured-image-preview {{ $data->flatLogo ? 'd-block' : 'd-none' }}"
                                                    {{ $data->flatLogo ? 'src=' . asset($imageStorage . '/' . $data->flatLogo) . '' : '' }}
                                                    alt="">
                                            </div>
                                            <input type="text" id="flat-image-input" name="flatLogo"
                                                class="d-none akm-check"
                                                onchange="previewImage2('flat-image-input','flat-preview')"
                                                value="{{ old('flatLogo') ?? $data->flatLogo }}" />
                                            @error('flatLogo')
                                                <small id="" class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                            <button type="button"
                                                onclick="selectFinder2('flat-image-input','flat-preview')"
                                                class="btn btn-primary  mt-4">Choose</button>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100">Submit</button>
                                </form>
                            </div>
                        </div>
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
