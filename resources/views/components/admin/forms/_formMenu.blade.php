<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <input type="text" id="type_slug" value="{{ $share['model'] }}" hidden>
                <input type="text" id="dataId" value="{{ $data->id }}" hidden>
                <div class="form-group">
                    <label>Name</label>
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
                    <label>Slug</label>
                    <input id="slug" type="text"
                        class="form-control @error('slug')
                    is-invalid
                    @enderror"
                        name="slug" value="{{ old('slug') ?? $data->slug }}">
                    @error('slug')
                        <small id="invalid-slug" class="invalid-feedback">{{ $message }}</small>
                    @enderror
                    <small id="slug_status" class="invalid-feedback" hidden>Slug is Already
                        Exist</small>
                </div>
                <div class="form-group">
                    <label for="">Main Menu</label>
                    <select id="mainMenu"
                        class="form-control select2 akm-check @error('mainMenu')
                        is-invalid
                    @enderror"
                        name="mainMenu">
                        <option value="">This Parent</option>
                        @foreach ($menu as $menu)
                            <option value="{{ $menu->id }}"
                                {{ Request::old('mainMenu') || $data->mainMenu == $menu->id ? 'selected' : '' }}>
                                {{ $menu->name }}</option>
                        @endforeach
                    </select>
                    @error('mainMenu')
                        <small id="" class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Controller</label>
                    <input type="text"
                        class="form-control akm-check @error('controller')
                        is-invalid
                    @enderror"
                        name="controller" value="{{ old('controller') ?? $data->controller }}">
                    @error('controller')
                        <small id="" class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Sort</label>
                    <input type="text"
                        class="form-control akm-check @error('sort')
                        is-invalid
                    @enderror"
                        name="sort" value="{{ old('sort') ?? $data->sort }}">
                    @error('sort')
                        <small id="" class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group" id="icon">
                    <label>Icon</label>
                    <input type="text"
                        class="form-control akm-check @error('icon')
                        is-invalid
                    @enderror"
                        name="icon" value="{{ old('icon') ?? $data->icon }}">
                    @error('icon')
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

@push('scripts')
    <script>
        $('#mainMenu').change(function() {
            var type = $('#mainMenu').val()
            var attr = $('#icon').attr('hidden');
            if (type == '') {
                $('#icon').removeAttr('hidden');
            } else {
                $('#icon').attr('hidden', true)
            }
        })
    </script>
@endpush
