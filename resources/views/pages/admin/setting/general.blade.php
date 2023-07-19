<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <p class="font-weight-bold">Contact Us</p>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $data->email }}">
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $data->phone }}">
                </div>
                <div class="form-group">
                    <label for="">Whatsapp</label>
                    <input type="text" name="whatsapp" class="form-control" value="{{ $data->whatsapp }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="font-weight-bold">Footer</p>
                <div class="form-group">
                    <label for="">Copyright</label>
                    <input type="text" name="copyright" class="form-control" value="{{ $data->copyright }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
