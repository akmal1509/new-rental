<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <input type="text" id="type_slug" value="{{ $share['model'] }}" hidden>
                <input type="text" id="dataId" value="{{ $data->id }}" hidden>
                <div class="form-group">
                    <label>Lisence Number*</label>
                    <input id="plat" type="text"
                        class="form-control akm-check @error('plat')
                        is-invalid
                    @enderror"
                        name="plat" value="{{ old('plat') ?? $data->plat }}">
                    @error('plat')
                        <small id="" class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Car*</label>
                    <select id="carId"
                        class="form-control select2 akm-check @error('carId')
                        is-invalid
                    @enderror"
                        name="carId">
                        @foreach ($option['car'] as $car)
                            <option value="{{ $car->id }}"
                                {{ Request::old('carId') || $data->carId == $car->id ? 'selected' : '' }}>
                                {{ $car->name }}</option>
                        @endforeach
                    </select>
                    @error('carId')
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
