<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <input type="text" id="type_slug" value="{{ $share['model'] }}" hidden>
                <input type="text" id="dataId" name="dataId" value="{{ $data->id }}" hidden>
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
                    <label>Username</label>
                    <input id="username" type="text"
                        class="form-control @error('username')
                    is-invalid
                    @enderror"
                        name="username" value="{{ old('username') ?? $data->username }}">
                    @error('username')
                        <small id="" class="invalid-feedback">{{ $message }}</small>
                    @enderror
                    <small id="slug_status" class="invalid-feedback" hidden>Slug is Already
                        Exist</small>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input id="email" type="text"
                        class="form-control @error('email')
                    is-invalid
                    @enderror"
                        name="email" value="{{ old('email') ?? $data->email }}">
                    @error('email')
                        <small id="" class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                @if ($type === 'create')
                    <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="password"
                            class="form-control @error('password')
                    is-invalid
                    @enderror"
                            name="password" value="{{ old('password') }}">
                        @error('password')
                            <small id="" class="invalid-feedback">{{ $message }}</small>
                        @enderror
                        <small id="slug_status" class="invalid-feedback" hidden>Slug is Already
                            Exist</small>
                    </div>
                @endif
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
