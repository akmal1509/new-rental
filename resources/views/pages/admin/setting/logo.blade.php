<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="form-group col-4">
                <label for="featured-image-input">Logo</label>
                <div class="logo-image-input-container form-control @error('image') is-invalid @enderror">
                    <img
                        id="logo-preview"
                        class="w-100 h-100 featured-image-preview {{ $data->logo ? 'd-block' : 'd-none' }}"
                        {{ $data->logo ? 'src=' . asset($imageStorage . '/' . $data->logo) . '' : '' }}
                        alt=""
                    >
                </div>
                <input
                    type="text"
                    id="logo-image-input"
                    name="logo"
                    class="d-none akm-check"
                    onchange="previewImage2('logo-image-input','logo-preview')"
                    value="{{ old('logo') ?? $data->logo }}"
                />
                @error('logo')
                    <small
                        id=""
                        class="invalid-feedback"
                    >{{ $message }}</small>
                @enderror
                <button
                    type="button"
                    onclick="selectFinder2('logo-image-input','logo-preview')"
                    class="btn btn-primary  mt-4"
                >Choose</button>
            </div>
            <div class="form-group col-4">
                <label for="featured-image-input">Flat Logo</label>
                <div class="logo-image-input-container form-control @error('image') is-invalid @enderror">
                    <img
                        id="flat-preview"
                        class="w-100 h-100 featured-image-preview {{ $data->flatLogo ? 'd-block' : 'd-none' }}"
                        {{ $data->flatLogo ? 'src=' . asset($imageStorage . '/' . $data->flatLogo) . '' : '' }}
                        alt=""
                    >
                </div>
                <input
                    type="text"
                    id="flat-image-input"
                    name="flatLogo"
                    class="d-none akm-check"
                    onchange="previewImage2('flat-image-input','flat-preview')"
                    value="{{ old('flatLogo') ?? $data->flatLogo }}"
                />
                @error('flatLogo')
                    <small
                        id=""
                        class="invalid-feedback"
                    >{{ $message }}</small>
                @enderror
                <button
                    type="button"
                    onclick="selectFinder2('flat-image-input','flat-preview')"
                    class="btn btn-primary  mt-4"
                >Choose</button>
            </div>
            <div class="form-group col-4">
                <label for="featured-image-input">Icon</label>
                <div class="logo-image-input-container form-control @error('image') is-invalid @enderror">
                    <img
                        id="icon-preview"
                        class="w-100 h-100 featured-image-preview {{ $data->icon ? 'd-block' : 'd-none' }}"
                        {{ $data->icon ? 'src=' . asset($imageStorage . '/' . $data->icon) . '' : '' }}
                        alt=""
                    >
                </div>
                <input
                    type="text"
                    id="icon-image-input"
                    name="icon"
                    class="d-none akm-check"
                    onchange="previewImage2('icon-image-input','icon-preview')"
                    value="{{ old('icon') ?? $data->icon }}"
                />
                @error('icon')
                    <small
                        id=""
                        class="invalid-feedback"
                    >{{ $message }}</small>
                @enderror
                <button
                    type="button"
                    onclick="selectFinder2('icon-image-input','icon-preview')"
                    class="btn btn-primary  mt-4"
                >Choose</button>
            </div>
        </div>
        <button
            type="submit"
            class="btn btn-primary"
        >Save</button>
    </div>
</div>
