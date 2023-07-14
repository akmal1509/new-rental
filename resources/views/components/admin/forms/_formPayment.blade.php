@include('components.admin.forms.forCheckError')
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <input type="text" id="type_slug" value="Car" hidden>
                <input type="text" id="dataId" value="{{ $data->id }}" hidden>
                <div class="form-group">
                    <label for="">Rental Code</label>
                    <select id="rentalId"
                        class="form-control select2 akm-check @error('rentalId')
                        is-invalid
                    @enderror"
                        name="rentalId">
                        @foreach ($option['rental'] as $rental)
                            <option value="{{ $rental->id }}"
                                {{ Request::old('rentalId') || $data->rentalId == $rental->id ? 'selected' : '' }}>
                                {{ $rental->code . ' | ' . $rental->customerName }}</option>
                        @endforeach
                    </select>
                    @error('rentalId')
                        <small id="" class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input id="price" type="text"
                        class="form-control akm-check @error('price')
                    is-invalid
                @enderror"
                        name="price" value="{{ old('price') ?? $data->price }}">
                    @error('price')
                        <small id="" class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">information</label>
                    <textarea name="infotmation" id="editor" class="body-editor">
                        {{ Request::old('information', $data->information) }}
                    </textarea>
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

@push('scripts')
    <script>
        const betaU = '{{ asset('assets/admin') }}';
        const betaP = '{{ asset('assets/..') }}';
    </script>
    <script src="{{ asset('vendor/ckeditor5/packages/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/ckfinder/ckfinder.js') }}"></script>
    <script src="{{ asset('js/admin/editor.js') }}"></script>
    <script src="{{ asset('js/admin/ckfinder.js') }}"></script>
@endpush
