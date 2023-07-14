<div class="row">
    @foreach ($permission as $permission)
        <div class="col-3">
            <div class="form-check">
                <input class="form-check-input permis" type="checkbox" value="{{ $permission->name }}" name="permis[]"
                    id="permis" {{ in_array($permission->name, $access) ? 'checked' : '' }}>
                <label class="form-check-label" for="">
                    {{ $permission->name }}
                </label>
            </div>
        </div>
    @endforeach
</div>
<button type="submit" class="btn btn-primary mt-3" onclick="pushPermission()" id="btn-permission">Apply</button>
