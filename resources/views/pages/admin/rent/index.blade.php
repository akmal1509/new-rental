@extends('layouts.admin.app')
@section('title', 'Master Data' . $share['title'])

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/prismjs/themes/prism.min.css') }}">
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
                            <div class="card-header">
                                <a href="/admin/{{ $share['slugData'] }}/create" class="btn btn-primary">Create New</a>
                            </div>
                            <div class="card-body pt-0">
                                @include('components.admin.typedata')
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
                                                <th>code</th>
                                                <th>Customer</th>
                                                <th>Status</th>
                                                <th>Payment</th>
                                                <th width="20%">Action</th>
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
                                                    <td>{{ $data->code }}</td>
                                                    <td>{{ $data->customerName }}</td>
                                                    <td>{{ $data->status }}</td>
                                                    {{-- <td>${{ $data->totalPayment }}.00</td> --}}
                                                    <td class="align-middle">
                                                        <div class="progress" data-height="10" data-toggle="tooltip"
                                                            title="{{ round($data->percentPayment, 2) }}%">
                                                            <div class="progress-bar bg-success"
                                                                data-width="{{ round($data->percentPayment, 2) }}"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <a type="button" data-our="{{ $data }}"
                                                            class="btn btn-warning mr-1"
                                                            onclick="myTest({{ $data->id }})" id="modalButton"><i
                                                                class="fas fa-eye"></i></a>


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
                                                    </td>
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
        {{-- @include('pages.admin.rent.modal') --}}
        <div class="modalWhere"></div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>


    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
    <script src="{{ asset('js/admin/bulkAction.js') }}"></script>

    <script src="{{ asset('library/prismjs/prism.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>

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
