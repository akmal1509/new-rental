<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <input type="text" id="type_slug" value="{{ $share['model'] }}" hidden>
                <input type="text" id="dataId" value="{{ $data->id }}" hidden>
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
