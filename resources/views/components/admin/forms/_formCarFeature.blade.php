<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <input type="text" id="type_slug" value="{{ $share['model'] }}" hidden>
                <input type="text" id="dataId" value="{{ $data->id }}" hidden>
                {{-- <p class="comment-required">* field must be input</p> --}}
                <div class="form-group">
                    <label>Name*</label>
                    <input id="name" type="text"
                        class="form-control akm-check @error('name')
                        is-invalid
                    @enderror"
                        name="name" value="{{ old('name') ?? $data->name }}">
                    @error('name')
                        <small id="" class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Type Data*</label>
                    <select id="type"
                        class="form-control select2 akm-check @error('type')
                        is-invalid
                    @enderror"
                        name="type">
                        <option value="">==Choose One==</option>
                        @foreach ($type as $type)
                            <option value="{{ $type }}"
                                {{ Request::old('type') || $data->type == $type ? 'selected' : '' }}>
                                {{ $type }}</option>
                        @endforeach
                    </select>
                    @error('type')
                        <small id="" class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Prefix</label>
                    <input id="" type="text"
                        class="form-control akm-check @error('prefix')
                        is-invalid
                    @enderror"
                        name="prefix" value="{{ old('prefix') ?? $data->prefix }}">
                    @error('prefix')
                        <small id="" class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Suffix</label>
                    <input id="" type="text"
                        class="form-control akm-check @error('suffix')
                        is-invalid
                    @enderror"
                        name="suffix" value="{{ old('suffix') ?? $data->suffix }}">
                    @error('suffix')
                        <small id="" class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div id="value" class="form-group" hidden>
                    <label>Value*</label>
                    <textarea style="height:200px" id=""
                        class="form-control akm-check @error('value')
                        is-invalid
                    @enderror"
                        name="value">{{ Request::old('value') ?? $data->value }}</textarea>
                    @error('value')
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
        <div class="card">
            <div class="card-body">
                <label for="featured-image-input">Featured Image*</label>
                <div
                    class="featured-image-backend form-control @error('icon')
                is-invalid
                @enderror">
                    <img class="w-100 h-100 featured-image-preview {{ $data['icon'] ? 'd-block' : 'd-none' }}"
                        {{ $data['icon'] ? 'src=' . asset($imageStorage . $data->icon) . '' : '' }} alt="">
                </div>
                <input type="text" id="featured-image-input" name="icon" class="d-none akm-check"
                    onchange="previewImage()" value="{{ old('icon') ?? $data->icon }}" />
                @error('icon')
                    <small id="" class="invalid-feedback">{{ $message }}</small>
                @enderror
                <button type="button" onclick="selectFinder()" class="btn btn-primary w-100 mt-4">Choose</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const betaU = '{{ asset('assets/admin') }}';
        const betaP = '{{ asset('assets/..') }}';
    </script>
    <script src="{{ asset('vendor/ckfinder/ckfinder.js') }}"></script>
    <script src="{{ asset('js/admin/ckfinder.js') }}"></script>
    <script>
        $('#type').change(function() {
            var type = $('#type').val()
            var attr = $('#value').attr('hidden');
            if (type == 'Checkbox') {
                $('#value').removeAttr('hidden');
            } else {
                $('#value').attr('hidden', true)
            }
        })
    </script>
@endpush
