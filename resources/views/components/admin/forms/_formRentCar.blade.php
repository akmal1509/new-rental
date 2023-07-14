@include('components.admin.forms.forCheckError')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
@endpush
<div style="position: relative">
    <div id="spin" class="spinner-wrapper" style="display: none">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">

                    <input type="text" id="type_slug" value="Car" hidden>
                    <input type="text" id="dataId" value="{{ $data->id }}" hidden>
                    <div class="form-group">
                        <label>Customer Name</label>
                        <input id="customerName" type="text"
                            class="form-control akm-check @error('customerName')
                        is-invalid
                    @enderror"
                            name="customerName" value="{{ old('customerName') ?? $data->customerName }}">
                        @error('customerName')
                            <small id="" class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Customer Phone</label>
                        <input id="customerPhone" type="text"
                            class="form-control akm-check @error('customerPhone')
                        is-invalid
                    @enderror"
                            name="customerPhone" value="{{ old('customerPhone') ?? $data->customerPhone }}">
                        @error('customerPhone')
                            <small id="" class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Car</label>
                        <select onchange="carChange()" id="platId"
                            class="form-control select2 akm-check @error('platId')
                        is-invalid
                    @enderror"
                            name="platId">
                            {{-- <option value="">== Choose Car ==</option> --}}
                            @foreach ($option['plat'] as $plat)
                                <option value="{{ $plat->id }}"
                                    {{ Request::old('platId') || $data->platId == $plat->id ? 'selected' : '' }}>
                                    {{ $plat->plat . ' - ' . $plat->carName }}</option>
                            @endforeach
                        </select>
                        @error('platId')
                            <small id="" class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Pick Up Date</label>
                        <input onchange="calculate()" id="pickUp" type="text" name="pickUpDate"
                            class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label>Return Date</label>
                        <input id="return" onchange="calculate()" type="text" name="returnDate"
                            class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label for="">Long Days</label>
                        <input type="text" id="longDays" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Price / day</label>
                        <input type="text" id="priceDays" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label>Total Price</label>
                        <input id="price" type="text"
                            class="form-control akm-check @error('price')
                        is-invalid
                    @enderror"
                            name="price" value="{{ old('price') ?? $data->price }}" readonly>
                        @error('price')
                            <small id="" class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">information</label>
                        <textarea name="information" id="editor" class="body-editor">
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
            <div class="card">
                <div class="card-body">
                    <label for="featured-image-input">Car Image</label>
                    <div
                        class="featured-image-backend form-control @error('image')
                is-invalid
                @enderror">
                        <img id="carImage" class="w-100 h-100 featured-image-preview" src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const betaU = '{{ asset('assets/admin') }}';
        const betaP = '{{ asset('assets/..') }}';
        const url = '{{ asset($imageStorage . '/') }}'
    </script>

    <script>
        $(document).ready(function() {
            var plat = $('#platId').val()
            // const url = '{{ asset($imageStorage . '/') }}'
            $.ajax({
                type: 'POST',
                url: '/admin/rent/image-change',
                data: {
                    plat: plat,
                    _token: token
                },
                success: function(data) {
                    console.log(data)
                    $('#carImage').attr('src', url + '/' + data)
                },
            })
            // console.log(test)
        })
    </script>

    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>


    <script src="{{ asset('vendor/ckeditor5/packages/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/ckfinder/ckfinder.js') }}"></script>
    <script src="{{ asset('js/admin/editor.js') }}"></script>
    <script src="{{ asset('js/admin/ckfinder.js') }}"></script>

    {{-- <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script> --}}
@endpush
