<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Mailer</label>
            <input type="text" name="mail[mailer]" value="{{ config('app.mail.mailer') }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Port</label>
            <input type="text" name="mail[port]" value="{{ config('app.mail.port') }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Host</label>
            <input type="text" name="mail[host]" class="form-control" value="{{ config('app.mail.hostname') }}">
        </div>
        <div class="form-group">
            <label for="">Username</label>
            <input type="text" name="mail[username]" class="form-control" value="{{ config('app.mail.username') }}">
        </div>
        <div class="form-group">
            <label for="">Passowrd</label>
            <input type="text" name="mail[password]" class="form-control" value="{{ config('app.mail.password') }}">
        </div>
        <div class="form-group">
            <label for="">Encrypt</label>
            <select name="mail[encrypt]" class="form-control" id="" value="{{ config('app.mail.encrypt') }}">
                <option value="TLS">Tls</option>
                <option value="SSL">SSL</option>
                <option value="TLS/SSL">Tls/SSL</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
