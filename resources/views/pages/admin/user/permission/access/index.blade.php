@extends('layouts.admin.app')
@section('title', 'Master Data' . $share['title'])

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('main')
    <meta name="method-delete" content="DELETE">
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Master Data {{ $share['title'] }}</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Role</label>
                                    <select name="" class="form-control select2" id="role"
                                        onchange="myPermission()">
                                        {{-- <option value="">==Select Role==</option> --}}
                                        @foreach ($role as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="permission"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>


    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
    <script src="{{ asset('js/admin/bulkAction.js') }}"></script>

    <script>
        $(document).ready(function() {
            myPermission()
        })

        function myPermission() {
            var role = $('#role').val()
            $.ajax({
                type: 'GET',
                url: '/admin/user/permission/access/show',
                data: {
                    role: role
                },
                success: function(data) {
                    $('.permission').html(data)
                    console.log(data)
                },
            })
        }

        function pushPermission() {
            var token = $("meta[name='csrf-token']").attr('content')
            var role = $('#role').val()
            var permis = []
            $(".permis:checked").each(function() {
                permis.push($(this).val());
            });
            // console.log(permis)
            $.ajax({
                type: 'POST',
                url: '/admin/user/permission/access',
                data: {
                    permis: permis,
                    role: role,
                    _token: token
                },
                success: function(data) {
                    swal("Done!", "data was successfully update!", "success");
                },
            })
        }
    </script>
@endpush
