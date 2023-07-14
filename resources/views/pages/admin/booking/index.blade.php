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
                            <div class="card-body ">
                                {{-- @include('components.admin.typedata') --}}
                                <div class="table-responsive">
                                    <table class="table-striped table" id="table-image">
                                        <thead>
                                            <tr>
                                                <th width="5%" class="text-center">
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup"
                                                            data-checkbox-role="dad" class="custom-control-input"
                                                            id="checkbox-all">
                                                        <label for="checkbox-all"
                                                            class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th width="20%">Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                                {{-- <th width="20%">Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $data)
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup"
                                                                class="custom-control-input akm-check-box"
                                                                id="checkbox-{{ $loop->iteration }}" name="number_check[]"
                                                                value="{{ $data->id }}" data-id="{{ $data->id }}">
                                                            <label for="checkbox-{{ $loop->iteration }}"
                                                                class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{ $data->name }}
                                                    </td>
                                                    <td>{{ $data->phone }}</td>
                                                    <td>{{ $data->email }}</td>
                                                    <td>
                                                        <a href="/admin/booking/{{ $data->id }}"
                                                            class="btn btn-warning mr-1" id="modalButton"><i
                                                                class="fas fa-eye"></i></a>
                                                    </td>
                                                    {{-- <td>
                                                        @if ($type == 'index')
                                                            <a class="btn btn-warning btn-action mr-1" data-toggle="tooltip"
                                                                title="Duplicate"
                                                                onclick="duplicateData({{ $data->id }},'{{ $share['model'] }}', '{{ $data->slug }}','{{ $share['slugData'] }}')">
                                                                <i class="fa-regular fa-folder"></i>
                                                            </a>
                                                        @endif
                                                        @if ($type == 'trash')
                                                            <a class="btn btn-warning btn-action mr-1" data-toggle="tooltip"
                                                                title="Restore"
                                                                data-confirm="Are You Sure?|You Want to restore this data?"
                                                                data-confirm-yes="restoreData({{ $data->id }},'{{ $share['model'] }}','{{ $share['slugData'] }}')">
                                                                <i class="fa-solid fa-circle-half-stroke"></i>
                                                            </a>
                                                        @endif
                                                        @if ($type == 'index')
                                                            <a href="/admin/{{ $share['slugData'] }}/{{ $data->id }}/edit"
                                                                class="btn btn-primary btn-action mr-1"
                                                                data-toggle="tooltip" title="Edit">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        @endif
                                                        @if ($type == 'index')
                                                            <a class="btn btn-danger btn-action" data-toggle="tooltip"
                                                                title="Delete"
                                                                data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                                data-confirm-yes="deleteData({{ $data->id }},'{{ $share['model'] }}','{{ $share['slugData'] }}')">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        @else
                                                            <a class="btn btn-danger btn-action" data-toggle="tooltip"
                                                                title="Delete Permanent"
                                                                data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                                data-confirm-yes="forceDeleteData({{ $data->id }},'{{ $share['model'] }}', '{{ $share['slugData'] }}')">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        @endif
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
        // $('#modalButton').on('click', function() {

        //     $('#myModal').modal('show');
        // })
        function myTest(id) {
            const spinnerWrapper = document.querySelector('#allSpin')
            spinnerWrapper.style.display = 'flex'
            spinnerWrapper.style.opacity = '100'
            $.ajax({
                type: 'POST',
                url: '/admin/rent/info',
                data: {
                    id: id,
                    _token: token
                },
                success: function(data) {
                    const spinnerWrapper = document.querySelector('#allSpin')
                    $('.modalWhere').html(data);
                    spinnerWrapper.style.display = 'none'
                    $('#myModal').modal('show');
                },
            })
        }
    </script>
@endpush
