@include('components.admin.forms.forCheckError')
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <input type="text" id="type_slug" value="Car" hidden>
                <input type="text" id="dataId" value="{{ $data->id }}" hidden>
                <div class="form-group">
                    <label>Title</label>
                    <input id="name" type="text"
                        class="form-control akm-check @error('title')
                        is-invalid
                    @enderror"
                        name="title" value="{{ old('title') ?? $data->title }}">
                    @error('title')
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
                    <label for="">Category</label>
                    <select id="categoryId"
                        class="form-control akm-check @error('categoryId')
                        is-invalid
                    @enderror"
                        name="categoryId">
                        @foreach ($option['category'] as $category)
                            <option value="{{ $category->id }}"
                                {{ Request::old('categoryId') || $data->categoryId == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('categoryId')
                        <small id="" class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Body</label>
                    <textarea name="body" id="editor" class="body-editor">
                        {{ Request::old('body', $data->body) }}
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
                <label for="featured-image-input">Featured Image</label>
                <div
                    class="featured-image-backend form-control @error('image')
                is-invalid
                @enderror">
                    <img class="w-100 h-100 featured-image-preview {{ $data['image'] ? 'd-block' : 'd-none' }}"
                        {{ $data['image'] ? 'src=' . asset($imageStorage . '/' . $data->image) . '' : '' }}
                        alt="">
                </div>
                <input type="text" id="featured-image-input" name="image" class="d-none akm-check"
                    onchange="previewImage()" value="{{ old('image') ?? $data->image }}" />
                @error('image')
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
    <script src="{{ asset('vendor/ckeditor5/packages/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/ckfinder/ckfinder.js') }}"></script>
    <script src="{{ asset('js/admin/editor.js') }}"></script>
    <script src="{{ asset('js/admin/ckfinder.js') }}"></script>
@endpush
